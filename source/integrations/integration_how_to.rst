Integration How-to
==================

In the following steps, we illustrate how it is possible to integrate with the Emarsys B2C Marketing Cloud.
We will use an SMS channel integration to give you ideas. This example will cover Automation Center node
and Single Sign-on integration.

.. image:: /_static/images/suite_integrations.png

Using :doc:`iframe/index`, the integration can provide its own UI content by using an iframe to display the
content as a *page in Emarsys*. For example, the SMS channel integration can enable you to edit the
SMS campaigns via its own menu entry (i.e. Channels -> SMS Campaigns).

.. image:: /_static/images/iframe.png

The integration can implement Automation Center nodes as well (see :doc:`automation_center/node` for details),
for example a node that sends out SMS messages. The user of Automation Center can click on the node and
select an SMS campaign (:doc:`automation_center/node_resource_options_endpoint`), and Automation Center
will trigger the integration when the program run arrives at the node
(see :doc:`automation_center/node_trigger_endpoint`).

.. image:: /_static/images/AC.png

.. image:: /_static/images/sms_campaign.png

If an integration requires a more complex node configuration, it can use the
:doc:`automation_center/node_custom_node_dialogue_endpoint` instead of the resource options endpoint.
The custom node dialogue endpoint can embed the configuration interface provided by the integration via an iframe.
