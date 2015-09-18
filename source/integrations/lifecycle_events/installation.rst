Installation
============

This endpoint can be implemented by the integration, it is called when the integration is installed
in the Emarsys application.

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
     - Provided by the integration partner
   * - customer_id
     - int
     - ID of the customer
   * - environment
     - int
     - ID of the environment

.. list-table:: **Optionally Sent Parameters**
   :header-rows: 1
   :widths: 30 20 60

   * - Name
     - Type
     - Description
   * - configuration
     - hash
     - Integration-specific data (based on the integration needs)

Request Example
---------------

``POST https://emarsys.partnerservice.com/api/install``

.. code-block:: json

   {
     "customer_id": 111111111,
     "environment": "suite5.emarsys.net",
     "configuration": {}
   }
