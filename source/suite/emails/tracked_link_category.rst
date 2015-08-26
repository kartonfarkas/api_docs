Listing Link Categories
=======================

Returns link categories of tracked links. These categories group tracked links on the basis of their type.

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
         "111111111": "product_link",
         "222222222": "common_link"
      }
   }