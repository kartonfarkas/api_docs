Integration Implementation Guide
================================

We are providing several opportunities to integrate with our services. In the following sections, we illustrate how it
is possible to integrate with the Suite via an example implementation.

A typical service provides a platform with an iframe which is displayed in the Suite and it provides access for Emarsys
customers to the partner service with `Escher <http://escherauth.readthedocs.org/en/latest/#>`_. For example,
the SMS Node makes the editing of the SMS campaigns possible.

.. image:: /_static/images/iframe.png

The partner service can integrate with the Automation Center as well (see `Registering your Service with Automation
Center <http://emarsys-dev.readthedocs.org/integrations/automation_center/node_registering_your_service.html>`_ for
instructions).

The Automation Center program can trigger the partner service as a part of the program (see `Trigger Endpoint
<http://emarsys-dev.readthedocs.org/integrations/automation_center/node_trigger_endpoint.html>`_).

.. image:: /_static/images/AC.png

During this process, the Automation Center passes a resource as well (e.g. an SMS campaign in the SMS Node). To select this resource,
the partner service has to attain the `resource options endpoint
<http://emarsys-dev.readthedocs.org/integrations/automation_center/node_resource_options_endpoint.html>`_. The customer
can select the resource when a node is added by clicking on it. In this popup dialog, the items provided by the
resource options endpoint appear.

.. image:: /_static/images/sms_campaign.png

If some services require more complex solutions, the `custom node dialog endpoint
<http://emarsys-dev.readthedocs.org/integrations/automation_center/node_custom_node_dialogue_endpoint.html>`_ is used
instead of the resource options endpoint.