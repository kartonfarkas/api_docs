.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/external-events/create-external-event/

Creating an External Event
==========================

Creates an external event with the specified name, which lets your external program
(e.g. CMS, CRM) act as a trigger to be used in the Emarsys application.

Endpoint
--------

``POST /api/v2/event``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - name
     - string
     - Name of the external event
     -

Request Example
---------------

.. code-block:: json

   {
      "name":"bulk purchasing"
   }

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": "111111111",
         "name": "bulk purchasing"
      }
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 5002
     - Parameter name is required.
     -
   * - 400
     - 5003
     - An external event with this name already exists.
     -
