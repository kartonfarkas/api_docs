Querying Contact Data from a Contact List
=========================================

If you already have contacts in the Suite, then you can query contact data if you have a contact list ID.

The steps will be as follows:

1. Querying Contact IDs from a Contact List ID
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``GET /api/v2/contactlist/<111111111>``

**Response**:

.. code-block:: json

   [
      "111111111",
      "222222222",
      "333333333"
   ]

Where the IDs are the contact IDs.

See :doc:`../../suite/contacts/contact_list_list_contacts`.

2. Querying Contact Data with a Specific Contact ID
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

**Request**:

``POST /api/v2/contact/getdata``

**Response**:

.. code-block:: json

   {
      "errors":[],
      "result":[
         {
            "1":"Ironman",
            "3":"tony.stark@example.com",
            "id":"111111111"
         },
         {
            "1":"Hulk",
            "3":"bruce.banner@example.com",
            "id":"222222222"
         }
      ]
   }

Where

* *keyId* is the key which identifies the contacts
* *keyValues* is the value of the keyId
* *fields* parameter can set the fields in the result set

See :doc:`../../suite/contacts/contact_data`.