Finalizing a Multi-language Email Campaign
==========================================

During A/B testing of Multi-language campaigns, two versions are sent for contacts of the same mother tongue living in
a particular country (e.g. Chinese living in the UK). Once the A/B testing for an existing Multi-language campaign is
completed, the email campaign is finalized by this endpoint. Contacts in the defined countries will then receive the
successful version in their own languages.

.. note:: This endpoint only works if the Multi-language Email Campaigns feature is enabled for your account.

Endpoint
--------

``POST /api/v2/email/<email_id>/finalize``

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
     - ID of the email, part of the URI
     -

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": null
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
   * - 500
     - 6010
     - This feature is not available for your account.
     -
   * - 500
     - 6025
     - No such campaign exists.
     -
   * - 500
     - 6058
     - Campaign is not Multi-language.
     - Campaign which should be finalized is not a Multi-language campaign.
   * - 500
     - 6059
     - Campaign is already finalized.
     -