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
     - username for the new admin
     - Use actual names for easy maintenance, etc.
   * - password
     - string
     - password for the new admin
     -
   * - email
     - string
     - email address
     -
   * - access_level
     - int
     - desired access level ID of the new admin
     - For a list of available access level IDs, see administrator/getaccesslevels.
   * - interface_language
     - string
     - interface language for the new admin account
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



