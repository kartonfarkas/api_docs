Querying Contact Data
=====================

Returns the selected fields of contacts. The contacts can be specified by either internal IDs or by using another column’s value as a key.

Endpoint
--------

``POST /api/v2/contact/getdata``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - keyId
     - mixed
     - key which identifies the contacts
     - This can be a field id, **id** or **uid**. If empty, the internal ID will be used.
   * - keyValues
     - array
     - value of the keyId
     - It must be an array containing contact IDs or values of the column used to select contacts.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - fields
     - array
     - fields in the result set can be set with the fields parameter
     - If empty, all fields will be returned.

Error Condition:

.. code-block:: json

   {
     "key": "ironman@example.com",
     "errorCode": "2008",
     "errorMsg": "No contact found with the external id: 3"
   }

.. code-block:: json

   {
     "key": "hulk@example.com",
     "errorCode": "2008",
     "errorMsg": "No contact found with the external id: 3"
   }

JSON Payload Example
--------------------

.. code-block:: json

   {
     "keyId": "3",
     "keyValues": ["tony.stark@example.com", "bruce.banner@example.com"],
     "fields": [1,2,3]
   }

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "errors": [],
         "result": [
            {
               "1": "Ironman",
               "3": "tony.stark@example.com",
               "id": "23897"
            },
            {
               "1": "Hulk",
               "3": "bruce.banner@example.com",
               "id": "23898"
            }
         ]
      }
   }

Result Data Structure
---------------------

Normal Result:

.. code-block:: json

   {
     "id": "23897",
     "1": "Ironman",
     "3": "tony.stark@example.com"
   }

.. code-block:: json

   {
     "id": "23898",
     "1": "Hulk",
     "3": "bruce.banner@example.com"
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
     - 10001
     - Missing parameter: keyValues
     - keyValues is a required parameter.
   * - 400
     - 10001
     - keyValues must be an array
     - keyValues must be a comma-separated list of key values.
   * - 400
     - 10001
     - Fields must be an array
     - fields must be a comma-separated list of field IDs.
   * - 400
     - 10001
     - keyId must be an integer
     - If filled, this must be an integer.
   * - 400
     - 10001
     - Max. number of contacts: 1000
     -
