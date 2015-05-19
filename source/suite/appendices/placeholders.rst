Email Personalization Placeholders
==================================

Template is a standard email structure, a template-based email can be sent to a lot of customers. Customer has a
template set according to his/her needs, and a template-based email campaign can be created in
Campaign/Email Campaigns/Create Template-based Email in Suite. Template contains different parameters which are
displayed in the email.

.. note:: Please note that customers cannot put these parameters into the template.

.. list-table:: Possible Parameters
   :header-rows: 1
   :widths: 10 40

   * - Parameter
     - Description
   * - $user_id$
     - Works in Text Version (../../Create Template-based Email/Content Creation). It is the internal contact ID.
       Including this in the campaign results in having an ID with which the recipient can be identified.
   * - $uid$
     - It also identifies a contact, but it is a randomly generated string. Security level is increased by using
       this as it does not contain actual user data.
   * - $llid$
     - Stands for launch list ID. Launch list contains the IDs of the recipients of launches (identified by launch IDs).
   * - $cid$
     - Campaign includes the campaign ID.


