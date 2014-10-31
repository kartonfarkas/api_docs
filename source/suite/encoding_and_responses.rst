Encoding and Responses
======================

 * When sending requests, make sure you meet the following `prerequisites <http://documentation.emarsys.com/?page_id=1131>`_.
 * Have a look at the encoding guidelines below.
 * Incorrect requests will result in errors, i.e. HTTP responses. Success or failure of a request must be checked against the HTTP status codes; a detailed list can be found `here <http://documentation.emarsys.com/?page_id=2424>`_.

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

replyCode:<value>
replyText:<value>
data:<value>

If no error occurred, the reply code is 0 (zero). Any other value indicates a problem which must be solved.

