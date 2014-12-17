Listing the Contacts
====================

Returns the value of the requested field for every contacts that meets the optional condition specified.

Endpoint
--------

``GET /api/v2/contact/query/return=``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - return
     - int
     - the ID of the field that the response needs to contain in addition to the internal ID of the contact
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - field_id
     - int
     - to decide if we need to return a contact or not, [field_value]
     - field_value can be an empty string, that will also match to cells with NULL value
   * - limit
     - int
     - if set, it limits the number of the returned contacts
     - By default it is 10.000, and it is not possible to specify bigger limit then that.
   * - offset
     - int
     - specifies an offset for pagination (like in SQL)
     -
   * - excludeempty
     - boolean
     - If true sent as the value of this parameter, the contacts having null or empty value at the field requested to return are not returned. Any value except from true will interpreted as false.
     -

URI Example
-----------

* ``/api/v2/contact/query/return=3&limit=100&offset=200&1=FirstNameHere&excludeempty=true``

Result Example
--------------

Normal Result:

.. code-block:: json

   {
      "replyCode": 0,
      "replyText": "OK",
      "data": {
         "result": [
            {
               "id": 3,
               "3": "loki@example.com"
            },
            {
               "id": 5,
               "3": "thor@example.com"
            }
         ]
      }
   }

Error Condition:

.. code-block:: json

   {
      "replyCode": 2014,
      "replyText": "No field specified to return",
      "data": ""
   }

Errors
------


.. list-table:: Possible Error Codes
   :header-rows: 1

   * - 400
     - 2006
     - Invalid field id: <field_id>
     - The id of a provided field is invalid.
   * - 400
     - 2014
     - No field specified to return
     - Parameter return is required.
   * - 400
     - 2015
     - No index on column <field_id>
     - Filtering enabled only for indexed columns
   * - 400
     - 2016
     - Invalid limit
     - Limit should be between 1 and 10000
   * - 500
     - 2011
     - <depends on the error>
     - An internal error occurred.

