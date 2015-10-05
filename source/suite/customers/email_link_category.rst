.. meta::
   :http-equiv=refresh: 0; url=http://documentation.emarsys.com/resource/developers/api/email/listing-link-categories/

Listing Link Categories
=======================

Returns the link categories of links used in emails. These categories group the links in emails based on their type.

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
