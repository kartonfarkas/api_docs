Authentication
==============

Every call to the API must be authenticated. This must be done by adding a custom HTTP (X-WSSE) header.
This page contains the detailed description on how to create valid headers for the eMarketing
Suite API.

X-WSSE Format
-------------

The header has the following format (it is one HTTP header line, we just broke it into multiple lines for readability):

.. code-block:: http

   X-WSSE: UsernameToken
   Username="customer001",
   PasswordDigest="ZmI2ZmQ0MDIxYmQwNjcxNDkxY2RjNDNiMWExNjFkZA==",
   Nonce="d36e3162829ed4c89851497a717f",
   Created="2014-03-20T12:51:45Z"

The following sections describe each part in detail:

**X-WSSE**

This is the name of the HTTP header we use for authenticating the request.

.. note::

   You can also use the WSSE header name, however, we recommend you to stick to X-WSSE.

**UsernameToken**

This is the authentication method. This field must contain UsernameToken as we are only
supporting token-based authentication.

**Username**

This field contains the username given to you by your Account Manager. It is usually in the following
format: account_name00X, where X is a digit. Always substitute your own API user name for each request.

**PasswordDigest**

This field contains the hashed token which will prove the authenticity of your request. It is essential
that you recompute this hash for every request since a hash is only valid for a certain period of time. You can read more about how to compute below.

**Nonce**

This is a random value used to make your request unique so it cannot be repeated by an unknown third
party. This string is always 16 bytes long and should be represented as a 32 characters long hexadecimal value.

**Created**

This field contains the current UTC, GMT, ZULU timestamp in ISO8601 format.

Please note that you can use any timezone you want, but it has to be indicated in the timestamp. Here is
an example: `2014-03-20T12:51:45+01:00`. We still recommend using UTC time as this is the global Emarsys
standard.

**Computing the Password Digest**

Computing the password digest takes 5 simple steps:

 1. Get a random 16 byte nonce formatted as 32 hexadecimal characters.
 2. Get the current timestamp in ISO8601 format.
 3. Concatenate the following three values in this order: nonce, timestamp, secretKey.
 4. Calculate the SHA1 hash value of the above concatenated string. Make sure this value is in hexadecimal
    format. Some languages, like PHP, output hexadecimal hash by default. You may need to use special methods
    to obtain hexadecimal hashes in different languages or even convert byte to hex values by hand. See the
    sample codes below for more information.
 5. Apply a BASE64 encoding to the resulted hash to get the final PasswordDigest value.

**Sample Codes**

Sample codes are available in these languages:

.. toctree::

   authentication_php
   authentication_perl
   authentication_ruby
   authentication_java
