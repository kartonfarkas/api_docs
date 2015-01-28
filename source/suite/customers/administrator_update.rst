Updating an Administrator
=========================

Modifies specific properties of an admin account.

.. include:: _warning.rst

Endpoint
--------

``POST /api/v2/administrator/patch``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - admin_id
     - int
     - ID of the admin
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - username
     - string
     - Username of the admin
     - Unique, it cannot be modified.
   * - password
     - string
     - Password used by the admin
     - Has to meet the password strength requirements.
   * - email
     - string
     - Email address
     -
   * - access_level
     - int
     - Access level ID of the admin
     - For a list of available access level IDs, see administrator/getaccesslevels.
   * - interface_language
     - string
     - Interface language of the admin account
     - For a list of available languages, see administrator/getinterfacelanguages.
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
   * - disabled
     - int
     - Indicates if the account is disabled (1) or not (0).
     -
   * - superadmin
     - int
     - Indicates if this administrator has superadmin access (1) or not (0).
     -

Result Example
--------------

Normal Result:

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": null
   }

Error Condition:

.. code-block:: json

   {
      "replyCode": 8002,
      "replyText": "Invalid username",
      "data": ""
   }


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
     - 8015
     - Invalid superadmin
     - its value is not 0 or 1
   * - 400
     - 8016
     - Invalid disabled
     - Its value is not 0 or 1.
   * - 400
     - 8017
     - Password is used recently
     - This password has already been used, it is not valid anymore.
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
     - For possible access level identifiers, see administrator/getaccesslevels.
   * - 400
     - 8004
     - Invalid interface language code
     - For possible languages, see administrator/getinterfacelanguages.
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

