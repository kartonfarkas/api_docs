Emarsys Integration Platform
============================

We provide various methods for you to integrate with the Emarsys B2C Marketing Cloud. Our goal
is to create a platform for seamless and deep integrations. Besides using our API, you can
extend Automation Center with your own nodes, create pages or page blocks in the Emarsys
application or subscribe to events in our system.

.. include:: _warning.rst

.. raw:: html

   <h2>Authentication</h2>

We use the open source `Escher <http://escherauth.io/>`_ library to
sign requests sent to your service, and also to validate your incoming requests to the
Emarsys API. The endpoints **must** support the HTTPS protocol.

Escher library should be configured with these values:

* *Credential Scope* is specific to the service the request is going to. If you are receiving
  calls from us, it will be your credential scope, for example "**eu/yourservice/ems_request**".
  If you are sending requests to the Emarsys API, you have to set the credential scope to
  "**eu/suite/ems_request**".
* *Algo Prefix* and *Vendor Key* are both set to "**EMS**"
* *Date Header Key* is set to "**X-Ems-Date**"
* *Authentication Header Key* is set to "**X-Ems-Auth**"

.. toctree::
   :maxdepth: 1

   integration_how_to.rst
   api/index.rst
   lifecycle_events/index.rst
   iframe/iframe.rst
   automation_center/node.rst

.. image:: /_static/images/marketplace.png
