Uploading a File
================

Uploads a file to the Media Database. When an email campaign is created, the uploaded file has to be referred
to like this: ``<img src=”/custloads/<customer_id>/img.png”>``.

.. note:: The filename reference is case sensitive.

Endpoint
--------

``POST /api/v2/file``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - filename
     - string
     - Full name of the file plus extension (e.g.: testimage.jpg)
     -
   * - file
     - string
     - Base64 encoded content of the file
     -
.. note::

   The upload limit is 128 kB for images and 4 MB for other file types

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - folder
     - int
     - ID of an already existing folder in the Media Database
     - If a folder is not specified, the file is uploaded to the root directory by default.
       A list of available folders can be retrieved using the /api/v2/folder interface.
   * - preserve_filename
     - int
     - If 1, the original filename won't be modified
     - 

JSON Payload Example
--------------------

**Default Folder**

The folder ID is not provided; the file will be uploaded to the root folder:

.. code-block:: json

   {
     "filename": "header.png",
     "file": "Dm++/vUMBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAcO/w4Dvv70RCO+/veKCrO+/veKCrAMBIgRAQ==…"
   }

**Specified Folder**

The file will be uploaded to the specified folder:

.. code-block:: json

   {
     "folder": "840559",
     "filename": "logo.png",
     "file": "Dm++/vUMBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAcO/w4Dvv70RCO+/veKCrO+/veKCrAMBIgRAQ==...",
     "preserve_filename": 0
   }

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
         "filename": "md_1234.png",
         "size": "96274211",
         "original_name": "logo.png"
       }
     ]
   }

Where:

* *filename* is the resulting file name in the media database after upload
* *original_name* is the file name provided in the request

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
     - 5025
     - Cannot create directory
     - An error occurred during the creation of the root directory.
   * - 400
     - 5026
     - Invalid file
     - No file or file name was provided or the file/file name is not valid.
   * - 400
     - 5027
     - File size exceeds the limit
     - The file size limit is 128 kB for images and 4 MB for other file types.
   * - 400
     - 5029
     - File not supported
     - An error occurred during thumbnail creation; the file type is not supported.
   * - 400
     - 5030
     - Resize failed
     - An error occurred during thumbnail creation; could not resize the image.
   * - 400
     - 5033
     - Thumbnail creation failed
     - An error occurred during thumbnail creation.
   * - 400
     - 5034
     - File type is forbidden
     - The file type is not allowed in the media database (e.g. .exe).
   * - 400
     - 10001
     - Folder does not exist: [folder]
     - The folder parameter in the request is invalid, or no folder with the ID exists in the media database.
