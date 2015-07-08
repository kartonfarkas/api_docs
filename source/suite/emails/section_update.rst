Updating a Section of a Template-based Email Campaign
=====================================================

Updates a content section of a template-based email campaign using the specified parameters.

Endpoint
--------

``POST /api/v2/email/<email_id>/sections/<section_id>``

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

.. list-table:: Optional Parameters
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
     -
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
     -
     - Can be **left, right**
   * - image_width
     - int
     - Width of the image
     -
   * - image_height
     - int
     - Height of the image
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
     - Original name of the image is kept, not the generated media database name
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
     -
     -
   * - is_header_linked
     - boolean
     -
     -
   * - link_description
     - string
     - Description added for the link
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
     - HTML of the section can be edited in advanced mode
     -
   * - advanced_text_source
     - string
     - Section can be edited in advanced mode
     -
   * - target_audience_segment_id
     - int
     - ID of the target segment
     -

Request Example
---------------

.. code-block:: json

   {
     "replyCode": 0,
     "replyText": "OK",
     "data": {
       "id": 4,
       "order": 2,
       "group_id": 111111111,
       "hide_on_mobile": true,
       "header_source": "example",
       "header_align": "left",
       "body_source": "The section content goes here.",
       "image_url": "https://example.com/image_placeholder.php?a",
       "image_title": "",
       "image_link": "",
       "image_align": "right",
       "image_width": null,
       "image_height": null,
       "image_hide_on_mobile": false,
       "image_mobile": "",
       "image_mobile_name": "",
       "link_url": "",
       "link_title": "Link to more",
       "is_image_linked": true,
       "is_header_linked": true,
       "link_description": "",
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
     - 1007
     - No such field: %s.
     - Typo in the field name.
   * - 400
     - 1008
     - Invalid value for field: %s.
     -
