Querying Used Program Resources
===============================

Generates a list of all external services, and their resources, that a customer currently has available for use in the Automation Center.

Endpoint
--------

.. raw:: html

   <div class="http-method get">
     <span class="method">GET</span>
     <span class="path">/api/v2/programresource/service_id=<span class="variable">{service_id}</span></span>
   </div>

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - service_id
     - string
     - the ID of the external service
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - resource_id
     - int
     - the settings of a particular node of a customer in the Automation Center
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": [
         {
            "service_id": "save-contact-list",
            "customer_id": "217537796",
            "program_id": "100008246",
            "node_id": "5",
            "resource_id": "{\"list_name\":\"CL - created from API node program\"}"
         }
      ]
   }

Where *program_id* is the ID of the program in which the external service is used.
