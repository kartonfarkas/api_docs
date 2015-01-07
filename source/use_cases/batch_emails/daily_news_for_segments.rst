Daily News for Different Segments
=================================

For this scenario, you will need to:

1. Create an Email Campaign
---------------------------

**Request**:

``POST /api/v2/email``

.. code-block:: json

   {
      "name": "be_afraid_email",
      "language": "en",
      "subject": "convergence",
      "fromname": "Malekith",
      "fromemail": "malekith@example.com",
      "email_category": "111111111",
      "html_source": "<html>Hello $First Name$... </html>",
      "text_source": "Hello $First Name$...",
      "browse": 0,
      "text_only": 0,
      "unsubscribe": 1,
      "filter": "222222222",
      "contactlist": 0
   }

Where *filter* is the segment ID to which the email is sent.

**Response**:

.. code-block:: json

   {
      "id": 2140
   }

Where *id* is the new email campaign ID.

See :doc:`../../suite/emails/email_create`.

2. Launch an Email Campaign
---------------------------

**Request**:

``POST /api/v2/email/2140/launch``

.. code-block:: json

   {
     "schedule": "2011-08-12 08:35",
     "timezone": "America/New_York"
   }

See :doc:`../../suite/emails/launch`.