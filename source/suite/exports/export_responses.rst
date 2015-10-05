.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/exporting-data/export-responses/

Exporting Responses
===================

Exports the selected fields of all contacts who responded to emails within the specified time range.
The request starts a background export process and returns its ID which can be used to obtain the status of the export. The background process saves the results as a CSV file, either locally or via FTP on another computer.

.. code-block:: text

   user_id;First Name;Last Name;E-Mail;Campaign title;Link title;Url;source
   287705659;user3;test_import;test1@emarsys.com;VisualCMS_2015_04_09_10_05_03;;www.emarsys.com;click
   287705659;user3;test_import;test1@emarsys.com;RSS_2015_04_09_10_05_03;;www.google.com.com;click
   287705659;user3;test_import;test1@emarsys.com;AC_recurring_2015_04_09_10_05_03;;;open

.. include:: _warning.rst

Endpoint
--------

``POST /api/v2/email/getresponses``

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
     - Array with two elements (start date, end date)
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
   * - sources
     - string
     - Array which defines sources
     - * trackable_links
       * registration_forms
       * tell_a_friend
       * contact_us
       * change_profile
       * unsubscribe
       * mail_open
       * complaint
   * - analysis_fields
     - string
     - Array that defines the contact behaviours to analyse (e.g. to which campaign the contact clicked) based
       on specific field types determining the email campaign
     - * 1 – Campaign title
       * 2 – Section header
       * 3 – Section group
       * 4 – Link title
       * 5 – URL
       * 8 – Time
       * 12 – Campaign ID
       * 13 – Version Name
       * 14 – Campaign category
       * 15 – Link category

The number of fields required to use *contact_fields* and *analysis_fields* has to be between 1 (minimum) and 20 (maximum).

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - email_id
     - int
     - Campaign ID, provides the responses to this email
     -
   * - contactlist
     - int
     - If you check the contacts who answered within a contact list
     -
   * - delimiter
     - string
     - **,** (comma) or **;** (semicolon).
     - Default value is **,** (comma).
   * - add_field_names_header
     - int
     - **0** or **1**
     - Default value is 1.
   * - language
     - string
     - See supported :doc:`../appendices/language_codes`.
     - Default value is the account’s default language.
   * - ftp_settings
     - object
     - Object with the following required fields:

       * *(string)* host
       * *(integer)* port
       * *(string)* username
       * *(string)* password
       * *(string)* folder – optional

     - If *distribution_method* is local, then *ftp_settings* is ignored.
   * - notification_url
     - string
     - A request is sent to the url if the export is ready. This way it is not necessary to poll the export status.
     - The payload is the same as the result of :doc:`export_status`.

Request Example
---------------

.. code-block:: json

   {
      "distribution_method":"ftp",
      "sources":"all",
      "email_id":"89268",
      "time_range":[
         "2012-02-09",
         "2014-08-13"
      ],
      "contact_fields":[
         "1",
         "3"
      ],
      "analysis_fields":[
         "5",
         "8",
         "15"
      ],
      "delimiter":";",
      "add_field_names_header":1,
      "language":"en",
      "ftp_settings":{
         "host":"XXXXXXXX",
         "port":"21",
         "username":"XXXXXX",
         "password":"xxxxxx",
         "folder":"public_html/bonus/full"
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
   :widths: 20 20 40 40

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
     - Invalid distribution method: [value]
     - The provided [value] is not ftp or local.
   * - 400
     - 10001
     - Invalid value for [parameter]: [value]
     - The provided value [value] for the parameter [parameter] is not valid.
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
