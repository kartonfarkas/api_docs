List Contacts in a Contact List
===============================

Returns the IDs of users in a contact list.

Endpoint
--------

``GET /api/v2/contactlist/<list_id>``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - <list_id>
     - int
     - ID of the contact list
     -

URI Example
-----------

* ``/api/v2/contactlist/123456``

Result Data Structure
---------------------

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

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 404
     - 3006
     - List does not exist
     - There is no contact list with the specified ID.
