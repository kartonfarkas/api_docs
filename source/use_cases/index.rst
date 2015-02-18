Use Cases
=========

This section describes some typical use cases for the Suite API, and only the relevant optional parameters the API calls are included for each use case.

The use cases are grouped by action type, listed in order of increasing complexity. For example, sending a plain welcome emailis a simple use case, whereas sending a welcome email referring to a product the contact has just bought is more complex.

We currently offer use cases covering the following activities:

Sending Transactional Emails
----------------------------

The aim here is to send an email in response to an event, e.g.: welcome email to all newly-registered contacts, product purchase confirmation, etc.. 
Here an external event, which contains information about the intended recipient, is used to trigger the email.

The following visualisation gives you an overview of how all scenarios of sending transactional emails work:

.. image:: /_static/images/use_case.png

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

Contacts
--------

.. toctree::
   :maxdepth: 1

   contacts/keeping_contacts.rst
   contacts/multiple_sources.rst
   contacts/new_contact.rst
   contacts/querying_contact_data.rst

Emails
------

.. toctree::
   :maxdepth: 1

   emails/check_email_data.rst
   emails/condition_email.rst
   emails/voucher.rst

If you would like to see use cases covering different marketing activities, please pass a request on to your Account Manager.