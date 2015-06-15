Querying an External Event
==========================

Returns the details of an external event, and the ID can then be used to trigger email or Automation Center
program launches.

Endpoint
--------

``GET /api/v2/event/<event_id>``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - event_id
     - int
     - ID of the external event, part of the URI
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": "123456789",
         "name": "purchasing"
      }
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 5001
     - No event found with the specified ID.
     - 
