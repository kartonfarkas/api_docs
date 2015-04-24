Querying Responses
==================

Generates a list of all contacts who reacted a certain way to email campaigns during a specified time-frame, e.g. all contacts who opened emails.

A call to this endpoint starts a background query that returns a query ID, which can the be used to poll the
:doc:`launch_responses_result` endpoint for the results. As this method requires multiple steps, it may take a few minutes for the results to come back.

.. note::

   This endpoint is rate limited, meaning that only one request per minute can be made.

Endpoint
--------

``POST /api/v2/email/responses``

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
     - * Reaction of contacts to emails which can be:
       * 'opened'
       * 'not_opened'
       * 'received'
       * 'clicked',
       * 'not_clicked' (a link in the email)
       * 'bounced'
       * 'hard_bounced'
       * 'soft_bounced'
       * 'block_bounced'.
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
     - Date from which we would like to return the states
     -
   * - end_date
     - string
     - Date until which we would like to return the states
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
   :widths: 20 20 40 40

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
