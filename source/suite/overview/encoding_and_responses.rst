Encoding and Responses
======================

Encoding
--------

 * The parameters should be URL encoded:
   The ‘/’ character has to be sent doubled (‘//’) in order to get the expected results.
 * If the key field is a multi-choice field, the choices have to be separated by commas in the request URI.

Example
-------


 * *Content type* is ‘application/json’
 * Return values:
   The API sends data encapsulated in the following JSON structure:

 * replyCode: <value>
 * replyText: <value>
 * data: <value>

If no error occurred, the reply code is 0 (zero). Any other value indicates a problem which must be solved.

