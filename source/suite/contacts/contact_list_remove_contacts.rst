Removing Contacts from a Contact List
=====================================

Removes contacts from an existing contact list.

Endpoint
--------

``POST /api/v2/contactlist/<list_id>/delete``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - <list_id>
     - int
     - ID of the contact list, part of the URI
     - The maximum value is 10,000 contacts to be deleted with each request.
   * - key_id
     - mixed
     - Key which identifies the contacts, [field ID]
     - You can use **id** or **uid**.
   * - external_ids
     - [id1];[id2];…
     - Field ID of the contacts
     -

JSON Payload Example
--------------------

**Simple Values**

.. code-block:: json

   {
     "key_id": "3",
     "name": "asgard_enemies",
     "description": "those who fight against Asgard",
     "external_ids":
     [
       "thor@example.com",
       "odin@example.com",
       "loki@example.com"
     ]
   }

**Multichoice Values**

.. code-block:: json

   {
     "key_id": "123",
     "name": "asgard_enemies",
     "description": "those who fight against Asgard",
     "external_ids":
     [
       [1,2,3],
       [2,3],
       [1,4]
     ]
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "deleted_contacts": "2",
       "errors":
       {
         "loki@example.com":
          {
            "2008": "No contact found with the external id: 3 - loki@example.com"
          }
       }
     }
   }

Where:

* *deleted_contacts* is the number of contacts successfully deleted from the list
* *errors* details any contacts not removed from the list, expressed as an array which contains the ID and the reason for the error.

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 3004
     - List name is not set.
     - No name was provided for the contact list.
   * - 400
     - 3004
     - List name contains invalid character(s).
     -
   * - 400
     - 3005
     - Contact list with the requested name already exists.
     -
   * - 400
     - 3004
     - Description contains invalid character(s).
     -
   * - 400
     - 3003
     - Invalid datatype for the list of external IDs. Array expected.
     -
   * - 400
     - 3002
     - The list of external IDs exceeds the maximum size.
     - Too many contacts were requested; the number of contacts is limited to 10,000.
   * - 400
     - 3004
     - Invalid contact list ID: [id]
     - The provided contact list ID has an invalid format or does not exist.
