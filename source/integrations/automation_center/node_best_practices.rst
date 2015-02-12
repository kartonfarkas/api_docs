Best Practices
==============

RESTful Services
----------------

As a general rule, all of the endpoints should be RESTful services, but most importantly, return
meaningful HTTP status codes. The range 200-299 should be used for successful status codes, 400-499 for client-side errors, and
500-599 for server-side errors. In addition, we strongly recommend that endpoint urls begin with a version number, e.g. ‘/v1/send_sms’ could be a trigger endpoint url.

Asynchronous Execution
----------------------

As most services will involve tasks that can take a considerable amount of time, we strongly recommend that 
that requests are added to some kind of queue (or database table) and then executed in a separate process.
This way your service can respond to an Automation Center request immediately, without the program having to wait for the request to be processed.

Idempotent Services
-------------------

When a trigger fails Automation Center retries. That also means that if the HTTP connection fails
just before the service responds, the situation can arise where the service has already taken
care of completing the triggered task. However, the Automation Center thinks the service failed and that the trigger needs to be resent.
For that reason we strongly recommend that service implementers check if they have received the exact same request before, and then ignore any duplicate requests. 
The *queue_id*, *run_id* and *environment* id parameters together should form a unique id for each request.


Logging
-------

Although we have very detailed logs relating to the Automation Center with regards to communication with each
service, you should also log requests and failures client-side as well. At the very minimum log every incoming request,
and every response sent to Automation Center.

