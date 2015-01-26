Querying Delivery Status
========================

Returns the delivery status of an email campaign.

Endpoint
--------

``POST /api/v2/email/getdeliverystatus``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - emailId
     - int
     - ID of the email campaign
     - a valid email campaign ID must be provided.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - lastId
     - int
     - last returned ID
     -
   * - launchId
     - int
     - A valid launch ID must be provided. This parameter is mandatory if the campaign has multiple launches.
     - The launch must be finished before you can retrieve its delivery status.

JSON Payload Example
--------------------

.. code-block:: json

   {
     "emailId": "1234",
     "launchId": "5678",
     "lastId": "999"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
        "resultSet":[
           {
              "id": 1,
              "user_id": 1,
              "bounce_reason": "soft",
              "status": "launched",
              "mail_type": "html"
           }
        ]
        "lastId": 1
     }
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 10001
     - Missing parameter: [parameter]
     -
   * - 400
     - 10001
     - Invalid data format for [parameter]. Integer expected
     - The value for [parameter] is not an integer.
   * - 400
     - 6004
     - Invalid email ID
     - No email found.
   * - 400
     - 6011
     - Launch not finished
     - The ‘done’ status of the launch is not ‘y’.
   * - 400
     - 6012
     - No data found
     - The are no contacts on the launch list.
   * - 400
     - 6013
     - Launch not found
     - No launch exists for the given email.
   * - 400
     - 6014
     - Launch ambiguous
     - Multiple launch was found for the given email. Please specify it in the launchId parameter.
