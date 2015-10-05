.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/appendices/launch-error-status/

Launch Error Statuses
=====================

The following is a list of errors that can prevent a successful email launch:

.. list-table:: Launch Error Codes
   :header-rows: 1
   :widths: 10 40

   * - Status
     - Description
   * - 02
     - You are not authorised to perform this action.
   * - 04
     - Cannot launch mailing because the following mandatory field is missing in the Content Creation page: Subject.
   * - 05
     - Cannot launch mailing because the launch list is empty.
   * - 07
     - Cannot launch mailing because you have not checked the personalization for this version.
   * - 22
     - Cannot launch mailing because the following mandatory field is missing in the Content Creation page: From (name).
   * - 34
     - Attention: you cannot send this email because the HTML code is incomplete. Please check that there are no missing or open tags and try again.
   * - 35
     - Cannot launch mailing because the CC list is empty.
