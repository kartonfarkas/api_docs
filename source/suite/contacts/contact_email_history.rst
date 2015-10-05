.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/contacts/email-history/

Querying Contact Email History
==============================

Returns a list of email campaign launch data for specified contacts, can also be restricted to specified timeframe (optional).

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
     - Integer array which contains the contact IDs to include
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - startDate
     - date
     - Used to filter emails by the date the launch was initiated
     -
   * - endDate
     - date
     - Used to filter emails by the date the launch completed
     -

Request Example
---------------

.. code-block:: json

   {
     "startDate": "2014-11-05",
     "endDate": "2014-11-05",
     "contacts": [176415518, 749678081]
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     [
       {
         "emailId": 100017517,
         "contactId": "749678081",
         "launch_date": "2014-11-05 09:42:00",
         "delivery_status": "launched",
         "bounce_status": "soft"
       },
       {
         "emailId": 100017517,
         "contactId": "176415518",
         "launch_date": "2014-11-05 09:42:00",
         "delivery_status": "launched",
         "bounce_status": "soft"
       }
     ]
   }

Resulting Data Structure
------------------------

.. code-block:: json

     {
       "emailId": "integer",
       "contactId": "integer",
       "launch_date": "date",
       "delivery_status": "string",
       "bounce_status": "string"
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
