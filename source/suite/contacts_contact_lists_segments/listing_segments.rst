Listing Segments
================

Returns a list of segments which can be used as contact source for the email.

Endpoint
--------

``GET /api/v2/filter``

Result Data Structure
---------------------

 * id: integer, name: string
 * id: integer, name: string
   …

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
         "name": "filter name 1"
       },
       {
         "id": "456",
         "name": "filter name 2"
       }
     ]
   }

Errors
------

The standard HTML error and status codes.
