Custom node dialog endpoint
================

This endpoint is called when the customer opens up the program node dialogue. For this your service should respond with an HTTP page that contains a user interface for setting up a new resource, or editing an existing one. The HTTP page should also contain JavaScript code that can handle the ‘resource.save’ message, when received from the parent page, and should respond with the ID and label of the saved resource as explained below.
HTTP Method: GET
Parameters:
Parameter name	Type	Description
environment	string	The host name of the Suite environment where the customer is (example: login.emarsys.net)
customer_id	integer	The ID of the customer in Suite database
resource_id	integer/string	The ID of the resource that is being edited (Optional)
resource_label	string	The label that appeared below the node so far, if an existing resource is being edited (Optional)
Required response:
A resource editor should be returned as an HTML page.
If the resource_id is sent as a GET parameter, then the page should be filled up with the current values for that resource.
The JavaScript in the page should listen to messages. 
Example: window.addEventListener("message", receiveMessage, false);
See example receiveMessage implementation at the end of this section.
When a message with ‘messageId’ == ‘resource.save’ is received, the editor should save the values set up by the customer, and respond with another message to the parent iframe. The message should be of the following format:
messageId: ‘resource.save’
data
ID: <new resource ID>
label: <new label to be displayed under the node>
