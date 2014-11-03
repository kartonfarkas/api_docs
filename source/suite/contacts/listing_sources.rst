Listing Sources
===============

Returns a list of sources which can be used for creating contacts.

Endpoint
--------

``GET /api/v2/source``

Result Data Structure
---------------------

 * id:integer, name:string
 * id:integer, name:string
   …

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
         "name":"source name 1"
       }
       {
         "id":"456",
         "name":"source name 2"
       }
     ]
   }

Errors
------

The standard HTML status and error codes.
