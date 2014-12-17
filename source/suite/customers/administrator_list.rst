Listing the Administrators
==========================

Returns the administrator users of the customer.

.. include:: _warning.rst

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
            "id": "13",
            "username": "captain_america",
            "email": "captain.america@.example.com",
            "first_name": "Steve",
            "last_name": "Rogers",
            "interface_language": "en",
            "access_level": "0",
            "position": "superhero",
            "tz": "",
            "mobile_phone": "+1 111 222 3333",
            "superadmin": 1,
            "disabled": 0
         },
         {
            "id":"32",
            "username": "jane_foster",
            "email": "jane.foster@example.com",
            "first_name": "Jane",
            "last_name": "Foster",
            "interface_language": "en",
            "access_level": "0",
            "position": "scientist",
            "tz": "",
            "mobile_phone": "+1 222 333 4444",
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
