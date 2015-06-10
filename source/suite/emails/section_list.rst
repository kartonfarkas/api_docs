Listing Sections in a Template Based Email Campaign
===================================================

Returns a list of sections used in a particular template-based email campaign.

Endpoint
--------

``GET /api/v2/email/<email_id>/sections``

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
         "id": 4,
         "group_id": 111111111
       },
       {
         "id": 3,
         "group_id": 222222222
       },
       {
         "id": 1,
         "group_id": 333333333
       },
       {
         "id": 6,
         "group_id": 444444444
       }
     ]
   }

Where:

* *id* is the ID of the section
* *group_id* is the ID of a group containing sections

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 404
     - 6025
     - No such campaign exists.
     -
   * - 404
     - 6045
     - The campaign ID does not refer to a template-based email.
     -
