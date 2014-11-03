Querying External Events
========================

Returns a list of external events which can be used in programs.

Endpoint
--------

``GET /api/v2/event``

Result Data Structure
---------------------

 * id:integer, name:string
 * id:integer, name:string
   ...

Result Example
--------------

.. code-block:: json

   {
     "replyCode":0,
     "replyText":"OK",
     "data":
     [
       {
         "id":"123",
         "name":"event name 1"
       }
       {
         "id":"456",
         "name":"event name 2"
       }
     ]
   }



