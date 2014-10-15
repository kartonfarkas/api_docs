Unsubscribing a Contact
=======================

To unsubscribe a contact, follow the steps below.

Endpoint
--------

``PUT /api/v2/contact``

Parameters
----------

.. list-table:: **Required parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - key_id = [field_id]
     -
     - The value provided for key_id field identifies the contact which will be unsubscribed.
       Use 3 for email address.
     -
   * - optin = [NULL; 1; 2]
     -
     - The second parameter optin (field_id: 31) has three possible values:
       * NULL = empty
       * 1 = true
       * 2 = false
     - Set optin=false to unsubscribe a contact!

See document “Suite Field IDs and Values” for further information.

.. list-table:: **Optional parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Values
     - Comments
   * - source_id = [source_id]
     -
     - For the source_id, pass the value for the appropriate source (we are using 2 in the examples below).
     - If more than one contact with the requested external ID is found, an error message is returned.

Result Data Structure
---------------------

.. code-block:: json

   {
     "replyCode":0,
     "replyText":"OK",
     "data": {
       "id": [id]
     }
   }

Result Example
--------------

**Success**

.. code-block:: json

   {
     "replyCode":0,
     "replyText":"OK",
     "data":
     {
       "id":366924307
     }
   }