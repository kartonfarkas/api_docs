.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/contacts/list-segments/

Listing Segments
================

Generates a list of segments, which are used for filtering according to different criteria.

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
         "name": "superheroes"
       },
       {
         "id": "456",
         "name": "superhero_supporters"
       }
     ]
   }

Errors
------

The standard HTML error and status codes.
