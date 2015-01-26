Creating an Administrator
=========================

Creates a new administrator.

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
     - name of the admin
     -
   * - password
     - string
     - password of the admin
     -
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
     - the language of the interface which is shown to the new administrator
     - for possible languages, see administrator/getinterfacelanguages

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

Where *id* is the internal ID of the administrator.

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



