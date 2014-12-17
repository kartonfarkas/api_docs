What's New
==========

New Developer Documentation Site
--------------------------------

We are working on a documentation site dedicated to developers. Instead of the documentation site available at
``documentation.emarsys.com``, now we are improving a new, modern site as informative as possible which will be at
``dev.emarsys.com``. We think it will be available around December. The work in progress version is available at
``emarsys-dev.readthedocs.org``, feel free to start using and give us some feedback. Now we are doing changes daily.

New API Call: Listing Contacts of a Segment
-------------------------------------------

We created a new call which lists contacts in a particular segment. You need to provide the segment ID, and then it
will be evaluated. The result is a list of the contacts from the last hour. Note that if the segment is currently
evaluated, you need to call the resource again. Documentation is available at :doc:`segment_list_contacts`.

Internal API
------------

If you are working on an Suite integration, it would be useful for you to use the internal API. Please contact us for details and
credentials.

EscherAuth.io
-------------

The documentation of our new stateless HTTP request signing library called Escher is now available at http://escherauth.io/.
It allows secure authorization and request validation as it adds a security and authentication layer over HTTPS. The
Internal API is already using this protocol for authentication.

New API Parameter for Exports: notification_url
-----------------------------------------------

A new, optional API parameter is available for the export related API endpoints. When the export is ready, we are
calling the notification URL which provides the results of the export. The function is under testing, it will be
released soon.

Latest API Calls: Replacing a Contact List and Updating an Administrator
------------------------------------------------------------------------

We created a new call which replaces the contacts of a particular contact list (it was possible to create a new contact
list with new contacts, or add new contacts to a contact list, but it was not possible to replace). Documentation is
available at :doc:`contact_list_replace`.

Another API call is responsible for modifying specific properties of an admin. The only required parameter is admin_id.
Please note that the username is unique, the password has to exceed the strength limit and it can only be used once.
Documentation is available at :doc:`administrator_update`.

API Parameter for Creating Campaigns: cc_list
---------------------------------------------

An optional API parameter is added to the ``Creating an Email Campaign`` and ``Querying Email Campaign Data`` calls.
Its value is a contactlist ID. If an email is sent, this contactlist also receives it. Please note that it only works
if the BCC List feature is enabled in the eMarketing Suite.

Latest API Calls: Get Responses and Creating a Media DB Folder
--------------------------------------------------------------

We created a new endpoint which lists the contact IDs for the email campaigns of a customer for an exact reaction of
the contacts (like email opened, clicked, etc.) between the specified dates. Documentation is available at :doc:`email_responses`.

``Creating a Folder`` creates a new folder in the Media Database under the specified parent folder. The name of the folder
and the parent folder ID are necessary to provide.

New API Documentation Site
--------------------------

We developed our documentation site in its structure, content, and design as well, and now it is available
at http://dev.emarsys.com/. After the deletion of the documents at http://documentation.emarsys.com/ and the
redirection to the new address, it will become official.

New Feature: IP Restrictions
----------------------------

We have introduced a new feature which optionally improves the security of the Suite API usage further for our
customers. This new feature can restrict the API calls to IP addresses specified by the customer. If you have any
questions, or you know a customer who is interested in this feature, please contact András Bártházi
at ``andras.barthazi@emarsys.com``.
