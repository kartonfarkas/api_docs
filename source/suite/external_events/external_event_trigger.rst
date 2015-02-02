Triggering External Events
==========================

Trigger any named External Event for a specified contact.

Endpoint
--------

``POST /api/v2/event/<id>/trigger``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - id
     - int
     - ID of the external event, part of the URI
     -
   * - key_id
     - mixed
     - Key which which identifies the contacts
     - field id, "id" or "uid".
   * - external_id
     - string
     - External ID for the given field specified with field_id
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - data
     - string
     - External Data in JSON format
     -

JSON Payload Example
--------------------

.. code-block:: json

   {
     "key_id": "3",
     "external_id": "thor@example.com",
     "data":
     {
       "global":
       {
         "itemName": "hammer",
         "itemPrice": "123"
       }
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
     - The value of the key field was not provided or is empty.
   * - 400
     - 2008
     - No contact found with the external id: [key_id] - [external_id]
     - No match for the specified [key_id] - [external_id] pair.
   * - 400
     - 2010
     - More contacts found with the external id: [key_id] - [external_id].
     - More than one contacts selected.
   * - 400
     - 5001
     - Invalid event id for customer.
     - The customer doesn't have an external event with the specified [id].
   * - 400
     - 2012
     - Invalid contact id for customer.
     - The customer doesn't have a contact with the specified [external_id].

