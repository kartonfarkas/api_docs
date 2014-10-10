Resources
=========

Your service may or may not need a set of node specific settings from the user. We refer to such a setting as a resource.  If your service needs such resources, then there are two supported ways to handle them. 

The first option is the ‘Resource options endpoint’. In this case your service needs to provide a list of options and the customer (Automation Center user) will be able to select one from a drop down list in the program node dialog. To enable this feature the ‘Resource options endpoint’ needs to be implemented.

For example if your service sends SMS messages, you will want to set up the content of the messages. Each of these setups should be stored and managed by your service. Resources should have an integer ID, and this ID is passed to the trigger endpoint in the resource_id parameter. (A string ID can also be used, but we suggest using integers when possible.)

The second option is using the ‘Custom node dialogue endpoint’. In this case your service should provide an HTML page that will be rendered inside an iframe in the node dialogue. This can be used to integrate the resource management page into Automation Center.

More information:

.. toctree::
   :maxdepth: 2

   node_resource_options_endpoint.rst
   node_custom_node_dialog_endpoint.rst