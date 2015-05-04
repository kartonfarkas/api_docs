Unsubscribing a Contact from an Email Campaign
==============================================

Marks a user unsubscribed for an email campaign launch so it will be counted in the campaign statistics.

It does not change the opt-in status of the contact, this must be done with an additional API request (:doc:`../../suite/contacts/contact_update`)
if necessary. It affects the response summary (:doc:`launch_response_summary`) and :doc:`../../suite/exports/export_responses`, which
makes segmentation based on unsubscribed possible.

.. note:: It is useful if you aim at sending email campaigns with unsubscribed links which target your own domain and
          unsubscribing the user only from the specific email campaign, not from all campaigns.

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
     - Key which identifies the contact
     - This can be a `field id <../../suite/appendices/system_fields.html>`_, **id** or **uid**. If left empty, the internal ID will be used by default.
   * - key_value
     - mixed
     - Value of the field identified by the key_id
     -
   * - launch_id
     - int
     - ID of the launch
     -
   * - email_id
     - int
     - ID of a specific email
     -

Request Example
---------------

.. code-block:: json

   {
      "key_id": "3",
      "key_value": "the_flash@example.com",
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
     - Empty parameter(s): [value]
     -
   * - 400
     - 6042
     - No such launch
     -
   * - 400
     - 6025
     - No such campaign
     -
   * - 400
     - 1003
     - Internal error
     - key_id and key_value must uniquely identify a contact to be unsubscribed, otherwise this message is displayed.