Querying an Email Template
==========================

Endpoint
--------

``GET /api/v2/email/templates/<template_id>``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - template_id
     - int
     - ID of the template, part of the URI
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": 1111111111,
         "name": "example_template 04 2012 EN",
         "groups": [
            {
               "id": "groupid",
               "name": "groupname"
            },
            {
               "id": "groupid",
               "name": "groupname"
            }
         ]
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
   * - 404
     - 10001
     - Template not found
     -