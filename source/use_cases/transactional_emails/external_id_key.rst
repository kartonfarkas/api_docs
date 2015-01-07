Use Custom External ID as Key
=============================

If you want to use the same ID that you have in your external database to identify contacts in the Suite, you can use an
external ID.
Let’s suppose that external ID is the name of the column in your database that contains the external ID and you want to
use the same name for your custom field in the Suite.

Preparation
-----------

**Preconditions**:

+ To perform these preparatory steps, you will need the credentials for your Suite account (account name and environment, user name and password).

.. note:: Create a dedicated external event for each of your emails, otherwise a single external event may accidentally
          trigger many emails.

+ You should already have a custom field for the external ID, called **externalId**.
  If you do not have one, create it in the Suite via the **Admin** menu, **Field editor**.
+ Fetch the field ID of the **externalID** field.
  To create a contact with custom fields like our **externalID**, you need the IDs of the fields you want to involve
  (see :doc:`../../suite/contacts/contact_field_list`).

* **Create an External Event**:
  Create the external event in the Suite UI. You can find external events in the **Admin** menu.

* **Create the Email**:

  * Set **Generated through an event** as the **Recipient source**.
  * Set **On External Event** as the event.
  * Choose your event.

* **Launch Email**:
  Make sure that your email is launched.

For further information about creating an email via the Suite UI, please see the Suite Online Help.

1. Create the Contact
---------------------

You need at least one contact available in the Suite so that the contact data can be used.

**Request**:

``POST /api/v2/contact``

.. code-block:: json

   {
     "key_id": "15",
     "15": "1234567",
     "7": "3",
     "source_id": "123"
   }

**Response**:

.. code-block:: json

   {
      "id": 111111111
   }

To identify the contact, we are using the key_id of the **externalID** field mentioned in *Preparation*.

This is the easiest way to create a contact. For further information about creating or updating a contact in the Suite,
see :doc:`../../suite/contacts/contact_create` and :doc:`../../suite/contacts/contact_update`.

2. Trigger the Event
--------------------

**Request**:

``POST /api/v2/event/<id>/trigger``

Use your external event ID (not the name!) as *id*. Since these IDs don’t change, you can just use the API demo page to
get the ID, and use it in your integration script.

.. code-block:: json

   {
      "key_id": "123456",
      "external_id": "789"
   }

Where

* *key_id* is the ID of the key field of the contact. We are using the key id of the **externalID** field you identified
  during the preparation. For a list of available Field IDs, see :doc:`../../suite/appendices/system_fields`.
* *external_id* is the value of the key field, your ‘external ID’ in this case.

Retrieve external event IDs by querying all external events on the API (see :doc:`../../suite/external_events/external_event_list`).
For further information about triggering external events, see :doc:`../../suite/external_events/external_event_trigger`.

3. Check the Result
-------------------

Find out whether an email was sent successfully:

* Check with a test contact if the email has arrived – it should be delivered within seconds.
* Use the Suite UI to check if an email was sent.
* In the **Analysis** module in the **Emails** page, you can see that the count of sent emails increases.

For further information, please see the Suite Online Help.