.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/customers/administrator-ui-languages/

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

Where the strings are the two-letter language identifiers according to :doc:`../appendices/language_codes`.
