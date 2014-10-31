Conditions
==========

Returns a list of rules for conditional text.

Endpoint
--------

``GET /api/v2/condition``

Result Data Structure
---------------------

 * id:integer, name:string, condName:string
 * id:integer, name:string, condName:string
 * …

Where *condName* is a placeholder to use in the email’s HTML or TEXT source.

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

Errors
------

The standard HTML status and error codes.