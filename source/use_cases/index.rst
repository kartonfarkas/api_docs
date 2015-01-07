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

The aim of this use case is to send a welcome email to all newly-registered contacts.
To trigger a welcome email, we use an external event which contains information about the intended recipient.

This use case will be presented in varying degrees of complexity:

**Basic Scenario**:

* :doc:`email_address_key`

**Advanced Scenario**:

* :doc:`external_id_key`
* :doc:`data_from_external_events`

Sending Batch Emails
====================

.. toctree::
   :maxdepth: 1

   daily_news_for_segments.rst
   using_the_database.rst
   recurring_email_changing.rst
   recurring_email.rst

Keeping Contacts Up-to-date
===========================

.. toctree::
   :maxdepth: 1

   keeping_contacts.rst

Querying Contact Data from a Contact List
=========================================

.. toctree::
   :maxdepth: 1

   querying_contact_data.rst

If you would like to see use cases covering different marketing activities, please pass a request on to your Account Manager.



