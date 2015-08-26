Deleting All Tracked Links in an Email Campaign
===============================================

Deletes all tracked links of an email campaign, so the links won’t be tracked anymore for that campaign.


Endpoint
--------

``POST /api/v2/email/<email_id>/deletetrackedlinks``

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
     - ID of the email, part of the URI
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": ""
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
     - 6025
     - No such campaign
     - Email ID is not valid.
   * - 400
     - 6004
     - No email ID provided
     -