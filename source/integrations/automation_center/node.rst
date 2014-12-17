Creating Automation Center Nodes
================================

The Automation Center node integration API allows you to add a node to Automation Center that will
call your service on a predefined HTTP endpoint. When the program reaches your node, it will call
the specified :doc:`node_trigger_endpoint` with a set of parameters (including a contact list ID),
which you can use to trigger necessary actions for the contacts entering the node.

Authentication
--------------

We are using the open source `Escher <http://escherauth.io>`_ library to sign our requests. Note that each of the
endpoints are available through the HTTPS protocol.

HTTP Interfaces
---------------

In these pages, we describe the HTTP interface that needs to be implemented for each Automation Center node
integration. An example PHP code is included.

.. toctree::
   :maxdepth: 1

   node_trigger_endpoint
   node_resource_options_endpoint
   node_custom_node_dialogue_endpoint

Integration
-----------

We have created a checklist about the information we need to enable an Automation Center node, and collected some best
practices based on our experiences with Suite integrations.

.. toctree::
   :maxdepth: 1

   node_registering_your_service
   node_best_practices

Useful Resources
----------------

We recommend checking out these resources. These can provide the details of the contacts
from the contact list specified at the trigger endpoint, or information about
the usage of a resource.

* :doc:`../../suite/contacts/contact_list_list_contacts`
* :doc:`../../suite/contacts/contact_data`
* :doc:`../../suite/appendices/program_resources`
