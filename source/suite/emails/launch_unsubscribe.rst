Unsubscribing a Contact from an Email Campaign
==============================================

Marks a user unsubscribed in the launch list so it will be counted in the campaign statistics. It does not change the
opt-in status of the contact but updates the response summary (:doc:`email_response_summary`) of the specific launch.

Endpoint
--------

``POST /api/v2/email/unsubscribe``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - key_id
     - mixed
     - Key which identifies the contacts
     - This can be a `field id <../../suite/appendices/system_fields.html>`_, **id** or **uid**. If left empty, the internal ID will be used by default.
   * - key_value
     - mixed
     - Value of the field identified by the key_id
     -
   * - launch_id
     - int
     - ID of a launch
     -
   * - email_id
     - int
     - ID of a specific email
     - Campaign cannot be modified when it has already been launched.

Request Example
---------------

.. code-block:: json

   {
      "key_id": "",
      "key_value": "123456789",
      "launch_id": "111111111",
      "email_id": "222222222"
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
     - 1006
     - Empty parameter(s): key_id
     -
   * - 400
     - 6042
     - No such launch
     -