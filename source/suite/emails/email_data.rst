Querying Email Campaign Data
============================

Returns all the details of an email campaign, i.e. content & attributes, including the personalized text and HTML
source.

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
         "name": "funny_email",
         "status": "3",
         "api_status": "2",
         "api_error": "0",
         "fromemail": "loki@example.com",
         "fromname": "Loki",
         "subject": "I'm alive",
         "email_category": "111111111",
         "filter": "333333333",
         "contactlist": "0",
         "cc_list": 564365356,
         "source": "api",
         "html_source": "<html>Hello $First Name$...</html>",
         "text_source": "Hello $First Name$..."
       }
     ]
   }

Resulting Data Structure
------------------------

.. list-table:: **Resulting Data Structure**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - id
     - int
     - Internal ID of the email campaign
     -
   * - language
     - string
     - Language used in the email campaign
     -
   * - created
     - datetime
     - Creation date of the email campaign
     -
   * - name
     - string
     - Name of the email campaign
     -
   * - fromemail
     - string
     - Address the email shows as being sent from
     -
   * - fromname
     - string
     - Senders display name.
     -
   * - subject
     - string
     - Subject line of the email
     -
   * - email_category
     - int
     - Category ID that the email is assigned to
     - Categories may be retrieved via the :doc:`email_categories` endpoint
   * - filter
     - int
     - Segment ID of the applied filter criteria
     - Available filters can be retrieved via the :doc:`../contacts/segment_list` endpoint
   * - contactlist
     - int
     - Contact list ID
     - Contact lists may be retrieved via the :doc:`../contacts/contact_list_list` endpoint
   * - cc_list
     - int
     - The ID of the contact list which will receive a copy of the email when sent. Only works if BCC List is enabled.
     -
   * - html_source
     - string
     - HTML source of the email
     -
   * - text_source
     - string
     - Text source of the email
     -
   * - status
     - int
     - Status of the email
     - See :doc:`../appendices/email_status`
   * - api_status
     - int
     - Launch status of the email
     - See :doc:`../appendices/launch_status`
   * - api_error
     - int
     - Launch error codes
     - See :doc:`../appendices/launch_error_status`
   * - source
     - string
     - Recipient source used.
     - Possible values are:

       * userlist
       * profile
       * api

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

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
