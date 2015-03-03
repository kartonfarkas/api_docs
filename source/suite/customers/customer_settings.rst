Querying Customer Settings
==========================

Returns the current settings of the customer account (e.g. timezone, customer name, etc.).

Endpoint
--------

``GET /api/v2/settings``

Resulting Data Structure
------------------------

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

Where:

* *name* is the customer's name

For more information on the timezones available in Suite, see :doc:`../appendices/time_zones`.





