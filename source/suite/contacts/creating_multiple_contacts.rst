Creating Multiple Contacts
==========================

Creates multiple new contacts/recipients at once.

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
     - Values
     - Comments
   * - key_id = [field_id]
     -
     -
     -
   * - [field_id] = [field_value]
     -
     -
     -
   * - [field_id] = [field_value]
     -
     -
     -
   * - source_id = [source_id]
     -
     -
     -

The optional key_id must be provided once.
The parameters of the different contacts must be sent in an array (see example below).
The maximum size of the array (and therefore the **maximum number of new contacts**) is **1,000.**

Result Data Structure
---------------------

[id1]
[id2]
…
[key_field_value1] = [error1]
[key_field_value2] = [error2], where
 * **[idx]** = The IDs of successfully-created contacts are returned in an array.
 * **[errorx]** = If an error occurred during the creation of a contact, the error message is returned with the value of the key_id.

JSON Payload Example
--------------------

.. code-block:: json

   {
     "key_id":"3",
     "contacts":
     [
       {
         "3":"test1@ema.il",
         "2":"name1",
         "source_id":"1234"
       },
       {
         "3":"test2@ema.il",
         "2":"name2"
       },
       {
         "3":"test3@ema.il",
         "2":"name3",
         "source_id":"5678"
       },
       {
         "3":"test4@ema.il",
         "2":"name4"
       }
     ]
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode":0,
     "replyText":"OK",
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
           "2009":"Contact with the external id already exists: 3"
         },
         "test2@ema.il":
         {
           "2009":"Contact with the external id already exists: 3"
         }
       }
     }
   }

Errors
------

.. list-table:: Possible Error Codes

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 1000
     - The request exceeded the maximum batch size of 1,000
     - Too many contacts were requested; contact creation is limited to 1,000.
   * - 400
     - 2004
     - Can not use internal ID as key on contact creation.
     - You can not specify the internal ID field as key for a new contact.
