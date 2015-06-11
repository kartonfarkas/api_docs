Creating an External Event
==========================

Creates an external event with the specified name.

Endpoint
--------

``POST /api/v2/event``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - name
     - int
     - Name of the external event
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": "111111111",
         "name": "bulk purchasing"
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
     - 5002
     - Parameter name is required.
     -
   * - 400
     - 5003
     - An external event with this name already exists.
     -