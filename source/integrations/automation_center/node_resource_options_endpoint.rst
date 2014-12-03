Resource options endpoint
=========================

This endpoint is called when the customer opens up the program node dialogue. For this, your service should respond
with the list of available resources as described below.

 * HTTP Method: GET

.. list-table:: **Parameters**
   :header-rows: 1

   * - Parameter name
     - Type
     - Description
   * - environment
     - string
     - host name of the Suite environment where the customer is (example: login.emarsys.net)
   * - customer_id
     - int
     - ID of the customer in the Suite database
   * - language
     - string
     - specifies the admin's preferred language

Required Response:

 * The service needs to respond with a JSON object. If the request was successful, the HTTP status should be in
 the 200-299 range, while in case of errors it should be in the 400-599 range.
 * In case of success, the service should provide an array of objects with the following keys:

.. list-table:: **Possible Keys**
   :header-rows: 1
  
   * - Key
     - Value type
     - Description
   * - ID
     - int
     - integer ID that identifies the resource
   * - name
     - string
     - name of the resource (usually this should be specified by the customer.)

Example: [{“id”:3,”name”:”Some resource”},{“id”:12,”name”:”Some other resource”}]

In case of error, the service should also provide a ‘userMessage’ that provides a human readable message indicating
the cause of failure, and a ‘code’ key that contains an error code.

Example:

.. code-block:: json

   {
     "userMessage": "Could not generate resource list",
     "code": 5
   }

.. image:: /_static/images/ac_node_options_workflow.png
