Listing Sources
===============

Generates a list of external sources integrated with Suite.

Endpoint
--------

``GET /api/v2/source``

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
         "name": "my_super_source"
       },
       {
         "id": "456",
         "name": "the_avengers_source"
       }
     ]
   }

Errors
------

Standard HTML status and error codes apply.
