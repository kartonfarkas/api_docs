.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/email/section-details/

Querying a Section of a Template-based Email Campaign
=====================================================

Returns the full details of a section used in a template-based campaign.

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
       "group_id": 111111111,
       "hide_on_mobile": true,
       "header_source": "example",
       "header_align": "left",
       "body_source": "hello<br>world<br><a href=\"https://example.com/u/nrd.php?p=$uid$_$llid$_$cid$_$sid$_2\" target=\"_blank\" style=\"color: rgb(73, 120, 190); font-weight: normal; text-decoration: underline;\"><font face=\"Arial, Verdana, sans-serif\" color=\"#4978be\" size=\"3\" style=\"font-size:15px; line-height:18px; color:#4978be; font-weight:normal; text-decoration:underline;\"><u>example</u></font></a>",
       "image_url": "https://example.com/image_placeholder.php?a",
       "image_title": "",
       "image_link": "",
       "image_align": "right",
       "image_width": null,
       "image_height": null,
       "image_hide_on_mobile": false,
       "image_mobile": "",
       "image_mobile_name": "",
       "link_url": "http://example.com",
       "link_title": "example_title",
       "is_image_linked": true,
       "is_header_linked": true,
       "link_description": "link",
       "form_id": 0,
       "form_title": "",
       "target_audience": "segment",
       "use_social_network": "0",
       "enable_network_sharing": false,
       "advanced_html_source":"",
       "advanced_text_source":"",
       "target_audience_segment_id": 111111111
     }
   }

Where:

.. list-table:: Parameters
   :header-rows: 1
   :widths: 20 20 40 40

   * - Name
     - Type
     - Description
     - Comments
   * - id
     - int
     - ID of the section
     -
   * - order
     - int
     - Indicates the order in which sections should be used
     - If any sections are deleted, then the numbering of the remaining sections will not change,
       e.g. if section 3 is removed, then any subsequent section number remains the same: 4, 5, 6, etc.
   * - group_id
     - int
     - ID of the group containing the section
     -
   * - hide_on_mobile
     - boolean
     - Section is not displayed on mobile
     -
   * - header_source
     - string
     - HTML content of the header
     -
   * - header_align
     - string
     - Text alignment of the header
     - Can be **left, center, right**
   * - body_source
     - string
     - HTML content of the body
     -
   * - image_url
     - string
     - URL of the image
     -
   * - image_title
     - string
     - Title of the image
     -
   * - image_link
     - string
     - URL to which an image points
     -
   * - image_align
     - string
     - Alignment of the image within the section
     - Can be **left, right**
   * - image_width
     - int
     - Width of the image in px
     -
   * - image_height
     - int
     - Height of the image in px
     -
   * - image_hide_on_mobile
     - boolean
     - Image is not displayed on mobile
     -
   * - image_mobile
     - string
     - URL of an image or a generated name if it is in the media database
     -
   * - image_mobile_name
     - string
     - Original name of the image (not the one generated by the media database as described above)
     -
   * - link_url
     - string
     - URL of the link
     -
   * - link_title
     - string
     - Title of the link
     -
   * - is_image_linked
     - boolean
     - Clicking on the image brings to the URL defined in link_url
     -
   * - is_header_linked
     - boolean
     - Clicking on the header brings to the URL defined in link_url
     -
   * - link_description
     - string
     - Name that displays in the individual link tracking analysis in the Reporting screens
     -
   * - form_id
     - int
     - ID of the `form <../../suite/contacts/forms.html>`_
     -
   * - form_title
     - string
     - Title of the form
     -
   * - target_audience
     - string
     - Contacts who receive the email
     - Can be **all, segment**
   * - use_social_network
     - boolean
     - Clickable social network icons are displayed in the section
     -
   * - enable_network_sharing
     - boolean
     -
     -
   * - advanced_html_source
     - string
     - If the section has been edited in Advanced Mode, all other parameters will be overwritten and the HTML code is
       shown here. If not, it is NULL.
     -
   * - advanced_text_source
     - string
     - If the section has been edited in Advanced Mode, all other parameters will be overwritten and the text version is
       shown here. If not, it is NULL.
     -
   * - target_audience_segment_id
     - int
     - ID of the target segment
     -

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
