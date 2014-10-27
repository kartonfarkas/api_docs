Update E-Mail Source
====================

Defines **Using API** as recipient source for an email in eMarketing Suite. Using this option, the contact source can later be set using this API call.

Endpoint
--------

``POST /api/v2/email/<id>/updatesource``

Parameters
----------

.. list-table:: **Required parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - filterId, contactlistId
     - int
     -
     - at least one property must be sent and must not be 0 (zero). If both are sent, only one must be different from 0 (zero)

JSON Payload Example
--------------------

.. code-block:: json

   {
     "filterId":"1121",
     "contactlistId":"0"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode":0,
     "replyText":"OK",
     "data":true
   }

Errors
------

.. list-table:: Possible error codes

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 10001
     - filterId must be an integer
     - The filter ID must be an integer.
   * - 400
     - 10001
     - contactlistId must be an integer
     - The contact list ID must be an integer.
   * - 400
     - 10001
     - You have to fill either filterId or contactlistId
     - A contact list ID or a filter ID must be specified. This error message is returned if either both or none are specified.
   * - 400
     - 6004
     - Invalid email ID
     - No email was found with the given ID, or the source was not set to “Using the API”.
   * - 400
     - 6004
     - No email ID provided
     - Missing parameter: emailId

