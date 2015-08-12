Starting a Program
==================

Starts an Automation Center program with triggering an external event by providing a contact list or contact.

.. note:: With the entry API node, it is possible to send only transactional email campaigns in Automation Center.

Endpoint
--------

``POST /api/v2/ac/programs/entrypoints/<service_id>/resources/<resource_id>/runs``

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


