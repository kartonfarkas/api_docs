Updating Multiple Contacts
==========================

Updates multiple contacts all at once.

Endpoint
--------

``PUT /api/v2/contact``

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

See `Creating Multiple Contacts <creating_multiple_contacts.html>`_ for further information.

JSON Payload Example
--------------------

.. code-block:: json

   {
     "key_id": "1",
     "contacts":
     [
       {
         "1": "Malekith",
         "2": "the Accursed"
       },
       {
         "1": "Wonder Woman",
         "679": ["1","2"]
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
         "malekith@example.com":
         {
           "2009": "Contact with the external id already exists: 3"
         },
         "wonderwoman@example.com":
         {
           "2009": "Contact with the external id already exists: 3"
         }
       }
     }
   }

Where *[idx]* is the IDs of successfully-created contacts are returned in an array, and *[errorx]* means that if an error occurred during the creation of a contact, the error message is returned with the value of the key_id.

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
     - The request exceeded the maximum batch size 1,000
     - Too many contacts were requested; contact creation is limited to 1,000.
