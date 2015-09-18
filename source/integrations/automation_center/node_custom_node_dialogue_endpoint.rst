Custom Node Dialog Endpoint
===========================

This endpoint is called when the customer opens up the program node dialogue, and for this, your
service should respond with an HTTP page containing a user interface which allows a new resource
to be setup or an existing one to be edited. The HTTP page also needs to contain a JavaScript code
that can handle the ‘resource.save’ message when received from the program node, and should respond
with the ID and label of the saved resource as outlined below.

.. image:: /_static/images/ac_node_custom_dialog_workflow.png

HTTP Method: GET

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 30 20 40

   * - Parameter Name
     - Type
     - Description
   * - environment
     - string
     - Domain name of the customer’s Emarsys environment (e.g. login.emarsys.net)
   * - customer_id
     - int
     - ID of the customer in the Emarsys database
   * - language
     - string
     - Specifies the admin's preferred language

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 30 20 40

   * - Parameter Name
     - Type
     - Description
   * - resource_id
     - int/string
     - ID of the resource to be edited
   * - resource_label
     - string
     - Label for the node which uses the same name as the resource, e.g. Send SMS <name of the SMS>. Renaming the resource updates the node label as well.

Required Response:

* A resource editor should be returned as an HTML page.
* If the resource_id is sent as a GET parameter, then the page should be populated with the current values for that resource.
* The JavaScript in the page should listen to messages. See example receiveMessage implementation
  at the end of this section.

  * When a message with `messageId` == `resource.save` is received, the editor should save the values
     set up by the customer, and respond with another message to the parent iframe. The message should
     be of the following format:

    * messageId: `resource.save`
    * data

      * id: <new resource id>
      * label: <new label to be displayed under the node>

Resizing the Dialog
-------------------

The iframe that displays the content returned by the custom node dialog endpoint is 360 pixels wide and 100 pixels high.
Since the size of the content may vary, we provide an API that can be used to resize the dialog to a maximum size of 800x300 pixels.

.. note:: You can only resize the frame once the content has been loaded into the iframe.

To resize the dialog, simply include the required iframe size in a message to the API, sending the data in the following format:

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
