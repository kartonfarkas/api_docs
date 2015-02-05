Listing Email Campaigns
=======================

Returns the list of the email campaigns.

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
   * - /status
     - int
     - Part of the URI
     -
   * - /contactlist
     - int
     - Part of the URI
     -
   * - /showdeleted
     - int
     - Part of the URI
     - If showdeleted is set to 1, deleted campaigns are also listed.
   * - /fromdate
     - int
     - Part of the URI
     - If *fromdate* is set, only those campaigns will be listed which were created after the given date, accepted format YYYY-MM-DD, example: 2013-01-25.
   * - /todate
     - int
     - Part of the URI
     - If *todate* is set, only those campaigns will be listed which were created before the given date, accepted format YYYY-MM-DD, example: 2013-01-25.

For a list of possible values for <id>, see :doc:`../appendices/email_status`.
You can combine the *fromdate* and *todate* parameters, and if two or more parameters are used then they must be separated by an & (ampersand).

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
         "html_source": "Hello $Last Name$. How are you?",
         "text_source": "Hello $Last Name$ http://login.emarsys.net/u/nrd.php?p=$uid$_$llid$_$cid$_$sid$_2"
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
         "html_source": "Hello $Last Name$. How are you?",
         "text_source": "Hello $Last Name$ http://login.emarsys.net/u/nrd.php?p=$uid$_$llid$_$cid$_$sid$_2"
       }
     ]
   }

Where:

* *id* = The internal identifier of the email
* *name* = The name of the email
* *fromemail* = The sender email address
* *fromname* = The sender name
* *subject* = The email subject line
* *email category* = The category identifier for this email. Categories can be retrieved via :doc:`../emails/email_categories`.
* *filter* = The filter identifier. Available filters can be retrieved via :doc:`../contacts/segment_list`.
* *contactlist* = The contact list identifier. Contact lists can be retrieved via :doc:`../contacts/contact_list_list`.
* *cc_list* = The contact list ID, if the email is sent, this contact list also receives it. Only works if BCC List is enabled.
* *status* = See :doc:`../appendices/email_status`.
* *api_status* = See :doc:`../appendices/launch_status`.
* *api_error* = See :doc:`../appendices/error_codes`.
* *source* = Where the recipient originated, possible values are: **userlist, profile, api**

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


