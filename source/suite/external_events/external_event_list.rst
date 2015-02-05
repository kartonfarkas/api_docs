Querying Available External Events
==================================

Returns a list of all existing external events IDs, which can then be used to send emails or initiate Automation Center programs.

Endpoint
--------

``GET /api/v2/event``

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
         "name": "purchasing"
       },
       {
         "id": "456",
         "name": "checking an item"
       }
     ]
   }



