.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/email/launch-campaign/

Launching an Email Campaign
===========================

Initiates the launch of an email campaign and returns an OK response from the API to confirm that the request has been
received. The actual launch itself will take place after the launch request has been processed.

.. warning::

   Launches are asynchronous operations, so a successful request might end up in a failed
   launch, e.g. when the email subject  or recipient list was not specified. The
   :doc:`email_data` endpoint must be polled to obtain information on the
   launch progress, where the *api_status* and *api_error* parameters will contain the
   status.

.. note:: If an email campaign is launched, the segment or contact list specified in
          :doc:`email_create` receives it.

Endpoint
--------

``POST /api/v2/email/<email_id>/launch``

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
     - Email ID to launch, part of the URI
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - schedule
     - datetime
     - If specified, the launch will be scheduled for the set time (in the default timezone).
       of the customer.
     -
   * - timezone
     - string
     - Applies the specified timezone to the launchtime in the *schedule* parameter.
     - See :doc:`../appendices/time_zones`.

URI Example
-----------

* ``/api/v2/email/12345/launch``

Request Example
---------------

.. code-block:: json

   {
     "schedule": "2011-08-12 08:35",
     "timezone": "America/New_York"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": ""
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 6004
     - Invalid email ID
     - No email with the provided ID exists.
   * - 409
     - 6003
     - Invalid email status
     - The email cannot be launched. Reason: It has already been launched either via the API or the Emarsys application.
   * - 409
     - 6005
     - Child email cannot be launched
     - Launching an A/B version child or a recurring email child is not supported.
   * - 400
     - 6009
     - Invalid date/time format
     - Wrong formatting of the date/datetime value in the schedule parameter.
   * - 400
     - 6008
     - Invalid timezone
     - The value in the timezone parameter is invalid or not supported by the application.
   * - 400
     - 6032
     - Contact list or segment is missing.
     -
   * - 400
     - 6033
     - "fromname" is missing.
     -
   * - 400
     - 6034
     - "fromemail" is missing.
     -
   * - 400
     - 6035
     - Subject is missing.
     -

Click here for the relevant API documentation page: https://dev.emarsys.com/suite/contacts/contact_field_list.html.
