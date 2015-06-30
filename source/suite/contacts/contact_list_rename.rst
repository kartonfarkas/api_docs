Renaming a Contact List
=======================

Renames an existing contact list.

Endpoint
--------

``POST /api/v2/contactlist/<list_id>/rename``

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
     - ID of the contact list, part of the URI
     -
   * - name
     - string
     - Name of the contact list
     -

Request Example
---------------

.. code-block:: json

   {
     "name": "blade"
   }

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": "333333333",
         "name": "blade"
      }
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
     - 3004
     - Parameter name is required.
     -
   * - 404
     - 3006
     - No contact list found with the specified ID.
     -


