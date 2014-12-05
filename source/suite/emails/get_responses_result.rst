Get Responses Result
====================

Lists the contact IDs for an email state.

Endpoint
--------

``GET /api/v2/email/{id}/responses``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - id
     - int
     - the result ID from the responses api call
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "contact_ids": [
            "749678081",
            "176415518"
         ]
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
   * - 404
     - 6029
     - There is no job with the provided id
     -
   * - 202
     - 6030
     - The requested data is currently generated
     -
