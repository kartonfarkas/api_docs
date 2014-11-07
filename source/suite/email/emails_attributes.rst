E-Mail Attributes
=================

Returns the attributes of an email and the personalized text and HTML source.

Endpoint
--------

``GET /api/v2/email/<id>``

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
     - The ID of the email, part of the request URI
     -

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
     - int
     - The internal ID of the email
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
     - The email address of the sender
     -
   * - fromname
     - string
     - The name of the sender
     -
   * - subject
     - string
     - The subject line of the email
     -
   * - email_category
     - int
     - The category ID of the email
     - Categories may be retrieved via the :doc:`emails_get_email_category_lists` endpoint
   * - filter
     - int
     - The filter ID
     - Available filters can be retrieved via the :doc:`../contacts/listing_segments` endpoint
   * - contactlist
     - int
     - The contact list ID
     - Contact lists may be retrieved via the :doc:`../contacts/listing_contact_lists` endpoint
   * - html_source
     - string
     - The HTML source of the email
     -
   * - text_source
     - string
     - The text source of the email
     -
   * - status
     - int
     - See :doc:`statuses`
     -
   * - api_status
     - int
     - See :doc:`statuses`
     -
   * - api_error
     - int
     - See :doc:`statuses`
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
     "replyCode": 0,
     "replyText": "OK",
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

.. list-table:: Possible Error Codes
   :header-rows: 1

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
     -
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