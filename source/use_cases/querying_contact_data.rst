Querying Contact Data
=====================

If you already have contacts in the Suite, then you can query contact data if you have a contact list ID.

The steps will be as follows:

1. querying the contact list ID (:doc:`../../suite/contacts/contact_list_list`)

The following example shows a minimal payload:

.. code-block:: json

   [
      {
         "id":"123",
         "name":"asgard_protectors"
      },
      {
         "id":"124",
         "name":"asgard_enemies"
      }
   ]

Where *id* is the ID of the contact list, and *name* is the name of the contact list.

2. with the help of the contact list ID, querying its contact IDs (:doc:`../../suite/contacts/contact_list_list_contacts`)

.. code-block:: json

   [
      "985762",
      "985786",
      "985654"
   ]

Where the IDs are the contact IDs.

3. with a specific contact ID, querying contact data (:doc:`../../suite/contacts/contact_data`)

.. code-block:: json

   {
     "keyId": "3",
     "keyValues": ["tony.stark@example.com", "bruce.banner@example.com"],
     "fields": [1,2,3]
   }

Where

* *keyId* is the key which identifies the contacts
* *keyValues* is the value of the keyId
* *fields* parameter can set the fields in the result set