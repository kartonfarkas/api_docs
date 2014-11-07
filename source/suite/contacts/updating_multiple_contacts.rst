Updating Multiple Contacts
==========================

Updates multiple contacts all at once.

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
     - [field_id] = [field_value]
       [field_id] = [field_value]
       …
       [field_id] = [field_value]
       [field_id] = [field_value]
       …
     - key_id identifies the contact to be updated. The other fields contain the changes requested for the contact.
       If more than one contact with the requested external ID is found, an error message is returned.

See `Batch Create Contact <http://documentation.emarsys.com/?page_id=174>`_ for further information.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - source_id
     - the ID of the source
     - [source_id]
     -

See `Batch Create Contact <http://documentation.emarsys.com/?page_id=174>`_ for further information.

Result Data Structure
---------------------

 * [id1]
 * [id2]
    …
 * [key_field_value1] = [error1]
 * [key_field_value2] = [error2]

Where *[idx]* is the IDs of successfully-created contacts are returned in an array, and *[errorx]* means that if an error occurred during the creation of a contact, the error message is returned with the value of the key_id.

JSON Payload Example
--------------------

.. code-block:: json

   {
     "key_id": "67",
     "contacts":
     [
       {
         "67": "identifier 1",
         "2": "name1"
       },
       {
         "67": "identifier 2",
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
         "test1@ema.il":
         {
           "2009": "Contact with the external id already exists: 3"
         },
         "test2@ema.il":
         {
           "2009": "Contact with the external id already exists: 3"
         }
       }
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
     - 1000
     - The request exceeded the maximum batch size 1,000
     - Too many contacts were requested; contact creation is limited to 1,000.
