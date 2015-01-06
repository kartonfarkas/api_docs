Scenario #2b: Recurring Email to a Contact List; Changing the Email Source Assigned to the Email
================================================================================================

For this scenario, you will need to:

1. Update an Email Campaign Recipient Source
--------------------------------------------

**Request**:

``POST /api/v2/email/2140/updatesource``

.. code-block:: json

   {
     "filterId": "1121",
     "contactlistId": "0"
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

See :doc:`../../suite/emails/launch`.