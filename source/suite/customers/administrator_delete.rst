Deleting an Administrator Account
=================================

Info on how to delete an admin account and pass their rights to another admin account.

.. include:: _warning.rst

Endpoint
--------

``POST /api/v2/administrator/<admin_id>/delete``

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
     - ID of the admin to delete
     -
   * - successor_administrator_id
     - int
     - ID of the admin to take over the deleted admin's rights
     -

Result Example
--------------

.. code-block:: json

   {
       "replyCode": 0,
       "replyText": "OK",
       "data": {}
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
     - 8007
     - Cannot delete administrator, because it does not exist.
     -
   * - 400
     - 8008
     - Deletion of the administrator is not allowed.
     -
   * - 400
     - 8009
     - Current administrator cannot be deleted.
     -
   * - 400
     - 8010
     - Unauthorised to delete administrator.
     -
   * - 400
     - 8011
     - Successor administrator does not exist.
     -
   * - 400
     - 8012
     - Successor administrator is the same administrator that is requested to be deleted.
     -
   * - 400
     - 8013
     - Successor administrator does not exist.
     -
   * - 400
     - 8014
     - Invalid successor administrator ID: <id>
     - Administrator ID should be an integer.
   * - 500
     - 1003
     - Database connection error
     -

