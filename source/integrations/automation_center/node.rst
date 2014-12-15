Creating Automation Center Nodes
================================

The Automation Center node integration API allows you to add a node to Automation Center that will
call your service on a predefined HTTP endpoint. When the program reaches your node, it will call
the specified URL with a set of parameters, which you can use to trigger necessary actions for the
contacts entering the node.

In the first sections we describe the HTTP interface that needs to be implemented by each service.
Then we introduce you an example service written in PHP, and best practices recommended by
Emarsys. In the last section, you can read about planned changes to the API.

Authentication
==============

We are using the open source `Escher <http://escherauth.readthedocs.org/en/latest/#>`_ library for request signing. Note that each of the endpoints are available
through the HTTPS protocol.

.. toctree::
   :maxdepth: 1

   node_registering_your_service.rst
   node_trigger_endpoint.rst
   node_resource_options_endpoint.rst
   node_custom_node_dialogue_endpoint.rst
   node_example.rst
   node_implementing_the_trigger.rst
   node_implementing_the_resource.rst
   node_best_practices.rst

Useful Resources
================

 * `Querying Used Program Resources </suite/program_resources.html>`_
 * `List Contacts in a Contact List </suite/contacts/listing_contacts_in_a_list.html>`_
 * `Getting Contact Data </suite/contacts/getting_contact_data.html>`_

