.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/customers/access-levels/

Querying Access Levels
======================

Returns the list of available access levels for the customer's account.

.. include:: _warning.rst

Endpoint
--------

``GET /api/v2/administrator/getaccesslevels``

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": [
         {
            "id": 0,
            "name": "Administrator"
         },
         {
            "id": 1,
            "name": "Operator"
         }
      ]
   }
