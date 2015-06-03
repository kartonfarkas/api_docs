Updating a Tracked Link of an Email Campaign
============================================

Updates the URL parameter of an email campaign's tracked link.

.. note:: Please note that for template-based campaigns, it is not sufficient to update the link only.
          Updating the section is required as well as the old link remains stored in it.
          
Endpoint
--------

``POST /api/v2/email/<email_id>/trackedlinks/<link_id>``

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
   * - url
     - string
     - Tracked link
     -

Request Example
---------------

.. code-block:: json

   {
     "url": "http://example.com"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": {
       "id": 1,
       "section_id": 1,
       "url": "http://example_3.com"
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
   * - 400
     - 6044
     - URL: <url> is unsupported for tracked links.
     - URL is not proper.