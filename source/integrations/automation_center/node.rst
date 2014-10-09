Automation Center - Node integration
====================================

The Automation Center node integration API allows you to add a node to Automation Center that will call your service on a predefined HTTP endpoint. When the program reaches your node, it will call the specified URL with a set of parameters, which you can use to trigger necessary actions for the contacts entering the node.

In the first sections we describe the HTTP interface that needs to be implemented by each service. Then we introduce you to an example service written in PHP, and to best practices recommended by Emarsys. In the last section you can read about planned changes to the API.

More information:

.. toctree::
   :maxdepth: 2

   node_implementation.rst

Example Service in PHP

Best practices

Coming soon

.. image:: /_static/images/ac_node_custom_dialog_workflow.png

.. image:: /_static/images/ac_node_options_workflow.png

.. image:: /_static/images/ac_node_trigger_workflow.png
