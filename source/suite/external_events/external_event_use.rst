Listing All Usages of an External Event
=======================================

Lists the IDs of the programs started and the emails sent by triggering a specific external event.

Endpoint
--------

``GET /api/v2/event/<id>/usages``

Result Example
--------------

.. code-block:: json

   {
      "replyCode":0,
      "replyText":"OK",
      "data":{
         "program_ids":[
            "111111111"
         ],
         "email_ids":[
            "111111111"
         ]
      }
   }