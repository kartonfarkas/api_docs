.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/contacts/replace-list/

Replacing a Contact List
========================

Overwrites an existing contact list.

Endpoint
--------

``POST /api/v2/contactlist/<list_id>/replace``

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
     - List of contact IDs to be included
     - This list can include existing and new contacts, and any contacts not on this list will not be included in this list (i.e. deleted).

Request Example
---------------

Simple Values
^^^^^^^^^^^^^

.. code-block:: json

   {
     "key_id": "3",
     "external_ids":
     [
       "natasha.romanoff@example.com",
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
       "inserted_contacts": 1,
       "errors":
       {
        "loki@example.com":
        {
          "2008":"No contact found with the external id: 3"
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
     - List of contacts not added, expressed as an array containing the ID and the reason for the error

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
