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
            "default_upages_lang":"en",
            "access_level": "0",
            "position": "superhero",
            "title":"0",
            "tz": "",
            "mobile_phone": "+1 111 222 3333",
            "superadmin": 1,
            "disabled": 0,
            "last_verification_action_date":"2015-05-21 08:08:43",
            "actual_login":"2015-04-29 16:11:16",
            "pwd_update_interval":"90"
         },
         {
            "id":"32",
            "username": "jane_foster",
            "email": "jane.foster@example.com",
            "first_name": "Jane",
            "last_name": "Foster",
            "interface_language": "en",
            "default_upages_lang":"en",
            "access_level": "0",
            "position": "scientist",
            "title":"0",
            "tz": "",
            "mobile_phone": "+1 222 333 4444",
            "superadmin": 1,
            "disabled": 0,
            "last_verification_action_date": "2015-05-14 11:24:08",
            "actual_login": "2015-06-10 09:45:53",
            "pwd_update_interval": "1095"
         }
      ]
   }

Where:

* *id* is the internal ID of the admin for the customer
* *interface_language* is the ISO code of the current language used in the Suite UI by the admin (for a list of possible languages see administrator/getinterfacelanguages)
* *default_upages_lang* is the default language of the www.emarsys.net/u/… links of the launched email campaigns
* *access_level* is the admin role ID (for a list of possible values see :doc:`administrator_access_levels`)
* *tz* is the time zone, the default timezone of the account will apply if this is empty
* *superadmin* indicates if this admin has superadmin access (1) or not (0). Superadmins can define administrators for the account and can also provide admin data.
* *disabled* indicates if the account is locked (1) or unlocked (0)
* *last_verification_action_date* is for internal use only
* *actual_login* is the date of the last login
* *pwd_update_interval* is the number of days after which password change is necessary


