Downloading Export Data
=======================

If data is exported into a CSV file and distribution_method is set to local, the file is stored in our server and it can
be queried also through the API. This function is available for :doc:`index`.

Endpoint
--------

``GET /api/v2/export/<export_id>/data``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - export_id
     - int
     - Requested export ID, part of the URI
     -
   * - offset
     - int
     - Defines the ID to start listing from, part of the URI
     - The offset of the first contact ID is 0.
   * - limit
     - int
     - Defines how many IDs are listed, its maximum value is 1000000, part of the URI
     -

URI Example
-----------

* ``/api/v2/export/100005839/data/offset=0&limit=10``

Result Example
--------------

.. code-block:: csv

   user_id,First Name,Last Name,E-Mail,Gender,Marital Status,Children,Education,Title,Address,City,State,ZIP Code,Country,Phone,Job Position,Company,Department,Industry,Phone (office),Number of Employees,Annual Revenue (in 000 EUR),URL,Preferred e-mail format,Fax,Date of Birth,Fax (office),Response rate (% of campaigns sent)
   1,Rachael,Clark,Rachael.Clark@y.ah.oo.com,Female,,,,,,,,,United Kingdom,,,,,,,,,,,,1974-09-06,,
   3,Laura,Simmons,Laura.Simmons@h.otma.il.com,,,,,,,,,,United Kingdom,,,,,,,,,,,,1980-04-07,,
   4,Peter,Jennings,Elizabeth.Coleman@g.ma.il.com,Male,,,,Ing.,,,,,United Kingdom,,,,,Manufacturing,,,,,,,1985-06-13,,
   5,Marcus,White,Marcus.White@h.otma.il.com,Female,,,,,,,,,United Kingdom,,,,,,,,,,,,,,
   6,paul,Allen,paul.Allen@h.otma.il.com,Female,,,,,,,,,United Kingdom,,,,,,,,,,,,1989-06-06,,
   7,Ellie,Brown,Ellie.Brown@h.otma.il.com,Female,,,,,,,,,United Kingdom,,,,,,,,,,,,1977-10-19,,
   8,Jay,Morgan,Jay.Morgan@y.ah.oo.com,Male,,,,,,,,,United Kingdom,,,,,,,,,,,,1970-02-03,,
   9,jessica,Russell,jessica.Russell@g.ma.il.com,Male,,,,,,,,,Guinea,,,,,,,,,,,,1972-11-05,,
   10,taylor,Clark,taylor.Clark@h.otma.il.com,Female,,,,,,,,,United Kingdom,,,,,,,,,,,,1994-01-10,,
   11,Sam,White,Sam.White@y.ah.oo.com,Male,,,,,,,,,Greenland,,,,,,,,,,,,1987-06-08,,

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
     - 4004
     - "distribution_method" of this export is not compatible.
     - Distribution method is set to *ftp*, but *local* is required.
   * - 404
     - 4005
     - Export is currently in progress. Please wait until that has finished.
     - Process of exporting is not finished yet.
   * - 500
     - 4007
     - Server error occurred. Please choose another file.
     - 
   * - 410
     - 4003
     - Exported data is not available.
     - Export is completed, but the file is not stored anymore.
   * - 404
     - 4006
     - Internal error occurred. File was not found.
     -