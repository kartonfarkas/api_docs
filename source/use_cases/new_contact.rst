Adding a New Contact to a Contact List
======================================

For adding a new contact to an already existing contact list, the steps will be as follows:

1. Creating Multiple Contacts
-----------------------------

Add 3 contacts here.

**Request**:

``POST /api/v2/contact``

.. code-block:: json

   {
     "key_id": "3",
     "contacts":
     [
       {
         "3": "erik.selvig@example.com",
         "2": "Selvig",
         "source_id": "1234"
       },
       {
         "3": "ian.boothby@example.com",
         "2": "Boothby"
       },
       {
         "3": "loki@example.com",
         "2": "Rhodes",
         "source_id": "5678"
       }
     ]
   }

**Response**:

.. code-block:: json

   {
     "ids":
     [
       123456789,
       456789123,
       789123456
     ]
   }

See :doc:`../../suite/contacts/contact_multiple_create`.

2. Creating a Contact List
--------------------------

**Request**:

``POST /api/v2/contactlist``

.. code-block:: json

   {
     "key_id": "3",
     "name": "thor_characters",
     "description": "",
     "external_ids":
     [
       "erik.selvig@example.com",
       "ian.boothby@example.com",
       "loki@example.com"
     ]
   }

**Response**:

.. code-block:: json

     {
       "id": "111111111"
     }

Where *id* is the ID of the contact list.

See :doc:`../../suite/contacts/contact_list_create`.

3. Creating a Contact
---------------------

**Request**:

``POST /api/v2/contact``

.. code-block:: json

   {
     "3": "odin@example.com"
   }

**Response**:

.. code-block:: json

     {
       "id": 987654321
     }

See :doc:`../../suite/contacts/contact_create`.

After the new contact is created:

4. Adding Contacts to a Contact List
------------------------------------

**Request**:

``POST /api/v2/contactlist/<list_id>/add``

.. code-block:: json

   {
     "key_id": "3",
     "external_ids":
     [
       "odin@example.com"
     ]
   }

**Response**:

.. code-block:: json

   {
     "inserted_contacts": "1"
   }

See :doc:`../../suite/contacts/contact_list_add_contacts`.

5. Creating an Email Campaign
-----------------------------

**Request**:

``POST /api/v2/email``

.. code-block:: json

   {
     "name": "new_item",
     "language": "en",
     "subject": "informing",
     "fromname": "webshop_2",
     "fromemail": "webshop_2@example.com",
     "email_category": "111111111",
     "html_source": "<html>A new item has arrived... </html>",
     "text_source": "A new item has arrived...",
     "browse": 0,
     "text_only": 0,
     "unsubscribe": 1,
     "filter": "",
     "contactlist": 111111111
   }

**Response**:

.. code-block:: json

   {
     "id": 111111111
   }

Where *id* is the new email campaign ID.

See :doc:`../../suite/emails/email_create`.

6. Launching an Email Campaign
------------------------------

**Request**:

``POST /api/v2/email/<email_id>/launch``

.. code-block:: json

   {
     "schedule": "2011-08-12 08:35",
     "timezone": "America/New_York"
   }

See :doc:`../../suite/emails/launch`.