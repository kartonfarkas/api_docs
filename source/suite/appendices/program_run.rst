Creating a Program Run
======================

Starts an Automation Center program after user data change.

.. note:: With the entry API node, it is possible to send only transactional email campaigns in Automation Center.

Endpoint
--------

``POST http://api.emarsys.net/api/v2/ac/programs/entrypoints/<service-id>/resources/<resource-id>/runs``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - service_id
     - string
     - ID of the external service
     -
   * - resource_id
     - int
     - Settings of a particular node of a customer in the Automation Center
     -
   * - contact_list_id
     - int
     - ID of the contact list which gets into the program after triggering an endpoint
     - Please note that either contact_list_id or contact_id must be provided.
   * - contact_id
     - int
     - ID of the contact which gets into the program after triggering an endpoint
     - Please note that either contact_list_id or contact_id must be provided.

Request Example
---------------

.. code-block:: json

   {
      "contact_list_id": 123456789
   }

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": ""
   }


