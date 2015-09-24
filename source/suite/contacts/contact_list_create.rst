Creating a Contact List
=======================

Creates a contact list with specific contacts.

Endpoint
--------

``POST /api/v2/contactlist``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - name
     - string
     - Name of the contact list
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - key_id
     - mixed
     - Key which identifies the contacts
     - You can use a `field id <../../suite/appendices/system_fields.html>`_, **id** or **uid**. The default value is 3, it has to be provided.
   * - description
     - string
     - Additional information about the contact list
     -
   * - external_ids
     - array
     - List of contact IDs to be inserted. The external_id for key_id 3 has to be provided.
     - The maximum value is 10,000 contacts.

Request Example
---------------

**Simple Values**

.. code-block:: json

   {
     "key_id": "3",
     "name": "asgard_protectors",
     "description": "those who fight for Asgard",
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
     "name": "asgard_protectors",
     "description": "those who fight for Asgard",
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
       "id": 123,
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
   * - *id*
     - ID of the contact list
   * - *errors*
     - Lists any error(s) and contains the ID and error message as a key-value pair.

Please note that when no contacts are defined for the contact list, *errors* is not shown. If contacts were defined for
the contact list but no error occurred, the following is displayed:

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": 123,
         "errors": []
      }
   }

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
     - 9001
     - Invalid field name
     - The name provided is invalid.
   * - 400
     - 9002
     - A field with this name already exists
     - The fields should have unique names.
   * - 400
     - 9003
     - Reserved name
     - The provided name is reserved for system fields.
   * - 500
     - 9004
     - No more slots to create the field, please contact Emarsys Support
     - There is no more free column for this type of field in the contact database, please contact Emarsys Support.
   * - 400
     - 9005
     - Parameters name and application_type are required.
     - Please add both name and type.
   * - 400
     - 9006
     - This type of field cannot be created via API.
     - Not all the field types can be created via this API.
   * - 500
     - 1003
     - Internal error
     - An internal error occurred.
