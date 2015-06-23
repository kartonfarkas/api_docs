Checking Contact Internal IDs
=============================

Generates a list of existing contacts and errors indexed by a specified key ID.
Errors are collected if

* The keyID is invalid
* No contact is found
* More than one contact is found with the same keyID value

Endpoint
--------

``POST /api/v2/contact/checkids``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - key_id
     - mixed
     - Key which identifies the contacts
     - This can be a `field id <../../suite/appendices/system_fields.html>`_, **id** or **uid**. If left empty, the internal ID will be used by default.
   * - external_ids
     - mixed
     - [id1];[id2];… values specified in the key_id for those contacts whose internal IDs the customer wants to receive
     - ID can be an integer, string or array depending on the key field type. For example, for custom numeric fields use an integer, for a multi-choice field use an array, etc..

JSON Payload Example
--------------------

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

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "ids":
       {
         "obadiah.stane@example.com":"9832304",
         "jinsen@example.com":"9839473"
       },
       "errors":
       {
         "raza@example.com":
         {
           "2008":"No contact found with the external id: 3"
         }
       }
     }
   }

.. list-table:: **Where:**
   :header-rows: 1
   :widths: 20 40

   * - Name
     - Description
   * - *ids*
     - List of the internal IDs
   * - *errors*
     - Contains the error ID and the error message as a key-value pair

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
     - 2002
     - The list of external ids exceeds the maximum size.
     - Too many contacts were requested; number of contacts is limited to 1,000.
   * - 400
     - 2003
     - Invalid datatype for the list of external ids. Array expected.
     - The data which was provided for the list of external IDs is not an array.
   * - 400
     - 2004
     - Invalid key field id: [field_id]
     - The field ID does not exist.
   * - 400
     - 2005
     - No value provided for key field: [field_id]
     - The value of the key field has not been provided or is empty.
   * - 400
     - 2008
     - No contact found with the specified external ID.
     - There is no match for the specified ID.
   * - 400
     - 2010
     - More than one contact found with the specified external ID.
     - There is more than one contact selected.
