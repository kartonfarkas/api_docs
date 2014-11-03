Create Admin
============

.. warning::

   The administrator API is available only from specific IP addresses. For more information, please contact emarsys support.

This action creates a new administrator.

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
     -
     -
   * - password
     - string
     -
     -
   * - email
     - string
     -
     -
   * - access_level
     - int
     - the ID of the access level of the new administrator
     - for possible access level identifiers, see administrator/getaccesslevels
   * - interface_language
     - string
     - the language of the interface is shown to the new administrator
     - for possible languages, see administrator/getinterfacelanguages

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - first_name
     - string
     -
     -
   * - last_name
     - string
     -
     -
   * - position
     - string
     -
     -

Result Data Structure
---------------------

 * id: integer

Where the ID is the internal identifier of the administrator.

Result Example
--------------

.. code-block:: json

   {
       "replyCode": 0,
       "replyText": "OK",
       "data":
       {
           id: 456
       }
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



