Sending Transactional Emails
============================

The aim of this use case is to send a welcome email to all newly-registered contacts.
To trigger a welcome email, we use an external event which contains information about the intended recipient.

The steps of this use case will be as follows:

1. Add a new contact to your Suite database.
2. Send a welcome email to the contact via an external event in the Suite.
3. Check the results.

This use case will be presented in varying degrees of complexity:

**Basic Scenario**:

* using the email address as key

**Advanced Scenario**:

* using the external ID as key
* customizing the email with data from the external event

Using the Email Address as Key
------------------------------

The simplest way to send a welcome email is to use the default value for the “where to?” parameter, which is the contact’s email address.

Preparation
^^^^^^^^^^^
**Preconditions**:

To perform these preparatory steps, you will need the credentials of your Suite account (account name and environment,
user name and password).

.. note:: Create a dedicated external event for each of your emails, otherwise a single external event may accidentally
          trigger many emails.

* **Create an external event**:
  Create the external event in the Suite UI. You can find external events in the **Admin** menu.

* **Create the Email**:

  * Set **Generated through an event** as the **Recipient source**.
  * Set **On External Event** as the Event.
  * Choose your event.

* **Launch Email**:
  Make sure that your email is launched.

For further information about creating an email via the Suite UI, please see the Suite Online Help.

1. Create the Contact

**Request**:

``POST /api/v2/contact``

**Response**:

.. code-block:: json

   {
      "3": "test@example.com"
   }

To identify the contact we are using their email address which is also the default key. Therefore, we do not have to
define a key_id here.

For further information about creating and updating a contact in the Suite, see :doc:`../suite/contacts/contact_create` and :doc:`../suite/contacts/contact_update`.

2. Trigger the Event

.. note:: You need at least one contact available in the Suite so that the contact data can be used.

**Request**:

``POST /api/v2/event/<id>/trigger``

Use your external event ID (not the name!) as *id*. Since these IDs don’t change, you can just use the API demo page to
get the ID, and use it in your integration script.

**Response**:

.. code-block:: json

   {
      "key_id": "3",
      "external_id": "test@example.com"
   }

Where

* *key_id* is the ID of the key field of the contact. We are using *3*, which stands for the email address.
* *external_id* is the value of the key field, the contact’s email in this case.

Retrieve external event IDs by querying all external events on the API (see :doc:`../suite/external_events/external_event_list`).
For further information about triggering external events, see :doc:`../suite/external_events/external_event_trigger`.
For a list of available Field IDs, see :doc:`../suite/appendices/system_fields`.

3. Check Sent-Counter

Check whether an email was sent successfully:

* Check with a test contact if the welcome email has arrived – it should be delivered within seconds.
* Use the Suite UI to check if an email was sent.
* In the **Analysis** module in the **Emails** page, you can see that the count of sent emails increases.

For further information, please see the Suite Online Help.

Use Custom External ID as a Key
-------------------------------

If you want to use the same ID that you have in your external database to identify contacts in the Suite, you can use an
external ID.
Let’s suppose that external ID is the name of the column in your database that contains the external ID and you want to
use the same name for your custom field in the Suite.

Preparation
^^^^^^^^^^^

Preconditions:

+ To perform these preparatory steps, you will need the credentials for your Suite account (account name and environment, user name and password).

.. note:: Create a dedicated external event for each of your emails, otherwise a single external event may accidentally
          trigger many emails.

+ You should already have a custom field for the external ID, called **externalId**.
  If you do not have one, create it in the Suite via the **Admin** menu, **Field editor**.
+ Fetch the field ID of the **externalID** field.
  To create a contact with custom fields like our **externalID**, you need the IDs of the fields you want to involve
  (see :doc:`../suite/contacts/contact_field_list`).

* **Create an External Event**:
  Create the external event in the Suite UI. You can find external events in the **Admin** menu.

* **Create the Email**:

  * Set **Generated through an event** as the **Recipient source**.
  * Set **On External Event** as the event.
  * Choose your event.

