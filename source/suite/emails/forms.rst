Querying Customer Forms
=======================

Returns a list of available forms.

Endpoint
--------

``GET /api/v2/form``

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data":
     [
       {
         "id": "123","type": "2"
       },
       {
         "id": "124","type": "3"
       },
       …
     ]
   }

Where type is the form type. See `email and form types <http://documentation.emarsys.com/?page_id=417>`_ .

Errors
------

The standard HTML error and status codes.
