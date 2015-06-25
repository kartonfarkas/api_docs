Creating an Email Campaign
==========================

Creates an email campaign with the specified parameters.

.. note::
         For further information about creating emails with transaction-specific content, see `Creating Transactional Emails <http://documentation.emarsys.com/suite/campaigns/txm/>`_.
         For the list of possible campaign related placeholders, see :doc:`../appendices/placeholders`.

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
     - Language of the email campaign
     - 2 letter language identifiers, according to :doc:`../appendices/language_codes`.
   * - name
     - string
     - Title of the email
     -
   * - fromemail
     - string
     - Email address of the sender
     -
   * - fromname
     - string
     - Name of the sender
     -
   * - subject
     - string
     - Subject of the email
     -
   * - email_category
     - string
     - Category ID that the email is assigned to.
     - Category (see :doc:`email_categories`)
   * - html_source
     - string
     - HTML body of the email
     -
   * - text_source
     - string
     - Text source of the email
     -
   * - filter*
     - int
     - Segment ID for the email
     - Email campaign with a *Segment* recipient source is created.
   * - contactlist*
     - int
     - Contact list ID for the email
     - Email campaign with a *Contact list* recipient source is created.
   * - external_event_id*
     - int
     - External event ID for the email
     - Email campaign with an *External Event* recipient source is created.

.. note::

   ****: From *filter*, *contactlist* and *external_event_id* parameters, at least one must always be defined by its
   ID.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - template_id
     - int
     - ID of the template for creating a template-based campaign
     -
   * - unsubscribe
     - int
     - The email contains an unsubscribe link
     - * 0: false
       * 1: true
   * - browse
     - int
     - The email contain a link to an online version
     - * 0: false
       * 1: true
   * - text_only
     - int
     - The email includes a text only version
     - Can only be used if both an HTML and TEXT source is available
       * 0: false
       * 1: true
   * - cc_list
     - int
     - The ID of the contact list which will receive a copy of the email when sent.
     - Only works if the BCC List feature is enabled for the customer.
   * - additional_linktracking_parameters
     - string
     - Additional URL parameters that are added to the tracked links URL when redirected.
     - Only works if this feature is enabled for the customer.

Request Example
---------------

.. code-block:: json

   {
     "name": "be_afraid_email",
     "language": "en",
     "subject": "convergence",
     "fromname": "Malekith",
     "fromemail": "malekith@example.com",
     "email_category": "111111111",
     "html_source": "<html>Hello $First Name$...</html>",
     "text_source": "Hello $First Name$...",
     "browse": 0,
     "text_only": 0,
     "unsubscribe": 1,
     "filter": "222222222"
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

Where:

* *id* is the new email campaign ID

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
   * - 403
     - 6031
     - CC feature not enabled
     - If the "BCC List" feature is not enabled, then cc_list cannot be set. Ask for this feature from Emarsys Support.
   * - 403
     - 6036
     - Additional tracking parameters are not enabled.
     - If the "Enable additional campaign specific tracking params" feature is not enabled, then
       additional_linktracking_parameters cannot be set. Ask for this feature from Emarsys Support.
