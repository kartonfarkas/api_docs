Checking to which Source the Contact Belongs to
===============================================

If the customer has more than one application (e.g.: 2 webshops), then creating contacts via the API is with
different sources which stand for a particular webshop. The customer can export to which of the sources the contact belongs to.

1. Creating a Source
--------------------

**Request**:

``POST /api/v2/source/create``

**Response**:

.. code-block:: json

   {
     "name": "webshop_2"
   }

See :doc:`../../suite/contacts/source_create`.

2. Listing Sources
------------------

**Request**:

``GET /api/v2/source``

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     [
       {
         "id": "123",
         "name": "webshop_1"
       },
       {
         "id": "456",
         "name": "webshop_2"
       }
     ]
   }

See :doc:`../../suite/contacts/source_list`.

3. Creating a Contact
---------------------

**Request**:

``POST /api/v2/contact``

.. code-block:: json

   {
     "key_id": "15",
     "15": "1234567",
     "7": "3",
     "source_id": "456"
   }

Where *source_id* is the ID assigned to the application of a customer to integrate.

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 111111111
     }
   }

.. note:: You can also update a contact here.

See :doc:`../../suite/contacts/contact_create` and :doc:`../../suite/contacts/contact_update`.

4. Exporting Changes
--------------------

**Request**:

``POST /api/v2/contact/getchanges``

.. code-block:: json

   {
     "distribution_method": "ftp",
     "origin": "form",
     "origin_id": "456",
     "time_range": ["2012-02-09", "2012-04-02"],
     "contact_fields": ["1", "3", "106533"],
     "delimiter": ";",
     "add_field_names_header": 1,
     "language": "en",
     "ftp_settings":
     {
       "host": "www.example.com",
       "port": "1234",
       "username": "user",
       "password": "pass",
       "folder": "path/of/a/folder"
     }
   }

Where *origin_id* is the *source_id*.

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "id": 2140
     }
   }

See :doc:`../../suite/exports/export_changes`.
