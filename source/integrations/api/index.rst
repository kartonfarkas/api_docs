Emarsys Partner API
===================

Emarsys Partner API is available for integrations. It provides access to the same endpoints
as our public Emarsys API, but the integration can make requests in the name of an Emarsys customer.
Requests must be signed with `Escher <http://escherauth.io/>`_.

For each request, you need an Escher key (for example: **suite_yourintegration_v1**) and a secret.
Escher library must be configured with these values:

* *Credential Scope*, which is **eu/suite/ems_request**.
* *Algo Prefix* and *Vendor Key*, which are both set to **EMS**.
* *Date Header Key*, which is set to **X-Ems-Date**.
* *Authentication Header Key*, which is set to **X-Ems-Auth**.

URLs for the API endpoints are similar to the public Emarsys API, but their path starts with
`/api/v2/internal/<customer_id>/...` instead of `/api/v2/...`, and the API itself is available at
`https://api.emarsys.net/`. For example, :doc:`../../suite/customers/customer_settings`
of the Emarsys customer with ID 12345678 will be available at:

``https://api.emarsys.net/api/v2/internal/123456789/settings``

If you wish to test the Partner API from the command line, we recommend using
`HTTPie <http://httpie.org/>`_, and our `EMS plugin for HTTPie <https://github.com/emartech/httpie-ems-auth>`_.
