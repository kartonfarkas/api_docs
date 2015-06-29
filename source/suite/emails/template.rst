Querying an Email Template
==========================

Returns all the details related to an email template.

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
               "id": "111111111",
               "name": "group_name_example"
            },
            {
               "id": "222222222",
               "name": "group_name_example_2"
            }
         ]
      }
   }

Where:

* *id* is the ID of a group containing sections
* *name* is the name of a group containing sections

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
     - 6046
     - Template not found.
     - Check that the correct ID was entered.
