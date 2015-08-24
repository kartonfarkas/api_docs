Listing Combined Segments
=========================

Generates a list of combined segments. With combined segments, it is possible to combine the results of several other
segments.

Endpoint
--------

``GET /api/v2/segments/combined``

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