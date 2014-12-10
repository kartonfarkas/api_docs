Querying Responses
==================

Returns the contact email activity within a particular time interval.

.. note::

   Within a minute, a customer can launch only one call.

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
     - Reaction of contacts to emails, it can be 'opened', 'notopened', 'received', 'clicked' and 'notclicked' (a
       link in the email).
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
