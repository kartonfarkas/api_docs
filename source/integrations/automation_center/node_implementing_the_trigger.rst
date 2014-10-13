Implementing the trigger endpoint
=================================

In it’s simplest form the trigger endpoint is just a single url that returns a JSON object. For example our trigger.php could look like this:

.. code-block:: php

   <?php

   echo json_encode(array('success' => true));

This service doesn’t do anything. So let’s suppose that we have a class that can trigger the required actions when passed an ServiceRequest object. Then the trigger API could look something like this:

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
