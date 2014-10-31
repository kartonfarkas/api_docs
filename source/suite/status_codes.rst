Status Codes
============

E-Mail Status Codes
-------------------

 * Retrieve an email’s status like this:
   /status=<id>

The ID is one of the following:

.. list-table:: **Email Statuses**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Status
     - Description
   * - 1
     - In design
   * - 2
     - Tested
   * - 3
     - Launched
   * - 4
     - Ready to launch
   * - -3
     - Deactivated

API Launch Statuses
-------------------

Emails have one of the following launch statuses:

.. list-table:: **Launch Statuses**
   :header-rows: 1
   :widths: 20 40

   * - api_status
     - Description
   * - 0
     - Not launched
   * - 1
     - Launch called via API, launching in progress
   * - 2
     - Email launched or scheduled for future launch
   * - 10
     - Error (details in api_error)

