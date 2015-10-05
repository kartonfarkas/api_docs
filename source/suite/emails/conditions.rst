.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/email/conditions/

Querying Conditions
===================

Returns a list of rules for conditional text. You can use conditional text to specify which contact sees what content in the email campaign.

Endpoint
--------

``GET /api/v2/condition``

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
       [
         {
           "id": "123",
           "name": "first_name_is_tony",
           "condName": "$COND_Rule 1$"
         },
         {
           "id": "124",
           "name": "last_name_is_stark",
           "condName": "$COND_Rule 2$"
         }
       ]
   }

Where:

* *condName* is a placeholder to use in the email’s HTML or TEXT source

Errors
------

Standard HTML status and error codes apply.
