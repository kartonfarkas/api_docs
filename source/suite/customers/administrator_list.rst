Administrator List
==================

.. warning::

   The administrator API is available only from specific IP addresses. For more information, please contact emarsys support.

Returns the list of administrators.

Endpoint
--------

``GET /api/v2/administrator``

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data":
      [
         {
            "id": "3",
            "username": "admin",
            "email": "dfg@asd.hu",
            "first_name": "dfg",
            "last_name": "drg",
            "interface_language": "en",
            "access_level": "0",
            "position": "",
            "tz": "",
            "mobile_phone": "",
            "superadmin": 1,
            "disabled": 0
         },
         {
            "id":"32",
            "username": "admin 1",
            "email": "a@a.hu",
            "first_name": "xxxx",
            "last_name": "",
            "interface_language": "en",
            "access_level": "0",
            "position": "marketing manager",
            "tz": "",
            "mobile_phone": "",
            "superadmin": 1,
            "disabled": 0
         }
      ]
   }

Where

 * *id* is the internal ID of the administrator
 * *interface_language* is the language code of the user interface language of the administrator (for possible languages see administrator/getinterfacelanguages)
 * *access_level* is the administrator role ID (for possible values see administrator/getaccesslevels)
 * *tz* is the time zone, the default is valid if it is empty
 * *superadmin* assigns 1 to the superadmin of the customer and 0 to others. Superadmin can set admins on the UI.
 * *disabled* is 1 if it is locked, 0 if unlocked
