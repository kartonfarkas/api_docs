Error Codes
===========

General Error API Codes
-----------------------

The following is a list of general API errors that can arise. 

Please note: Specific errors related to endpoints or methods (if applicable) are listed with the methods themselves.

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

Launching an email might produce any one of the following launch errors:

.. list-table:: **Launch Errors**
   :header-rows: 1
   :widths: 10 40

   * - api_error
     - Description
   * - 1
     - Internal error.
   * - 2
     - The user does not have permission to launch this email.
   * - 3
     - The fromemail address is missing.
   * - 4
     - The subject line is missing.
   * - 5
     - The launch list is empty.
   * - 6
     - The final launch is scheduled too close to the A/B tests: The default delay is one hour (minimum).
   * - 7
     - The personalization has not been checked.
   * - 8
     - Failed to schedule the email launch.
   * - 9
     - The email campaign type does not support A/B versioning.
   * - 16
     - Failed to unschedule the email launch.
   * - 17
     - Another test is not possible because there are too few contacts left in the launch list.
   * - 18
     - If the final launch is dependent on A/B tests, there must be at least two tests before the final launch can proceed.
   * - 19
     - Launch already started.
   * - 20
     - The email name already exists.
   * - 21
     - The campaign cannot be paused because the launch is over (currently not available via the API).
   * - 22
     - The fromname is missing.
   * - 23
     - Lock time out (internal error).
   * - 24
     - Lock failure (internal error).
   * - 25
     - Processed by job (the campaign has already been launched)
   * - 32
     - The size of the campaign exceeds 6 MB.
   * - 33
     - Some sections selected for section targeting have no segment defined.
   * - 34
     - The HTML code is not complete (i.e. missing tags).
   * - 35
     - The Seedlist is empty.
