Updating an Administrator
=========================

.. warning::

   The administrator API is available only from specific IP addresses. For more information, please contact Emarsys Support.

Modifies specific properties of an admin.

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
     - name of the admin
     - unique, cannot be modified
   * - password
     - string
     - password of the admin
     - has to exceed the password strength limit
   * - email
     - string
     - email address
     -
   * - access_level
     - int
     - the ID of the access level of the new administrator
     - for possible access level identifiers, see administrator/getaccesslevels
   * - interface_language
     - string
     - the language of the interface is shown to the new administrator
     - for possible languages, see administrator/getinterfacelanguages
   * - first_name
     - string
     - first name of the admin
     -
   * - last_name
     - string
     - last name of the admin
     -
   * - position
     - string
     - position of the admin
     -
   * - disabled
     - int
     - 0 is unlocked, 1 is locked/unavailable
     -
   * - superadmin
     - int
     - assigns 1 to the superadmin of the customer and 0 to others. Superadmin can set admins on the UI.
     -

Result Example
--------------

Normal Result:

.. code-block:: json

{
   "replyCode":0,
   "replyText":"OK",
   "data":null
}

Error Condition:

.. code-block:: json

{
   "replyCode":8002,
   "replyText":"Invalid username",
   "data":""
}


Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

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
     - its value is not 0 or 1
   * - 400
     - 8017
     - Password is used recently
     - this password has already been used, it is not valid anymore
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
     - For possible access level identifiers, see administrator/getaccesslevels
   * - 400
     - 8004
     - Invalid interface language code
     - For possible languages, see administrator/getinterfacelanguages
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

