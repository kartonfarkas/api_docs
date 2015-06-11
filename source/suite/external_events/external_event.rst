Querying an External Event
==========================

Returns all the details of an external event. The ID can then be used to trigger email sending or Automation Center
programs.

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
==============

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
     - Event is not found
     - There is no such event for this account.