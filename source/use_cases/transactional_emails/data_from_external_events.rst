Customize your Email with Data from External Events
===================================================

If you want to thank contacts for their first purchase and you also want to mention the product they bought, you need
to include **transaction-specific content**. In this case, you have to use a placeholder for the transaction-specific content
in your email and send the item name along with the external event.

Preparation
-----------

**Preconditions**:

* To perform these preparatory steps, you will need the credentials for your Suite account (account name and environment,
  user name and password).

.. note:: Create a dedicated external event for each of your emails, otherwise a single external event may accidentally
          trigger many emails.

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

You need at least one contact available in Suite so that the contact data can be used.

**Request**:

``POST /api/v2/contact``

.. code-block:: json

   {
     "3": "peter@example.com"
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 111111111
     }
   }

To identify the contact, we are using the email address which is also the default key. Therefore, we do not have to
define a key_id here.

This is the easiest way to create a contact. For further information about creating or updating a contact in Suite,
see :doc:`../../suite/contacts/contact_create` and :doc:`../../suite/contacts/contact_update`.

2. Trigger the Event
--------------------

**Request**:

``POST /api/v2/event/<id>/trigger``

Use your external event ID (not the name!) as *id*. Since these IDs don’t change, you can just use
:doc:`get_started/api_demo` to get the ID, and use it in your integration script.

.. code-block:: json

   {
      "key_id": "3",
      "external_id": "peter@example.com"
   }

Where:

* *key_id* is the ID of the key field of the contact. We are using *3* meaning the email address. For a list of
  available Field IDs, see :doc:`../../suite/appendices/system_fields`.
* *external_id* is the value of the key field, the contact’s email in this case
* *data* is your transaction-specific content in the form of **placeholder: value** that are included in a *global* object

Retrieve external event IDs by querying all external events on the API (see :doc:`../../suite/external_events/external_event_list`).
For further information about triggering external events, see :doc:`../../suite/external_events/external_event_trigger`.

3. Check the Result
-------------------

Find out whether an email was sent successfully:

* Check with a test contact if the email has arrived – it should be delivered within seconds.
* Use the Suite UI to check if an email was sent. In the Analysis module in the Emails page you can see that the
  count of Sent emails increases.

For further information, please see the Suite Online Help.