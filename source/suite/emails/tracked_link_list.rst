Querying Tracked Links of an Email Campaign
===========================================

Returns a list of all available tracked links of an email campaign.

Endpoint
--------

``GET /api/v2/email/<email_id>/trackedlinks``

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
     "data": [
       {
         "id": 1,
         "section_id": 1,
         "url": "http://example.com"
       },
       {
         "id": 2,
         "section_id": 6,
         "url": "http://example_2.com"
       }
     ]
   }

Where:

* *id* is the link ID
* *section_id* is the ID of the email campaign section of the URL
* *url* is the link itself

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