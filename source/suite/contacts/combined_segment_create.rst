Creating a Combined Segment
===========================

Creates a new combined segment using two or more existing segments.

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
     - Defines which operator (AND / OR) is used between segments to define how contacts are included or excluded
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
     - Lists the relations between the original segments and the combined segment
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
     - No name provided.
     - Empty string has been provided for name, or name is missing.
   * - 400
     - 13004
     - Name already exists.
     - The provided name is already used by another combined segment.
   * - 400
     - 13005
     - Definition is invalid.
     - The provided definition is invalid, e.g.: the include part is missing, wrong relation is given or a non-integer
       is used in segment_ids.
