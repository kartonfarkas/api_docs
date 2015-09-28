Containers
==========

We provide an integration point where your service can be integrated with the Emarsys application as a container
on a page. For example, a dashboard can display a chart created by your service, or on an existing page we display
a new tab that loads an iframe of your integration. The design of the container should ideally match the Emarsys
design, so it will look like it is part of our application.

The container should load a Single Page Application, it is not possible to create a cookie based session inside
the iframe as some browsers like Safari and Internet Explorer blocks setting cookies in "third-party" iframes.

The container's URL will be "presigned" with Escher. You can authenticate with these requests with the following
Escher library configuration:

* *Credential Scope* is specific to the service the request is going to. In this case it will be your credential
  scope, for example "**eu/yourservice/ems_request**".
* *Algo Prefix* and *Vendor Key* are both set to "**EMS**"
* *Date Header Key* is set to "**X-Ems-Date**"
* *Authentication Header Key* is set to "**X-Ems-Auth**"

Checklist
---------

We have created a checklist regarding the required information to enable the Container of your integration for your
convenience. Please discuss the following information with your contact person:

* The page where the container should appear
* The container's iframe URL

Iframe Parameters
-----------------

The container's iframe URL will be presigned with Escher, and extended with the following GET parameters:

.. list-table:: **Parameters**
   :header-rows: 1
   :widths: 30 20 40

   * - Parameter Name
     - Type
     - Description
   * - environment
     - string
     - Domain name of the customer’s Emarsys environment (e.g. login.emarsys.net)
   * - customer_id
     - int
     - ID of the customer in the Emarsys database
   * - admin_id
     - int
     - ID of the admin
   * - language
     - string
     - the UI language of the administrator
   * - timezone
     - string
     - the timezone of the administrator
   * - integration_id
     - string
     - the ID of your integration
   * - integration_instance_id
     - string
     - a random generated ID of your integration instance
   * - redirect_to
     - string
     - URL where the integration have to redirect the customer to

Useful Resources
----------------

We recommend checking out the following resources. Querying the name of a customer or administrator might be useful
for a service.

* :doc:`../../suite/customers/customer_settings`
