Querying Email Campaign Categories
==================================

Returns the list of the email campaign categories which can be used in email creation. The list is sorted
alphabetically by category name.

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
            "category": "emails_to_asgardians"
         },
         {
            "id": "1112",
            "category": "emails_to_the_superheroes"
         }
      ]
   }

Errors
------

The standard HTML error and status codes.