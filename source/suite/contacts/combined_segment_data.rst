Querying Combined Segment Data
==============================

Returns all the details of a combined segment, i.e. relations & attributes of the segments it includes.

Endpoint
--------

``GET /api/v2/segments/combined/<combined_segment_id>``

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
     - ID of the combined segment
     -

Result Example
--------------

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "id": 33,
         "name": "test_segment",
         "definition": {
            "include": {
               "relation": "OR",
               "segment_ids": [
                  0
               ]
            },
            "exclude": {
               "relation": "OR",
               "segment_ids": [
                  "111111111"
               ]
            }
         }
      }
   }

Resulting Data Structure
------------------------

.. list-table:: **Resulting Data Structure**
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
     - Include relation between the segments
     -
   * - exclude
     - object
     - Exclude relation between the segments
     -
   * - relation
     - string
     - Defines an "AND" or "OR" relation between the segments
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
   * - 404
     - 13001
     - Combined segment not found.
     - Combined Segment ID is not valid.