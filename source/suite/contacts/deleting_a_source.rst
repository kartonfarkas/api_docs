Deleting a Source
=================

Deletes an existing source.

Endpoint
--------

``DELETE /api/v2/source/<id>``

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 7002
     - The requested external source does not exist.
     -
   * - 500
     - 7003
     - Database connection error.
     - An error occurred while saving.