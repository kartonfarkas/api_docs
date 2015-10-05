.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/external-events/list-all-event-use/

Listing All Usages of an External Event
=======================================

Lists the IDs of the programs which would be started and the emails which would be sent by triggering a specific
external event. The result is a program ID and possibly more than one email ID.

.. note:: Programs and emails must have a "launched" state in order to appear.

Endpoint
--------

``GET /api/v2/event/<id>/usages``

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data":{
         "program_ids": [
            "111111111"
         ],
         "email_ids": [
            "111111111"
         ]
      }
   }
