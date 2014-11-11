Listing Segments
================

Returns a list of segments. Segment is used for filtering according to different criteria.

Endpoint
--------

``GET /api/v2/filter``

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
