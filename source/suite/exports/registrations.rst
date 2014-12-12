Exporting Registrations
=======================

Exports the selected fields of all contacts who registered within the specified time range.
The request starts a background export process and returns its ID which can be used to obtain the status of the export. The background process saves the results as a CSV file, either locally or via FTP on another computer.

.. include:: _warning.rst

Endpoint
--------

``POST /api/v2/contact/getregistrations``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - distribution_method
     - string
     - **ftp** or **local**
     - If *distribution_method* is **ftp**, then *ftp_settings* is a required parameter.
   * - time_range
     - date array
     - An array with two elements (start date, end date)
     - The following date formats are accepted here:
        - [2014-06-20 16:16:00, 2014-06-20 16:16:21]
        - [2014-06-20 16:16, 2014-06-20 16:21]
        - [2014-06-20, 2014-06-21]
   * - contact_fields
     - int array
     - It may contain any contact field ID except:

       * 27 – avg. length of visit
       * 28 – avg. pages per day
       * 29 – last mail received
       * 32 – user status
       * 33 – contact source

     - The array must not be empty.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - contactlist_id
     - int
     - if you check the contacts who registered within a contactlist
     -
   * - with_timestamp
     - int
     - 0 or 1, default is 1 , a timestamp is placed into the export file about the time of the registration
     -
   * - delimiter
     - string
     - **,** (comma) or **;** (semicolon)
     - Default value is **,** (comma).
   * - add_field_names_header
     - int
     - **0** or **1**
     - Default value is **1**.
   * - language
     - string
     - see supported `language codes <http://documentation.emarsys.com/?page_id=424>`_
     - Default value is the account’s default language.
   * - ftp_settings
     - object
     - an object with the following fields must be provided:
        * *(string)* host
        * *(integer)* port
        * *(string)* username
        * *(string)* password
        * *(string)* folder – optional
     - If *distribution_method* is **local**, then *ftp_settings* is ignored.
   * - notification_url
     - string
     - A request is sent to the url if the export is ready. This way it is not necessary to poll the export status.
     - The payload is the same as the result of `querying export status <query_status.html>`_.

Request Example
---------------

.. code-block:: json

   {
     "distribution_method": "ftp",
     "origin": "form",
     "origin_id": "123",
     "time_range": ["2012-02-09", "2012-04-02"],
     "contact_fields": ["1","3","106533"],
     "delimiter": ";",
     "add_field_names_header": 1,
     "language": "en",
     "ftp_settings":
     {
       "host": "www.example.com",
       "port": "1234",
       "username": "user",
       "password": "pass",
       "folder": "path/of/a/folder"
     }
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 2140
     }
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
     - Missing parameter: [parameter]
     - The required parameter [parameter] is missing.
   * - 400
     - 10001
     - Invalid data format for [parameter]. Array expected
     - The [parameter] value is not an array.
   * - 400
     - 10001
     - Invalid data format for time_range. Array size must be 2
     - The length of the array provided for time_range is not 2.
   * - 400
     - 10001
     - Invalid origin: [parameter]
     - An invalid origin type was sent.
   * - 400
     - 10001
     - Invalid data format for origin_id. Integer expected
     - Invalid origin ID (form or API source) was sent.
   * - 400
     - 10001
     - Invalid distribution method: [value]
     - The provided [value] is not ftp or local.
   * - 400
     - 10001
     - Invalid value for [parameter]: [value]
     - The provided [value] value for the parameter [parameter] is not valid.
   * - 400
     - 10001
     - Invalid contact field id: [id1], [id2]
     - [id1], [id2], … values are not valid contact field IDs.
   * - 400
     - 10001
     - Invalid number of fields
     - The number of IDs provided for contact_fields is 0.
   * - 400
     - 10001
     - Valid start_date and end_date is required
     - One of the given dates in time_range is invalid.
   * - 400
     - 10001
     - Invalid value for end_date: end_date is earlier than the start_date
     - The second date in time_range must be later than the first one.
   * - 400
     - 4001
     - An export with the same setting is currently running. It is not possible to run the same export more than once simultaneously.
     - The specified export is already running.
