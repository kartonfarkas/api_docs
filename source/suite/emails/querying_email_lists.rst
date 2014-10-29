Querying E-Mail Lists
=====================

Returns a list of emails.

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
     - (Part of the URI)
     -
   * - /contactlist
     - int
     - (Part of the URI)
     -
   * - /showdeleted
     - int
     - (Part of the URI)
     - If showdeleted is set to 1, deleted campaigns are also listed.
   * - /fromdate
     - int
     - (Part of the URI)
     - If fromdate is set, only those campaigns will be listed which were created after the given date, accepted format YYYY-MM-DD, example: 2013-01-25.
   * - /todate
     - int
     - (Part of the URI)
     - If todate is set, only those campaigns will be listed which were created before the given date, accepted format YYYY-MM-DD, example: 2013-01-25.

For a list of possible values for <id>, see `E-Mail Statuses <http://documentation.emarsys.com/?page_id=426>`_
You can combine the fromdate and todate parameters.
If two or more parameters are used, they must be separated by an & character.

Result Data Structure
---------------------

id:integer
root_email:integer
language:string
created:datetime
deleted:datetime
name:string
fromemail:string
fromname:string
subject:string
email_category:integer
filter:integer
contactlist:integer
status:integer
api_status:integer
api_error:integer
source:string
…, where

 * **id** = The internal identifier of the email.
 * **name** = The name of the email
 * **fromemail** = The sender email address
 * **fromname** = The sender name
 * **subject** = The email subject line
 * **email category** = The category identifier for this email. Categories can be retrieved via `/api/v2/emailcategory <http://documentation.emarsys.com/?page_id=164>`_.
 * **filter** = The filter identifier. Available filters can be retrieved via `/api/v2/filter <http://documentation.emarsys.com/?page_id=114>`_.
 * **contactlist** = The contact list identifier. Contact lists can be retrieved via `/api/v2/contactlist <http://documentation.emarsys.com/?page_id=184>`_.
 * **status** = See `E-Mail Statuses <http://documentation.emarsys.com/?page_id=426>`_
 * **api_status** = See `API launch statuses <http://documentation.emarsys.com/?page_id=426>`_
 * **api_error** = See `API launch errors <http://documentation.emarsys.com/?page_id=422>`_
 * **source** = The source of the recipients. Possible values are: **userlist, profile, api**

URI Example
-----------

/api/v2/email/status=3
/api/v2/email/contactlist=123
/api/v2/email/showdeleted=1
/api/v2/email/status=3&contactlist=123&showdeleted=1
/api/v2/email/fromdate=2013-01-01&todate=2013-02-01

Result Example
--------------

.. code-block:: json

   {
     "replyCode":0,
     "replyText":" OK",
     "data":
     [
       {
         "id":"12345"
         "root_email":"0"
         "language":"en"
         "created":"2011-08-12 18:12:23"
         "deleted":""
         "name":"Test1"
         "status":"3"
         "api_status":"2"
         "api_error":"0"
         "fromemail":"emarsys@emarsys.net"
         "fromname":"emarsys"
         "subject":"Test mail"
         "email_category":"11111"
         "filter":"22222"
         "contactlist":"0"
         "source":"userlist"
         "html_source":"Hello $Last Name$. How are you?"
         "text_source":"Hello $Last Name$
         http://login.emarsys.net/u/nrd.php?p= $uid$_$llid$_$cid$_$sid$_2
       }
       {
         "id":"67890"
         "root_email":"0"
         "language":"en"
         "created":"2011-08-12 18:20:23"
         "deleted":"2011-11-07 08:11:57"
         "name":"Test2"
         "status":"3"
         "api_status":"2"
         "api_error":"0"
         "fromemail":"emarsys@emarsys.net"
         "fromname":"emarsys"
         "subject":"Test mail"
         "email_category":"11111"
         "filter":"22222"
         "contactlist":"0"
         "source":"api"
         "html_source":"Hello $Last Name$. How are you?"
         "text_source":"Hello $Last Name$ http://login.emarsys.net/u/nrd.php?p= $uid$_$llid$_$cid$_$sid$_2
       }
     ]
   }

Errors
------

.. list-table:: Possible Error Codes

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
     - Invalid contact list id: <id>
     - The specified contact list ID is not valid.


