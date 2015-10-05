.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/contacts/list-combined-segments/

Listing Combined Segments
=========================

Generates a list of all available combined segments. With combined segments, it is possible to combine the results of
several other segments.

Endpoint
--------

``GET /api/v2/combinedsegments``

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": [
         {
            "id": 33,
            "name": "test_segment"
         }
      ]
   }
