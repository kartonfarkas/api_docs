Creating a Contact
==================

Creates a new contact.

Endpoint
--------

``POST /api/v2/contact``

Parameters
----------

Required Parameters
^^^^^^^^^^^^^^^^^^^

Key-value pairs which identify the contact.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - key_id
     - mixed
     - key which identifies the contacts, [field_id]
     -
   * - source_id
     - int
     - an ID assigned to the application of a customer to integrate, used to differentiate contacts created or modified by the customer's applications, [source_id]
     -

Notes:

 * If the key_id is omitted, the default value for key_field ID is 3 (email).
 * Multi-choice values must be passed as an array, even if they contain only one choice ID. Empty arrays are not allowed.

Request Example
---------------

The key_id is Omitted
^^^^^^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "3": "test@example.com",
   }

The key_id is Provided
^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "key_id": "15",
     "15": "1234567",
     "7": "3",
     "source_id": "123"
   }

Where *source_id* is an ID assigned to the application of a customer to integrate.

Multichoice Field
^^^^^^^^^^^^^^^^^

Request containing a multichoice field *405067*:

.. code-block:: json

   {
     "key_id": "10675",
     "10675": "1234567",
     "405067":
     [
       "6789",
       "6792"
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
       "id": 123
     }
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

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
   * - 400
     - 2005
     - Invalid key field value: [error message]
     - The value of the key field was provided but the value is invalid. The [error message] contains information on the error.
   * - 400
     - 2006
     - Empty field id for value: [value]
     - A value has been provided without defining its field.
   * - 400
     - 2006
     - Contact with the external id already exists: [id]
     - A contact with the provided key field value exists in the database. It can be updated via POST call.
   * - 400
     - 2007
     - Invalid field id: [id]
     - The provided field ID does not exist.
   * - 400
     - 2007
     - Invalid field type: voucher. The value of vouchers cannot be changed.
     - The request contains a voucher field. These fields cannot be modified.
   * - 400
     - 2007
     - Invalid date format for field id: [id]
     - The date format provided for the specified field is invalid.
   * - 400
     - 2007
     - Invalid choice id for field id: [id]
     - The choice ID provided for the specified field is invalid.
   * - 400
     - 2007
     - Invalid data format for field id: [id]. Array expected
     - The value provided for a multichoice field is not an array.
   * - 400
     - 2007
     - Invalid data format for field id: [id]. Scalar expected
     - An array value was provided for a non-multichoice field.
   * - 400
     - 2007
     - No choice provided for field id: [id]
     - An empty array was provided in the request for a multichoice field.
   * - 400
     - 2008
     - No contact found with the specified external ID
     - There is no match for the specified ID.
   * - 400
     - 2009
     - Contacts with the external id already exist: [id]
     - More than one contact with the provided key field value exists in the database; the specified key field is not unique.
   * - 400
     - 2010
     - More than one contact found with the specified external ID
     - There is more than one contact selected.
   * - 400
     - 2013
     - Invalid source id: [id]
     - The customer has no source with the requested ID.
   * - 500
     - 2011
     - Database connection error
     - An error occurred during the save process.