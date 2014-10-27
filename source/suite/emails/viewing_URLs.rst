Viewing URLs of Online Versions
===============================

Returns the URL to the online version of an email, provided it has been sent to the specified contact.

Endpoint
--------

``POST /api/v2/email/<id>/url``

Parameters
----------

.. list-table:: **Required parameters**
   :header-rows: 1
   :widths: 20 20 40 40

       * - Name
         - Type
         - Description
         - Comments
       * - <id>
         - int
         -
         -
       * - key_id
         - mixed
         - (field id, “id” or “uid” can be used)
         -
       * - key_field
         - mixed
         -
         -

Result Data Structure
---------------------

(string) url, where

 * **url** = The URL of the online version

JSON Payload Example
--------------------

.. code-block:: json

   {
     "key_id":"3",
     "key_value":"test@ema.il"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode":0 ,
     "replyText":"OK",
     "data":
     {
       "url":"http://www.emarsys.com/u/gm.php
       prm=uid369_119948266_123456789_369258147"
     }
   }

Errors
------

The error codes associated with the contact field ID and value can be found in the `check contact internal ID section <http://documentation.emarsys.com/?page_id=176>`_.

.. list-table:: Possible error codes

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