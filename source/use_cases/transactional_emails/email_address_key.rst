Using the Email Address as Key
==============================

The simplest way to send a welcome email is to use the default value for the “where to?” parameter, which is the contact’s email address.

Preparation
-----------

**Preconditions**:

To perform these preparatory steps, you will need the credentials of your Emarsys account (account name and environment,
user name and password).

.. note:: Create a dedicated external event for each of your emails, otherwise a single external event may accidentally
          trigger many emails.

* **Create an External Event**:
  Create the external event in the Emarsys application. You can find external events in the **Admin** menu.

* **Create the Email**:

  * Set **Generated through an event** as the **Recipient source**.
  * Set **On External Event** as the Event.
  * Choose your event.

* **Launch Email**:
  Make sure that your email is launched.

For further information about creating an email via the Emarsys application, please see the Emarsys Online Help.

1. Create the Contact
---------------------

You need at least one contact available in Emarsys so that the contact data can be used.

**Request**:

``POST /api/v2/contact``

.. code-block:: json

   {
     "3": "ryan@example.com"
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 222222222
     }
   }

To identify the contact, we are using their email address which is also the default key. Therefore, we do not have to
define a key_id here.

This is the easiest way to create a contact. For further information about creating and updating a contact in Emarsys, see
:doc:`../../suite/contacts/contact_create` and :doc:`../../suite/contacts/contact_update`.

2. Trigger the Event
--------------------

**Request**:

``POST /api/v2/event/<id>/trigger``

Use your external event ID (not the name!) as *id*. Since these IDs don’t change, you can just use the API demo page to
get the ID, and put it into your integration script.

.. code-block:: json

   {
      "key_id": "3",
      "external_id": "ryan@example.com"
   }

Where:

* *key_id* is the ID of the key field of the contact. We are using *3*, which stands for the email address. For a list
  of available Field IDs, see :doc:`../../suite/appendices/system_fields`.
* *external_id* is the value of the key field, the contact’s email in this case

Retrieve external event IDs by querying all external events on the API (see :doc:`../../suite/external_events/external_event_list`).
For further information about triggering external events, see :doc:`../../suite/external_events/external_event_trigger`.

3. Check the Result
-------------------

Find out whether an email was sent successfully:

* Check with a test contact if the email has arrived – it should be delivered within seconds.
* Use the Emarsys application to check if an email was sent.
* In the **Analysis** module in the **Emails** page, you can see that the count of sent emails increases.

For further information, please see the Emarsys Online Help.
