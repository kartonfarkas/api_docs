Suite Page (iframe)
===================

Suite provides an integration point where your service can be integrated to Suite as a page. We will add a new menu entry, and
load your page via an iframe. The design of your page should match the Suite design, so it will look like it is part of the Suite.

Suite passes environment name, customer ID, administrator ID and presigns the iframe URL using `Escher <http://escherauth.readthedocs.org/en/latest/#>`_ which serves authentication.

Information you need to provide:

 * A name for your service.
 * Describe which customers should have access to the API node (all customers, or customers with a given feature).
 * Iframe URL - it provides the access of the services.

Parameters
----------

.. list-table:: **Parameters**
   :header-rows: 1

   * - Parameter Name
     - Type
     - Description
   * - environment
     - string
     - the host name of the Suite environment where the customer is (example: login.emarsys.net)
   * - customer_id
     - int
     - the ID of the customer in Suite database
   * - admin_id
     - int
     - the ID of the admin

Useful API Endpoints:

`Querying Customer Settings <settings.html>`_
