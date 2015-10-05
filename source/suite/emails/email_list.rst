.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/email/list-campaigns/

Listing Email Campaigns
=======================

Returns a list of all available email campaigns, or the data of a campaign if it is specified with its ID. It also
lists selected campaigns by using optional parameters to limit the results, e.g. all campaigns launched until a given date.

Endpoint
--------

``GET /api/v2/email``

Parameters
----------

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - id
     - int
     - ID of a specific email
     -
   * - status
     - int
     - Status of the email, part of the URI
     - See :doc:`../appendices/email_status`.
   * - contactlist
     - int
     - 0 if no contact list is set, otherwise it is the contact list ID, part of the URI
     -
   * - showdeleted
     - int
     - If *showdeleted* is set to 1, deleted campaigns are also listed, part of the URI
     -
   * - fromdate
     - date
     - If *fromdate* is set, only those campaigns will be listed which were created after the given date, part of the URI
     - The accepted format is YYYY-MM-DD, example: 2013-01-25.
   * - todate
     - date
     - If *todate* is set, only those campaigns will be listed which were created before the given date, part of the URI
     - The accepted format is YYYY-MM-DD, example: 2013-01-25.

You can combine the *fromdate* and *todate* parameters, and if two or more parameters are used then they must be
separated by an & (ampersand).

URI Example
-----------

* ``/api/v2/email/status=3``
* ``/api/v2/email/contactlist=123``
* ``/api/v2/email/showdeleted=1``
* ``/api/v2/email/status=3&contactlist=123&showdeleted=1``
* ``/api/v2/email/fromdate=2013-01-01&todate=2013-02-01``

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     [
       {
         "id": "12345",
         "root_email": "0",
         "language": "en",
         "created": "2011-08-12 18:12:23",
         "deleted": "",
         "name": "be_afraid_email",
         "status": "3",
         "api_status": "2",
         "api_error": "0",
         "fromemail": "malekith@example.com",
         "fromname": "Malekith",
         "subject": "convergence",
         "email_category": "111111111",
         "filter": "222222222",
         "contactlist": "0",
         "cc_list": 0,
         "source": "userlist",
         "html_source": "<html>Hello $First Name$...</html>",
         "text_source": "Hello $First Name$..."
       },
       {
         "id": "67890",
         "root_email": "0",
         "language": "en",
         "created": "2011-08-12 18:20:23",
         "deleted": "2011-11-07 08:11:57",
         "name": "angry_email",
         "status": "3",
         "api_status": "2",
         "api_error": "0",
         "fromemail": "bruce.banner@example.com",
         "fromname": "Hulk",
         "subject": "I want to destroy you",
         "email_category": "111111111",
         "filter": "222222222",
         "contactlist": "0",
         "cc_list": 564365356,
         "source": "api",
         "html_source": "<html>Hello $First Name$...</html>",
         "text_source": "Hello $First Name$..."
       }
     ]
   }

Where:

* *id* is the internal identifier of the email
* *name* is the name of the email in the Emarsys application
* *fromemail* is the sender email address
* *fromname* is the sender name
* *subject* is the email subject line
* *email_category* is the category identifier for this email, for more info see :doc:`../emails/email_categories`.
* *filter* is the filter identifier. Available filters can be retrieved via :doc:`../contacts/segment_list`.
* *contactlist* is the contact list identifier. Contact lists can be retrieved via :doc:`../contacts/contact_list_list`.
* *cc_list* is the ID of the contact list which will receive a copy of the email when sent. Only works if BCC List is enabled.
* *status* is the status of the email, for more info see :doc:`../appendices/email_status`.
* *api_status* is the launch status of the email, for more info see :doc:`../appendices/launch_status`.
* *api_error* is any specific error related to the endpoints or methods, for more info see :doc:`../appendices/error_codes`.
* *source* is where the recipient originated, possible values are: **userlist, profile, api**

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
     - Invalid filter: <filter>
     - The specified filter is not supported.
   * - 400
     - 6003
     - Invalid email status in filter: <status>
     - The specified status is not valid.
   * - 4000
     - 10001
     - Invalid contact list ID: <id>
     - The specified contact list ID is not valid.
