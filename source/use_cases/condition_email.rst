Sending an Email with a Condition
=================================

In a condition, you can define a part of the content of the email campaign according to a criterion (e.g.: if the first
name of the contact is Peter, put "Hi Peter! Happy nameday!" into the email).

The steps will be as follows:

1. Querying Conditions
----------------------

**Request**:

``GET /api/v2/condition``

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
       [
         {
           "id": "125",
           "name": "first_name_is_peter",
           "condName": "$COND_Rule 1$"
         },
         {
           "id": "126",
           "name": "first_name_is_mary",
           "condName": "$COND_Rule 2$"
         }
       ]
   }

Where *condName* is a placeholder to use in the email’s HTML or TEXT source.

See :doc:`../../suite/emails/conditions`.

2. Creating an Email Campaign
-----------------------------

**Request**:

``POST /api/v2/email``

.. code-block:: json

   {
     "name": "toasting",
     "language": "en",
     "subject": "Nameday",
     "fromname": "webshop_1",
     "fromemail": "webshop_1@example.com",
     "email_category": "111111111",
     "html_source": "<html>$COND_Rule 1$... </html>",
     "text_source": "Hi Peter! Happy nameday!...",
     "browse": 0,
     "text_only": 0,
     "unsubscribe": 1,
     "filter": "111111111",
     "contactlist": 0
   }

.. note:: The $COND_Rule X$ placeholder has to be used in the email.

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

3. Previewing Email Campaign Contents
-------------------------------------

**Request**:

``POST /api/v2/email/<email_id>/preview``

.. code-block:: json

   {
     "version": "html"
   }

**Response**:

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": {}
   }

See :doc:`../../suite/emails/launch_preview`.

If the email in the preview is good for the customer:

4. Launching an Email Campaign
------------------------------

**Request**:

``POST /api/v2/email/<email_id>/launch``

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
