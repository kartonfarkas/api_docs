The API Demo Page
=================

API-demo page: experiment before you code!
------------------------------------------

We offer all our customers an API-demo page, which is a graphical user interface to experiment with API requests, their parameters and also see the responses.
The URL of the API demo page is: <the URL of the Suite environment you use>/api-demo/

 * Example: if your account is on Suite 5,  the URL is https://suite5.emarsys.net/api-demo

Check your access to the Suite API
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Check whether your access data is valid by requesting the available languages as follows:

 * Go to the **Language** tab
 * Leave the text field empty and click **OK**

The response will appear on the bottom of the same page. The following table shows the possible responses and the reasons for failure:

.. list-table:: Possible responses

   * - Response (replyCode, replyText)
     - Possible reason
     - Suggested solution
   * - 0, OK
     - You succeeded, and your credentials were accepted.
       You could also see the list of the languages.
     -
   * - 1, Unauthorized
     - Something is wrong with your credentials.
     - Check your access information again.
   * - No response at all
     - Something is wrong with your connection./API URL is invalid./Suite API is not available.
     - Check with your IT support why you cannot reach the API (e.g. if the traffic is blocked by your firewall.)/Check your access information again./Please try again later.

If you have tried the suggested solution without success then please contact your Account Manager.

Check the response
^^^^^^^^^^^^^^^^^^

The response of your request is always appears on the bottom of the page, so after sending a request you might need to scroll down to see the response.

.. note::

   * If the Suite API is not available, or the URL is invalid, the last response will be displayed, rather than an error message.

Check the request
^^^^^^^^^^^^^^^^^

Above the tab bar you can see the request sent to the Suite API. With the aid of this you can assemble your request URI by simply concatenating this request to your API URL. For example, if your Suite API environment URL is:

 * https://suite5.emarsys.net/api/v2/
   and the request which appeared on the API-demo after you sent a contact ID check request is:

 * contact/3=Max.Mustermann%40mustermann.at
   then the request URI to use in your code is:

 * https://suite5.emarsys.net/api/v2/contact/3=Max.Mustermann%40mustermann.at

.. note::

   * The payload of the request (e.g. in the case of a ‘POST’ request) is not displayed on the API-demo page.