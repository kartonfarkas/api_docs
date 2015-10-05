.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/exporting-data/query-status/

Querying Export Status
======================

Fetches the status data of an export, and uses the ID returned by an export as the Export ID at :doc:`index`.

Endpoint
--------

``GET /api/v2/export/<export_id>``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - export_id
     - int
     - Requested export ID, part of the URI
     - ID returned by an export as the Export ID at :doc:`index`.

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": "123",
       "created": "2012-05-23 11:08:56",
       "status": "done",
       "type": "Responses",
       "file_name": "clicks_3931993_1_en-df0ef2.csv",
       "ftp_host": "88.99.123.23",
       "ftp_dir": "folder/subfolder"
     }
   }

Resulting Data Structure
------------------------

.. list-table:: **Resulting Data Structure**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - status
     - string
     - * **scheduled**: The export process has not been started yet
       * **in progress**: The export is currently being processed
       * **ready**: The CSV file is ready to be distributed
       * **done**: The export finished without errors; the CSV file was created and distributed successfully
       * **error**: An error occurred during the export process
     - * In case of an FTP delivery and if the FTP host is unavailable or the authentication failed, the export status remains **ready** and the process will try to connect to the FTP after one hour.
       * If the export process cannot connect and stays in **‘ready’** status for more than one hour, please contact Emarsys Support.
   * - type
     - string
     - Type of the export
     - * responses
       * registrations
   * - file_name
     - string
     - Name of the output CSV file
     - Will default to **NULL** if the *status* is anything other than **done**
   * - ftp_host
     - string
     - Export settings to locate the file if the distribution method is FTP
     -
   * - ftp_dir
     - string
     - Export settings to locate the file if the distribution method is FTP
     -

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
     - 10001
     - Invalid export ID
     - No ID provided in the URI, or an export with the ID does not exist.
   * - 400
     - 4002
     - Invalid export type
     - In this version, only the export of responses and new registrations is supported.
