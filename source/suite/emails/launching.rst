Launching Email Campaigns
=========================

Launches an email campaign. The launch will happen later, an "OK" response will report
only that the request was received by the API.

.. warning::

   Launches are asynchronous operations. A successful request might end up in a failed
   launch (for example when email subject or recipient list was not specified). The
   :doc:`emails_attributes` endpoint must be polled to obtain information on the
   launch progress, where the *api_status* and *api_error* parameters will contain the
   status.

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
     - email ID to launch, part of the URI
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
     - If specified, the launch will be scheduled for this time in the default timezone
       of the customer.
     -
   * - timezone
     - string
     - If specified, the schedule parameter is interpreted in this timezone.
     - See the `list of the supported timezones <http://documentation.emarsys.com/?page_id=3291>`_

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
     - The email cannot be launched. Reason: It has already been launched either via the API or the eMarketing Suite user interface.
   * - 409
     - 6005
     - Invalid email type
     - Launching an on-event email is not supported in this version.
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