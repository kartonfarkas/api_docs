.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/rds/data-insert/

Replacing records in table
==========================

Replace the records to the specified ones in a custom table in the Relational Data Service.
Please note, that this API call deletes all the records from the table.

.. note::
         These tables only available if you specifically subscribed to this service. For further information please contact your account manager.

Endpoint
--------

``PUT /api/rds/tables/<table_name>/records``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - The name of a column
     - String or Numeric or Boolean or Null
     - The value is the desired value in the new record
     - You can specify more columns' value, and also more records in a request.


Request Example
---------------

.. code-block:: json

        [
            {
                "name": "Joe",
                "age": 34
            },
            {
                "name": "Eniko",
                "age": null
            }
        ]

Response example
----------------

For successful requests:
````````````````````````
.. code-block:: json

        {
            "replyCode": 0,
            "replyText": "Rows inserted: 2"
        }

For failed requests:
````````````````````
.. code-block:: json

        {
            "replyCode": 15001,
            "replyText": "Fields are not the same in each record"
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
     - 15001
     - Fields are not the same in each record
     - The same fieds must be used in every record.
   * - 400
     - 15002
     - Too many rows
     - The maximum number of records allowed in a request is 1000.
   * - 400
     - 15003
     - Missing fields: [column_name]
     - Some fields specified in the request is not present in the table.
   * - 404
     - 15004
     - Table not exists
     - The table you are trying to insert to does not exist.
   * - 400
     - 15005
     - Invalid JSON format
     - The JSON in the request is not valid.
   * - 500
     - 15006
     - Internal server error
     - An internal server occurred. Please try again later.
   
