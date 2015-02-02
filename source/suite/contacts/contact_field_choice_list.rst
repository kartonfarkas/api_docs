Listing a Choice List
=====================

Generates a list of all available options for any given field.

Endpoint
--------

``GET /api/v2/field/<id>/choice``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - <id>
     - int
     - Field ID, part of the URL
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - /translate/<id>
     - string
     - Lists available translations where <id> defines the target language (e.g. fr, ru, etc.)
     - For a full list of supported languages, see :doc:`../appendices/language_codes`.

URI Example
-----------

List the choices of the field with ID ’5′ in French:

* ``/api/v2/field/5/choice/translate/fr``

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0 ,
     "replyText": "OK",
     "data":
     [
       {
         "id": "1",
         "choice": "HTML"
       },
       {
         "id": "2",
         "choice": "Text only"
       }
     ]
   }

Where:

* *id* is the internal identifier of the chosen option, and *choice* is the label of the chosen option

Errors
------

Standard HTML status and error codes apply.
