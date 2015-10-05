.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/external-events/update-event/

Updating an External Event
==========================

Updates an external event with a new name.

Endpoint
--------

``POST /api/v2/event/<event_id>``

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
   * - name
     - string
     - New name of the external event
     -

Request Example
---------------

.. code-block:: json

   {
     "name": "response_email"
   }

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": "222222222",
         "name": "response email"
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
     - There is no such event for this account.
   * - 400
     - 5002
     - Parameter name is required.
     -
   * - 400
     - 5004
     - Event ID: [id] is invalid.
     -
