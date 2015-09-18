Sending Transactional Emails
============================

The aim of this use case is to send a welcome email to all newly-registered contacts.
To trigger a welcome email, we use an external event which contains information about the intended recipient.

The steps of this use case will be as follows:

1. Add a new contact to your Emarsys database.
2. Send a welcome email to the contact via an external event in Emarsys.
3. Check the results.

This use case will be presented in varying degrees of complexity:

**Basic Scenario**:

* :doc:`email_address_key`

**Advanced Scenario**:

* :doc:`external_id_key`
* :doc:`data_from_external_events`

The following visualisation gives you an overview of how all scenarios of sending transactional emails work:

.. image:: /_static/images/use_case.png
