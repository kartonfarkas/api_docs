Listing a Choice List
=====================

Returns the choice options (possible values) of a field.

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
     - Values
     - Comments
   * - /translate/<id>
     - string
     - <id> can be: en, de, ru, …
     - For a full list of supported languages, see the `list of language codes. <http://documentation.emarsys.com/?page_id=424>`_

Result Data Structure
---------------------

 * id: integer
 * choice: string

Where *id* is the internal identifier of the choice, and *choice* is the name of the choice

URI Example
-----------

List the choices of the field with ID ’5′ in French:

/api/v2/field/5/choice/translate/fr

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0 ,
     "replyText": "OK",
     "data":
     [
       {
         "id": "1"
         "choice": "HTML"
       },
       {
         "id": "2"
         "choice": "Text only"
       }
     ]
   }

Errors
------

The standard HTML status and error codes.
