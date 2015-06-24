Fetching Contact Internal ID
============================

Returns the internal ID of a contact based on a specified key ID.

Endpoint
--------

``GET /api/v2/contact/<key_field_id>=<key_field_value>``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - key_field_id
     - mixed
     - ID of the key field to use
     -
   * - key_field_value
     - field dependent
     - Key field value to use in the query
     -

URI Examples
------------

* ``/api/v2/contact/3=email@example.com``

* ``/api/v2/contact/5=1``

* ``/api/v2/contact/98012=1,2,3,4``

* ``/api/v2/contact/98205=http:////www.example.com``

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": "123"
     }
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
     - 2004
     - Invalid key field id: [field_id]
     - The field ID does not exist.
   * - 400
     - 2005
     - No value provided for key field: [field_id]
     - The value of the key field has not been provided or is empty.
   * - 400
     - 2008
     - No contact found with the specified external ID
     - There is no match for the specified ID.
   * - 400
     - 2010
     - More than one contact found with the specified external ID
     - There is more than one contact selected.
