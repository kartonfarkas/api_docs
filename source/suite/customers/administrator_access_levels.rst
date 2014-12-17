Querying the Access Levels
==========================

Returns the list of available access levels for the customer.

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
       "data":
       [
           {
               "id": "1",
               "name": "Operator"
           },
           {
               "id": "974",
               "name": "Blacklist Administrator"
           }
       ]
   }
