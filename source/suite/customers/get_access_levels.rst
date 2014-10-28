Get access levels
=================

.. warning::

   The administrator API is available only from specific IP addresses. For more information, please contact emarsys support.

This returns the list of available access levels for the customer.

Endpoint
--------

``GET /api/v2/administrator/getaccesslevels``

Result data structure
---------------------

id:integer
name:string
id:integer
name:string

Result example
--------------

.. code-block:: json

   {
       "replyCode": 0,
       "replyText": "OK",
       "data":
       [
           {
               "id":"1"
               "name":"Operator"
           },
           {
               "id":"974"
               "name":"Blacklist Administrator"
           }
       ]
   }

