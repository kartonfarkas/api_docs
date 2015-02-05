Querying Email Campaign Categories
==================================

Returns the list of the available email campaign categories which can be used in email creation. The list is alphabetised by category name.

Endpoint
--------

``GET /api/v2/emailcategory``

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": [
         {
            "id": "1111",
            "category": "emails_to_the_asgardians"
         },
         {
            "id": "1112",
            "category": "emails_to_the_superheroes"
         }
      ]
   }

Errors
------

Standard HTML error and status codes apply.
