Copying an Email Campaign
=========================

Copies the specified email campaign. Optionally, a name can be defined for the new
email campaign.

Endpoint
--------

``POST /api/v2/email/<email_id>/copy``

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
     - ID of the email campaign to be copied, part of the URI
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - name
     - string
     - Name of the new email campaign. If not defined, a unique name will be automatically generated.
     -

Result Data Structure
---------------------

Normal Result:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "campaignId": 123456
     }
   }

When copying a campaign with multiple versions, the ID of the copy of the first version is returned.

Error Condition:

.. code-block:: json

   {
     "replyCode": 6023,
     "replyText": "Campaign name already taken",
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
     - 6023
     - Campaign name already taken
     - The campaign name specified is already taken.
   * - 400
     - 6026
     - No such campaign
     - The campaign ID specified does not refer to an existing campaign.
   * - 500
     - 6024
     - Copy of campaign <email_id> failed
     - An error occurred during copying the campaign.