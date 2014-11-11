Sending Test E-Mails
====================

Instructs the system to send a test email.

Endpoint
--------

``POST /api/v2/email/<id>/sendtestmail``

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
     - int
     - email ID, part of the URL
     -
   * - recipientlist
     - string
     - recipient email addresses
     - Can contain multiple email addresses separated by ‘;’
   * - filter_id
     - int
     - ID of the filter the emails will be sent to
     -
   * - contactlist_id
     - int
     - ID of the contact list the emails will be sent to
     -

.. warning::

   One and only one of the three required parameters (``recipientlist``, ``filter_id`` and
   ``contactlist_id``) must be sent.

   The number of recipients in any of the parameters must be less than 50. If more than 50 are
   included, only the first 50 will receive the testmail and the rest will be ignored.

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - subject
     - string
     - subject of the email
     - If specified, it will be appended to the email name.

Request Example
---------------

With Multiple Email Addresses
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "subject": "subject here",
     "recipientlist": "address1@example.com;address2@example.com"
   }

With a Filter ID
^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "subject": "subject here",
     "filter_id": "123"
   }

With a Contact List ID
^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "contactlist_id": "987"
   }

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": ""
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
     - No email with the provided ID exists.
   * - 400
     - 6003
     - Invalid email status
     - The email was deleted.
   * - 400
     - 6005
     - Invalid email type
     - On-event emails are not supported in this version.
   * - 400
     - 10001
     - One source has to be specified
     - Only one source has to be specified, either a ``recipientlist``, a ``filter_id`` or a ``contactlist_id``.
   * - 400
     - 3004
     - Invalid contact list id: ``<id>``
     - The provided contact list does not exist.
   * - 400
     - 10001
     - Invalid filter id: ``<id>``
     - The provided filter does not exist.
   * - 400
     - 10001
     - Invalid recipient list: ``<recipientlist>``
     - The provided recipient list contains an invalid email format.
