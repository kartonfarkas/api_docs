Updating a Contact
==================

Updates a single contact using their external ID as reference.

.. note:: Please note that read-only fields, which are listed in System Fields, cannot be updated.

Endpoint
--------

``PUT /api/v2/contact``

Parameters
----------

Required Parameters
^^^^^^^^^^^^^^^^^^^

Key-value pairs which identify the contact.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - key_id
     - mixed
     - Key which identifies the contacts
     - This can be a `field id <../../suite/appendices/system_fields.html>`_, **id** or **uid**. If left empty, the internal ID will be used by default. Value provided
       for the key_id field identifies the contact which will be updated. The other fields contain the changes requested
       for the contact. If more than one contact with the requested external ID is found, an error message is returned, [field_id]
   * - source_id
     - int
     - ID assigned to a customer's external application, and is used to identify contacts created or modified by the external (3rd party) applications, [source_id]
     -

See :doc:`contact_create` for further information.

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
     - 2010
     - More contacts found with the external ID: [field_id] – [value]
     - More than one contact with the provided key field value exists in the database. A unique external key must be provided.
   * - 400
     - 2008
     - No contact found with the external ID: [field_id] – [value]
     - No contact with the provided key field value exists in the database. The contact must be created; see Create a Contact.
   * - 400
     - 2004
     - Cannot use id or uid as key on contact creation
     - IDs cannot be specified manually.
   * - 400
     - 2007
     - Cannot set id or uid on contact creation
     - IDs cannot be specified manually.

Also see :doc:`contact_create` for further information.
