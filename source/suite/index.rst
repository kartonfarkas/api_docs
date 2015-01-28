Suite REST API
==============

Suite REST API provides programmatic access to our service. Most of our customers are using our APIs
to automate working with :doc:`contacts/index`, :doc:`emails/index`, or :doc:`exports/index` related to contacts and
launches.

If you have already connected successfully to the API you might want to move straight to the `Use Cases <http://documentation.emarsys.com/?page_id=357>`_,
where we show you a number of typical API-related scenarios.

For each Suite API request you need:

 * the API URL based on the Suite environment you use (e.g. `https://suite5.emarsys.net/api/v2/`)
 * your *username* and *secret* for the API (please request it from your contact person)

Requests to the API must be authenticated. The authentication method of the API is X-WSSE, see :doc:`get_started/authentication`.

 * :doc:`get_started/authentication_php`
 * :doc:`get_started/authentication_perl`
 * :doc:`get_started/authentication_ruby`
 * :doc:`get_started/authentication_java`

We also provide a demo page where you can try the API (see :doc:`get_started/api_demo`.
If you need more help, we have listed some third party clients on the :doc:`get_started/sdk` page).

.. toctree::
   :maxdepth: 1

   get_started/index.rst
   customers/index.rst
   contacts/index.rst
   emails/index.rst
   exports/index.rst
   external_events/index.rst
   appendices/index.rst
