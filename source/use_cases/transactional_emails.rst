Sending Transactional Emails
============================

The aim of this use case is to send a welcome mail to all newly-registered contacts.

To trigger a welcome mail, we use an external event which contains information about the intended recipient.

The steps of this use case will be as follows:

1. A new contact registers on your website and you want to add them to your eMarketing Suite database as well.
2. Tell the eMarketing Suite to send a welcome mail to the contact via an external event
3. Check the results

This use case will be presented in varying degrees of complexity:

* Using the email address as key
* Using the external ID as key
* Customizing the email with data from the external event

Basic Scenario: Using the email address as key
----------------------------------------------

The simplest way to send a welcome mail is to use the default value for the “where to?” parameter, which is the contact’s email address.
Preparation

Preconditions:
To perform these preparatory steps you will need the credentials for your Suite account (account name and environment, user name and password).
Icon BeCareful.png	Create a dedicated external event for each of your emails, otherwise a single external event may accidentally trigger many emails.
Create an external event

Create the external event in the Suite UI. You can find external events in the Admin menu.

Email Settings

Create the email:
Set Generated through an event as the Recipient source.
Set On External Event as the Event.
Choose your event

Launch Email

Make sure that your email is launched.

Icon FurtherReading.png	For further information about creating an email via the Suite UI please see the eMarketing Suite Online Help.
Step 1: Create the contact

To create a new contact, send a POST request to the /api/v2/contact URI.

The following example shows a minimal payload:

{
“3”:”test@example.com”
}

To identify the contact we are using their email address, which is also the default key. Therefore, we do not have to define a key_id here.
Please Note:
You cannot create an already existing contact.
Icon FurtherReading.png	For further information about creating a contact in Suite, see Creating a Contact in the Suite API Technical Reference.
Icon FurtherReading.png	For further information about updating a contact in Suite, see Updating a Contact in the Suite API Technical Reference.
Step 2: Trigger the event

Preconditions:

You need at least one contact available in Suite so that the contact data can be used.

Trigger your external event by sending a POST request to the /api/v2/event//trigger URI. Use your external event ID as the id. For more about the external ID, see below.

The following example shows a minimal payload:

{
“key_id”:”3″,
“external_id”: “test@example.com”
}

Where…

id = The external event ID (not the name!). Since these IDs don’t change, you can just use the API demo page to get the ID, and use it in your integration script.

key_id = The ID of the key field of the contact. We are using ‘3’ meaning the email address.

external_id = The value of the key field, the contact’s email in this case.
Icon FurtherReading.png

Retrieve external event IDs by querying all external events on the API (see the ‘Getting All External Events’ chapter in the Suite API Technical Reference).
For further information about triggering external events, see the chapter Triggering External Events in the Suite API Technical Reference.
For a list of available Field IDs, click here

Step 3: Check results

Check Sent-Counter

Check whether an email was sent successfully:
Check with a test contact if the ‘Welcome email’ has arrived – it should be delivered within seconds.
Use the Suite UI to check if an email was sent.
In the Analysis module in the Emails page you can see that the count of Sent emails increases.

Icon FurtherReading.png	For further information please see the eMarketing Suite Online Help.

Advanced scenario: Use custom external ID as a key
--------------------------------------------------

If you want to use the same ID that you have in your external database to identify contacts in Suite, you can use an
external ID.

Let’s suppose that external ID is the name of the column in your database that contains the external ID and you want to
use the same name for your custom field in Suite.

Preparation
Preconditions:

To perform these preparatory steps you will need the credentials for your Suite account (account name and environment,
user name and password).

.. note:: Create a dedicated external event for each of your emails, otherwise a single external event may accidentally
trigger many emails.

1. You should already have a custom field for the external ID, called **externalId**.
If you do not have one, create it in Suite via the **Admin** menu, **Field editor**.
2. Fetch the field ID of the **externalID** field.
To create a contact with custom fields like our **externalID** you need the IDs of the fields you want to involve. You can
fetch them via the API (see the ‘Querying Field Lists’ chapter in the Suite API Technical Reference).

Create an external event

* Create the external event in the Suite UI. You can find external events in the **Admin** menu.

Suite_API_create_external_event_crop

Email Settings

* Create the email:
  * Set **Generated through an event** as the **Recipient source**.
  * Set **On External Event** as the **Event**.
* Choose your event

Suite_API_set_external_event_as_recipient_source_of_an_email_crop

Launch Email

* Make sure that your email is launched.

Suite_API_acivate_email_colour

.. note:: For further information about creating an email via the Suite UI please see the eMarketing Suite Online Help.

Step 1: Create user

To create a new contact, send a ``POST`` request to the ``/api/v2/contact`` URI.

The following example shows a minimal payload:

.. code-block:: json

   {
      "key_id":"123456",
      "123456":"789",
      "3":"test@example.com"
   }

