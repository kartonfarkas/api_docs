Installation
============

This endpoint is called by the Marketplace, when the customer installs the add-on.

Endpoint
--------

``POST <integration_installation_url>``

Parameters
----------

.. list-table:: **Parameters**
   :header-rows: 1
   :widths: 30 20 40

   * - Name
     - Type
     - Description
   * - integration_installation_url
     - url
     - provided by the integration partner
   * - customer_id
     - int
     - the ID of the customer
   * - environment
     - int
     - the ID of the environment

.. list-table:: **Optionally Sent Parameters**
   :header-rows: 1
   :widths: 30 20 50

   * - Name
     - Type
     - Description
   * - configuration
     - hash
     - integration-specific data (based on the integration needs)

Request Example
---------------

``POST https://emarsys.partnerservice.com/api/install``

.. code-block:: json

   {
     "customer_id": 111111111,
     "environment": "suite5.emarsys.net",
     "configuration": {}
   }