Querying Customer Settings
==========================

Returns the settings of the customer.

Endpoint
--------

``GET /api/v2/settings/``

Result Data Structure
---------------------

Normal Result:

.. code-block:: json

   {
     "replyCode":0,
     "replyText":"OK",
     "data":
     {
       "timezone": "Europe/Vienna"
     }
   }

For more information on timezones available in eMarketing Suite, see `here <http://documentation.emarsys.com/?page_id=3291>`_.

Error Condition:

.. code-block:: json

   {
     "replyCode":1003,
     "replyText":"Internal error",
     "data":""
   }

Errors
------

The error codes associated with the contact field ID and value can be found in the `check contact internal ID section <http://documentation.emarsys.com/?page_id=176>`_.

.. list-table:: Possible Error Codes
   :header-rows: 1

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 500
     - 1003
     - Internal error
     -

