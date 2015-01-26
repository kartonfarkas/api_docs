Error Codes
===========

General Error Codes
-------------------

For information on the error codes used by the API, please refer to the documentation of the individual interfaces.

If a resource is called with an unsupported method, the following error is returned:

.. list-table:: **Error Code**
   :header-rows: 1
   :widths: 30 40 50

   * - HTTP Response Code
     - Error Message
     - Problem
   * - 501 Not implemented
     - This feature has not been implemented yet.
     - Interface was called with an unsupported method.

API Launch Error Codes
----------------------

Launching an email might produce one of the following launch errors:

.. list-table:: **Launch Errors**
   :header-rows: 1
   :widths: 20 40

   * - api_error
     - Description
   * - 1
     - Internal error
   * - 2
     - The user does not have permission to launch this email
   * - 3
     - The fromemail is missing
   * - 4
     - Missing subject line
   * - 5
     - Empty launch list
   * - 6
     - The final launch is scheduled too soon after the A/B tests. The default delay is one hour.
   * - 7
     - The personalization has not been checked
   * - 8
     - Failed to schedule the email launch
   * - 9
     - The email campaign type does not support A/B versioning
   * - 16
     - Failed to unschedule the email launch
   * - 17
     - Another test is not possible because there are too few contacts left in the launch list
   * - 18
     - If the final launch is dependent on A/B tests, there must be at least two tests before the final launch can proceed
   * - 19
     - Launch started
   * - 20
     - The email name already exists
   * - 21
     - The campaign cannot be paused because the launch is over (this is currently not available via the API)
   * - 22
     - The fromname is missing
   * - 23
     - Lock time out (internal error)
   * - 24
     - Lock failure (internal error)
   * - 25
     - Processed by job (the campaign has already been launched)
   * - 32
     - The size of the campaign exceeds 6 MB
   * - 33
     - Some sections selected for section targeting have no segment defined
   * - 34
     - The HTML code is not complete (missing tags)
   * - 35
     - Empty seedlist