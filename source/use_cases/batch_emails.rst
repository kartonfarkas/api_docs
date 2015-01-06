Sending Batch Emails
====================

Scenario #1: Daily News for Different Segments
----------------------------------------------

For this scenario, you will need to:

1. Create an Email Campaign
^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/email``

**Response**:

.. code-block:: json

   {
      "id": 2140
   }

Where *id* is the new email campaign ID.

See :doc:`../../suite/emails/email_create`.

2. Launch an Email Campaign
^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/email/<2140>/launch``

See :doc:`../../suite/emails/launch`.

Extension of Scenario #1: Using the Media Database
--------------------------------------------------

For this scenario, you will need to:

1. Upload a File
^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/file``

**Response**:

.. code-block:: json

   [
      {
         "id": "123",
         "folder": "1",
         "filename": "md_1234.png",
         "size": "96274211",
         "original_name": "logo.png"
      }
   ]

Where *filename* is the resulting file name in the media database after upload, and *original_name* is the file name provided in the request.

See :doc:`../../suite/emails/media_file_upload`.

2. Create an Email Campaign
^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/email``

**Response**:

.. code-block:: json

   {
      "id": 2140
   }

Where *id* is the new email campaign ID.

See :doc:`../../suite/emails/email_create`

3. Launch an Email Campaign
^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/email/<2140>/launch``

See :doc:`../../suite/emails/launch`.

Scenario #2: Recurring Email to a Contact List with Changing Members
--------------------------------------------------------------------

For this scenario, you will need to:

1. Remove Contacts from a Contact List
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/contactlist/111111111/delete``

**Response**:

.. code-block:: json

   {
      "deleted_contacts": "2",
      "errors": {
         "loki@example.com": {
            "2008": "No contact found with the external id: 3 - loki@example.com"
         }
      }
   }

Where *deleted_contacts* is the number of contacts successfully deleted from the list, and *errors* is an array of
contacts not removed from the list. The array contains the ID and reason for the error.

See :doc:`../../suite/contacts/contact_list_remove_contacts`.

2. Add Contacts to a Contact List
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/contactlist/111111111/add``

**Response**:

.. code-block:: json

   {
      "inserted_contacts":"2",
      "errors":{
         "loki@example.com":{
            "2008":"No contact found with the external id: 3 - loki@example.com"
         }
      }
   }

Where *inserted_contacts* is the number of contacts successfully added to the list, and
*errors* is an array of contacts not added to the list. The array contains the ID and
reason for the error.

See :doc:`../../suite/contacts/contact_list_add_contacts`.

3. Create an Email Campaign
^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/email``

**Response**:

.. code-block:: json

   {
      "id": 2140
   }

Where *id* is the new email campaign ID.

See :doc:`../../suite/emails/email_create`.

4. Launch an Email Campaign
^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/email/2140/launch``

See :doc:`../../suite/emails/launch`.

Scenario #2b: Recurring Email to a Contact List; Changing the Email Source Assigned to the Email
------------------------------------------------------------------------------------------------

For this scenario, you will need to:

1. Update an Email Campaign Recipient Source
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/email/2140/updatesource``

See :doc:`../../suite/emails/email_update_source`.

2. Launch an Email Campaign
^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/email/2140/launch``

See :doc:`../../suite/emails/launch`.