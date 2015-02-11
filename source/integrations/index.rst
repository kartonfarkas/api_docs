Suite Integrations
==================

We provide various methods for you to integrate with our services. You can integrate with the
Automation Center by creating a custom node that works with contacts, or you can add your
service to the Suite as a menu point and provide an integrated experience for your users.

.. include:: _warning.rst

.. raw:: html

   <h2>Authentication</h2>

We use the open source `Escher <http://escherauth.io/>`_ library to
sign requests sent to your service, and also to validate your incoming requests.
The endpoints **must** be implemented via the HTTPS protocol.

**Integration Points**:

* *Credential Scope* is specific to your service, for example "**eu.yourservice.ems_request**" (your contact person will share this information)
* *Algo Prefix* and *Vendor Key* are both set to "**EMS**"
* *Date Header Key* is set to "**X-Ems-Date**"
* *Authentication Header Key* is set to "**X-Ems-Auth**"

.. toctree::
   :maxdepth: 1

   integration_use_case.rst
   automation_center/node.rst
   iframe/iframe.rst
   marketplace/index.rst

.. image:: /_static/images/marketplace.png
