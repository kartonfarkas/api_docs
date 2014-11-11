Updating a Contact
==================

Updates a contact identified by an external ID.

Endpoint
--------

``PUT /api/v2/contact``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - key_id
     - int
     - [field_id]
     - The value provided for the key_id field identifies the contact which will be updated. The other fields contain the changes requested for the contact. If more than one contact with the requested external ID is found, an error message is returned.

See `Create a Contact <http://documentation.emarsys.com/?page_id=166>`_ for further information.

**Optional Parameters**

See `Create a Contact <http://documentation.emarsys.com/?page_id=166>`_ for further information.

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

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

Also see `Create a Contact <http://documentation.emarsys.com/?page_id=166>`_ for further information.
