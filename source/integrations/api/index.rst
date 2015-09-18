Emarsys Partner API
===================

The Emarsys Partner API is available for integrations. It provides access to the same endpoints
as our public Emarsys API, but the integration can make requests in the name of an Emarsys customer.
The requests must be signed with `Escher <http://escherauth.io/>`_.

For each requests, you will need an Escher key (for example: **suite_yourintegration_v1**) and secret.
The Escher library should configured with these values:

* *Credential Scope* is "**eu/suite/ems_request**".
* *Algo Prefix* and *Vendor Key* are both set to "**EMS**"
* *Date Header Key* is set to "**X-Ems-Date**"
* *Authentication Header Key* is set to "**X-Ems-Auth**"

The URLs for the API endpoints are similar to the public Emarsys API, but the path start with
`/api/v2/internal/<customer_id>/...`, instead of `/api/v2/...`. The API is available at
`https://api.emarsys.net/`. For example, :doc:`../../suite/customers/customer_settings`
of the Emarsys customer with ID 12345678 will be available at:

``https://api.emarsys.net/api/v2/internal/12345678/settings``

If you would like to test the Partner API from the command line, we recommend using
`HTTPie <http://httpie.org/>`_, and our `EMS plugin for HTTPie <https://github.com/emartech/httpie-ems-auth>`_.
