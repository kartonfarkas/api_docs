Querying Available External Events
==================================

Lists all available external event names and IDs. These IDs can then be used to trigger email sending or Automation Center programs.

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
         "id": "123456789",
         "name": "purchasing"
       },
       {
         "id": "987654321",
         "name": "checking an item"
       }
     ]
   }



