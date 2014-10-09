Resource options endpoint
================

This endpoint is called when the customer opens up the program node dialogue. For this your service should respond with the list of available resources as described below.

HTTP Method: GET
Parameters:
Parameter name	Type	Description
environment	string	The host name of the Suite environment where the customer is (example: login.emarsys.net)
customer_id	integer	The ID of the customer in Suite database

Required response: 
The service needs to respond with a JSON object. If the request was successful the HTTP status should be in the 200-299 range, while in case of errors it should be in the 400-599 range.
In case of success, the service should provide an array of objects with the following keys:
Key	Value type	Description
ID	integer	An integer ID that identifies the resource
name	string	The name of the resource (usually this should be specified by the customer.)
Example: [{“ID”:3,”name”:”Some resource”},{“ID”:12,”name”:”Some other resource”}]
In case of error, the service should also provide a ‘userMessage’ that provides a human readable message indicating the cause of failure, and a ‘code’ key, that contains an error code.
Example: {”userMessage”:”Could not generate resource list”, “code”: 5}
