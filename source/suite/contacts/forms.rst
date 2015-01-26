Querying Customer Forms
=======================

Returns a list of available forms.
Suite offers simple functionality to create different kinds of forms to collect data from contacts.
Customers can embed these registration forms in web pages.

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

These are the possible values for the form's *type*:

.. list-table:: **Form Types**
   :header-rows: 1
   :widths: 20 40

   * - Name
     - Type
   * - 1
     - General Registration
   * - 2
     - Newsletter Registration
   * - 3
     - Contact Us
   * - 4
     - Change-profile Form

Errors
------

The standard HTML error and status codes.
