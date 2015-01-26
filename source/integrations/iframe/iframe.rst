Single Sign-on
==============

Suite provides an integration point where your service can be integrated to Suite as a page.
We will add a new menu entry, and load your page via an iframe. The design of your page
should match the Suite design, so it will look like it is part of the Suite.

Parameters
----------

Suite embeds your service URL as an iframe by extending it with the query parameters the service needs
to authenticate the customer. The following information will be available:

.. list-table:: **Parameters**
   :header-rows: 1
   :widths: 30 20 40

   * - Parameter Name
     - Type
     - Description
   * - environment
     - string
     - the host name of the Suite environment where the customer is (example: login.emarsys.net)
   * - customer_id
     - int
     - the ID of the customer in the Suite database
   * - admin_id
     - int
     - the ID of the admin

Integration
-----------

We have created a checklist about the information we need to enable an iframe integration.
Please send the following information to your contact person:

* a name for your service
* description about which customers should have access to the API node (all customers, or customers with a given feature)
* iframe URL - it provides the access of the services

Useful Resources
----------------

We recommend checking out these resources. Querying the timezone (for displaying time information
in the customer's timezone) or the name of a customer might be useful for a service.

* :doc:`../../suite/customers/customer_settings`
