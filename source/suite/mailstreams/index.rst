Mail Streams
============

In Sendkit, mails are being sent asynchronously over so-called mail streams, referenced by their ID.

Each mail stream is associated with a mail template which defines how the final mails should look like when combined with recipient data. Therefore, a mail template has to be provided when creating a new mail stream.

Mail streams can be active or inactive. Active mail streams accept recipient data and can be used for sending. The number of active mail streams per account is limited to 20. Inactive mail streams will reject all recipient data and no mails can be sent.

Mail Stream
-----------

.. toctree::
   :maxdepth: 1

   mailstream_append.rst
