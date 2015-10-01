Unified Behavior Data for Click
===============================

Can be used to store *click* behavior events in HDS.

.. note:: Request must be signed with Escher.

Endpoint
--------

``POST /api.hds.emarsys.net:4000/customers/<customer_id>/events/providers/sendkit/channels/email/campaign_types/txn/event_types/click``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - customer_id
     - int
     - Suite customer ID, part of the URI
     -
   * - campaign_id
     - int
     - ID that groups messages into meaningful categories for segmentation or reporting, such as an email_id, or a Suitekit stream_id.
     - Must be unique per customer.
   * - contact_id
     - int
     - Internal ID of a contact in Suite.
     -
   * - event_time
     - date
     - ISO 8601 date format is recognized.
     - Time and time zone offset are optional. If there is no offset, Vienna time is assumed.
   * - message_id
     - int
     - Used to create a connection between different events related to a single message within the scope of a campaign.
       It is needed to connect events of different types to the original message that was sent to the contact.
       For example, if a contact can receive the same email campaign twice, we need to be able to tell if an open event
       comes from the first or second email. In Suite, this would be the launch list ID.
     -
   * - link_id
     - string
     - Unique ID of the link within the email on which a click was made
     -
   * - is_mobile
     - boolean
     - Opening of the email happened on a mobile device
     -
   * - platform
     - string
     - Platform of the mobile device, e.g. iPhone, Android, Windows Mobile
     -

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK"
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
     - 1
     - Cannot parse CSV payload. Illegal quoting in line 1.
     -
   * - 400
     - 2
     - Missing required field: event_time, event number: 0
     -
   * - 400
     - 3
     - Invalid value for field campaign_id: Integer value expected, event number: 0
     -