* **Launch Email**:
  Make sure that your email is launched.

For further information about creating an email via the Suite UI, please see the Suite Online Help.

1. Create User

**Request**:

``POST /api/v2/contact``

**Response**:

.. code-block:: json

   {
      "key_id": "123456",
      "123456": "789",
      "3": "test@example.com"
   }

To identify the contact, we are using the key_id of the **externalID** field mentioned in the preparation.

For further information about creating or updating a contact in the Suite, see :doc:`../suite/contacts/contact_create` and :doc:`../suite/contacts/contact_update`.

2. Trigger the Event

.. note:: You need at least one contact available in the Suite so that the contact data can be used.

**Request**:

``POST /api/v2/event/<id>/trigger``

Use your external event ID (not the name!) as *id*. Since these IDs don’t change, you can just use the API demo page to
get the ID, and use it in your integration script.

**Response**:

.. code-block:: json

   {
      "key_id": "123456",
      "external_id": "789"
   }

Where

* *key_id* is the ID of the key field of the contact. We are using the key id of the **externalID** field you identified
  during the preparation.
* *external_id* is the value of the key field, your ‘external ID’ in this case.

Retrieve external event IDs by querying all external events on the API (see :doc:`../suite/external_events/external_event_list`).
For further information about triggering external events, see :doc:`../suite/external_events/external_event_trigger`.
For a list of available Field IDs, see :doc:`../suite/appendices/system_fields`.

3. Check Sent-Counter

Check whether an email was sent successfully:

* Check with a test contact if the ‘Welcome email’ has arrived – it should be delivered within seconds.
* Use the Suite UI to check if an email was sent.
* In the **Analysis** module in the **Emails** page, you can see that the count of sent emails increases.

For further information, please see the Suite Online Help.

Customize your Email with Data from External Events
---------------------------------------------------

If you want to thank contacts for their first purchase and you also want to mention the product they bought, you need
to include **transaction-specific content**. In this case, you have to use a placeholder for the transaction-specific content
in your email and send the item name along with the external event.

Preparation
^^^^^^^^^^^

Preconditions:

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

1. Create User

**Request**:

``POST /api/v2/contact``

**Response**:

.. code-block:: json

   {
      "3": "test@example.com"
   }

To identify the contact, we are using the email address, which is also the default key. Therefore, we do not have to
define a key_id here.

For further information about creating or updating a contact in the Suite, see :doc:`../suite/contacts/contact_create` and :doc:`../suite/contacts/contact_update`.

2. Trigger the Event

.. note:: You need at least one contact available in the Suite so that the contact data can be used.

**Request**:

``POST /api/v2/event/<id>/trigger``

Use your external event ID (not the name!) as *id*. Since these IDs don’t change, you can just use the API demo page to
get the ID, and use it in your integration script.

**Response**:

.. code-block:: json

   {
      "key_id": "3",
      "external_id": "test@example.com"
      "data":
      {
         "global":
         {
            "itemName": "keyboard",
            "itemPrice": "123"
         }
      }
   }

Where

* *key_id* is the ID of the key field of the contact. We are using ‘3’ meaning the e-mail address.
* *external_id* is the value of the key field, the contact’s email in this case.
* *data* is your transaction-specific content in the form of **placeholder: value** that are included in a *global* object.

Retrieve external event IDs by querying all external events on the API (see :doc:`../suite/external_events/external_event_list`).
For further information about triggering external events, see :doc:`../suite/external_events/external_event_trigger`.
For a list of available Field IDs, see :doc:`../suite/appendices/system_fields`.

3. Check Sent-Counter

Check whether an email was sent successfully:

* Check with a test contact if the ‘Welcome email’ has arrived – it should be delivered within seconds.
* Use the Suite UI to check if an email was sent. In the Analysis module in the Emails page you can see that the
  count of Sent emails increases.

For further information, please see the Suite Online Help.
