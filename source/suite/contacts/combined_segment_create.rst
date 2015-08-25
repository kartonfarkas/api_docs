Creating a Combined Segment
===========================

Creates a new combined segment.

Endpoint
--------

``POST /api/v2/segments/combined/<combined_segment_id>``

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
     - Name of the combined segment
     -
   * - relation
     - string
     - Defines an AND or OR relation between the included and excluded segments
     - Please note that it must have a value even if only one segment is defined.
   * - segment_ids
     - int
     - ID of the segments to combine
     -

Request Example
---------------

.. code-block:: json

   {
      "name": "combined_2",
      "definition": {
         "include": {
            "relation": "OR",
            "segment_ids": [
               "100011869"
            ]
         },
         "exclude": {
            "relation": "OR",
            "segment_ids": [
               "100017571",
               "100017572"
            ]
         }
      }
   }

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data":{
         "id": 21,
         "name": "combined_2",
         "definition": {
            "include": {
               "relation": "OR",
               "segment_ids": [
                  "100011869"
               ]
            },
            "exclude": {
               "relation": "OR",
               "segment_ids": [
                  "100017571",
                  "100017572"
               ]
            }
         }
      }
   }

Where:

.. list-table::
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - id
     - int
     - ID of the combined segment
     -
   * - definition
     - object
     - Contains the defined relations between the segments
     -
   * - include
     - object
     - Included segments
     -
   * - exclude
     - object
     - Excluded segments
     -

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
     - 13002
     - Invalid JSON input.
     - Signs one or more mistakes in the syntax of the request or an existing combined segment name.
