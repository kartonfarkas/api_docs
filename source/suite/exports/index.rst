.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/exporting-data/

Exporting Contact and Email Data
================================

Lists contacts according to the function used (e.g. Contact Registrations), then exports them as a CSV file.
The CSV file is then uploaded to either:

* A specified (S)FTP server
* An Emarsys Storage server (when *distribution method* is set to *local*), in which case the data is available via a WebDav connection

Exports happen asynchronously, and the status can be queried using the :doc:`export_status`
endpoint. Alternatively, it is possible to specify a *notification_url* which is called when the export is finished.

.. include:: _warning.rst

.. toctree::
   :maxdepth: 1

   export_changes.rst
   export_contact_lists.rst
   export_segments.rst
   export_registrations.rst
   export_responses.rst
   export_status.rst
   export_data.rst
