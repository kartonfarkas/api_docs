Querying Email Campaign Attributes
==================================

Returns the details of an email campaign, including the personalized text and HTML source.

Endpoint
--------

``GET /api/v2/email/<email_id>``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - email_id
     - int
     - ID of the email, part of the URI
     -

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
         "cc_list": 564365356,
         "source": "api",
         "html_source": "Hello $Last Name$. How are you?",
         "text_source": "Hello $Last Name$ http://login.emarsys.net/u/nrd.php?p=$uid$_$llid$_$cid$_$sid$_2"
       }
     ]
   }

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
     - internal ID of the email
     -
   * - language
     - string
     - language of the email
     -
   * - created
     - datetime
     - creation date of the email
     -
   * - name
     - string
     - name of the email
     -
   * - fromemail
     - string
     - email address of the sender
     -
   * - fromname
     - string
     - name of the sender
     -
   * - subject
     - string
     - subject line of the email
     -
   * - email_category
     - int
     - category ID of the email
     - Categories may be retrieved via the :doc:`emails_get_email_category_lists` endpoint
   * - filter
     - int
     - filter ID
     - Available filters can be retrieved via the :doc:`../contacts/listing_segments` endpoint
   * - contactlist
     - int
     - contact list ID
     - Contact lists may be retrieved via the :doc:`../contacts/listing_contact_lists` endpoint
   * - cc_list
     - int
     - Contact list ID, if the email is sent, this contactlist also receives it. Only works if BCC List is enabled.
     -
   * - html_source
     - string
     - HTML source of the email
     -
   * - text_source
     - string
     - text source of the email
     -
   * - status
     - int
     - status of the email
     - See :doc:`../email_status`
   * - api_status
     - int
     - launch status of the email
     - See :doc:`../launch_status`
   * - api_error
     - int
     - launch error codes
     - See :doc:`../launch_error_status`
   * - source
     - string
     - source of the recipients.
     - Possible values are:

       * userlist
       * profile
       * api

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