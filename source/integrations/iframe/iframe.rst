Single Sign-on
==============

We provide an integration point where your service can be integrated with Suite as a page.
This involves adding a new menu entry and loading your page content within an iframe. The design of your page
should ideally match the Suite design, so it will look like it is part of the Suite.

Parameters
----------

Suite embeds your service URL as an iframe by extending it with the query parameters that the service needs
to authenticate the customer. The following information will be made available:

.. list-table:: **Parameters**
   :header-rows: 1
   :widths: 30 20 40

   * - Parameter Name
     - Type
     - Description
   * - environment
     - string
     - Host name of the customer’s Suite environment (e.g. login.emarsys.net)
   * - customer_id
     - int
     - ID of the customer in the Suite database
   * - admin_id
     - int
     - ID of the admin

Integration
-----------

We have created a checklist regarding the required information to enable an iframe integration for your convenience.
Please send the following information to your contact person:

* The name of your service
* A description of which customers should have access to the API node (all customers, or customers with a given feature)
* The iframe URL - it provides the access of the services

Useful Resources
----------------

We recommend checking out the following resources. Querying the timezone (for displaying time information
in the customer's timezone) or the name of a customer might be useful for a service.

* :doc:`../../suite/customers/customer_settings`
