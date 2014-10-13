Implementing the resource options endpoint
==========================================

Similarly to the trigger api, the simplest implementation that returns no options is an options.php that looks something like this:

.. code-block:: php

   <?php

   echo json_encode(array('success' => true, 'options' => []));

Now let’s suppose that our previous ‘MyService’ object can also return the list of services. We will use that to create a useful implementation for the resource options endpoint:

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
