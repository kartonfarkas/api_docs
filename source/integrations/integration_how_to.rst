How to Integrate
================

In the following sections, we illustrate how it is possible to integrate with Suite functionalities. We will use
an SMS Automation Center node as an example service to give you ideas. 

Please note that this example illustrates how you can implement an Automation Center node or a Suite page.

.. image:: /_static/images/suite_integrations.png

A partner service can provide their own UI content by using an iframe to display the content as a *page in Suite*. Depending on how
the partner service was implemented, customer accounts can be selectively given access via a Suite menu entry.
For example, an SMS Automation Center node can enable you to edit the external SMS campaign content via its own
menu entry (i.e. Campaigns -> Entryname).

.. image:: /_static/images/iframe.png

The partner service can be integrated with the Automation Center as well
(see :doc:`automation_center/node` for details).

The Automation Center program then triggers the partner service as part of an Automation Center program
(see :doc:`automation_center/node_trigger_endpoint`).

.. image:: /_static/images/AC.png

During this process, the Automation Center can (optionally) include a service resource as well, e.g. an SMS campaign in the SMS node. Resources (i.e. SMS message text) can be included by clicking on the node and adjusting the configuration settings. 
When the dialog appears, the partner service is called to obtain the list of available resources via the :doc:`automation_center/node_resource_options_endpoint`.

.. image:: /_static/images/sms_campaign.png

If some services require more complex node configurations, then please use the
:doc:`automation_center/node_custom_node_dialogue_endpoint` instead of the
resource options endpoint. The custom node dialogue endpoint can embed the configuration interface provided by the
service via an iframe.
