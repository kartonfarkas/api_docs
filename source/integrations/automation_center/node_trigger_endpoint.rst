Trigger Endpoint
================

This endpoint is called by Automation Center, when the program execution reaches your node. It should start
the execution of your service.

.. image:: /_static/images/ac_node_trigger_workflow.png

HTTP Method: POST

.. list-table:: **Parameters (sent as form data)**
   :header-rows: 1

   * - Name
     - Type
     - Description
   * - environment
     - string
     - the Suite environment that triggered the event (example: login.emarsys.net)
   * - customer_id
     - int
     - ID of the customer in the Suite database
   * - program_type
     - string
     - possible values: ‘batch’, ‘transactional’, ‘recurring’
   * - list_id
     - int
     - contactlist ID in the Suite database (optional)
   * - user_id
     - int
     - contact ID in the Suite database (optional)
   * - resource_id
     - int/string
     - ID of a resource managed by the service (optional)
   * - queue_id
     - int
     - Identifies the trigger request. This value is unique for each trigger event from a given environment.
   * - run_id
     - string
     - Identifies the program run. This value can be used to link together multiple trigger events from the same
       program resulting from a single entry.
   * - data
     - json
     - campaign specific external data (optional)

Required Response
-----------------

* In case of success, the service needs to respond with an HTTP status code in the 200-299 range.
* In case of error, the HTTP status code should be in the range 400-499 in case of client error (i.e. the request is
   invalid and cannot be fulfilled) or in the 500-599 range when there was an error on the server side.
* In case of server errors, Automation Center will retry the request 3 times. The service should also return a json
   containing a userMessage and a code key.

Example
-------

.. code-block:: json

   {
     "userMessage": "Could not trigger event",
     "code": "45"
   }

Program Types and Users
-----------------------

Automation Center makes a distinction between batch, recurring and transactional programs.

* **Batch programs** operate on user lists and are triggered once by a timer (see ‘Target segment’ entry point in
   Automation Center).
* **Recurring programs** are similar to batch programs in that they operate on user lists and they
   are also triggered by a timer, but these might get triggered several times as opposed to one time only programs.
* **Transactional programs** operate on individual users and are triggered by user specific events
   (for example ‘New contact’, ‘Datachange’ and ‘External event’ are transactional entry points).

The post request will contain either a list_id or a user_id. In case of batch and recurring programs, Automation Center
will always send a list_id. In case of transactional programs, normally a user_id is sent but under high loads
Automation Center may decide to batch up transactional events. In that case, it will send a list_id even if the program
is transactional.

.. note::

   Always check for both user_id and list_id, and do not rely on program_type to decide which one to use.

Resolving user_ids and list_ids
-------------------------------

* Please use the suite API v2 to retrieve contact informations based on the user_id or list_id. Discussing the details of the Suite API is beyond the scope of this document, so please be referred to the Suite API documentation.

* Note that user lists are deleted after ??? hours, so your service needs to resolve the list_id to the actual user data within that timeframe.

* If your service is specific to a customer, or a small set of customers, then use a regular API user/secret pair, and maintain the keys for your customers in your service. You can access the suite api through the external endpoint: ‘/api/v2’

* If your service is generic to all customers, or a larger set of customers, then require (from whome?) an internal API secret and use the internal endpoint for the Suite API: ‘/api/v2/internal/<customer_id>’

Resources
---------

Your service may or may not need a set of node specific settings from the user. We refer to such
a setting as a resource.  If your service needs such resources, then there are two supported ways
to handle them.

The first option is the ‘Resource options endpoint’. In this case your service needs to provide a
list of options and the customer (Automation Center user) will be able to select one from a drop
down list in the program node dialog. To enable this feature the ‘Resource options endpoint’ needs
to be implemented.

For example if your service sends SMS messages, you will want to set up the content of the messages.
Each of these setups should be stored and managed by your service. Resources should have an integer ID,
and this ID is passed to the trigger endpoint in the resource_id parameter. (A string ID can also be used,
but we suggest using integers when possible.)

The second option is using the ‘Custom node dialogue endpoint’. In this case your service should provide
an HTML page that will be rendered inside an iframe in the node dialogue. This can be used to integrate
the resource management page into Automation Center.

Campaign Specific External Data
-------------------------------

The external event entry point allows the user to post a JSON data structure along with the triggered external event.
This JSON data structure is passed along the program, and can be used to customize program runs. For example in case
of email this data is used to generate sections dynamically. API based nodes will receive this JSON object in the data
field when it is present.

PHP Implementation
------------------

In it’s simplest form the trigger endpoint is just a single url that returns a JSON object.
For example our trigger.php could look like this:

.. code-block:: php

   <?php

   echo json_encode(array('success' => true));

This service doesn’t do anything. So let’s suppose that we have a class that can trigger the
required actions when passed an ServiceRequest object. Then the trigger API could look
something like this:

.. code-block:: php

   <?php

   try {
       // First we will copy the post values into a trigger
       // request object
       $request = new TriggerRequest();
       $request->environment = $_POST['environment'];
       $request->customerId = $_POST['customer_id'];
       $request->programType = $_POST['program_type'];
       $request->listId = $_POST['list_id'];
       $request->userId = $_POST['user_id'];
       $request->resourceId = $_POST['resource_id'];

       // You should do some basic validation of the input values.
       // In this example we assume that the validate function
       // throws an exception if one of the values is not valid.
       $request->validate();

       // The class you implemented to perform the work.
       $service = new MyService();

       // Finally we call the function that performs the actual work.
       // As before, we assume that this method throws an exception
       // when something went wrong.
       $service->trigger($request);

       // Finally if all went well we respond with a success message
       echo json_encode(array('success' => true));

   } catch(Exception $e) {

       // If there was any exception we respond with a failure message
       // We assumed here that all exceptions have error messages that
       // make sense for the user. Usually you may need to rephrase
       // some of these messages for the users.
       echo json_encode(array('success' => false, 'errorMessage' => $e->getMessage()));
   }