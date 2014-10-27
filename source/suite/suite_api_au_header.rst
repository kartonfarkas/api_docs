Suite API Authentication Header
===============================

Every call to the API must be authenticated. This must be done by adding a custom HTTP (X-WSSE) header. This page contains the detailed description on how to create valid headers to use with the eMarketing Suite API.

X-WSSE format
-------------

The header has the following format:

X-WSSE: UsernameToken
Username="customer001",
PasswordDigest="ZmI2ZmQ0MDIxYmQwNjcxNDkxY2RjNDNiMWExNjFkZA==",
Nonce="d36e3162829ed4c89851497a717f",
Created="2014-03-20T12:51:45Z"

The following sections describe each part in detail:

X-WSSE
^^^^^^

This is the name of the HTTP header we use for authenticating the request.

Please note, that you can also use the WSSE header name, however we recommend you stick with X-WSSE.

UsernameToken
^^^^^^^^^^^^^

This is the authentication method. This field should always contain UsernameToken as we are only supporting token-based authentication.

Username
^^^^^^^^

This field contains the user name given to you by your Account Manager. It is usually in the following format: **account_name00X** where X is a digit. Always substitute your own API user name for each request.

PasswordDigest
^^^^^^^^^^^^^^

This field contains the hashed token which will prove the authenticity of your request. It is essential that you recompute this hash for every request since a hash is only valid for a certain period of time. You can read more about how to compute this below.

Nonce
^^^^^

This is a random value used to make your request unique so it cannot be repeated by an unknown third party. This string is always 16 bytes long and should be represented as a 32-character hexadecimal value.

Created
^^^^^^^

This field contains the current UTC, GMT, ZULU timestamp in ISO8601 format.

Please note that you can use any timezone you want, but it has to be indicated in the timestamp. Here is an example: 2014-03-20T12:51:45+01:00. We still recommend using UTC time as this is the global Emarsys standard.

Computing the password digest
-----------------------------

Computing the password digest takes 5 simple steps.

 * Get a random 16 byte nonce formatted as 32 hexadecimal characters
 * Get the current timestamp in ISO8601 format
 * Concatenate the following three values in this order: nonce timestamp secretKey
 * Calculate the SHA1 hash value of the above concatenated string. Make sure this value is in hexadecimal format.

   * Some languages, like PHP, output hexadecimal hash by default. You may need to use special methods to obtain hexadecimal hashes in different languages or even convert byte to hex values by hand. See the sample codes below for more information.

 * Apply a BASE64 encoding to the resulted hash to get the final PasswordDigest value

Sample codes
------------

Sample codes are available in 4 different languages.

 * `PHP <http://documentation.emarsys.com/?page_id=1140>`_
 * `Perl <http://documentation.emarsys.com/?page_id=1214>`_
 * `Ruby <http://documentation.emarsys.com/?page_id=1223>`_
 * `Java <http://documentation.emarsys.com/?page_id=1228>`_

