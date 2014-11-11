List Contacts in a Segment
==========================

Results in a list of contacts after applying the segment.

.. warning::

   This function does not answer immediately.

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
   * - <segment_id>
     - int
     - ID of the segment to be evaluated
     -

URI Example
-----------

/api/v2/filter/100011553/contacts

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": ["749678081", "674539823"]
   }

.. note::

   The values of data are internal IDs of the contacts.

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

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



