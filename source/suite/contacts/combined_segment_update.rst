.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/contacts/update-combined-segment/

Updating a Combined Segment
===========================

Update any parameters of an existing combined segment.

Endpoint
--------

``POST /api/v2/combinedsegments/<combined_segment_id>``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - combined_segment_id
     - int
     - ID of the combined segment to use
     -
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
            "relation": "AND",
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
      "data": {
         "id": 22,
         "name": "combined_2",
         "definition": {
            "include": {
               "relation": "OR",
               "segment_ids": [
                  "100011869"
               ]
            },
            "exclude": {
               "relation": "AND",
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
     - No name provided.
     - An empty string has been provided for the name, or the name is missing.
   * - 400
     - 13004
     - Name already exists.
     - The requested name is already in use by another combined segment.
   * - 400
     - 13005
     - Definition is invalid.
     - The provided definition is invalid, e.g.: the include part is missing, a wrong relation is used, or a
       non-integer is used in segment_ids.
