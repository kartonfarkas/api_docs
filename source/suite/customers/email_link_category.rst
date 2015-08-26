Listing Link Categories
=======================

Returns link categories of links in emails. These categories group links in emails on the basis of their type.

Endpoint
--------

``GET api/v2/settings/linkcategories``


Resulting Data Structure
------------------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "111111111": "Products",
         "222222222": "Common links"
      }
   }