To identify the contact we are using the key id of the **externalID** field you figured out during the preparation step.

.. note:: You cannot create an already existing contact. For further information about creating a contact in Suite,
see Creating a Contact in the Suite API Technical Reference. For further information about updating a contact in Suite,
see Updating a Contact in the Suite API Technical Reference.

Step 2: Trigger the event

Preconditions:

* You need at least one contact available in Suite so that the contact data can be used.
Trigger your external event by sending a ``POST`` request to the ``/api/v2/event/<id>/trigger`` URI. Use your **external event ID**
as the ``id``. For more about the external ID, see below.

The following example shows a minimal payload:

.. code-block:: json

   {
      "key_id":"123456",
      "external_id": "789"
   }

**Where…**

**id** = The external event ID (not the name!). Since these IDs don’t change, you can just use the API demo page to get the ID, and use it in your integration script.

**key_id** = The ID of the key field of the contact. We are using the key id of the **externalID** field you identified during the preparation step.

**external_id** = The value of the key field, your ‘external ID’ in this case.

.. note::
* Retrieve external event IDs by querying all external events on the API (see the ‘Getting All External Events’ chapter in the Suite API Technical Reference).
* For further information about triggering external events, see the chapter Triggering External Events in the Suite API Technical Reference.
* For a list of available Field IDs, click here

Step 3: Check results

Check Sent-Counter

* Check whether an email was sent successfully:
  * Check with a test contact if the ‘Welcome email’ has arrived – it should be delivered within seconds.
  * Use the Suite UI to check if an email was sent.
    In the **Analysis** module in the **Emails** page you can see that the count of **Sent** emails increases.

Suite_API_check_email_sent_colour

.. note:: For further information please see the eMarketing Suite Online Help.

Advanced scenario: Customize your email with data from external events
----------------------------------------------------------------------

If you want to thank contacts for their first purchase and you also want to mention the product they bought, you need
to include **transaction-specific content**. In this case you have to use a placeholder for the transaction-specific content
in your email and send the item name along with the external event.

Preparation
Preconditions:

To perform these preparatory steps you will need the credentials for your Suite account (account name and environment,
user name and password).

.. note:: Create a dedicated external event for each of your emails, otherwise a single external event may accidentally
trigger many emails.

Create an external event

* Create the external event in the Suite UI. You can find external events in the **Admin** menu.

Suite_API_create_external_event_crop

Email Settings

* Create the email:
  * Set **Generated through an event** as the **Recipient source**.
  * Set **On External Event** as the **Event**.
* Choose your event

Suite_API_set_external_event_as_recipient_source_of_an_email_crop

Launch Email

* Make sure that your email is launched.

Suite_API_acivate_email_colour

.. note:: For further information about creating an email via the Suite UI please see the eMarketing Suite Online Help.

Step 1: Create user

To create a new contact, send a ``POST`` request to the ``/api/v2/contact`` URI.

The following example shows a minimal payload:

.. code-block:: json

   {
      "3":"test@example.com"
   }

To identify the contact we are using their email address, which is also the default key. Therefore, we do not have to
define a ``key_id`` here.

.. note:: You cannot create an already existing contact. For further information about creating a contact in Suite, see
Creating a Contact in the Suite API Technical Reference. For further information about updating a contact in Suite, see
Updating a Contact in the Suite API Technical Reference.

Step 2: Trigger the event

Preconditions:

* You need at least one contact available in Suite so that the contact data can be used.

You can trigger your external event by sending a ``POST`` request to the ``/api/v2/event/<id>/trigger`` URI, where the ``<id>`` is
your external event ID.

The following example shows a minimal payload:

.. code-block:: json

   {
      "key_id":"3",
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

Where…

**id** = The external event ID (not the name!). Since these IDs don’t change, you can just use the API demo page to get the ID, and use it in your integration script.

**key_id** = The ID of the key field of the contact. We are using ‘3’ meaning the e-mail address.

**external_id** = The value of the key field, the contact’s email in this case.

**data** = Your transaction-specific content in form of **placeholder:value** that are included in a **global** object.

.. note::
* Retrieve external event IDs by querying all external events on the API (see the ‘Getting All External Events’ chapter
  in the Suite API Technical Reference).
* For further information about triggering external events, see the chapter Triggering External Events in the Suite API
  Technical Reference.
* For a list of available Field IDs, click here

Step 3: Check results

Check Sent-Counter

* Check whether an email was sent successfully:
  * Check with a test contact if the ‘Welcome email’ has arrived – it should be delivered within seconds.
  * Use the Suite UI to check if an email was sent. In the Analysis module in the Emails page you can see that the
    count of Sent emails increases.

Suite_API_check_email_sent_colour

.. note:: For further information please see the eMarketing Suite Online Help.
