Starting Programs
=================

Starts Automation Center programs with entry point API nodes of an integration where the resource of the entry point
API node is the same as the resource ID.

Endpoint
--------

``POST /api/v2/ac/programs/entrypoints/<integration_id>/resources/<resource_id>/runs``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - integration_id
     - string
     - ID of the integration
     -
   * - resource_id
     - int
     - Resource ID of the integration selected in the integration's API node (http://dev.emarsys.com/integrations/automation_center/node.html)
     -
   * - contact_list_id
     - int
     - ID of the contact list which gets into the program
     - Please note that either contact_list_id or contact_id must be provided.
   * - contact_id
     - int
     - ID of the contact which gets into the program
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


