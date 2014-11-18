Creating Emails
===============

Creates an email in eMarketing Suite and assigns the respective parameters to it.

Endpoint
--------

``POST /api/v2/email``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - language
     - string
     - language of the email campaign
     - short, 2 letter language code, like "en"
   * - name
     - string
     - title of the email
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
     - subject of the email
     -
   * - email_category
     - string
     - category (see :doc:`emails_get_email_category_lists`)
     -
   * - filter
     - int
     - filter ID for the email
     -
   * - contactlist
     - int
     - contactlist ID for the email
     -
   * - html_source
     - string
     - HTML body of the email
     -
   * - text_source
     - string
     - text source of the email
     -

.. note::

   For filter and contactlist, at least one property must be sent and it must not be 0 (zero).
   If both are sent, only one must be different from 0 (zero).

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - unsubscribe
     - int
     - if the email contains a link to unsubscribe
     - * 0: false
       * 1: true
   * - browse
     - int
     - if the email contains a link to the online version
     - * 0: false
       * 1: true
   * - text_only
     - int
     - used only if both HTML and TEXT sources are available
     - * 0: false
       * 1: true

Request Example
---------------

.. code-block:: json

   {
     "name": "test api 010",
     "language": "en",
     "subject": "subject here",
     "fromname": "sender email",
     "fromemail": "sender@example.com",
     "email_category": "17",
     "html_source": "<html>Hello $First Name$,... </html>",
     "text_source": "email text",
     "browse": 0,
     "text_only": 0,
     "unsubscribe": 1,
     "filter": "1121",
     "contactlist": 0
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 2140
     }
   }

Where *id* is the message ID.

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
     - For a list of supported languages, see the list of language codes.
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
     - The subject line must have some content.
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

