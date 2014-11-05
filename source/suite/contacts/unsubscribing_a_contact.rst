Unsubscribing a Contact
=======================

To unsubscribe a contact, follow the steps below.

Endpoint
--------

``PUT /api/v2/contact``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - key_id = [field_id]
     -
     - The value provided for key_id field identifies the contact which will be unsubscribed.
       Use 3 for email address.
     -
   * - optin = [NULL; 1; 2]
     -
     - The second parameter optin (field_id: 31) has three possible values:

       * NULL = empty
       * 1 = true
       * 2 = false

     - Set optin=false to unsubscribe a contact!

See document “Suite Field IDs and Values” for further information.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Values
     - Comments
   * - source_id
     -
     - For the source_id, pass the value for the appropriate source (we are using 2 in the examples below).
     - If more than one contact with the requested external ID is found, an error message is returned.

Result Data Structure
---------------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": {
       "id": [id]
     }
   }

Result Example
--------------

Normal Result:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 366924307
     }
   }

Error Condition:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "ids":
       [
         123,
         456
       ],
       "errors":
       {
         "user2@example.com":
         {
           "2010": "More contacts found with the external id: 3 - user2@example.com"
         },
         "user3@example.com":
         {
           "2010": "More contacts found with the external id: 3 - user3@example.com"
         }
       }
     }
   }

JSON Payload Example
--------------------

.. code-block:: json

   {
     "key_id": "3",
     "contacts":
     [
       {
         "3": "user1@example.com",
         "31": "2",
         "source_id": "2"
       }
     ]
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
     - 2006
     - Empty field ID for value: [value]
     - A value has been provided without defining its field.
   * - 400
     - 2004
     - Invalid key field ID: [id]
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
     - 2007
     - Invalid field ID: [id]
     - The provided field ID does not exist.
   * - 400
     - 2010
     - More contacts found with the external ID [id]
     - The provided external ID was not unique.
   * - 400
     - 2013
     - Invalid source ID: [id]
     - The customer has no source with the requested ID.
