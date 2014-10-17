Custom node dialog endpoint
===========================

This endpoint is called when the customer opens up the program node dialogue. For this your service should respond with an HTTP page, that contains a user interface for setting up a new resource, or editing an existing one. The HTTP page should also contain JavaScript code, that can handle the ‘resource.save’ message, when received from the parent page, and should respond with the id and label of the saved resource as explained below.

HTTP Method: GET
Parameters:

.. list-table:: **Parameters**
   :header-rows: 1

   * - Parameter Name
     - Type
     - Description
   * - environment
     - string
     - The host name of the Suite environment where the customer is (example: login.emarsys.net)
   * - customer_id
     - int
     - The ID of the customer in Suite database
   * - resource_id
     - int/string
     - The ID of the resource that is being edited (Optional)
   * - resource_label
     - string
     - The label that appeared below the node so far, if an existing resource is being edited (Optional)
   * - language
     - string
     - It specifies the admin's preferred language

Required response:

 * A resource editor should be returned as an HTML page.
 * If the resource_id is sent as a GET parameter, then the page should be filled up with the current
   values for that resource.
 * The JavaScript in the page should listen to messages. See example receiveMessage implementation
   at the end of this section.

   * When a message with `messageId` == `resource.save` is received, the editor should save the values
     set up by the customer, and respond with another message to the parent iframe. The message should
     be of the following format:

     * messageId: `resource.save`
     * data

       * id: <new resource id>
       * label: <new label to be displayed under the node>

.. image:: /_static/images/ac_node_custom_dialog_workflow.png

Resizing the dialog
-------------------

The iframe that displays the custom content returned by the custom node dialog endpoint has a 360 pixels width and 100 pixels height. Since the size of the content may be different we provide an API that can be used to resize the dialog once your content has been loaded into the iframe. The maximum allowed size is 800x300 pixels.

To resize the dialog simply send the required iframe size in a message. The data sent should be of the following format:

.. code-block:: json

   {
     "messageId": "dialog.resize",
     "data": {
       "width": "<width>",
       "height": "<height>"
     }
   }

Example
-------

.. code-block:: html

  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
  </head>
  <body>
      <!-- Include your HTML forms and other controlls here -->

      <script type="text/javascript">
          // Listen to messages (expected from parent iframe)
          window.addEventListener("message", receiveMessage, false);

          // Function that handles messages
          function receiveMessage(event)
          {
              // Parse message data using JSON parser
              var parsedMessage = JSON.parse(event.data);

              // Check message ID is 'resource.save'
              if (parsedMessage.messageId === 'resource.save') {

                  // Save values set up by the user using an AJAX request to
                  // your own service.

                  // Create a response object
                  var response = {
                      messageId: 'resource.save',
                      data: {
                          ID: '<resource_id>',
                          label: '<resource_label>'
                      }
                  };

                  // Send the response object to Automation Center, by responding
                  // to the parent iframe with a new message
                  window.parent.postMessage(JSON.stringify(response), "*");
              }
          }

          // Resize the Automation Center dialog to fit the dialog content.
          window.parent.postMessage(JSON.stringify({
              messageId: 'dialog.resize',
              data: {
                  width: <width>,
                  height: <height>
              }
          }), "*");
      </script>
  </body>
  </html>
