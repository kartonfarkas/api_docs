Creating a Source
=================

Creates a new source for your contacts with the specified name.

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
     - the name of the source to be created
     -

JSON Payload Example
--------------------

.. code-block:: json

   {
     "name": "my_new_source"
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
     - 7001
     - An external event with the requested name already exists.
     -
   * - 500
     - 7003
     - Database connection error.
     - An error occurred while saving.