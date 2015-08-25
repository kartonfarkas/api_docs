Querying Raw Email Campaigns
============================

Returns the content of all email campaigns with their original URL instead of the tracking URL. With providing an
email ID, content of a specific email campaign can be seen with the original URL.

Endpoint
--------

``GET /api/v2/email/<email_id>/raw``


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
     - ID of a specific email
     -

Result Example
--------------

.. note:: It is a simple email campaign like in the case of
          :doc:`../emails/email_list`.

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": "111111111",
         "root_email": "0",
         "language": "en",
         "name": "New Email 2014-12-09 10:43",
         "created": "2014-12-09 10:43:37",
         "deleted": "",
         "fromemail": "xy@emarsys.com",
         "fromname": "xy",
         "subject": "test_mail",
         "email_category": "222222222",
         "filter": "333333333",
         "exclude_filter": 0,
         "contactlist": "0",
         "exclude_contactlist": 0,
         "additional_linktracking_parameters": "",
         "cc_list": 0,
         "html_source": "<html>\n  \n  <head>\n    <style type=\"text/css\"></style>\n    <style type=\"text/css\"></style>\n    <style type=\"text/css\"></style>\n    <style type=\"text/css\"></style>\n    <style type=\"text/css\"></style>\n    <style type=\"text/css\"></style>\n  </head>\n  \n  <body> <a href=\"http://google.com\">google</a>\n <a href=\"http://facebook.com\">facebook</a>\napple\n  </body>\n\n</html>",
         "text_source": "",
         "template": "0",
         "unsubscribe": "y",
         "browse": "y",
         "status": "3",
         "api_status": "0",
         "api_error": 0,
         "external_event_id": null,
         "combined_segment_id": null,
         "value_control": null,
         "text_only": "n",
         "source": "profile"
      }
   }

Where:

* *id* is the internal identifier of the email
* *name* is the name of the email in Suite
* *fromemail* is the sender email address
* *fromname* is the sender name
* *subject* is the email subject line
* *email_category* is the category identifier for this email, for more info see :doc:`../emails/email_categories`.
* *filter* is the filter identifier. Available filters can be retrieved via :doc:`../contacts/segment_list`.
* *contactlist* is the contact list identifier. Contact lists can be retrieved via :doc:`../contacts/contact_list_list`.
* *cc_list* is the ID of the contact list which will receive a copy of the email when sent. Only works if BCC List is enabled.
* *status* is the status of the email, for more info see :doc:`../appendices/email_status`.
* *api_status* is the launch status of the email, for more info see :doc:`../appendices/launch_status`.
* *api_error* is any specific error related to the endpoints or methods, for more info see :doc:`../appendices/error_codes`.
* *source* is where the recipient originated, possible values are: **userlist, profile, api**
