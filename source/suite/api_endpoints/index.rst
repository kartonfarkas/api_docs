API Endpoints
=============

.. list-table:: **Customer Settings**

   * - :doc:`../customers/customer_settings`
     - GET /api/v2/settings

.. list-table:: **Administrators**

   * - :doc:`../customers/administrator_list`
     - GET /api/v2/administrator
   * - :doc:`../customers/administrator_interface_languages`
     - GET /api/v2/administrator/getinterfacelanguages
   * - :doc:`../customers/administrator_access_levels`
     - GET /api/v2/administrator/getaccesslevels
   * - :doc:`../customers/administrator_create`
     - POST /api/v2/administrator
   * - :doc:`../customers/administrator_update`
     - POST /api/v2/administrator/patch
   * - :doc:`../customers/administrator_delete`
     - POST /api/v2/administrator/<admin_id>/delete

.. list-table:: **Contacts**

   * - :doc:`../contacts/contact_list`
     - GET /api/v2/contact/query
   * - :doc:`../contacts/contact_data`
     - POST /api/v2/contact/getdata
   * - :doc:`../contacts/contact_email_history`
     - POST /api/v2/contact/getcontacthistory
   * - :doc:`../contacts/contact_fetch_internal_id`
     - GET /api/v2/contact/<key_field_id>=<key_field_value>
   * - :doc:`../contacts/contact_check_internal_ids`
     - POST /api/v2/contact/checkids
   * - :doc:`../contacts/contact_create`
     - POST /api/v2/contact
   * - :doc:`../contacts/contact_multiple_create`
     - POST /api/v2/contact
   * - :doc:`../contacts/contact_update`
     - POST /api/v2/contact
   * - :doc:`../contacts/contact_multiple_update`
     - PUT /api/v2/contact

.. list-table:: **Contact Fields**

   * - :doc:`../contacts/contact_field_list`
     - GET /api/v2/field
   * - :doc:`../contacts/contact_field_create`
     - POST /api/v2/field
   * - :doc:`../contacts/contact_field_choice_list`
     - GET /api/v2/field/<list_id>/choice

.. list-table:: **Contact Lists**

   * - :doc:`../contacts/contact_list_list`
     - GET /api/v2/contactlist
   * - :doc:`../contacts/contact_list_create`
     - POST /api/v2/contactlist
   * - :doc:`../contacts/contact_list_replace`
     - POST /api/v2/contactlist/<list_id>/replace
   * - :doc:`../contacts/contact_list_list_contacts`
     - GET /api/v2/contactlist/<list_id>
   * - :doc:`../contacts/contact_list_add_contacts`
     - POST /api/v2/contactlist/<list_id>/add
   * - :doc:`../contacts/contact_list_remove_contacts`
     - POST /api/v2/contactlist/<list_id>/delete

.. list-table:: **Segments**

   * - :doc:`../contacts/segment_list`
     - GET /api/v2/filter
   * - :doc:`../contacts/segment_list_contacts`
     - GET /api/v2/filter/<segment_id>/contacts

.. list-table:: **Contact Sources**

   * - :doc:`../contacts/source_list`
     - GET /api/v2/source
   * - :doc:`../contacts/source_create`
     - POST /api/v2/source/create
   * - :doc:`../contacts/source_delete`
     - DELETE /api/v2/source/<source_id>

.. list-table:: **Forms**

   * - :doc:`../contacts/forms`
     - GET /api/v2/form

.. list-table:: **Email Campaigns**

   * - :doc:`../emails/email_list`
     - GET /api/v2/email
   * - :doc:`../emails/email_data`
     - GET /api/v2/email/<email_id>
   * - :doc:`../emails/email_languages`
     - GET /api/v2/language
   * - :doc:`../emails/email_categories`
     - GET /api/v2/emailcategory
   * - :doc:`../emails/email_create`
     - POST /api/v2/email
   * - :doc:`../emails/email_copy`
     - POST /api/v2/email/<email_id>/copy
   * - :doc:`../emails/email_delete`
     - POST /api/v2/email/delete
   * - :doc:`../emails/email_update_source`
     - POST /api/v2/email/<email_id>/updatesource

.. list-table:: **Launches**

   * - :doc:`../emails/launch_list`
     - POST /api/v2/email/getlaunchesofemail
   * - :doc:`../emails/launch_delivery_status`
     - POST /api/v2/email/getdeliverystatus
   * - :doc:`../emails/launch_responses`
     - GET /api/v2/email/responses
   * - :doc:`../emails/launch_responses_result`
     - GET /api/v2/email/responses/<query_id>
   * - :doc:`../emails/launch_response_summary`
     - GET /api/v2/email/<email_id>/responsesummary
   * - :doc:`../emails/launch_urls`
     - POST /api/v2/email/<email_id>/url
   * - :doc:`../emails/launch`
     - POST /api/v2/email/<email_id>/launch
   * - :doc:`../emails/launch_preview`
     - POST /api/v2/email/<email_id>/preview
   * - :doc:`../emails/launch_tests`
     - POST /api/v2/email/<email_id>/sendtestmail

.. list-table:: **Media Database**

   * - :doc:`../emails/media_file_list`
     - GET /api/v2/file
   * - :doc:`../emails/media_file_upload`
     - POST /api/v2/file
   * - :doc:`../emails/media_folder_list`
     - GET /api/v2/folder
   * - :doc:`../emails/media_folder_create`
     - POST /api/v2/folder

.. list-table:: **Conditions**

   * - :doc:`../emails/conditions`
     - GET /api/v2/condition

.. list-table:: **Exports**

   * - :doc:`../exports/export_changes`
     - POST /api/v2/contact/getchanges
   * - :doc:`../exports/export_contact_lists`
     - POST /api/v2/email/getcontacts
   * - :doc:`../exports/export_segments`
     - POST /api/v2/email/filter
   * - :doc:`../exports/export_registrations`
     - POST /api/v2/contact/getregistrations
   * - :doc:`../exports/export_responses`
     - POST /api/v2/email/getresponses
   * - :doc:`../exports/export_status`
     - GET /api/v2/export/<export_id>

.. list-table:: **External Events**

   * - :doc:`../external_events/external_event_list`
     - GET /api/v2/event
   * - :doc:`../external_events/external_event_trigger`
     - POST /api/v2/event/<event_id>/trigger