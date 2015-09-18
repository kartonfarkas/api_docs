Starting Programs
=================

Starts Automation Center programs with the specified node_type entry point API nodes, where
the selected resource of the node is the same as the specified resource_id.

Endpoint
--------

``POST /api/v2/ac/programs/entrypoints/<node_type>/resources/<resource_id>/runs``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - node_type
     - string
     - The string ID of the integration's node, provided by Emarsys, part of the URI
     -
   * - resource_id
     - int
     - Resource ID of the integration selected in the integration's API node (http://dev.emarsys.com/integrations/automation_center/node.html), part of the URI
     -
   * - contact_list_id
     - int
     - ID of the contact list which gets into the program
     - Please note that either contact_list_id or contact_id must be provided.
   * - contact_id
     - int
     - ID of the contact which gets into the program
     - Please note that either contact_list_id or contact_id must be provided.

URI Example
-----------

* ``/api/v2/ac/programs/entrypoints/example-event/resources/42/runs``

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


