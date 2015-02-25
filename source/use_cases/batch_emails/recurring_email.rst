Recurring Email to a Contact List; Changing the Email Source Assigned to the Email
==================================================================================

You have to create the email in Suite, it is possible only once.

For this scenario, you will need to:

.. image:: /_static/images/use_case_10.png

1. Update an Email Campaign Recipient Source
--------------------------------------------

**Request**:

``POST /api/v2/email/2140/updatesource``

.. code-block:: json

   {
     "filterId": "111111111",
     "contactlistId": "0"
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": true
   }

See :doc:`../../suite/emails/email_update_source`.

2. Launch an Email Campaign
---------------------------

**Request**:

``POST /api/v2/email/2140/launch``

.. code-block:: json

   {
     "schedule": "2011-08-12 08:35",
     "timezone": "America/New_York"
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": ""
   }

See :doc:`../../suite/emails/launch`.