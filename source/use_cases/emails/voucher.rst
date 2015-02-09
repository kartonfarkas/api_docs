Include a Voucher in an Email
=============================

To reward a valued contact, you might want to send them a voucher by email as a thank you for their loyalty, their purchase, etc. 

You include the actual voucher during the email campaign creation, but this example will take you through the whole
process from creation to sending the email.

Required stages:
- Create an Email Campaign
- Define the Email Campaign Trigger
- Trigger the External Event

1. Creating an Email Campaign
-----------------------------

**Request**:

``POST /api/v2/email``

.. code-block:: json

   {
     "name": "present",
     "language": "en",
     "subject": "Voucher",
     "fromname": "webshop",
     "fromemail": "webshop@example.com",
     "email_category": "111111111",
     "html_source": "<html>You are one of our greatest customers, so here we are sending you a voucher: $voucher$... </html>",
     "text_source": "You are one of our greatest customers, so here we are sending you a voucher: voucher01...",
     "browse": 0,
     "text_only": 0,
     "unsubscribe": 1,
     "filter": "111111111",
     "contactlist": 0
   }

.. note:: The $voucher$ placeholder is what includes the Suite voucher, and has to be used in the email to work.

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 555555555
     }
   }

Where *id* is the new email campaign ID.

See :doc:`../../suite/emails/email_create`.

2. Define the Email Campaign Trigger
------------------------------------

Once the email has been created, access the email via the UI and set the *Recipient Source* to "**Generated through an event**". Then set the *Event* to
"**On External Event**", and select the External Event you want to use as a trigger for this email.

3. Triggering External Events
-----------------------------

**Request**:

``POST /api/v2/event/<123>/trigger``

**Response**:

.. code-block:: json

   {
      "key_id": "3",
      "external_id": "peter@example.com"
   }

With setting that the email has to be triggered to a specific external event, the email is launched to the contact.

See :doc:`../../suite/external_events/external_event_trigger`.
