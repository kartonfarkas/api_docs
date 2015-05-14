Unsubscribing a Contact from an Email Campaign
==============================================

Marks a contact unsubscribed for an email campaign launch so it will be counted in the campaign statistics. It affects
the response summary (:doc:`launch_response_summary`) and :doc:`../../suite/exports/export_responses`, and
makes segmentation based on unsubscribtion possible.

It **does not change** the opt-in status of the contact, this must be done with an additional API request
(:doc:`../../suite/contacts/contact_update`) if necessary.

.. note:: It is useful if you aim at sending email campaigns with unsubscribe links which target your own website and
          unsubscribing the contact only from the specific email campaign, not from all campaigns. Unsubscribe link must contain
          parameters $cid$ and $llid$.

Endpoint
--------

``POST /api/v2/email/unsubscribe``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - launch_list_id
     - int
     - ID on the basis of which contacts who clicked on the unsubscribe link can be identified.
       In the case of on event emails, there is no availability limit for the launch_list_id. For batch emails, it lasts for 2 months.
     -
   * - email_id
     - int
     - ID of a specific email
     -

Request Example
---------------

.. code-block:: json

   {
      "launch_list_id": "111111111",
      "email_id": "222222222"
   }

Errors
------

.. list-table:: Possible Error Codes
   :header-rows: 1
   :widths: 20 20 40 40

   * - HTTP Code
     - Reply Code
     - Message
     - Description
   * - 400
     - 1006
     - Empty parameter(s): [value]
     -
   * - 400
     - 6042
     - No such launch
     -
   * - 400
     - 6025
     - No such campaign
     -
   * - 400
     - 1003
     - Internal error
     - key_id and key_value must uniquely identify a contact to be unsubscribed, otherwise this message is displayed.
