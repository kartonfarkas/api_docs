Use Cases
=========

This section describes some typical use cases for the Suite API. Although there are optional parameters for most of the
Suite API calls, only those parameters are described that you need to use for the given use case.

The use cases are divided into groups covering similar actions but with increasing complexity. For example sending a
welcome email without any bells and whistles is a simple use case, whereas sending a welcome email referring to a
product the contact has just bought is a more complex one.

We currently offer use cases covering these activities:

Sending Transactional Emails
----------------------------

The aim of this use case is to send an email after an event took place (e.g.: send an email to all newly-registered
contacts, or for those who purchased a product). To trigger an email, we use an external event which contains
information about the intended recipient.

.. toctree::
   :maxdepth: 1

   transactional_emails/email_address_key.rst
   transactional_emails/external_id_key.rst
   transactional_emails/data_from_external_events.rst

Sending Batch Emails
--------------------

.. toctree::
   :maxdepth: 1

   batch_emails/daily_news_for_segments.rst
   batch_emails/using_the_database.rst
   batch_emails/recurring_email_changing.rst
   batch_emails/recurring_email.rst

Keeping Contacts Up-to-date
---------------------------

.. toctree::
   :maxdepth: 1

   keeping_contacts.rst

Querying Contact Data from a Contact List
-----------------------------------------

.. toctree::
   :maxdepth: 1

   querying_contact_data.rst

Put a Voucher into the Email
----------------------------

.. toctree::
   :maxdepth: 1

   voucher.srt

Checking to which Source the Contact Belongs to
-----------------------------------------------

.. toctree::
   :maxdepth: 1

   multiple_sources.rst

If you would like to see use cases covering different marketing activities, please pass a request on to your Account Manager.



