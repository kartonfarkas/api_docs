Installation
============

Endpoint
--------

``POST to a SPECIFIED URL (provided by the customer)``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - customer_id
     - int
     - the ID of the customer
     -
   * - environment
     - int
     -
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - configuration
     -
     -
     -

Request Example
---------------

.. code-block:: json

   {
     "customer_id": $customerId,
     "environment": $this->environment(),
     "configuration": {}
   }