.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/contacts/add-contacts-to-list/

Adding Contacts to a Contact List
=================================

Adds new contacts to an existing contact list.

Endpoint
--------

``POST /api/v2/contactlist/<list_id>/add``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - list_id
     - int
     - ID of the contact list, part of the URI
     -
   * - key_id
     - mixed
     - Key which identifies the contacts
     - This can be a `field id <../../suite/appendices/system_fields.html>`_, **id** or **uid**. If left empty, the internal ID will be used by default.
   * - external_ids
     - array
     - List of contact IDs to be inserted
     -

Request Example
---------------

Simple Values
^^^^^^^^^^^^^

.. code-block:: json

   {
     "key_id": "3",
     "external_ids":
     [
       "thor@example.com",
       "odin@example.com",
       "loki@example.com"
     ]
   }

Multichoice Values
^^^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "key_id": "123",
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
       "inserted_contacts": 2,
       "errors":
       {
         "loki@example.com":
         {
           "2008": "No contact found with the external id: 3 - loki@example.com"
         }
       }
     }
   }

.. list-table:: **Result Example Details**
   :header-rows: 1
   :widths: 10 40

   * - Name
     - Description
   * - *inserted_contacts*
     - Number of contacts successfully added to the list
   * - *errors*
     - Details any contacts not added to the list, expressed as an array which contains the ID and the reason for the error

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
     - 3005
     - Contact list with the requested name already exists.
     -
   * - 400
     - 3003
     - Invalid datatype for the list of external IDs. Array expected.
     -
   * - 400
     - 3002
     - The list of external IDs exceeds the maximum size.
     - The number of contacts is limited to 10,000.
   * - 400
     - 3004
     - Invalid contact list id: [id]
     - The list ID has an invalid format or it does not exist.
   * - 400
     - 2008
     - No contact found with the external ID: [field_id].
     -
