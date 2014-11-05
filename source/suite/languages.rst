Querying Languages Lists
========================

Returns a list of languages which you can use in email creation.

Endpoint
--------

``GET /api/v2/language``

Parameters
----------

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Values
     - Comments
   * - /translate/<language_code>
     -
     - Language_code is one of the IDs returned in the list (e.g. en).
     -

For a list of supported languages, see the list of `language codes <http://documentation.emarsys.com/?page_id=417>`_ .

Result Data Structure
---------------------

 * id: string, language: string
 * id: string, language: string
   …

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       {
         "id": "en",
         "language": "english"
       },
         {
           "id": "de",
           "language": "german"
         },
           {
             "id": "ru",
             "language": "russian"
           }
     }
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 1002
     - Invalid language code
     - The requested language code is not supported. For a list of supported languages, see the `list of language codes <http://documentation.emarsys.com/?page_id=417>`_ .

