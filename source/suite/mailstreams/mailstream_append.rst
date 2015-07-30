Append to Mail Stream
=====================

When creating a mail stream, the mail template was already defined. Therefore, simply POST recipient data in a flat CSV format to a mail stream to send mails. The request must have a Content-Type header with value `text/csv`

This triggers merging the recipient data with the mail template. Once a mail is generated, it is queued for sending.

Endpoint
--------

``POST /api/v2/mailstream/<mailstream_id>``

Response
--------

The response of the request contains information about all recipient records in the request. The response format is CSV with the following columns:

* line - location of the recipient record from the request, with the header line being 1.
* recipient_id - generated unique recipient ID. Only available if recipient record is valid.
* error - message describing the reason why the record was invalid. Only available for invalid records.

Request Example
---------------

Request containing one valid and one invalid recipient record.

.. code-block:: csv

   EMAIL,FIRSTNAME
   kaylee@example.com,Kaywinnet
   invalid@example.com

Result Example
--------------

.. code-block:: csv

   line,recipient_id,error
   2,995893849,
   3,,"Invalid number of columns."

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
     - 2001
     - The 'EMAIL' field must be specified.
     - The CSV header did not contain the required 'EMAIL' field.
   * - 400
     - 2004
     - <depends on error>
     - Recipient data could not be parsed, mail stream is inactive or the media type is wrong.
   * - 403
     - 7001
     - Sending suspended. Please contact the support@sendkit.com
     - The maximum number of mails per month is reached.
   * - 403
     - 7002
     - <depends on error>.
     - Either the number of recipient records or the size of a single record exceeed the maximum limit.
   * - 403
     - 7003
     - The maximum request rate limit has been exceeded ([limit])
     - The maximum number of mails per hour exceeded.
   * - 403
     - 9001
     - Mail stream '[mailstream id]' is not active.
     - The Mail Stream is not active and cannot be used for sending.
   * - 404
     - 2002
     - Mail Stream '[mailstream id]' does not exist.
     - A mail stream with the specified ID does not exist.
