Querying Contact Lists
======================

...

Endpoint
--------

``GET /api/v2/contactlist``

Result Data Structure
---------------------

 * id:integer, name:string
 * id:integer, name:string
 * …

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
         "name": "List 1"
       },
       {
         "id": "124",
         "name": "List 2"
       }
     ]
   }

Errors
------

The standard HTML status and error codes.