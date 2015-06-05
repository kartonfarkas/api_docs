Creating a Section of a Template Based Email Campaign
=====================================================

Creates a section of a template-based email campaign with the specified parameters.

Endpoint
--------

``POST /api/v2/email/sections``

Request Example
---------------

.. code-block:: json

   {
      "id": 6,
      "order": 1,
      "group_id": 932155095,
      "header_source": "example",
      "header_align": "left",
      "body_source": "hello<br>world<br><a href=\"https://example.com/u/nrd.php?p=$uid$_$llid$_$cid$_$sid$_2\" target=\"_blank\" style=\"color: rgb(73, 120, 190); font-weight: normal; text-decoration: underline;\"><font face=\"Arial, Verdana, sans-serif\" color=\"#4978be\" size=\"3\" style=\"font-size:15px; line-height:18px; color:#4978be; font-weight:normal; text-decoration:underline;\"><u>example</u></font></a>",
      "image_url": "https://example.com/image_placeholder.php?a",
      "image_title": "",
      "image_link": "",
      "image_align": "right",
      "image_width": null,
      "image_height": null,
      "link_url": "http://example.com",
      "link_title": "example_title",
      "is_image_linked": "true",
      "is_header_linked": "true",
      "link_description": "link",
      "form_id": 0,
      "form_title": "",
      "target_audience": "all",
      "use_social_network": "0"
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
   * - order
     - int
     - Signs the ranking of the sections
     - Please note that if sections are deleted, ranking of the existing sections will not change.
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