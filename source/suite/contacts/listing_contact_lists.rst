Listing Contact Lists
=====================

Returns a list of the available contact lists of the customer.

Endpoint
--------

``GET /api/v2/contactlist``

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     [
       {
         "id": "123",
         "name": "asgardians"
       },
       {
         "id": "124",
         "name": "asgardenemies"
       }
     ]
   }

Errors
------

The standard HTML status and error codes.