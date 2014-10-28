Administrator list
==================

.. warning::

   The administrator API is available only from specific IP addresses. For more information, please contact emarsys support.

This returns the list of administrators.

Endpoint
--------

``GET /api/v2/administrator``

Result data structure
---------------------

id:integer
username:string
email:string
access_level:integer
interface_language:string
first_name:string
last_name:string
position:string
id:integer
username:string
..., where

 * id - the internal identifier of the administrator
 * access_level - administrator role id, for possible values see administrator/getaccesslevels
 * interface_language - the language code of the user interface language of the administrator, for possible languages see administrator/getinterfacelanguages

Result example
--------------

.. code-block:: json

   {
       "replyCode":0,
       "replyText":" OK",
       "data":
       [
           {
               "id":"12345"
               "username":"nick"
               "email":"address@example.com"
               "access_level":"1"
               "interface_language":"en"
               "first_name":"John"
               "last_name":"Doe"
               "position":"content manager"
           },
           {
               "id":"9876"
               "username":"jsmith"
               "email":"smith@example.com"
               "access_level":"0"
               "interface_language":"fr"
               "first_name":"Jane"
               "last_name":"Smith"
               "position":"marketing manager"
           }
       ]
   }

