Querying Used Program Resources
===============================

Lists the resources of a customer in an external service and provides information about in which Automation Center
program the customer uses the external service. It can be narrowed to items within a service.

Endpoint
--------

``GET /api/v2/programresource/service_id=<id>``

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