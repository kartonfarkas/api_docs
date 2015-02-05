Exporting Contact and Email Data
================================

Lists contacts according to the method used, then exports them as a CSV file.
The CSV file is then uploaded to either:
- A specified (S)FTP server 
- An Emarsys Storage server (when *distribution method* is set to *local*), in which case the data is available via a WebDav connection.

Exports happen asynchronously, and the status can be queried using the :doc:`export_status`
endpoint. Alternatively, it is possible to specify a *notification_url* which is called when the export is finished.

.. warning::

   If you would like to use any of the Export functions, please contact Emarsys Support first
   - The (S)FTP server IP address must first be whitelisted on our server (for security reasons).
   - WebDav access has to be enabled first, and requires authentication to use.

.. toctree::
   :maxdepth: 1

   export_changes.rst
   export_contact_lists.rst
   export_registrations.rst
   export_responses.rst
   export_status.rst

