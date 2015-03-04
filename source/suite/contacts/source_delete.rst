Deleting a Contact Source
=========================

Deletes an existing contact source.

Endpoint
--------

``DELETE /api/v2/source/<source_id>``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - source_id
     - int
     - ID of the contact source to be deleted.
     -

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
     - 7002
     - The requested external source does not exist.
     -
   * - 500
     - 7003
     - Database connection error.
     - An error occurred while saving.
