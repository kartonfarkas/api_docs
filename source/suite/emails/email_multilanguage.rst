Finalizing a Multilanguage Email Campaign
=========================================

Finalizes A/B testing results in a successful email campaign which is launched. It must be finalized before the launch,
then all contacts will receive the campaign in their own language.

Endpoint
--------

``POST /api/v2/email/<email_id>/finalizeMultilanguage``

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
     - Campaign is not multilanguage.
     - Campaign which should be finalized is not a multilanguage campaign.
   * - 500
     - 6059
     - Campaign is already finalized.
     -