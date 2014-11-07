Suite API
=========

Suite REST API provides programmatic access to our service. You can work with Contacts, Email Campaigns,
Launches and Export Data related to contacts and launches.

If you have already connected successfully to the API you might want to move straight to the Use Cases,
where we show you a number of typical API-related scenarios.

For each Suite API request you need:

 * The URL of the Suite environment API you use (e.g.: https://suite5.emarsys.net/api/v2/)
 * Your username for the API
 * Your secret for the API

This information is required to create the API Authentication Header, which must be passed with every single
request. If you do not have any of the data listed above, please contact your Account Manager.

.. note::

   Always make sure not to reveal your API secrets, for example by including it in plain text in the HTML
   or JavaScript source of your web page. Your API username and secret differ from the username for the
   eMarketing Suite GUI.

.. toctree::
   :maxdepth: 1

   authentication.rst
   api_demo.rst
   customers/index.rst
   contacts/index.rst
   emails/index.rst
   exports/index.rst
   external_events/index.rst
   others/index.rst
   sdk.rst
