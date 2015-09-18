Creating an Additional Contact Source
=====================================

Creates and labels a new source for your contacts to enter the Emarsys DB from, which can be used to track
the origin of contact data changes. Change tracking information will be available for you at
:doc:`../exports/export_changes`.

.. note:: For other purposes, contacts have a system source field (field id #33) dedicated to record the
          source of the contact (e.g. Manual entry, Import or Registration form).

Endpoint
--------

``POST /api/v2/source/create``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - name
     - string
     - Name of the contact source to be created.
     -

JSON Payload Example
--------------------

.. code-block:: json

   {
     "name": "my_super_source"
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
     - 7001
     - An external event with the requested name already exists.
     -
   * - 500
     - 7003
     - Database connection error.
     - An error occurred while saving.
