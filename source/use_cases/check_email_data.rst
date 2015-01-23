Checking Email Data
===================

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
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "ids":
       [
         123,
         456,
         789
       ]
     }
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
       "id": "123"
     }

Where *id* is the ID of the contact list.

See :doc:`../../suite/contacts/contact_list_create`.

3. Creating an Email Campaign
-----------------------------

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

**Response**:

.. code-block:: json

     {
       "id": 2140
     }

See :doc:`../../suite/emails/email_create`.

4. Launching an Email Campaign
------------------------------

**Request**:

``POST /api/v2/email/<email_id>/launch``

.. code-block:: json

   {
     "schedule": "2011-08-12 08:35",
     "timezone": "America/New_York"
   }

See :doc:`../../suite/emails/launch`.

After waiting for 1 day in order to get the statuses 'clicked', 'opened'...etc.:

5. Exporting Responses
----------------------

**Request**:

``POST /api/v2/email/getresponses``

.. code-block:: json

   {
     "distribution_method": "ftp",
     "origin": "form",
     "origin_id": "123",
     "time_range": ["2012-02-09", "2012-04-02"],
     "contact_fields": ["1", "3", "106533"],
     "delimiter": ";",
     "add_field_names_header": 1,
     "language": "en",
     "ftp_settings":
     {
       "host": "www.example.com",
       "port": "1234",
       "username": "user",
       "password": "pass",
       "folder": "path/of/a/folder"
     }
   }

**Response**:

.. code-block:: json

   {
     "id": 2140
   }

See :doc:`../../suite/exports/expport_responses`.
