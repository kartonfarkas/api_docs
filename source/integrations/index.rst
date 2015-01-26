Suite Integrations
==================

We are providing several opportunities to integrate with our services. You can integrate with the
Automation Center by creating a custom node that works with contacts, or you can add your
service to the Suite as a menu point and provide an integrated experience for your customers.

.. raw:: html

   <h2>Authentication</h2>

We are using the open source `Escher <http://escherauth.io/>`_ library to
sign our requests. It is demanded that the endpoints are implemented through the HTTPS protocol.

**Escher parameters**:

* *credentialScope* is service specific (your contact person will share this information)
* *AlgoPrefix* and *VendorKey* are both set to "**EMS**"
* *DateHeaderKey* is set to "**X-Ems-Date**"
* *AuthHeaderKey* is set to "**X-Ems-Auth**"

.. toctree::
   :maxdepth: 1

   automation_center/node.rst
   iframe/iframe.rst
   integration_guide.rst
