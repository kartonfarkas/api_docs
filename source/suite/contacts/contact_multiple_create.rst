Creating Multiple Contacts
==========================

Creates multiple new contacts all at once.

Endpoint
--------

``POST /api/v2/contact``

Parameters
----------

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
   * - field_id
     - int
     - the ID of the field, [field_value]
     -
   * - field_id
     - int
     - the ID of the field, [field_value]
     -
   * - source_id
     - int
     - an ID assigned to the application of a customer to integrate, used to differentiate contacts created of modified by the customer's applications, [source_id]
     -

If the key_id is omitted, the default value for key_field ID is 3 (email).
The optional key_id must be provided once.
The parameters of the different contacts must be sent in an array (see example below).
The maximum size of the array (and therefore the **maximum number of new contacts**) is **1,000.**

JSON Payload Example
--------------------

.. code-block:: json

   {
     "key_id": "3",
     "contacts":
     [
       {
         "3": "erik.selvig@example.com",
         "2": "Selvig",
         "source_id": "1234"
       },
       {
         "3": "ian.boothby@example.com",
         "2": "Boothby"
       },
       {
         "3": "james.rhodes@example.com",
         "2": "Rhodes",
         "source_id": "5678"
       },
       {
         "3": "pepper.potts@example.com",
         "2": "Potts"
       }
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
       [
         123,
         456
       ],
       "errors":
       {
         "james.rhodes@example.com":
         {
           "2009": "Contact with the external id already exists: 3"
         },
         "pepper.potts@example.com":
         {
           "2009": "Contact with the external id already exists: 3"
         }
       }
     }
   }

Where *[idx]* means that the IDs of successfully-created contacts are returned in an array, and *[errorx]* is that if an error occurred during the creation of a contact, the error message is returned with the value of the key_id.

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 1000
     - The request exceeded the maximum batch size of 1,000
     - Too many contacts were requested.
   * - 400
     - 2004
     - Cannot use internal ID as key on contact creation.
     -
