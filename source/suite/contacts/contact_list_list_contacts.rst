Listing Contacts in a Contact List
==================================

Generates a list of users and their IDs in a contact list.

.. note:: This function provides the contact list immediately.

Endpoint
--------

``GET /api/v2/contactlist/<list_id>/contacts``

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
     - ID of the contact list
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - limit
     - int
     - Defines how many IDs are listed, its maximum value is 1000000, part of the URI
     -
   * - offset
     - int
     - Defines the ID to start listing from, part of the URI
     - The offset of the first contact ID is 0.

URI Example
-----------

* ``/api/v2/contactlist/123456/contacts``
* ``/api/v2/contactlist/123456/contacts/limit=1000&offset=5000``

Resulting Data Structure
------------------------

Normal Result:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     ["985762", "985786", "985654"]
   }

Error Condition:

.. code-block:: json

   {
     "replyCode": 3006,
     "replyText": "List does not exist",
     "data": ""
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
   * - 404
     - 3006
     - List does not exist
     - There is no contact list with the specified ID.
