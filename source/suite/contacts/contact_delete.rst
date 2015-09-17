Deleting a Contact
==================

Deletes a contact.

Endpoint
--------

``POST /api/v2/contact/delete``

Parameters
----------

Required Parameters
^^^^^^^^^^^^^^^^^^^

Key-value pairs which uniquely identify the contact, e.g. a key can be the email field ID (3), and its value is the
email address of the specific contact.

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
     - This can be a `field id <../../suite/appendices/system_fields.html>`_, **id**, **uid** or **eid**.
       If left empty, the email address (field ID 3) will be used by default.

Notes:

* If the key_id is omitted, the key field ID value defaults to using ID 3 (email).
* You can use "eid" as "key_id" if the external ID is configured for your account.
  This is an experimental feature, please consult with Emarsys Support.

Request Example
---------------

.. code-block:: json

   {
     "key_id": "1",
     "1": "storm"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": {}
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
     - 2004
     - Invalid key field id: [id]
     - The provided field ID does not exist.
   * - 400
     - 2005
     - No value provided for key field: [id]
     - The value of the key field has not been provided or is empty.
   * - 404
     - 2008
     - No contact found with the specified external ID
     - There is no match for the specified ID.
