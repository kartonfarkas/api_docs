Exporting Contact Lists
=======================

Exports selected fields of contacts. Contacts are passed as a contact list with the given ID.

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
     - exports the fields of the contacts in this contactlist
     -
   * - distribution_method
     - string
     - **ftp** or **local**
     - If *distribution_method* is **ftp**, then *ftp_settings* is a required parameter.
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
     - if the distribution method is set to "mail", then the result of the export is sent in an email
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

The standard HTML status and error codes.