Exporting a Contact List
========================

Exports selected fields of contacts from a specified contact list as a CSV file.
A contact list export including first name, last name, email address and opt-in status would result in a CSV with:
``First Name;Last Name;E-mail;Opt-in
  Fname_1;Lname_1;testuser@example.com;True
  Fname_2;Lname_2;testuser@example.com;True
  Fname_3;Lname_3;testuser@example.com;True
  Fname_4;Lname_4;testuser@example.com;True``

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
   * - contactlist_id
     - int
     - Exports the fields of the contacts in this contact list.
     -
   * - distribution_method
     - string
     - **ftp** or **local**
     - If **ftp** is selected, then the *ftp_settings* parameter is required for this to work.
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
       * *(integer)* port
       * *(string)* username
       * *(string)* password
       * *(string)* folder – optional

     - If *distribution_method* is **local**, then *ftp_settings* is ignored.
   * - notification_url
     - string
     - A request is sent to the url if the export is ready. This way it is not necessary to poll the export status.
     - The payload is the same as the result of :doc:`export_status`.

Request Example
---------------

.. code-block:: json

   {
     "distribution_method": "ftp",
     "origin": "form",
     "origin_id": "123",
     "time_range": ["2012-02-09", "2012-04-02"],
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
       "id": 2140
     }
   }

Errors
------

Standard HTML status and error codes apply.
