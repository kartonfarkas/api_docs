Querying Customer Settings
==========================

.. warning::

   Accessing the administrator endpoints might be limited. If you need access, please contact Emarsys Support.

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

For more information on timezones available in the Suite, see `here <http://documentation.emarsys.com/?page_id=3291>`_.





