Listing Available Field Choices
===============================

Generates a list of all available options for any given single- or multichoice field.

Endpoint
--------

``GET /api/v2/field/<list_id>/choice``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - list_id
     - int
     - Field ID, part of the URI
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - lang
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
      "replyCode": 0,
      "replyText": "OK",
      "data": [
         {
            "id": "1",
            "choice": "Masculin"
         },
         {
            "id": "2",
            "choice": "Féminin"
         }
      ]
   }

Errors
------

Standard HTML status and error codes apply.
