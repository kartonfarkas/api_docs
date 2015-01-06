Keeping Contacts Up-to-date
===========================

If you already have contacts in the Suite, then inserting further ones requires a little care as you need to use different
methods depending on whether the contact already exists or not. If the contact does not exist in the Suite yet, then you have
to create it, otherwise you have to update it. This use case is about deciding whether a given contact exists and creating or updating it accordingly.

.. :note:: We say that a contact exists in the Suite if a contact with the same key can be found.

1. Check whether Contact Exists in the Suite
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

You can check whether a contact exists in the Suite by requesting its internal contact ID.

* If you get a result with replyCode 0, then it already exists, so you have to update it.
* If you get a result with replyCode 2008, then it does not yet exist, so you have to create it.
* If the replyCode differs from the ones mentioned above, it indicates an error, so please check the
  :doc:`../../suite/appendices/error_codes`.

**Request**:

``POST /api/v2/contact/checkids``

.. code-block:: json

   {
     "key_id": "3",
     "external_ids":
     [
       "obadiah.stane@example.com",
       "jinsen@example.com",
       "raza@example.com"
     ]
   }

**Response**:

.. code-block:: json

   {
      "ids": {
         "obadiah.stane@example.com": "9832304",
         "jinsen@example.com": "9839473"
      },
      "errors": {
         "raza@example.com": {
            "2008": "No contact found with the external id: 3"
         }
      }
   }

Where *ids* are internal IDs,and *errors* contains the error ID and the error message as a key-value pair.

See :doc:`../../suite/contacts/contact_check_internal_ids`.

2(a) Update a Contact
^^^^^^^^^^^^^^^^^^^^^

You have to execute this step if replyCode 0 was returned in step 1. This means that you have to update the contact
(not create it) in the Suite.

.. :note:: Each field value that you provide here will override the already existing ones in the Suite.

**Request**:

``PUT /api/v2/contact``

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
      "id": 111111111
   }

Where *id* is the ID of the updated contact.

See :doc:`../../suite/contacts/contact_update`.

2(b) Create a New Contact
^^^^^^^^^^^^^^^^^^^^^^^^^

You have to execute this step if replyCode 2008 was returned in step 1. Here you can simply create the new contact
in the Suite.

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
      "id": 222222222
   }

Where *id* is the ID of the new contact.

See :doc:`../../suite/contacts/contact_create`.

