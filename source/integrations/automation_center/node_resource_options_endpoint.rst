.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/resource-options-endpoint/

Resource Options Endpoint
=========================

This endpoint is called when the customer opens up the program node dialogue, and for this, your service
should respond with the list of available resources as outlined below.

.. image:: /_static/images/ac_node_options_workflow.png

* HTTP Method: GET

.. list-table:: **Parameters**
   :header-rows: 1
   :widths: 30 20 40

   * - Parameter name
     - Type
     - Description
   * - environment
     - string
     - Domain name of the customer's Emarsys environment (e.g. login.emarsys.net)
   * - customer_id
     - int
     - ID of the customer in the Emarsys database
   * - language
     - string
     - Specifies the preferred language of the admin

Required Response
-----------------

* The service needs to respond with a JSON object. If the request was successful, the HTTP status will be in the
  200-299 range. If there were any issues the HTTP status response will be in the 400-599 range.
* A successful response should include an array of objects with the following keys:

.. list-table:: **Possible Keys**
   :header-rows: 1
   :widths: 10 20 40

   * - Key
     - Value type
     - Description
   * - ID
     - int
     - Integer ID that identifies the resource
   * - name
     - string
     - Name of the resource, usually specified by the customer.

Normal Result:

.. code-block:: json

   [
      {
         "id": 3,
         "name": "Some resource"
      },
      {
         "id": 12,
         "name": "Some other resource"
      }
   ]

If an error occurs, the service will include a *userMessage* which indicates what caused the failure, along with a code key which contains an error code.

Error Condition:

.. code-block:: json

   {
     "userMessage": "Could not generate resource list",
     "code": 5
   }

PHP Implementation
------------------

Similarly to the trigger API, the simplest implementation that returns no options is an options.php, which looks like this:

.. code-block:: php

   <?php

   echo json_encode(array('success' => true, 'options' => []));

Now let’s suppose that our previous ‘MyService’ object can also return the list of services. We will use that to create
a useful implementation for the resource options endpoint:

.. code-block:: php

   <?php

   try {
       // First we will copy the get values into a option
       // request object
       $request = new OptionsRequest();
       $request->environment = $_GET['environment'];
       $request->customerId = $_GET['customer_id'];
       // You should do some basic validation of the input values.
       // In this example we assume that the validate function
       // throws an exception if one of the values is not valid.
       $request->validate();

       // The class you implemented to perform the work.
       $service = new MyService();

       // Finally we call the function that returns the resources.
       // As before, we assume that this method throws an exception
       // when something went wrong.
       $resources = $service->getResources($request);

       // You may need to convert your resource objects to the
       // format required by the Automation Center node integration
       // APIs contract. For example if your resources are messages
       // then you may want to use your 'messageTitle' member variable
       // as the name for the resource.
       $options = [];
       foreach($resources as $resource) {
           $options[] = array(
               'id' => $resource->id,
               'name' => $resource->messageTitle
           );
       }

       // Finally if all went well we respond with a success message
       // and return the array of options.
       echo json_encode(array('success' => true, 'options' => $options));

   } catch(Exception $e) {

       // If there was any exception we respond with a failure message
       // We assumed here that all exceptions have error messages that
       // make sense for the user. Usually you may need to rephrase
       // some of these messages for the users.
       echo json_encode(array('success' => false, 'errorMessage' => $e->getMessage()));
   }
