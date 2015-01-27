Keeping Contacts Up-to-date
===========================

If you already have contacts in the Suite, then inserting further ones requires a little care as you need to use different
methods depending on whether the contact already exists or not. If the contact does not exist in the Suite yet, then you have
to create it, otherwise you have to update it. This use case is about deciding whether a given contact exists and creating or updating it accordingly.

.. :note:: We say that a contact exists in the Suite if a contact with the same key can be found.

1. Check whether a Contact Exists in the Suite
----------------------------------------------

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
       "mary@example.com",
       "sarah@example.com",
       "jane@example.com"
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
       {
         "mary@example.com": "111111111",
         "sarah@example.com": "222222222"
       },
       "errors":
       {
         "jane@example.com":
         {
           "2008": "No contact found with the external id: 3"
         }
       }
     }
   }

Where *ids* are internal IDs, and *errors* contains the error ID and the error message as a key-value pair.

See :doc:`../../suite/contacts/contact_check_internal_ids`.

2(a) Update a Contact
---------------------

You have to execute this step if replyCode 0 was returned in step 1. This means that you have to update the contact
(not create it) in the Suite.

.. :note:: Each field value that you provide here will override the already existing ones in the Suite.

**Request**:

``PUT /api/v2/contact``

.. code-block:: json

   {
     "3": "mary@example.com"
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 333333333
     }
   }

Where *id* is the ID of the updated contact.

This is the easiest way to update a contact. For further information about updating a contact, see
:doc:`../../suite/contacts/contact_update`.

2(b) Create a New Contact
-------------------------

You have to execute this step if replyCode 2008 was returned in step 1. Here you can simply create the new contact
in the Suite.

**Request**:

``POST /api/v2/contact``

.. code-block:: json

   {
     "3": "jane@example.com"
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 444444444
     }
   }

Where *id* is the ID of the new contact.

This is the easiest way to create a contact. For further information about creating a contact, see
:doc:`../../suite/contacts/contact_create`.

