Listing Contacts in a Segment
=============================

Generates a list of contacts after a specific segment (i.e. filter) has been applied.

.. include:: _warning.rst

Endpoint
--------

``GET /api/v2/filter/<segment_id>/contacts``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - segment_id
     - int
     - ID of the segment to use, if it is 0, then all the contact IDs are listed
     -
   * - limit
     - int
     - Defines how many IDs are listed, its maximum value is 1000000, part of the URI
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - offset
     - int
     - Defines the ID to start listing from, part of the URI
     - The offset of the first contact ID is 0.

URI Example
-----------

* /api/v2/filter/100011553/contacts/offset=0&limit=1000

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": ["749678081", "674539823"]
   }

.. note::

   Data values are the internal Emarsys IDs of the contacts.

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 202
     - 10001
     - The segment is currently evaluated.
     - Call this resource again until you see the result.
   * - 404
     - 10002
     - The segment specified does not exist.
     -
   * - 423
     - 10003
     - The admin already running a segment. Please wait until it is finished.
     - You can run only one segment at a particular time.
   * - 400
     - 10001
     - Offset must be zero, or a positive number.
     -
   * - 400
     - 10001
     - Limit must be a positive number.
     -
   * - 400
     - 10001
     - Limit is a required parameter.
     -
   * - 400
     - 10001
     - Limit must be less than 1000000.
     -
