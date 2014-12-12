Querying Interface Languages
============================

.. warning::

   Accessing the administrator endpoints might be limited. If you need access, please contact Emarsys Support.

Returns the list of available interface languages.

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
