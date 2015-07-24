Creating a Folder 
=================

Creates a new folder in a specified existing parent folder in the Media Database.

Endpoint
--------

``POST /api/v2/folder``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - name
     - string
     - Name of the new folder
     -
   * - parent
     - int
     - ID of the parent folder
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode":0,
      "replyText":"OK",
      "data":{
         "id":100021823
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
     - 11001
     - Folder does not exist: <folder ID>
     -
   * - 400
     - 11002
     - The provided name already exists
     -
   * - 400
     - 11003
     - The provided name is not a valid name.
     - letters, numbers, "_" and "-" are allowed and it cannot start with "-"
   * - 400
     - 11004
     - Missing parameter "parent"
     -
   * - 400
     - 11005
     - Missing parameter "name"
     -
