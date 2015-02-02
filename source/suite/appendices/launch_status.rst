Launch Statuses
===============

An email can have one of the following launch statuses:

.. list-table:: E-Mail Status Codes
   :header-rows: 1
   :widths: 10 40

   * - Status
     - Description
   * - 0
     - Not launched
   * - 1
     - Launch called via API, launching in progress
   * - 2
     - Email launched or scheduled for future launch
   * - 10
     - Error (details in api_error)
