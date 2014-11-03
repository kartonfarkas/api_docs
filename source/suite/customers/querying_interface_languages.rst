Querying Interface Languages
============================

.. warning::

   The administrator API is available only from specific IP addresses. For more information, please contact emarsys support.

This returns the list of available interface languages.

Endpoint
--------

``GET /api/v2/administrator/getinterfacelanguages``

Result Data Structure
---------------------

 * string, string, ...

Where the strings are the two-letter identifiers of the languages.

Result Example
--------------

.. code-block:: json

   {
       "replyCode": 0,
       "replyText": "OK",
       "data":
       [
           "en",
           "de",
           "fr",
           "tr",
           "ru",
           "zh",
           "cn"
       ]
   }

