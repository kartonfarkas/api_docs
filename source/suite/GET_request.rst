GET Request Example
===================

Let’s start coding.

As the first step of using the Suite API, let us see if we can communicate with it properly (up to now we only used the API demo page). For this purpose we chose a simple GET request: retrieving the list of supported languages.

The tricky part here is to create the X-WSSE part of the HTTP header, which is used for authentication. You can read more about the authentication header `here <http://documentation.emarsys.com/?page_id=1786>`_.

Please look at the following code:

.. code-block:: php

   <?php
   echo "Hello World aka Requesting the languages\n";

   /**
    * Connection data. Change with your own ones.
    */
   $username = "bob001";   // TODO change with your data
   $secret = "Xfgfuv21JFHHvsfM9vA";  // TODO change with your data
   $suiteApiUrl = "http://suite5.emarsys.net/api/v2/"; // TODO change with your data

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_HTTPGET, 1);
   curl_setopt($ch, CURLOPT_HEADER, true);

   $requestUri = $suiteApiUrl . "language";
   curl_setopt($ch, CURLOPT_URL, $requestUri);

   /**
    * We add X-WSSE header for authentication.
    * Always use random 'nonce' for increased security.
    * timestamp: the current date/time in UTC format encoded as
    *   an ISO 8601 date string like '2010-12-31T15:30:59+00:00' or '2010-12-31T15:30:59Z'
    * passwordDigest looks sg like 'MDBhOTMwZGE0OTMxMjJlODAyNmE1ZWJhNTdmOTkxOWU4YzNjNWZkMw=='
    */
   $nonce = 'd36e316282959a9ed4c89851497a717f';
   $timestamp = gmdate("c");
   $passwordDigest = base64_encode(sha1($nonce . $timestamp . $secret, false));
   curl_setopt($ch,CURLOPT_HTTPHEADER, array("X-WSSE: UsernameToken ".
       "Username=\"$username\", ".
       "PasswordDigest=\"$passwordDigest\", ".
       "Nonce=\"$nonce\", ".
       "Created=\"$timestamp\", ",
       'Content-Type: application/json'));

   $output = curl_exec($ch);
   curl_close($ch);

   echo $output;
   ?>

Replace the values marked by TODO comments with your real values and run this code snippet.

It will fetch the supported languages via the Suite API, and you should get a response similar to the following:

.. code-block:: php

   Hello World aka Requesting the languages
   HTTP/1.1 200 OK
   Date: Tue, 28 Jan 2014 16:15:11 GMT
   Server: Apache/2.2.16 (Debian)
   X-Powered-By: PHP/5.3.3-7+squeeze18
   Vary: Accept-Encoding
   Content-Length: 1298
   Content-Type: text/html; charset=utf-8

   {"replyCode":0,"replyText":"OK","data":[{"id":"ar","language":"arabic"},
   {"id":"bg","language":"bulgarian"},{"id":"cn","language":"chinese (simplified)"},
   {"id":"zh","language":"chinese (traditional)"},{"id":"hr","language":"croatian"},
   {"id":"cz","language":"czech"},{"id":"dk","language":"danish"},{"id":"nl","language":"dutch"},
   {"id":"en","language":"english"},{"id":"et","language":"Estonian"},{"id":"fi","language":"finnish"},
   {"id":"fr","language":"french"},{"id":"de","language":"german"},{"id":"EL","language":"greek"},
   {"id":"he","language":"hebrew"},{"id":"hi","language":"Hindi"},{"id":"hu","language":"hungarian"},
   {"id":"it","language":"italian"},{"id":"jp","language":"japanese"},{"id":"ko","language":"korean"},
   {"id":"lv","language":"Latvian"},{"id":"mk","language":"macedonian"},
   {"id":"mo","language":"moldavian"},{"id":"no","language":"norwegian"},
   {"id":"pl","language":"polish"},{"id":"pr","language":"portuguese"},
   {"id":"ro","language":"romanian"},{"id":"ru","language":"russian"},{"id":"sc","language":"Serbian"},
   {"id":"sr","language":"serbocroatian"},{"id":"sk","language":"slovak"},
   {"id":"sl","language":"slovenian"},{"id":"es","language":"spanish"},
   {"id":"sv","language":"swedish"},{"id":"th","language":"thai"},{"id":"tr","language":"turkish"},
   {"id":"uk","language":"ukrainian"}]}

If you did not succeed, please do the following:

 * read the error message or the output
 * set  CURLOPT_VERBOSE as follows and examine the output:

.. code-block:: php

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_HTTPGET, 1);
   curl_setopt($ch, CURLOPT_HEADER, true);
   curl_setopt($ch, CURLOPT_VERBOSE, true);

 * contact your Account Manager with this information and they will help you to identify the problem.


