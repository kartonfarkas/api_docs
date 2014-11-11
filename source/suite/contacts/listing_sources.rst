Listing Sources
===============

Returns a list of sources.

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
         "name": "source name 1"
       }
       {
         "id": "456",
         "name": "source name 2"
       }
     ]
   }

Errors
------

The standard HTML status and error codes.
