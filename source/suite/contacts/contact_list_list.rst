Listing Available Contact Lists
===============================

Generates a list of the available contact lists.

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
         "name": "asgard_protectors"
       },
       {
         "id": "124",
         "name": "asgard_enemies"
       }
     ]
   }

Errors
------

Standard HTML status and error codes apply.
