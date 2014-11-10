Viewing Response Summaries
==========================

Returns the summary of the responses of a launched, paused, activated or deactivated email.

Endpoint
--------

``GET /api/v2/email/<id>/responsesummary``

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
     - the ID of the email
     -

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "sent": "1",
       "planned": "2",
       "soft_bounces": "3",
       "hard_bounces": "4",
       "block_bounces": "5",
       "opened": "6",
       "unsubscribe": "7",
       "total_clicks": "8",
       "unique_clicks": "9"
     }
   }

Where:

 * *sent* = the number of emails which have actually left the eMarketing Suite mail servers
 * *planned* = the number of all contacts which are assigned to this launch
 * *soft_bounces* = the number of emails which were bounced (returned to sender) due to temporary problems
 * *hard_bounces* = the number of emails which were bounced (returned to sender) due to permanent problems
 * *block_bounces* = the number of emails which were bounced (returned to sender) due to being blocked by spam filters
 * *opened* = the number of emails which were opened by recipients; the open rate refers to graphic (HTML) emails only, where the images were downloaded.
 * *unsubscribe* = the number of clicks on the unsubscribe link
 * *total_clicks* = the number of total clicks (multiple clicks per contact are counted) on links tracked by eMarketing Suite within an email
 * *unique_clicks* = the number of unique clicks (one click per contact is counted) on links tracked by eMarketing Suite within an email

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 6400
     - Invalid email ID
     - No email with the provided ID exists.
   * - 400
     - 6003
     - Invalid email status
     - The status of the email is not one of the following: launched, paused, activated, deactivated.




