Listing Email Campaign Launches
===============================

Lists all the launches of an email campaign, including launch ID, launch date and 'done' status.

Endpoint
--------

``POST /api/v2/email/getlaunchesofemail``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - emailId
     - int
     - ID of the email
     -

JSON Payload Example
--------------------

.. code-block:: json

   {
     "emailid": "1234"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": [
       {
         "id": "7555",
         "done": "y",
         "launch_date": "2012-05-05"
       },
       {
         "id": "7556",
         "done": "n",
         "launch_date": "2012-05-05"
       }
     ]
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
     - 10001
     - Missing parameter: [parameter]
     - The required parameter [parameter] is missing.
   * - 400
     - 10001
     - Invalid data format for [parameter]. Integer expected
     - The value for [parameter] is not an integer.
   * - 400
     - 6004
     - Invalid email ID
     - No email found.
   * - 400
     - 6003
     - Invalid email status
     - No launch exists for the email.