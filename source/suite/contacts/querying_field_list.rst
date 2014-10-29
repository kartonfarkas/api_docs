Querying Field List
===================

Returns a list of fields (including custom fields and vouchers) which can be used to personalize content.

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
     - Values
     - Comments
   * - /translate/<id>
     - string
     - <id> can be: en, de, ru, …
     - For a full list of supported languages, see the `list of language codes. <http://documentation.emarsys.com/?page_id=424>`_

Result Data Structure
---------------------

id:integer, name:string, application_type:string
id:integer, name:string, application_type:string
id:integer, name:string, application_type:string
…

Result Example
--------------

.. code-block:: json

   {
     "replyCode":0,
     "replyText":"OK",
     "data":
     [
       {
         "id":"0",
         "name":"Interests"
         "application_type":"interests"
       },
       {
         "id":"1",
         "name":"First Name"
         "application_type":"shorttext"
       },
       {
         "id":"9" ,
         "name":"Title"
         "application_type":"singlechoice"
       },
       …
       {
         "id":"123",
         "name":"CustomField18"
         "application_type":"numeric"
       },
         …
       {
         "id":"456",
         "name":"Voucher42"
         "application_type":"voucher"
       }
     ]
   }

Errors
------

The standard HTML status and error codes.
