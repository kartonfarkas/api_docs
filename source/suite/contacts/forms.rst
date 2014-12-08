Querying Customer Forms
=======================

Returns a list of available forms.
Suite offers simple functionality to create different kinds of forms to collect data from contacts.
Customers can embed these registration forms in web pages.

Form Types
----------

.. list-table:: **Form Types**
   :header-rows: 1

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

Where *type* is the form type. See `email and form types <http://documentation.emarsys.com/?page_id=417>`_ .

Errors
------

The standard HTML error and status codes.
