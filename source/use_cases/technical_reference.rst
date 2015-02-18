Technical Reference
-------------------

Below is a reference of the interfaces implemented in the Suite API.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Interface
     - Method
     - Description
   * - /api/v2/condition
     - GET
     - Returns a list of rules for conditional text.
   * - /api/v2/contact
     - POST
     - Creates a new contact/recipient.
   * - /api/v2/contact
     - PUT
     - Updates a contact/recipient, identified by an external ID.
   * - /api/v2/contact/checkids
     - POST
     - Checks the external ID list provided in the requests against the contact database.
   * - /api/v2/contact/<key_field_id>=<key_field_value>
     - GET
     - Returns the internal ID of a contact specified by its external ID.
   * - /api/v2/contact/getchanges
     - POST
     - Exports the selected fields of all contacts with properties changed in the time range specified.
   * - /api/v2/contact/getcontacthistory
     - POST
     - Returns the list of emails sent to the specified contacts.
   * - /api/v2/contact/getdata
     - POST
     - Returns the selected fields of contacts.
   * - /api/v2/contact/getregistrations
     - POST
     - Exports the selected fields of all contacts who registered in the specified time range.
   * - /api/v2/contact/query
     - GET
     - Returns the value of the requested field for every contacts that meets the optional condition specified.
   * - /api/v2/contactlist
     - GET
     - Returns a list of contact lists which can be used as recipient source for the email.
   * - /api/v2/contactlist
     - POST
     - Creates a contact list which can be used as recipient source for the email.
   * - /api/v2/contactlist/<list_id>
     - GET
     - Returns the IDs of users in a contact list.
   * - /api/v2/contactlist/<list_id>/add
     - POST
     - Adds contacts to the contact list which can be used as recipient source for the email.
   * - /api/v2/contactlist/<list_id>/delete
     - POST
     - Deletes contacts from the contact list which can be used as recipient source for the email.
   * - /api/v2/email
     - GET
     - Returns a list of emails.
   * - /api/v2/email
     - POST
     - Creates an email in Suite and assigns it the respective parameters.
   * - /api/v2/email/<id>
     - GET
     - Returns the attributes of an email and the personalized text and HTML source.
   * - /api/v2/email/<id>/copy
     - POST
     - Copies the specified campaign.
   * - /api/v2/email/<id>/launch
     - POST
     - Launches an email. This is an asynchronous call, which returns ‘OK’ if the email is able to launch.
   * - /api/v2/email/<id>/preview
     - POST
     - Returns the HTML or text version of the email either as content type ‘application/json’ or ‘text/html’.
   * - /api/v2/email/<id>/responsesummary
     - GET
     - Returns the summary of the responses of a launched, paused, activated or deactivated email.
   * - /api/v2/email/<id>/sendtestmail
     - POST
     - Instructs the system to send a test email.
   * - /api/v2/email/<id>/updatesource
     - POST
     - Defines Using API as recipient source for an email in Suite.
   * - /api/v2/email/<id>/url
     - POST
     - Returns the URL to the online version of an email, provided it has been sent to the specified contact.
   * - /api/v2/email/getdeliverystatus
     - POST
     - Returns the delivery status of an email.
   * - /api/v2/email/getlaunchesofemail
     - POST
     - Lists all the launches of an email with ID, launch date and ‘done’ status.
   * - /api/v2/email/getresponses
     - POST
     - Exports the selected fields of all contacts which responded to emails in the specified time range.
   * - /api/v2/emailcategory
     - GET
     - Returns a list of email categories which can be used in email creation.
   * - /api/v2/event
     - GET
     - Returns a list of external events which can be used in programs.
   * - /api/v2/event/<id>/trigger
     - POST
     - Triggers the given event for the specified contact.
   * - /api/v2/export
     - GET
     - Fetches the status data of an export.
   * - /api/v2/field
     - GET
     - Returns a list of fields (including custom fields and vouchers) which can be used to personalize content.
   * - /api/v2/field
     - POST
     - Creates a new contact field.
   * - /api/v2/field/<id>/choice
     - GET
     - Returns the choice options (possible values) of a field.
   * - /api/v2/file
     - GET
     - Returns a media file from your account’s Media Database.
   * - /api/v2/file
     - POST
     - Uploads a file to your Media Database.
   * - /api/v2/filter
     - GET
     - Returns a list of filters (segments) which can be used as recipient source for the email.
   * - /api/v2/folder
     - GET
     - Returns the available folders in your Media Database.
   * - /api/v2/form
     - GET
     - Returns a list of available forms.
   * - /api/v2/language
     - GET
     - Returns a list of languages which you can use in email creation.
   * - /api/v2/settings
     - GET
     - Gets the settings of the customer.
   * - /api/v2/source
     - GET
     - Returns a list of sources which can be used for creating contacts.
   * - /api/v2/source/<id>
     - DELETE
     - Deletes an existing source.
   * - /api/v2/source/create
     - POST
     - Creates a new source for your contacts with the specified name.