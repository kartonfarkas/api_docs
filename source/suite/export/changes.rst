Exporting Changes
=================

Exports the selected fields of all contacts with properties that changed within the time range specified.
The contacts must belong to the given form or API source.

The request starts a background export process and returns its ID which can be used to obtain the status of
the export. The background process saves the results as a CSV file, either locally or via FTP on another
computer.

URI
---

``/api/v2/contact/getchanges``

Method
------

**POST**

Required Parameters
-------------------

 * (string) distribution_method
 * (date array) time_range
 * (string) origin
 * (integer array) origin_id
 * (integer array) contact_fields

Optional parameters
-------------------

 * (string) delimiter
 * (integer) add_field_names_header
 * (string) language
 * (object) ftp_settings

Result Data Structure
---------------------

 * id:integer

Request example
---------------

 .. code:: json

    {
      "distribution_method":"ftp",
      "origin":"form",
      "origin_id":"123",
      "time_range":["2012-02-09","2012-04-02"],
      "contact_fields":["1","3","106533"],
      "delimiter":";",
      "add_field_names_header":1,
      "language":"en",
      "ftp_settings":
      {
        "host":"www.example.com",
        "port":"1234",
        "username":"user",
        "password":"pass",
        "folder":"path/of/a/folder"
      }
    }

Result Example
--------------

 .. code:: json

    {
      "replyCode":0 ,
      "replyText":"OK",
      "data":
      {
        "id":2140
      }
    }

Errors
------

 .. list-table:: Possible error codes

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
