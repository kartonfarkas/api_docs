Querying Customer Forms
=======================

Generates a list of all Suite forms available for use (e.g. registration form in a web page).
Suite offers simple functionality to create different kinds of forms to collect data from contacts.

Endpoint
--------

``GET /api/v2/form``

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": [
         {
            "id": "123",
            "type": "2"
         },
         {
            "id": "124",
            "type": "3"
         }
      ]
   }

Form Types
----------

The following *type* of forms are currently available:

.. list-table:: **Form Types**
   :header-rows: 1
   :widths: 20 40

   * - Name
     - Type
   * - 1
     - General Registration Form
   * - 2
     - Newsletter Registration Form
   * - 3
     - Contact Us Form
   * - 4
     - Change-profile Form

Errors
------

Standard HTML error and status codes apply.
