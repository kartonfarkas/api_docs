Integration Guide
=================

In the following, we illustrate how it is possible to integrate with the Suite. We will use
an SMS Automation Center Node as an example service to give you ideas. Please note that this
is just an example, you can implement an Automation Center node, or a Suite Page only.

A partner service can provide an UI with an iframe displayed as a *page in Suite*. Depending on
the implementation, (selected or all) customers will be able to access it via a Suite menu point.
For example an SMS Automation Center Node can provide the editing of the SMS campaigns via this
interface.

.. image:: /_static/images/iframe.png

The partner service can integrate with the Automation Center as well
(see :doc:`automation_center/node` for details).

The Automation Center program can trigger the partner service as part of an Automation Center program
(see :doc:`automation_center/node_trigger_endpoint`).

.. image:: /_static/images/AC.png

During this process, the Automation Center optionally passes a service resource as well
(for example an SMS campaign in the SMS Node). The resource can be selected by the customer
during configuring the node, by clicking on it. When the dialog appears, it calls the partner service
to obtain the list of the available resources via the :doc:`automation_center/node_resource_options_endpoint`.

.. image:: /_static/images/sms_campaign.png

If some services require more complex solutions to configure the node, the
:doc:`automation_center/node_custom_node_dialogue_endpoint` should be used instead of the
resource options endpoint. It can embed the configuration interface provided by the
service via an iframe.
