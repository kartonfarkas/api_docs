Conditions
==========

Returns a list of rules for conditional text. In a condition, you can define a part of the content of the email campaign according to a criterion.

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
           "name": "Rule 1",
           "condName": "$COND_Rule 1$"
         },
         {
           "id": "124",
           "name": "Rule 2",
           "condName": "$COND_Rule 2$"
         }
       ]
   }

Where *condName* is a placeholder to use in the email’s HTML or TEXT source.

Errors
------

The standard HTML status and error codes.