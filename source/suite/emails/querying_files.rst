Listing Files
=============

Returns a media file from the Media Database.

Endpoint
--------

``GET /api/v2/file``

Parameters
----------

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - folder_id
     - int
     - folder_id is the ID of an already existing folder in the Media Database. If it is provided, the files in the folder are returned, part of the URI.
     -

URI Examples
------------

To return all files:
 * ``/api/v2/file``

To return files in a specified folder:
 * ``/api/v2/file/folder=12``

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     [
       {
         "id": "123",
         "folder": "1",
         "filename": "fantastic_four.jpg",
         "size": "1234",
         "original_name": "picture.jpg",
         "url": "http://example.com/custloads/12345678/fantastic_four.jpg"
       },
       {
         "id": "456",
         "folder": "1",
         "filename": "the_avengers.jpg",
         "size": "1234",
         "original_name": "picture2.jpg",
         "url": "http://example.com/custloads/12345678/the_avengers.jpg"
       }
     ]
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
     - 10001
     - Folder does not exist: [folder]
     - The folder parameter in the request is invalid or a folder with the provided ID does not exist in the Media Database.
   * - 400
     - 10001
     - Invalid filter: [filter]
     - The filter is invalid. Currently only folder is supported.
   * - 400
     - 10001
     - Invalid value for [filter] filter: [value]
     - The value is invalid for the given filter. The folder filter accepts only integers.
