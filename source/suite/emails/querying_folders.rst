Querying Folders
================

Returns the available folders in your Media Database.

Endpoint
--------

``GET /api/v2/folder``

Parameters
----------

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Values
     - Comments
   * - <folder_id>
     - int
     - part of the URI
     - folder_id is the ID of an already existing folder in the Media Database. If it is provided, its subfolders are returned.

Result Data Structure
---------------------

id:integer
parent:integer
name:string, where
 * parent = The parent folder. If a parent folder is specified, only its subfolders are returned.

URI Example
-----------

To query all folders:
/api/v2/folder

To query subfolders of a specific folder:
/api/v2/folder/folder=12

Result Example
--------------

.. code-block:: json

   {
   "replyCode":0,
   "replyText":"OK",
   "data":
   [
   {
   "id":"123",
   "parent":"1"
   "name":"folder1"
   },
       {
         "id":"456",
         "parent":"1"
         "name":"folder2"
       }
     ]
   }

Errors
------

.. list-table:: Possible Error Codes

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 10001
     - Folder does not exist: [folder]
     - The folder parameter in the request is invalid or a folder with this ID does not exist in the Media Database.
   * - 400
     - 10001
     - Invalid filter: [filter]
     - The filter is invalid. Currently only folder is supported.
   * - 400
     - 10001
     - Invalid value for [filter] filter: [value]
     - The value is invalid for the given filter. The folder filter accepts integers only.
