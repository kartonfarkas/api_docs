Previewing E-Mails
==================

Returns the HTML or text version of the email either as content type `application/json` or `text/html`.

Endpoint
--------

``POST /api/v2/email/<id>/preview``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - id
     - integer
     - The email's ID, part of the URL
     -
   * - version
     - integer
     - The content type of the response
     - *html* or *text*

Request Example
---------------

.. code-block:: json

   {
     "version": "html"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
     }
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 6004
     - Invalid email ID
     - The requested email does not exist.
   * - 400
     - 6003
     - Invalid email status
     - The requested email was deleted.
   * - 400
     - 6003
     - Invalid version: ``<version>``
     - The version parameter must be either ``html`` or ``text``.
