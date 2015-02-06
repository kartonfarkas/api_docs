Authentication
==============

Every call to the API must be authenticated, which must be done by adding a custom HTTP header (X-WSSE) with your
username and secret for the API (please request them from your contact person).
This page contains detailed instructions on how to create valid headers for the Suite REST API.

X-WSSE Format
-------------

The header has the following format, usually a single HTTP header line which we broke down into multiple lines for easier readability:

.. code-block:: http

   X-WSSE: UsernameToken
   Username="customer001",
   PasswordDigest="ZmI2ZmQ0MDIxYmQwNjcxNDkxY2RjNDNiMWExNjFkZA==",
   Nonce="d36e3162829ed4c89851497a717f",
   Created="2014-03-20T12:51:45Z"

The following sections describe each component in detail:

**X-WSSE**

This is the name of the HTTP header we use for authenticating the request.

.. note::

   You can also use the WSSE header name, however, we recommend that you stick to X-WSSE.

**UsernameToken**

This is the authentication method, and must contain a UsernameToken as we only
support token-based authentication.

**Username**

This field contains the username your Account Manager gave you. It is usually in the following
format: account_name00X, where X is a digit.

.. note:: Always substitute your own API user name for each request.

**PasswordDigest**

This field contains the hashed token which will prove the authenticity of your request. It is essential
that you recompute this hash for every request as a hash is only valid for a certain period of time, and then it expires. You can read more about how to compute below.

**Nonce**

This is a random value used to make your request unique so it cannot be replicated by any other unknown
party. This string is always 16 bytes long and should be represented as a 32 characters long hexadecimal value.

**Created**

This field contains the current UTC, GMT, ZULU timestamp (YYYY-MM-DD-HH:MM:SS) according to the ISO8601 format, e.g. `2014-03-20 12:51:45+01:00`.

You can use any timezone you want as long as it is defined in the timestamp, but recommend that you use UTC time as this is the global Emarsys
standard.

.. note::

   The Created timestamp must be within **five** minutes of the Emarsys server's time. If it is not within the specified timeframe, the request will be rejected. We recommend using NTP to synchronize your time.

**Computing the Password Digest**

Computing the password digest involves 5 simple steps:

 1. Get a randomly generated 16 byte Nonce formatted as 32 hexadecimal characters.
 2. Get the current Created timestamp in ISO8601 format.
 3. Concatenate the following three values in this order: nonce, timestamp, secret.
 4. Calculate the SHA1 hash value of the concatenated string, and make sure this value is in hexadecimal
    format! Some languages, like PHP, output hexadecimal hash by default. You may need to use special methods
    to obtain hexadecimal hashes in different languages or even convert byte to hex values by hand (see the
    sample codes below for more information).
 5. Apply a BASE64 encoding to the resulted hash to get the final PasswordDigest value.

**Sample Codes**

Sample codes are available in these languages:

.. toctree::

   authentication_php
   authentication_perl
   authentication_ruby
   authentication_java
