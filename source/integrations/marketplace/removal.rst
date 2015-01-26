Removal
=======

This endpoint is called by the Marketplace, when the customer removes the add-on.

Endpoint
--------

``DELETE <integration_removal_url><environment>:<customerId>``

Parameters
----------

.. list-table:: **Parameters**
   :header-rows: 1
   :widths: 30 20 40

   * - Name
     - Type
     - Description
   * - integration_removal_url
     - url
     - provided by the integration partner
   * - environment
     - int
     - the ID of the environment
   * - customerId
     - int
     - the ID of the customer

Request Example
---------------

``DELETE https://emarsys.partnerservice.com/api/removal?customer=suite5.emarsys.net:111111111``

See :doc:`installation`.



