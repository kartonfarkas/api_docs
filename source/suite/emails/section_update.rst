Updating a Section of a Template-Based Email Campaign
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
     - Signs the ranking of the sections
     - If any sections are deleted, then the numbering of the remaining sections will not change, e.g. if section 3 is removed, then any subsequent section number remains the same: 4, 5, 6, etc..
   * - header_source
     - string
     - HTML content of the header
     -
   * - header_align
     - string
     - Can be **left, center, right**
     -
   * - image_link
     - string
     - URL to which an image points
     -
   * - image_align
     - string
     - Can be **left, right**
     -
   * - form_id
     - int
     - ID of the `form <../../suite/contacts/forms.html>`_
     -
   * - target_audience
     - string
     - Can be **all, segment**
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
       "header_source": "example",
       "header_align": "left",
       "body_source": "The section content goes here.",
       "image_url": "https://example.com/image_placeholder.php?a",
       "image_title": "",
       "image_link": "",
       "image_align": "right",
       "image_width": null,
       "image_height": null,
       "link_url": "",
       "link_title": "Link to more",
       "is_image_linked": true,
       "is_header_linked": true,
       "link_description": "",
       "form_id": 0,
       "form_title": "",
       "target_audience": "all",
       "use_social_network": false
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
     - Field name has a mistype in the code.
   * - 400
     - 1008
     - Invalid value for field: %s.
     -
