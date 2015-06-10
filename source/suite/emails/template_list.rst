Listing Email Templates
=======================

Returns a list of all available templates, including their names and IDs.

Endpoint
--------

``GET /api/v2/email/templates``

Result Example
--------------

.. code-block:: json

   {
      "replyCode":0,
      "replyText":"OK",
      "data":[
         {
            "id":1111111111,
            "name":"Weekly Newsletter - English"
         },
         {
            "id":2222222222,
            "name":"Monthly Customer Satisfaction Survey - English"
         },
         {
            "id":3333333333,
            "name":"Monthly Customer Satisfaction Survey - Russian"
         },
         {
            "id":4444444444,
            "name":"Re-engagement Campaign - French"
         }
      ]
   }
