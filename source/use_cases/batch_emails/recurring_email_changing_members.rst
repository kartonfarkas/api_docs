Recurring Email to a Contact List with Changing Members
=======================================================

For this scenario, you will need to:

.. image:: /_static/images/use_case_11.png

1. Remove Contacts from a Contact List
--------------------------------------

**Request**:

``POST /api/v2/contactlist/111111111/delete``

.. code-block:: json

   {
     "key_id": "3",
     "name": "women",
     "description": "women contacts",
     "external_ids":
     [
       "mary@example.com",
       "sue@example.com",
       "anna@example.com"
     ]
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "deleted_contacts": "2",
       "errors":
       {
         "sue@example.com":
          {
            "2008": "No contact found with the external id: 3 - sue@example.com"
          }
       }
     }
   }

Where:

* *deleted_contacts* is the number of contacts successfully deleted from the list
* *errors* is an array of contacts not removed from the list. The array contains the ID and reason for the error.

See :doc:`../../suite/contacts/contact_list_remove_contacts`.

2. Add Contacts to a Contact List
---------------------------------

**Request**:

``POST /api/v2/contactlist/111111111/add``

.. code-block:: json

   {
     "key_id": "3",
     "external_ids":
     [
       "virginia@example.com",
       "sarah@example.com",
       "kate@example.com"
     ]
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     {
       "inserted_contacts": "2",
       "errors":
       {
         "virginia@example.com":
         {
           "2008": "No contact found with the external id: 3 - virginia@example.com"
         }
       }
     }
   }

Where:

* *inserted_contacts* is the number of contacts successfully added to the list
* *errors* is an array of contacts not added to the list. The array contains the ID and the reason for the error.

See :doc:`../../suite/contacts/contact_list_add_contacts`.

3. Create an Email Campaign
---------------------------

**Request**:

``POST /api/v2/email``

.. code-block:: json

   {
      "name": "new item",
      "language": "en",
      "subject": "Informing",
      "fromname": "webshop_2",
      "fromemail": "webshop_2@example.com",
      "email_category": "111111111",
      "html_source": "<html>Hello $First Name$... </html>",
      "text_source": "Hello $First Name$...",
      "browse": 0,
      "text_only": 0,
      "unsubscribe": 1,
      "filter": 0,
      "contactlist": "111111111"
   }

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

Where:

* *id* is the new email campaign ID

See :doc:`../../suite/emails/email_create`.

4. Launch an Email Campaign
---------------------------

**Request**:

``POST /api/v2/email/111111111/launch``

.. code-block:: json

   {
     "schedule": "2011-08-12 08:35",
     "timezone": "America/New_York"
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": ""
   }

See :doc:`../../suite/emails/launch`.
