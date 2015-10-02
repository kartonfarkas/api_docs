.. meta::
   :http-equiv=refresh: 0; url=http://documentation.emarsys.com/resource/javascript-events/

JavaScript Events
=================

For some use cases a :doc:`iframe` iframe or a :doc:`container` iframe should communicate with the
Emarsys application. We are using `window.postMessage() <https://developer.mozilla.org/en-US/docs/Web/API/Window/postMessage>`_
to implement this communication. Our code that receives your integration's messages is open source and available
on GitHub at `emartech/suite-integration-js <https://github.com/emartech/suite-integration-js>`_.

It's possible that there will be more than one integration iframes will be loaded on a page. The iframes
of :doc:`iframe` and :doc:`container` will receive and ``integration_instance_id`` GET parameter in the iframe URL.
They can use this ID to identify themselves.

resize message
--------------

:doc:`container` may have different heights based on the content they have, and this can change dynamically if
the content changes. On the load of the content and content changes, the integration should send a resize message
with the new height of the content.

.. code-block:: javascript

   var integration_instance_id = document.location.href.match(/integration_instance_id=(\d+)/)[1];

   window.postMessage({
     "event": "resize",
     "source": { "integration_instance_id": integration_instance_id },
     "height": 200 /* pixel */
   }, "*");

refresh message
---------------

This message simply reloads the current page.

.. code-block:: javascript

   var integration_instance_id = document.location.href.match(/integration_instance_id=(\d+)/)[1];

   window.postMessage({
     "event": "refresh",
     "source": { "integration_instance_id": integration_instance_id }
   }, "*");

alert message
-------------

The integration can send an alert event to the Emarsys application, and it will display a banner alert at the top
of the page. The text of the alert message is required, and optionally you can specify an icon, a CSS classname and
a timeout as well. Please refer to the :doc:`../ui_framework/index` for more information about the available icons
and alert classes.

.. code-block:: javascript

   var integration_instance_id = document.location.href.match(/integration_instance_id=(\d+)/)[1];

   window.postMessage({
     "event": "alert",
     "source": { "integration_instance_id": integration_instance_id },
     "icon": "e-communication-network",
     "text": "Hello World!",
     "className": "e-alert-success"
   }, "*");

navigate message
----------------

The integration can ask the Emarsys application to navigate to an other page. Please consult your contact person
about the available page ids.

.. code-block:: javascript

   var integration_instance_id = document.location.href.match(/integration_instance_id=(\d+)/)[1];

   window.postMessage({
     "event": "navigate",
     "source": { "integration_instance_id": integration_instance_id },
     "target": {
       "pathname": "email_campaigns/edit",
       "campaign_id": 123456
     }
   }, "*");
