Querying Contact Data from a Contact List
=========================================

If you already have contacts in Suite, then you can query contact data if you have a contact list ID.

The steps will be as follows:

1. Querying Contact IDs from a Contact List ID
----------------------------------------------

**Request**:

``GET /api/v2/contactlist/111111111``

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     ["123456789", "456789123", "789123456"]
   }

Where the IDs are the contact IDs.

See :doc:`../../suite/contacts/contact_list_list_contacts`.

2. Querying Contact Data with a Specific Contact ID
---------------------------------------------------

**Request**:

``POST /api/v2/contact/getdata``

.. code-block:: json

   {
     "keyId": "3",
     "keyValues": ["richard@example.com", "robert@example.com"],
     "fields": [1,2,3]
   }

**Response**:

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "errors": [

         ],
         "result": [
            {
               "1": "Richard",
               "3": "richard@example.com",
               "id": "123456789"
            },
            {
               "1": "Robert",
               "3": "robert@example.com",
               "id": "456789123"
            }
         ]
      }
   }

Where

* *keyId* is the key which identifies the contacts
* *keyValues* is the value of the keyId
* *fields* parameter can set the fields in the result set

See :doc:`../../suite/contacts/contact_data`.