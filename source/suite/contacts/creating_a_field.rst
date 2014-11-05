Creating a Field
================

Creates a new contact field.

Endpoint
--------

``POST /api/v2/field``

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
     - the field ID
     - **id** or **uid** can be used.
   * - name
     - string
     - the name of the new field
     -
   * - application_type
     - string
     - the type of the new field
     - supported types:

       * shorttext: max 60 characters
       * longtext: max 255 characters
       * largetext: theoretically unlimited characters
       * date
       * url
       * numeric: max 24 digits

Example Parameters
------------------

.. code-block:: json

   {
     "name": "The name of the new field",
     "application_type": "shorttext"
   }

Result Data Structure
---------------------

Normal Result:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 796
     }
   }

Error Condition:

.. code-block:: json

   {
     "replyCode": 9002,
     "replyText": "A field with this name already exists",
     "data": ""
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
     - 3004
     - List name is not set.
     - No name was provided for the contact list.
   * - 400
     - 3004
     - List name contains invalid character(s).
     - The provided name contains characters which are not allowed.
   * - 400
     - 3005
     - Contact list with the requested name already exists.
     - A contact list with the requested name already exists.
   * - 400
     - 3004
     - Description contains invalid character(s).
     - The provided description contains characters which are not allowed.
   * - 400
     - 3003
     - Invalid datatype for the list of external ids. Array expected.
     - The provided data for the list of external IDs is not an array.
   * - 400
     - 3002
     - The list of external ids exceeds the maximum size.
     - Too many contacts were requested; the number of contacts is limited to 10,000.

