Querying a Tracked Link in an Email Campaign
============================================

Returns all the details of an email campaign's tracked link.

Endpoint
--------

``GET /api/v2/email/<email_id>/trackedlinks/<link_id>``

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
   * - link_id
     - int
     - ID of the URL, part of the URI
     -

Result Example
--------------

.. code-block:: json


   {
     "replyCode": 0,
     "replyText": "OK",
     "data": {
       "id": 1,
       "section_id": 1,
       "url": "http://example.com"
     }
   }

Where:

* *id* is the link ID
* *section_id* is the ID of the email campaign section of the URL

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
     -
   * - 400
     - 6043
     - No tracked link with ID %s exists for this campaign.
     -
