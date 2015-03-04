Sending a Test Email
====================

Instructs the system to send a test email.

Endpoint
--------

``POST /api/v2/email/<email_id>/sendtestmail``

.. warning::

   Only one of the following three required parameters should be sent (i.e. do not combine):
    * ``recipientlist``
    * ``filter_id``
    * ``contactlist_id``

   The number of recipients in any of the parameters must be less than 50. If more than 50 are
   included, only the first 50 will receive the testmail and the rest will be ignored.

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
     - Email ID, part of the URI
     -
   * - recipientlist
     - string
     - Recipient email addresses
     - Can contain multiple email addresses separated by ‘;’
   * - filter_id
     - int
     - ID of the segment the emails will be sent to
     -
   * - contactlist_id
     - int
     - ID of the contact list the emails will be sent to
     -

.. list-table:: **Optional Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - subject
     - string
     - Subject of the email
     - If specified, it will be appended to the email name.

Request Example
---------------

With Multiple Email Addresses
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "subject": "superhero_party_invitation",
     "recipientlist": "tony.stark@example.com; pepper.potts@example.com"
   }

With a Filter ID
^^^^^^^^^^^^^^^^

.. code-block:: json

   {
     "subject": "superhero_party_invitation",
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
   :widths: 20 20 40 40

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
