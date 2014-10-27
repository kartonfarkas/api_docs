Get Settings of Customer
========================

Gets the settings of the customer.

Endpoint
--------

``GET /api/v2/settings/``

Result Data Structure
---------------------

Normal result:

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

Error condition:

.. code-block:: json

   {
     "replyCode":1003,
     "replyText":"Internal error",
     "data":""
   }

Errors
------

The error codes associated with the contact field ID and value can be found in the `check contact internal ID section <http://documentation.emarsys.com/?page_id=176>`_.

.. list-table:: Possible error codes

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 500
     - 1003
     - Internal error
     - An internal error occurred

