Querying Access Levels
======================

.. warning::

   Accessing the administrator endpoints might be limited. If you need access, please contact Emarsys Support.

Returns the list of available access levels for the customer.

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
