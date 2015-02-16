Trigger Endpoint
================

This endpoint is called by the Automation Center when the program execution reaches your node. It should start
the execution of your service.

.. image:: /_static/images/ac_node_trigger_workflow.png

HTTP Method: POST

.. list-table:: **Required Parameters (sent as form data)**
   :header-rows: 1
   :widths: 30 20 40

   * - Name
     - Type
     - Description
   * - environment
     - string
     - Suite environment that triggered the event (example: login.emarsys.net)
   * - customer_id
     - int
     - ID of the customer in the Suite database
   * - program_type
     - string
     - Possible values: ‘batch’, ‘transactional’, ‘recurring’
   * - queue_id
     - int
     - Identifies the trigger request. This value is unique for each trigger event from a given environment.
   * - run_id
     - string
     - Identifies the program run. This value can be used to link together multiple trigger events from the same
       program resulting from a single entry.

.. list-table:: **Optional Parameters (sent as form data)**
   :header-rows: 1
   :widths: 30 20 40

   * - Name
     - Type
     - Description
   * - list_id
     - int
     - Contact list ID in the Suite database
   * - user_id
     - int
     - Contact ID in the Suite database
   * - resource_id
     - int/string
     - ID of a resource managed by the service
   * - data
     - json
     - Campaign specific external data

Required Response
-----------------

* HTTP Status codes in the range 200-299 indicate a successful execution by the service. 
* HTTP Status codes in the range 400-499 indicate a client-side error (i.e. the request is invalid and cannot be fulfilled).
* HTTP Status codes in the range 500-599 indicate a client-side error. In the case of a server-side error, the Automation Center will resend the request 3 times, and then stop. The service should also return a JSON containing a userMessage and a code key.

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

* **Batch programs** operate on user list level and are triggered by a timer as a one-off (see ‘Target segment’ entry point in
   Automation Center).
* **Recurring programs** are similar to batch programs in that they operate on user list level and they
   are also triggered by a timer, but these might be triggered repeatedly as opposed to one time only programs.
* **Transactional programs** operate on individual user level and are triggered by user specific events
   (for example ‘New contact’, ‘Datachange’ and ‘External event’ are transactional entry points).

The post request must contain either a list_id or a user_id, for batch and recurring programs, the Automation Center
will always send a list_id. For transactional programs, a user_id is normally sent but under high loads, the Automation Center may decide to send transactional events in batches.
In such circumstances, the Automation Center will include a list_id even if the program is transactional.

.. note::

   Always check for both user_id and list_id, and do not rely on the *program_type* to decide which one to use.

Resolving user_ids and list_ids
-------------------------------

* Please use the suite API v2 to retrieve contact information based on the *user_id* or *list_id*.

* Note that user lists are deleted after ??? hours, so your service needs to resolve the *list_id* to the actual user data within that timeframe.

* If your service is specific to a customer, or a small set of customers, then use a regular API user/secret pair, and maintain the keys for your customers in your service itself. You can access the Suite API through the external endpoint: ‘/api/v2’

* If your service is generic to all customers, or a larger set of customers, then an internal API secret is required which should be used with the internal endpoint for the Suite API: ‘/api/v2/internal/<customer_id>’

Resources
---------

Your service may or may not need a set of node specific settings from the user. We refer to such
settings as *resources*.  If your service needs such resources, then there are two options available:

1. The ‘Resource options endpoint’

In this case, your service needs to be able to provide a list of options for the customer (Automation Center user) to select from via a drop-down list in the program node dialog.
To enable this feature the ‘Resource options endpoint’ needs to be implemented.

For example, if your service sends SMS messages, you will want to set up the content of the messages first.
Each of these setups should be stored and managed by your service. Resources should have an integer ID,
which is then passed to the trigger endpoint via the resource_id parameter. A string ID can also be used,
but we suggest using integers when possible.

2. The ‘Custom node dialogue endpoint’

In this case, your service needs to be able to provide an HTML page that will be rendered inside an iframe in the node dialogue.
This iframe can then be used to integrate the resource management page into Automation Center.

Campaign Specific External Data
-------------------------------

The External Event entry point allows the user to post a JSON data structure along with the triggered external event.
This JSON data structure is passed along the program, and can be used to customize program runs. For example, this data is used to dynamically generate sections in email.
API based nodes will receive this JSON object in the data field (when present).

PHP Implementation
------------------

In its simplest form, the trigger endpoint is just a single URL that returns a JSON object.
For example, our trigger.php could look like this:

.. code-block:: php

   <?php

   echo json_encode(array('success' => true));

This service doesn’t do anything. Supposing you want to use a class that can trigger the required actions when passed an ServiceRequest object. 
The trigger API could then look something like this:

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
