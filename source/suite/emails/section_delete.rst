Deleting a Section from a Template-Based Email Campaign
=======================================================

Deletes an existing section from a template-based email campaign.

Endpoint
--------

``POST /api/v2/email/<email_id>/sections/<section_id>/delete``

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
     - The email which should have the section removed.
   * - section_id
     - int
     - ID of the section, part of the URI
     - The section to remove
     
Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": {}
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
   * - 404
     - 6025
     - No such campaign exists.
     -
   * - 404
     - 6045
     - The campaign ID does not refer to a template-based email.
     -
   * - 404
     - 6047
     - Section not found.
     -
