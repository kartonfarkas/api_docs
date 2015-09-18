Automation Center Nodes
=======================

The Automation Center node integration API allows you to add a node to Automation Center that will
call your service on a predefined HTTP endpoint. When the program reaches your node, it will call
the specified :doc:`node_trigger_endpoint` with a set of parameters, including a contact list ID.
You can then use this endpoint to trigger the desired actions for the contacts entering the node.

HTTP Interfaces
---------------

The following describes the HTTP interface(s) that need to be implemented for each Automation Center
node integration. Sample PHP code is included for each interface.

.. toctree::
   :maxdepth: 1

   node_trigger_endpoint
   node_resource_options_endpoint
   node_custom_node_dialogue_endpoint

Integration Checklist
---------------------

The following is a requirements checklist regarding the information we need to create and enable an
Automation Center node. We also have collected and included some best practices based on our experience
with Emarsys Integrations.

.. toctree::
   :maxdepth: 1

   node_registering_your_service
   node_best_practices

Useful Resources
----------------

The following is a collection of resources which can help with e.g. providing the details of the contacts
from the contact list specified at the trigger endpoint, or information about the usage of a resource.

* :doc:`../../suite/contacts/contact_list_list_contacts`
* :doc:`../../suite/contacts/contact_data`
* :doc:`../../suite/appendices/program_resources`
* :doc:`../../suite/appendices/program_run`
