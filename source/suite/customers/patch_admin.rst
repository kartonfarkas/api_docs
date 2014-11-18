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

.. code-block:: json

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
     -
     - its value is not 0 or 1
   * - 400
     - 8016
     -
     - its value is not 0 or 1
   * - 400
     - 8017
     -
     - this password has already been used, it is not valid anymore

