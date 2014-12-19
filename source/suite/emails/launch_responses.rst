Querying Responses
==================

The goal of this call is to list the contacts who reacted to the email campaigns in the given time interval
the same way, for example all contacts who opened emails.

A call to this endpoint starts a background query and returns a query ID which can be used to poll the
:doc:`launch_responses_result` endpoint for the results. Ideally, the results will be available
in some minutes.

.. note::

   This endpoint is rate limited. Within a minute, a customer can do only one request.

Endpoint
--------

``GET /api/v2/email/responses``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - type
     - string
     - Reaction of contacts to emails, it can be 'opened', 'not_opened', 'received', 'clicked', 'not_clicked',
       'bounced', 'hard_bounced', 'soft_bounced' or 'block_bounced' (a link in the email).
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - start_date
     - string
     - date from which we would like to return the states
     -
   * - end_date
     - string
     - date until which we would like to return the states
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": 20
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
     - 6026
     - No such response type
     -
   * - 400
     - 6027
     - Invalid date format
     -
   * - 423
     - 6028
     - Cannot run filters that often
     -
