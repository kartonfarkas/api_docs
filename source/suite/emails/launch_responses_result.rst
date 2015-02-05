Querying Responses Result
=========================

Lists the contact IDs for the email campaigns, based on the :doc:`launch_responses` endpoint.

.. note::

   The results are available for 2 hours after the query is made.

Endpoint
--------

``GET /api/v2/email/responses/{query_id}``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - query_id
     - int
     - Query ID from the ``Querying Responses`` response
     -

Result Example
--------------

Normal Result:

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

Error Condition:

.. code-block:: json

   {
      "replyCode":202,
      "replyText":"The requested data is currently generated",
      "data":""
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 404
     - 6029
     - There is no job with the provided id
     -
