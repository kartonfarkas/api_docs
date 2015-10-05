.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/appendices/error-codes/

Error Codes
===========

General Error API Codes
-----------------------

The following is a list of general API errors that can arise.

.. note:: Specific errors related to endpoints or methods (if applicable) are listed with the methods themselves.

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
     - Internal error
   * - 2
     - The user does not have permission to launch this email.
   * - 3
     - The fromemail is missing
   * - 4
     - Missing subject line
   * - 5
     - Empty launch list
   * - 6
     - The final launch is scheduled too soon after the A/B tests: The default delay is one hour.
   * - 7
     - The personalization has not been checked
   * - 9
     - The email campaign type does not support A/B versioning
   * - 18
     - If the final launch is dependent on A/B tests, there must be at least two tests before the final launch can proceed
   * - 20
     - The email name already exists
   * - 22
     - The fromname is missing
   * - 23
     - Lock time out (internal error)
   * - 24
     - Lock failure (internal error)
   * - 32
     - The size of the campaign exceeds 6 MB
   * - 33
     - Some sections selected for section targeting have no segment defined
   * - 34
     - The HTML code is not complete (missing tags)
   * - 35
     - Empty seedlist
