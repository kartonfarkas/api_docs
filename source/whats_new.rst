What's New
==========

Listing Contacts of a Segment
-----------------------------

We created a new call which lists contacts in a particular segment. You need to provide the segment ID, and then it
will be evaluated. The result is a list of the contacts from the last hour. Note that if the segment is currently
evaluated, you need to call the resource again. Documentation is available at :doc:`../../suite/contacts/segment_list_contacts`.

Internal API
------------

If you are working on a Suite integration, it would be useful for you to use the internal API. Please contact us for details and
credentials.

EscherAuth.io
-------------

The documentation of our new stateless HTTP request signing library called Escher is now available at http://escherauth.io/.
It allows secure authorization and request validation as it adds a security and authentication layer over HTTPS. The
internal API already uses this protocol for authentication.

notification_url
----------------

A new, optional API parameter is available for the export related API endpoints. When the export is ready, we are
calling the notification URL which provides the results of the export. The function is under testing, it will be
released soon.

Replacing a Contact List
------------------------

We created a new call which replaces the contacts of a particular contact list (it was possible to create a new contact
list with new contacts, or add new contacts to a contact list, but it was not possible to replace a list). Documentation is
available at :doc:`../../suite/contacts/contact_list_replace`.

Updating an Administrator
-------------------------

Another API call is responsible for modifying specific properties of an admin. The only required parameter is admin_id.
Please note that the username is unique, the password has to exceed the strength limit and it can only be used once.
Documentation is available at :doc:`../../suite/customers/administrator_update`.

cc_list
-------

An optional API parameter is added to the ``Creating an Email Campaign`` and ``Querying Email Campaign Data`` calls.
Its value is a contactlist ID. If an email is sent, this contactlist also receives it. Please note that it only works
if the BCC List feature is enabled in the Suite.

Querying Responses
------------------

We created a new endpoint which lists the contact IDs for the email campaigns of a customer for an exact reaction of
the contacts (like email opened, clicked, etc.) between the specified dates. Documentation is available at
:doc:`../../suite/emails/launch_responses`.

Creating a Media DB Folder
--------------------------

Another endpoint creates a new folder in the Media Database under the specified parent folder. The name of the folder
and the parent folder ID are necessary to provide.

New API Documentation Site
--------------------------

We developed our documentation site in its structure, content, and design as well, and now it is available
at http://dev.emarsys.com/. After the deletion of the documents at http://documentation.emarsys.com/ and the
redirection to the new address, it will become official.

IP Restrictions
---------------

We have introduced a new feature which optionally improves the security of the Suite API usage further for our
customers. This new feature can restrict the API calls to IP addresses specified by the customer. If you have any
questions, or you know a customer who is interested in this feature, please contact András Bártházi
at ``andras.barthazi@emarsys.com``.
