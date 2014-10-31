Adding Contacts to Contact Lists
================================

Adds contacts to the contact list which can be used as recipient source for the email.

Endpoint
--------

``POST /api/v2/contactlist/<list_id>/add``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - list_id
     - int
     - The id of the contact list to extend
     - (part of the URI)
   * - key_id
     - mixed
     - The key identifies the contacts
     - field ID, id or uid can be used
   * - external_ids
     - array
     - The list of contact IDs to be inserted
     -

Result Data Structure
---------------------

 * inserted_contacts:integer
 * errors:

   * [id1]:string,
   * [id2]:string

Where *inserted_contacts* is the number of contacts successfully added to the list, and
*errors* is an array of contacts not added to the list. The array contains the ID and
reason for the error.

Request Example
---------------

Simple Values
^^^^^^^^^^^^^

.. code-block:: json

   {
     "key_id": "3",
     "external_ids":
     [
       "test1@example.com",
       "test2@example.com",
       "test3@example.com"
     ]
   }

Multichoice Values
^^^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "key_id": "123",
     "external_ids":
     [
       [1,2,3],
       [2,3],
       [1,4]
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
       "inserted_contacts": "2",
       "errors":
       {
         "test2@example.com":
         {
           "2008": "No contact found with the external id: 3 - test2@example.com"
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
     -
   * - 400
     - 3004
     - Description contains invalid character(s).
     -
   * - 400
     - 3003
     - Invalid datatype for the list of external IDs. Array expected.
     -
   * - 400
     - 3002
     - The list of external IDs exceeds the maximum size.
     - the number of contacts is limited to 10,000.
   * - 400
     - 3004
     - Invalid contact list id: [id]
     - the list ID has an invalid format or it does not exist.
   * - 400
     - 2008
     - No contact found with the external ID: [field_id]
     -