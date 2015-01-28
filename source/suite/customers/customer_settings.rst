Querying Customer Settings
==========================

Returns the current settings of the customer account (e.g. timezone, customer name, etc.).

Endpoint
--------

``GET /api/v2/settings/``

Data Structure of the Result
---------------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "timezone": "America/New_York",
       "name": "Heimdall"
     }
   }

For more information on timezones available in the Suite, see :doc:`../appendices/time_zones`.





