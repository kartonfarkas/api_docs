Deleting an External Event
==========================

Deletes an external event from the Suite DB of External Events. Deleting an event has no effect on any Automation Center programs or email campaigns linked to the event.

Endpoint
--------

``POST /api/v2/event/<event_id>/delete``

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
     "data": {}
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
     - There is no such event for this account.
   * - 400
     - 5004
     - Event ID: [id] is invalid.
     -
