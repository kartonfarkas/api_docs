.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/rds/data-insert/

Delete records from table
==========================

Delete records from a custom table in the Relational Data Service that match the conditions specified in the payload.

.. note::
         These tables only available if you specifically subscribed to this service. For further information please contact your account manager.

Endpoint
--------

``POST /api/rds/tables/<table_name>/records/remove``

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
     - The value is the desired value to find records by for deletion
     - You can specify more objects to match (even more) records to delete


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
        
This request deletes all records where name is Joe and age is 34 and all other records also where name is Eniko and age is null.
Please note, that the columns used in criteria must be indexed in the table.

Response example
----------------

For successful requests:
````````````````````````
.. code-block:: json

        {
            "replyCode": 0,
            "replyText": "Rows deleted: 1"
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
   * - 400
     - 15007
     - Criteria fields are not indexed
     - The fields used in the criteria must be indexed in the table.
   * - 500
     - 15006
     - Internal server error
     - An internal server occurred. Please try again later.
   
