Creating a Combined Segment
===========================

Creates a new combined segment.

Endpoint
--------

``POST /api/v2/combinedsegments``

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
     - Defines the relation between (AND / OR) the segments to be included or excluded
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
     - New segment ID
     -
   * - definition
     - object
     - Contains the defined relations between the segments
     -
   * - include
     - object
     - Segments included
     -
   * - exclude
     - object
     - Segments excluded
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
     - Indicates one or more mistakes in the syntax of the request.
   * - 400
     - 13003
     - Empty name.
     - Empty string has been provided for name, or name is missing.
   * - 400
     - 13004
     - Name already exists.
     - The provided name is used already by an other combined segment.
   * - 400
     - 13005
     - Invalid definition.
     - The provided definition is invalid. E.g.: the include part is missing, wrong relation given or a non-intger is used in segment_ids.
