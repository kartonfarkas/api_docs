Querying a Section of a Template Based Email Campaign
-----------------------------------------------------

Returns all the details of a section of a template-based campaign. Section is a part of a campaign.

Endpoint
--------

``GET /api/v2/email/<email_id>/sections/<section_id>``

Parameters
----------

.. list-table:: **Required Parameters**
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - email_id
     - int
     - ID of the email, part of the URI
     -
   * - section_id
     - int
     - ID of the section, part of the URI
     -

Result Example
--------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": {
       "id": 6,
       "order": 1,
       "group_id": 932155095,
       "header_source": "example",
       "header_align": "left",
       "body_source": "hello<br>world<br><a href=\"https://trunk-int.s.emarsys.com/u/nrd.php?p=$uid$_$llid$_$cid$_$sid$_2\" target=\"_blank\" style=\"color: rgb(73, 120, 190); font-weight: normal; text-decoration: underline;\"><font face=\"Arial, Verdana, sans-serif\" color=\"#4978be\" size=\"3\" style=\"font-size:15px; line-height:18px; color:#4978be; font-weight:normal; text-decoration:underline;\"><u>example</u></font></a>",
       "image_url": "https://trunk-int.s.emarsys.com/image_placeholder.php?a",
       "image_title": "",
       "image_link": "",
       "image_align": "right",
       "image_width": null,
       "image_height": null,
       "link_url": "http://example.com",
       "link_title": "example_title",
       "is_image_linked": "y",
       "is_header_linked": "y",
       "link_description": "link",
       "form_id": 0,
       "form_title": "",
       "target_audience": "all",
       "use_social_network": "0"
     }
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
   * - 404
     - 6025
     - No such campaign exists.
     -
   * - 404
     - 6045
     - The campaign ID does not refer to a template-based email.
     -
   * - 404
     - 6047
     - Section not found.
     -