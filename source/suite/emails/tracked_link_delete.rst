.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/email/delete-link/

Deleting a Tracked Link in an Email Campaign
============================================

Deletes a tracked link of an email campaign with providing its link ID, so the link won’t be tracked anymore for that campaign.

Endpoint
--------

``POST /api/v2/email/<email_id>/deletetrackedlinks/<link_id>``

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

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - link_id
     - int
     - ID of the URL, part of the URI
     - Please note that if it is not provided, all URLs of the email campaign will be deleted.

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
