Querying Interface Languages
============================

Returns the list of available interface languages.

.. include:: _warning.rst

Endpoint
--------

``GET /api/v2/administrator/getinterfacelanguages``

Result Example
--------------

.. code-block:: json

   {
       "replyCode": 0,
       "replyText": "OK",
       "data":
       {
           "en",
           "de",
           "fr",
           "tr",
           "ru",
           "zh",
           "cn"
       }
   }

Where the strings are the two-letter identifiers of the languages.
