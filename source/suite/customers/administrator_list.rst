Listing Administrators
======================

Returns a list of admins for the customer's account.

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

Where:

* *id* is the internal ID of the admin for the customer
* *interface_language* is the ISO code of the current language used in the Suite UI by the admin (for a list of possible languages see administrator/getinterfacelanguages)
* *access_level* is the admin role ID (for a list of possible values see :doc:`administrator_access_levels`)
* *tz* is the time zone, the default timezone of the account will apply if this is empty
* *superadmin* indicates if this admin has superadmin access (1) or not (0). Superadmin can set admins on the UI. They
  can define who should be administrators, and also provide administrator data.
* *disabled* indicates if the account is locked (1) or unlocked (0)
