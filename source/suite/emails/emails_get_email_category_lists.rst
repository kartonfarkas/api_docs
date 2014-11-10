Querying E-Mail Category Lists
==============================

Returns a list of email categories which can be used in email creation. The list is sorted alphabetically
by category name.

Endpoint
--------

``GET /api/v2/emailcategory``

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       {
         "id": "1111"
         "category": "Cat1"
       },
       {
         "id": "1112"
         "category": "Cat2"
       }
     }
   }

Errors
------

The standard HTML error and status codes.