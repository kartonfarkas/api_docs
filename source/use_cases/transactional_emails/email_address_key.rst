Using the Email Address as Key
==============================

The simplest way to send a welcome email is to use the default value for the “where to?” parameter, which is the contact’s email address.

Preparation
-----------

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
---------------------

**Request**:

``POST /api/v2/contact``

The key_id is Omitted
^^^^^^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "3": "thor@example.com"
   }

The key_id is Provided
^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "key_id": "15",
     "15": "1234567",
     "7": "3",
     "source_id": "123"
   }

Where *source_id* is an ID assigned to the application of a customer to integrate.

Multichoice Field
^^^^^^^^^^^^^^^^^

Request containing a multichoice field *405067*:

.. code-block:: json

   {
     "key_id": "10675",
     "10675": "1234567",
     "405067":
     [
       "6789",
       "6792"
     ]
   }

**Response**:

.. code-block:: json

   {
      "3": "test@example.com"
   }

To identify the contact we are using their email address which is also the default key. Therefore, we do not have to
define a key_id here.

For further information about creating and updating a contact in the Suite, see :doc:`../suite/contacts/contact_create` and :doc:`../suite/contacts/contact_update`.

2. Trigger the Event
--------------------

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

3. Check the Result
-------------------

Check whether an email was sent successfully:

* Check with a test contact if the welcome email has arrived – it should be delivered within seconds.
* Use the Suite UI to check if an email was sent.
* In the **Analysis** module in the **Emails** page, you can see that the count of sent emails increases.

For further information, please see the Suite Online Help.