Listing Email Templates
=======================

Returns a list of all available templates, each with name and ID.

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
            "name":"example_template 04 2012 EN"
         },
         {
            "id":2222222222,
            "name":"example_template 04 2012 DE"
         },
         {
            "id":3333333333,
            "name":"example_template 07 2011 EN"
         },
         {
            "id":4444444444,
            "name":"example_template 07 2010 EN"
         }
      ]
   }
