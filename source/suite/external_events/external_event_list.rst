Querying the External Events
============================

Returns a list of external events which can be used in programs. External event has an ID with which emails can be sent or AC
programs can be started for a contact through the API.

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



