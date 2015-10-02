.. meta::
   :http-equiv=refresh: 0; url=http://documentation.emarsys.com/resource/developers/lifecycle-events/removal/

Removal
=======

This endpoint can be implemented by the integration, it is called when the integration is removed
in the Emarsys application.

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
     - Provided by the integration partner
   * - environment
     - int
     - ID of the environment
   * - customerId
     - int
     - ID of the customer

Request Example
---------------

``DELETE https://emarsys.partnerservice.com/api/removal?customer=suite5.emarsys.net:111111111``

See :doc:`installation`.
