Updating Email Campaign Recipient Source
========================================

Email campaigns can be created with *recipient source* set to *"Using the API"* using the Suite UI.
This call can assign a segment or a contact list to an email campaign. It's only possible to change
the recipient source parameter once, only when the value of it was *"Using the API"*.

Endpoint
--------

``POST /api/v2/email/<email_id>/updatesource``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - email_id
     - int
     - the ID of the email campaign
     -
   * - filterId, contactlistId
     - int
     - Recipient source for the email campaign. At least the filterId (segment ID) or the contactlistId
       have to be specified and must not be 0. If both are sent, only one must be different from 0.
     -

JSON Payload Example
--------------------

.. code-block:: json

   {
     "filterId": "1121",
     "contactlistId": "0"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": true
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 10001
     - filterId must be an integer
     - The filter ID must be an integer.
   * - 400
     - 10001
     - contactlistId must be an integer
     - The contact list ID must be an integer.
   * - 400
     - 10001
     - You have to fill either filterId or contactlistId
     - A contact list ID or a filter ID must be specified. This error message is returned if either both or none are specified.
   * - 400
     - 6004
     - Invalid email ID
     - No email was found with the given ID, or the source was not set to “Using the API”.
   * - 400
     - 6004
     - No email ID provided
     - Missing parameter: emailId

