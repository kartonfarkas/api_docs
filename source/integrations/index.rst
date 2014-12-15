Integration Implementation Guide
================================

We are providing several opportunities to integrate with our services. In the following sections, we illustrate how it
is possible to integrate with the Suite via an example implementation.

A typical service provides a platform with an iframe which is displayed in the Suite and it provides access for Emarsys
customers to the partner service with `Escher <http://escherauth.readthedocs.org/en/latest/#>`_. For example,
the SMS Node makes the editing of the SMS campaigns possible.

.. image:: /_static/images/iframe.jpg

The partner service can integrate with the Automation Center as well (see `Registering your Service with Automation
Center <http://emarsys-dev.readthedocs.org/integrations/automation_center/node_registering_your_service.html>`_ for
instructions).

The Automation Center program can trigger the partner service as a part of the program (see `Trigger endpoint
<http://emarsys-dev.readthedocs.org/integrations/automation_center/node_trigger_endpoint.html>`_.)

.. image:: /_static/images/AC.jpg

The partner service will trigger a particular resource (e.g. an SMS campaign in the SMS Node). To select this resource,
the partner service has to attain the `Resource options endpoint
<http://emarsys-dev.readthedocs.org/integrations/automation_center/node_resource_options_endpoint.html>`_.

.. image:: /_static/images/sms_campaign.jpg

.. toctree::
   :maxdepth: 1

   automation_center/node.rst
   iframe/iframe.rst
