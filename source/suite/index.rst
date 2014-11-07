Suite API
=========

Suite API provides programmatic access to our service. Most of our customers are using our APIs
to automate working with `Contacts <http://emarsys-dev.readthedocs.org/en/latest/suite/contacts/index.html>`_, `Email Campaigns and Launches <http://emarsys-dev.readthedocs.org/en/latest/suite/emails/index.html>`_, or `Export Data <http://emarsys-dev.readthedocs.org/en/latest/suite/exports/index.html>`_ related to contacts and
launches.

If you have already connected successfully to the API you might want to move straight to the `Use Cases <http://documentation.emarsys.com/?page_id=357>`_,
where we show you a number of typical API-related scenarios.

For each Suite API request you need:

 * The URL of the Suite environment API you use (e.g.: https://suite5.emarsys.net/api/v2/)
 * Your username for the API
 * Your secret for the API

Requests to the API must be authenticated. The authentication method of the API is X-WSSE, see `Authentication <http://emarsys-dev.readthedocs.org/en/latest/suite/overview/authentication.html>`_.

 * `PHP <http://emarsys-dev.readthedocs.org/en/latest/suite/overview/authentication_php.html>`_
 * `Perl <http://emarsys-dev.readthedocs.org/en/latest/suite/overview/authentication_perl.html>`_
 * `Ruby <http://emarsys-dev.readthedocs.org/en/latest/suite/overview/authentication_ruby.html>`_
 * `Java <http://emarsys-dev.readthedocs.org/en/latest/suite/overview/authentication_ruby.html>`_

We also provide a demo page where you can get impressions on `The API Demo Page <http://emarsys-dev.readthedocs.org/en/latest/suite/overview/api_demo.html>`_.
We have no SDKs at the moment, if you need more help, you can try SDKs `here <http://emarsys-dev.readthedocs.org/en/latest/suite/overview/sdk.html>`_.

.. toctree::
   :maxdepth: 1

   overview/index.rst
   customers/index.rst
   contacts/index.rst
   emails/index.rst
   exports/index.rst
   external_events/index.rst
   appendices/index.rst
