Deleting E-Mails
================

Deletes an email and all related launches (test emails) in the eMarketing Suite.

Endpoint
--------

``POST /api/v2/email/delete``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - emailId
     - integer
     - The id of the email to be deleted
     -

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
     }
   }

Errors
------

.. list-table:: Possible Error Codes

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 6004
     - Invalid email ID
     - No email was found with the given ID, or the email belongs to another customer.
   * - 400
     - 6020
     - Error: could not delete the email.
     - The email cannot be deleted.
   * - 400
     - 6021
     - In order to delete an event-based email campaign you have to deactivate it first.
     - The selected email is an active event-based email; active event-based emails cannot be deleted.
   * - 400
     - 6022
     - You cannot delete this email because it is being used in the following programs: <program names>
     - If an email is being used by an active program, you cannot delete it. You must either end the
       program or change the email.