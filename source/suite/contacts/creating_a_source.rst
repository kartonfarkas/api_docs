Creating a Source
=================

This creates a new source for your contacts with the specified name.
Source is used for tracking the source of contact data changes.
This information will be available for you at :doc:`../exports/changes.html`.
Please note that for other purposes, contacts have a system source field (field id #33) dedicated to record the source of the
contact (like Manual entry, Import or Registration form).

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