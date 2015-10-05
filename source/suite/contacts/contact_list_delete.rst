.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/contacts/delete-list/

Deleting a Contact List
=======================

Deletes a contact list.

Endpoint
--------

``POST /api/v2/contactlist/<list_id>/deletelist``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - list_id
     - int
     - ID of the contact list, part of the URI
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {}
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
   * - 404
     - 3006
     - No contact list found with the specified ID.
     -
