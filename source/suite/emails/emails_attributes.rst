E-Mail Attributes
=================

Returns the attributes of an email and the personalized text and HTML source.

Endpoint
--------

``GET /api/v2/email/<id>``

Parameters
----------

.. list-table:: **Required parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - id
     - integer
     - The id of the email
     - Part of the request URI

Result Data Structure
---------------------

.. list-table:: **Result Data Structure**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - id
     - integer
     - The internal identifier of the email
     -
   * - language
     - string
     - The language of the email
     -
   * - created
     - datetime
     - The creation date of the email
     -
   * - name
     - string
     - The name of the email
     -
   * - fromemail
     - string
     - The sender email address
     -
   * - fromname
     - string
     - The sender name
     -
   * - subject
     - string
     - The email subject line
     -
   * - email_category
     - integer
     - The category identifier of the email
     - Categories may be retrieved via the `quering category lists <emails_get_email_category_lists.html>`_ endpoint
   * - filter
     - integer
     - The filter identifier
     - Available filters can retrieved via the `querying available filters <../contacts/filters.html>`_ endpoint
   * - contactlist
     - integer
     - The contact list identifier
     - Contact lists may be retrieved via the `querying contact lists <../contacts/contact_lists.html>`_ endpoint
   * - html_source
     - string
     - The HTML source of the email
     -
   * - text_source
     - string
     - The text source of the email
     -
   * - status
     - integer
     - See `email statuses <statuses.html>`_
     -
   * - api_status
     - integer
     - See `API launch statuses <statuses.html>`_
     -
   * - api_error
     - integer
     - See `API launch errors <statuses.html>`_
     -
   * - source
     - string
     - The source of the recipients.
     - Possible values are:
        * userlist
        * profile
        * api

Result Example
--------------

.. code-block:: json

   {
     "replyCode":0,
     "replyText":" OK",
     "data":
     [
       {
         "id": "12345",
         "language": "en",
         "created": "2011-08-12 18:12:23",
         "name": "Test",
         "status": "3",
         "api_status": "2",
         "api_error": "0",
         "fromemail": "emarsys@emarsys.net",
         "fromname": "emarsys",
         "subject": "Test mail",
         "email_category": "11111",
         "filter": "22222",
         "contactlist": "0",
         "source": "api",
         "html_source": "Hello $Last Name$. How are you?",
         "text_source": "Hello $Last Name$ http://login.emarsys.net/u/nrd.php?p=$uid$_$llid$_$cid$_$sid$_2"
       }
     ]
   }

Errors
------

.. list-table:: Possible error codes

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 500
     - 1
     - Database connection error
     - An error occurred while saving.
   * - 400
     - 10001
     - Invalid email name
     - The name parameter contains forbidden characters.
   * - 400
     - 10001
     - An email with this name already exists
     - A unique name for the email must be provided.
   * - 400
     - 10001
     - Invalid language
     - The provided language code is not supported. For a list of supported languages, see the list of language codes.
   * - 400
     - 10001
     - Invalid value: contactlist
     - The contact list ID must be numeric.
   * - 400
     - 10001
     - Invalid value: filter
     - The filter ID must be numeric.
   * - 400
     - 10001
     - Invalid email address
     - The fromemail must be a valid email address.
   * - 400
     - 10001
     - Invalid value: fromname
     - The fromname parameter contains forbidden characters.
   * - 400
     - 10001
     - Subject must not be empty
     - The subject line must contain content.
   * - 400
     - 10001
     - Invalid value: email_category
     - The email category must be numeric.
   * - 400
     - 10001
     - You must select either a contact list or a filter.
     - A contact list ID or a filter ID must be specified. This error message is returned if either both or none are specified.
   * - 400
     - 10001
     - No content
     - Both the html_source and the text_source are empty.