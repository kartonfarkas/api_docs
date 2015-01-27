Recurring Email to a Contact List with Changing Members
=======================================================

For this scenario, you will need to:

1. Remove Contacts from a Contact List
--------------------------------------

**Request**:

``POST /api/v2/contactlist/111111111/delete``

.. code-block:: json

   {
     "key_id": "3",
     "name": "asgard_enemies",
     "description": "those who fight against Asgard",
     "external_ids":
     [
       "thor@example.com",
       "odin@example.com",
       "loki@example.com"
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
         "loki@example.com":
          {
            "2008": "No contact found with the external id: 3 - loki@example.com"
          }
       }
     }
   }

Where *deleted_contacts* is the number of contacts successfully deleted from the list, and *errors* is an array of
contacts not removed from the list. The array contains the ID and reason for the error.

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
       "thor@example.com",
       "odin@example.com",
       "loki@example.com"
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
         "loki@example.com":
         {
           "2008": "No contact found with the external id: 3 - loki@example.com"
         }
       }
     }
   }

Where *inserted_contacts* is the number of contacts successfully added to the list, and
*errors* is an array of contacts not added to the list. The array contains the ID and the
reason for the error.

See :doc:`../../suite/contacts/contact_list_add_contacts`.

3. Create an Email Campaign
---------------------------

**Request**:

``POST /api/v2/email``

.. code-block:: json

   {
      "name":"be_afraid_email",
      "language":"en",
      "subject":"convergence",
      "fromname":"Malekith",
      "fromemail":"malekith@example.com",
      "email_category":"111111111",
      "html_source":"<html>Hello $First Name$... </html>",
      "text_source":"Hello $First Name$...",
      "browse":0,
      "text_only":0,
      "unsubscribe":1,
      "filter":"222222222",
      "contactlist":0
   }

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

Where *id* is the new email campaign ID.

See :doc:`../../suite/emails/email_create`.

4. Launch an Email Campaign
---------------------------

**Request**:

``POST /api/v2/email/2140/launch``

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
