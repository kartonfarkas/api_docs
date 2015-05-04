Exporting a Contact List
========================

Exports selected fields of contacts from a specified contact list as a CSV file.
A contact list export including first name, last name, email address and opt-in status would result in a CSV with:

.. code-block:: text

   First Name;Last Name;E-mail;Opt-in
   Fname_1;Lname_1;testuser@example.com;True
   Fname_2;Lname_2;testuser@example.com;True
   Fname_3;Lname_3;testuser@example.com;True
   Fname_4;Lname_4;testuser@example.com;True

.. include:: _warning.rst

Endpoint
--------

``POST /api/v2/email/getcontacts``

Parameters
----------
.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - contactlist
     - int
     - Exports the fields of the contacts in this contact list.
     -
   * - distribution_method
     - string
     - **ftp**, **sftp**, **local**, **mail**
     - If **ftp** is selected, host, username and password *ftp_settings* parameters are required for this to work.
       If **sftp** is chosen, ftp_port is mandatory from *ftp_settings*.
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
   * - distribution_email_address
     - string
     - If the distribution method is set to "mail", then the result of the export is sent in an email.
     -
   * - delimiter
     - string
     - **,** (comma) or **;** (semicolon)
     - Default value is **,** (comma).
   * - add_field_names_header
     - int
     - **1** (yes) or **0** (no)
     - Determines if field headers should be included. Default value is **1**.
   * - language
     - string
     - See supported :doc:`../appendices/language_codes`.
     - Default value is the account’s default language.
   * - ftp_settings
     - object
     - Object with the following required fields:

       * *(string)* host
       * *(integer)* ftp_port
       * *(string)* username
       * *(string)* password
       * *(string)* folder – optional

     - If *distribution_method* is **local** or **mail**, then *ftp_settings* is ignored.
   * - notification_url
     - string
     - A request is sent to the url if the export is ready. This way it is not necessary to poll the export status.
     - The payload is the same as the result of :doc:`export_status`.

Request Example
---------------

.. code-block:: json

   {
     "distribution_method": "ftp",
     "contactlist": "111111111",
     "contact_fields": ["1", "3", "106533"],
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
       "id": 333333333
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
     - 4001
     - An export with the same setting is currently running. It is not possible to run the same export more than once simultaneously.
     - The specified export is already running.
   * - 400
     - 10001
     - Invalid data format for contactlist. Integer expected
     - No ID was provided or this contact list does not exist.
