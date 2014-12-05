Exporting Contact and Email Data
================================

Lists contacts according to the method provided, then exports them into a CSV file.
The CSV file is either uploaded to a specified (S)FTP server or stored on an Emarsys
Storage server (when *distribution method* is set to *local*). In this case the data
is available via a WebDav connection.

Exports are happening asynchronously. The status can be polled with the :doc:`query_status`
endpoint, or it's possible to specify a *notification_url*, which will be called
when the export is finished.

.. warning::

   If you would like to use the Export functions, please contact Emarsys Support.
   The (S)FTP server IP address must be whitelisted on our server for security reasons.
   WebDav has it's own user/password for authentication, and WebDav access must be
   enabled for the customer.

.. toctree::
   :maxdepth: 1

   changes.rst
   contact_lists.rst
   registrations.rst
   responses.rst
   query_status.rst

