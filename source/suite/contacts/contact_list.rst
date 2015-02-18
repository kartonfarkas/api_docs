Listing Contacts
================

Generates a list of Contact IDs that display the content of a specific field, e.g. field_id 1 returns the first names
of all contacts.

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
     - Field ID used to generate the list.
     -

.. include:: ptest2.rst
.. include:: ptest2.rst

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - field_id
     - int
     - Value determines if a contact should be returned or not, [field_value]
     - Can be an empty string as that will also match to cells with NULL value.
   * - limit
     - int
     - Specifies the maximum number of contacts to return
     - Default is 10.000, which is also the maximum number of contacts that can be returned (you cannot specify more).
   * - offset
     - int
     - Specifies an offset for pagination (like in SQL)
     -
   * - excludeempty
     - boolean
     - If set to true, then all contacts with a null or empty value in the requested field are not returned. Any value except from true will be interpreted as false.
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
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
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
     - Filtering is enabled only for the indexed columns.
   * - 400
     - 2016
     - Invalid limit
     - Limit should be between 1 and 10000.
   * - 500
     - 2011
     - <depends on the error>
     - An internal error occurred.

