Put a Voucher into the Email
============================

If you want to give a voucher for a contact who purchased a product, then you can send an email which contains a voucher for
the contact.

The steps will be as follows:

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

.. note:: The $voucher$ placeholder has to be used in the email.

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

After creating the email, go to the UI and set the *Recipient Source* to "**Generated through an event**", the *Event* to
"**On External Event**", and choose the proper external event under.

2. Triggering External Events
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
