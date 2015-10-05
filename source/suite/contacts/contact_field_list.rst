.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/contacts/list-field-choices/

Listing Available Fields
========================

Returns a list of all available fields which can be used to personalize content (including custom fields and vouchers).

Endpoint
--------

``GET /api/v2/field``

Parameters
----------

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - <translate_id>
     - string
     - Any two letter ISO 639-1 abbreviation, e.g. en, de, ru, etc.
     - For a full list of supported languages, see :doc:`../appendices/language_codes`.

URI Example
-----------

* ``/api/v2/field/translate/en``

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     [
       {
         "id": "0",
         "name": "Interests",
         "application_type": "interests"
       },
       {
         "id": "1",
         "name": "First Name",
         "application_type": "shorttext"
       },
       {
         "id": "9",
         "name": "Title",
         "application_type": "singlechoice"
       },
       {
         "id": "123",
         "name": "CustomField18",
         "application_type": "numeric"
       },
       {
         "id": "456",
         "name": "Voucher42",
         "application_type": "voucher"
       }
     ]
   }

Errors
------

Standard HTML status and error codes apply.
