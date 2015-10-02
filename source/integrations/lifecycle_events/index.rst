.. meta::
   :http-equiv=refresh: 0; url=http://documentation.emarsys.com/resource/developers/lifecycle-events/

Integration Lifecycle Events
============================

Integrations of the Emarsys B2C Marketing Cloud can be enabled per Emarsys customer account. When the
integration is installed or uninstalled, our platform can report these events to the integration via
HTTP calls. It also passes relevant customer information optionally. Based on these, the integration
can set up users or do other administration tasks.

HTTP Interfaces
---------------

In the following pages, we describe the HTTP interface which the integration can implement.

.. toctree::
   :maxdepth: 1

   installation.rst
   removal.rst
