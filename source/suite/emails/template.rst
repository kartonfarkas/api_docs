Querying an Email Template
==========================

Returns all the details of an email template.

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
               "id": "group_id",
               "name": "group_name"
            },
            {
               "id": "group_id",
               "name": "group_name"
            }
         ]
      }
   }

Where:

* *group_id* is the ID of a group containing sections
* *group_name* is the name of a group containing sections

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