Querying URL for a Launched Email Campaign Content
==================================================

Returns the URL of a launched email campaign's content for the specified
contact.

Endpoint
--------

``POST /api/v2/email/<email_id>/url``

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
     - ID of the email
     -
   * - key_id
     - mixed
     - Key which identifies the contact
     - field id, “id” or “uid” can be used
   * - key_value
     - mixed
     - Value of the field identified by the key_id
     -

JSON Payload Example
--------------------

.. code-block:: json

   {
     "key_id": "3",
     "key_value": "clint.barton@example.com"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "url": "http://www.emarsys.com/u/gm.phpprm=uid369_119948266_123456789_369258147"
     }
   }

Where:

* *url* is the URL of the online version

Errors
------

The error codes associated with the contact field ID and value can be found in :doc:`../contacts/contact_check_internal_ids`.

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 6004
     - Invalid email ID
     - No email found with the specified email ID.
   * - 400
     - 6003
     - Invalid email status
     - The email has been deleted, or its status is invalid. Allowed statuses: launched, deactivated
   * - 400
     - 6002
     - The email has not been sent to the specified contact
     - The online version is only generated after the email has been sent to a contact.