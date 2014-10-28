Suite API
=========

Since you are using the eMarketing Suite API, we assume that you have a little background in programming
and have a basic understanding of the techniques we use in our examples. In the Programmers’ Guide we
will guide you through the necessary steps to sending your first request via the API.

If you have already connected successfully to the API you might want to skip this page and move straight
to the Use Cases, where we show you a number of typical API-related scenarios.

For each Suite API request you need:

 * Your username for the API
 * Your secret for the API
 * The URL of the Suite environment API you use (e.g.: https://suite5.emarsys.net/api/v2/)

This information is required to create the API Authentication Header, which must be passed with every single request (click here for details). If you do not have any of the data listed above, please contact your Account Manager.

.. note::

   Always make sure not to reveal your API secret, for example by including it in plain text in the HTML
   or JavaScript source of your web page. Your username for the eMarketing Suite API differs from the
   username for the eMarketing Suite GUI.

Contents:

.. toctree::
   :maxdepth: 1

   authentication.rst
   authentication_java.rst
   authentication_perl.rst
   authentication_php.rst
   authentication_ruby.rst
   api_demo.rst
   email_and_form_types.rst
   encoding_and_responses.rst
   error_codes.rst
   first_steps.rst
   get_request.rst
   prerequisites.rst
   status_codes.rst
   suite_api_au_header.rst
   time_zones.rst
   customers/index.rst
   contacts/index.rst
   emails/index.rst
   exports/index.rst
   external_events/index.rst
   others/index.rst

