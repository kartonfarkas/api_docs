Querying Customer Settings
==========================

Returns the settings of the customer.

Endpoint
--------

``GET /api/v2/settings/``

Result Data Structure
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

Where *name* is the name of the customer.

For more information on timezones available in the Suite, see `here <http://dev.emarsys.com/suite/time_zones.html>`_.





