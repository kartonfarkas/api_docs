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
     -
   * - email
     - string
     - Email address
     -
   * - access_level
     - int
     - Desired access level ID of the new admin
     - For a list of available access level IDs, see administrator/getaccesslevels.
   * - interface_language
     - string
     - Interface language for the new admin account
     - For a list of available languages, see administrator/getinterfacelanguages.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20

   * - Name
     - Type
   * - first_name
     - string
   * - last_name
     - string
   * - position
     - string

Request Example
---------------

.. code-block:: json

   {
     "username": "black_panther",
     "password": "",
     "pwd_update_interval": "30",
     "email": "black.panther@rvnbizu.com",
     "access_level": "1",
     "interface_language": "en",
     "default_upages_lang": "en",
     "first_name": "Black",
     "last_name": "Panther",
     "mobile_phone": "",
     "tz": "",
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
       "data":
       {
           "id": 456
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
     - For a list of available access level IDs, see administrator/getaccesslevels
   * - 400
     - 8004
     - Invalid interface language code
     - For a list of available languages, see administrator/getinterfacelanguages
   * - 400
     - 8005
     - Invalid email
     -
   * - 400
     - 8006
     - Invalid password
     - Password should only contain letters and numbers.
   * - 400
     - 8006
     - Too weak password
     - The password should be at least 8 character long and should contain both letters and numbers.
   * - 500
     - 1003
     - Database connection error
     -



