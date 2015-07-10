Creating an Administrator Account
=================================

Info on how to create a new admin account.

.. include:: _warning.rst

Endpoint
--------

``POST /api/v2/administrator``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - username
     - string
     - Username for the new admin
     - Use actual names for easy maintenance, etc.
   * - password
     - string
     - Password for the new admin
     - Password must not have less than 10 characters, and must contain capital-, lowercase letters and numbers as well.
   * - email
     - string
     - Email address
     -
   * - access_level
     - int
     - Admin role ID
     - For a list of possible values, see :doc:`administrator_access_levels`.
   * - interface_language
     - string
     - ISO code of the current language used in the Suite UI by the admin
     - For a list of available languages, see :doc:`administrator_interface_languages`.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - first_name
     - string
     - First name of the admin
     -
   * - last_name
     - string
     - Last name of the admin
     -
   * - position
     - string
     - Admin's role/position
     -
   * - pwd_update_interval
     - int
     - Number of days after which password change is necessary
     -
   * - default_upages_lang
     - string
     - Default language of the www.emarsys.net/u/… links of the launched email campaigns
     -
   * - tz
     - string
     - Time zone
     -
   * - mobile_phone
     - string
     - Admin's mobile phone number
     -
   * - last_verification_action_date
     - date
     - For internal use only
     -
   * - actual_login
     - date
     - Date of the last login
     -
   * - disabled
     - int
     - Indicates if the account is locked (1) or unlocked (0)
     -
   * - superadmin
     - int
     - Indicates if this admin has superadmin access (1) or not (0)
     - Superadmins can define administrators for the account and can also provide admin data.

Request Example
---------------

.. code-block:: json

   {
      "username": "black_panther",
      "password": "Black891+Panther",
      "pwd_update_interval": "30",
      "email": "black.panther@emarsys.com",
      "access_level": "1",
      "interface_language": "en",
      "default_upages_lang": "en",
      "first_name": "Black",
      "last_name": "Panther",
      "mobile_phone": "36-304445555",
      "position": "superhero",
      "last_verification_action_date": "2015-05-14 11:24:09",
      "actual_login": "2015-06-10 09:45:54",
      "disabled": 0,
      "superadmin": 0
   }

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": "100001241",
         "username": "black_panther",
         "email": "black.panther@emarsys.com",
         "first_name": "Black",
         "last_name": "Panther",
         "interface_language": "en",
         "default_upages_lang": "en",
         "access_level": "1",
         "position": "superhero",
         "title": 0,
         "tz": "",
         "mobile_phone": "36-304445556",
         "superadmin": 0,
         "disabled": 0,
         "last_verification_action_date": "2015-05-14 11:24:09",
         "actual_login": "2015-06-10 09:45:54",
         "pwd_update_interval": "30"
      }
   }

Where:

* *id* is the internal ID of the admin

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
     - 8001
     - An administrator with this user name already exists.
     -
   * - 400
     - 8002
     - Invalid username
     - The provided username should only contain letters and numbers, or it is less then 3 characters long.
   * - 400
     - 8003
     - Invalid access level
     - For a list of available access level IDs, see see :doc:`administrator_access_levels`.
   * - 400
     - 8004
     - Invalid interface language code
     - For a list of available languages, see see :doc:`administrator_interface_languages`.
   * - 400
     - 8005
     - Invalid email
     -
   * - 400
     - 8022
     - Invalid mobile phone
     - Only numbers formatted as follows can be accepted: 36-XXXXXXXXX, where the country code has no prefix, and is
       separated from the number with a hyphen.
       Please note the following restrictions:

       - the country code must be between 1 and 3 digits long
       - the number after the hyphen must be between 6 and 20 digits long

   * - 400
     - 8006
     - Invalid password
     - Password should only contain letters and numbers.
   * - 400
     - 8006
     - Too weak password
     - Password must not have less than 10 characters, and must contain capital-, lowercase letters and numbers as well.
   * - 500
     - 1003
     - Database connection error
     -
   * - 400
     - 8019
     - Email violates domain restrictions
     - The domain provided in the email is not accepted.



