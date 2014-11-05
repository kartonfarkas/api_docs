Getting Contact History
=======================

Returns all the emailIDs for all the contacts you specified.

Endpoint
--------

``POST /api/v2/contact/getcontacthistory``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - contacts
     - array
     - contacts is an integer array which contains the contact IDs to check.
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Values
     - Comments
   * - startDate, endDate
     - date
     - can be used to filter the launch date of emails.
     -


Result Data Structure
---------------------

.. code-block:: json

   [
     {
       emailId:integer
       contactId:integer
       launch_date:date
       delivery_status:string
       bounce_status:string
     }
   ]

JSON Payload Example
--------------------

.. code-block:: json

   {
     "startDate":"2012-05-01",
     "endDate":"2012-06-01",
     "contacts":[15]
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode":0,
     "replyText":"OK",
     "data":
     [
       {
         "emailId":"123456",
         "contactId":"15",
         "launch_date":"2012-05-05",
         "delivery_status":"launched",
         "bounce_status":"soft"
       }
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
     - 10001
     - Missing parameter: contacts
     - contacts is a required parameter.
   * - 400
     - 10001
     - Contacts must be an integer array
     - contacts must be a comma-separated list of contact IDs.
   * - 400
     - 10001
     - Invalid data format for startDate/endDate. Date expected
     - Wrong date format.
   * - 400
     - 10001
     - Max. number of contacts: 1000
     -
