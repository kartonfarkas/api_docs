Deleting a Source
=================

Deletes an existing source.

Endpoint
--------

``DELETE /api/v2/source/<id>``

Errors
------

.. list-table:: Possible error codes

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 7002
     - The requested external source does not exist.
     - No source exists with the requested ID.
   * - 500
     - 7003
     - Database connection error.
     - An error occurred while saving.