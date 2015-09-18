Emarsys API
===========

The Emarsys API provides programmatic access to the Emarsys B2C Marketing Cloud. Most of our customers use
our API to automate working with :doc:`contacts/index`, :doc:`emails/index`, or :doc:`exports/index` related
to contacts and launches.

If you have already connected successfully to the API, you might want to move straight to the
`Use Cases <http://documentation.emarsys.com/resource/api-getting-started/api-use-cases/>`_, where we show
you a number of typical API-related scenarios.

For each Emarsys API request, you need:

 * the API URL based on the Emarsys environment you use (e.g. `https://suite5.emarsys.net/api/v2/`)
 * your *username* and *secret* for the API (please request them from your contact person)

Our API is rate limited, please read the details at :doc:`get_started/rate_limiting`. And there's a
general 8MB limit for request payload size.

Requests to the API must be authenticated. The authentication method of the API is WSSE, see
:doc:`get_started/authentication`. The following is a list of examples for how to authenticate with
this protocol using different programming languages:

 * :doc:`get_started/authentication_php`
 * :doc:`get_started/authentication_perl`
 * :doc:`get_started/authentication_ruby`
 * :doc:`get_started/authentication_java`
 * :doc:`get_started/authentication_csharp`
 * :doc:`get_started/authentication_go`

We also provide a demo page where you can try the API (see :doc:`get_started/api_demo`), and if
you need any help, we have listed some third party clients on the :doc:`get_started/sdk` page for
your convenience.

If you would like to test our API from the command line, we recommend using `HTTPie <http://httpie.org/>`_,
and our `WSSE plugin for HTTPie <https://github.com/emartech/httpie-wsse-auth>`_.

.. toctree::
   :maxdepth: 1

   get_started/index.rst
   customers/index.rst
   contacts/index.rst
   emails/index.rst
   exports/index.rst
   external_events/index.rst
   automation_center/index.rst
   appendices/index.rst
   api_endpoints/index.rst
