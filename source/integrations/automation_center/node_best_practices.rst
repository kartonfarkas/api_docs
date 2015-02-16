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
that requests are rationalised into a queue (or database table) and then executed in a separate process, enabling the requests to be handled in parallel rather than in one-by-one.
This way your service can respond to an Automation Center request immediately, without the program having to wait for the request to be processed.

Idempotent Services
-------------------

If a trigger fails, the Automation Center retry automatically, which could be an issue if, e.g. the HTTP connection fails
just before the service responds. The service has already taken care of the triggered task, but as there was no response to the AC, it will keep sending the request as it thinks it failed. 
For that reason we strongly recommend that service implementers check if they have received the exact same request before, and then ignore any duplicate requests.
The *queue_id*, *run_id* and *environment* id parameters together should form a unique id for each request. 


Logging
-------

Although we have very detailed logs relating to the Automation Center with regards to communication with each
service, you should also log requests and failures as well. At the very minimum log every incoming request,
and every response sent to Automation Center.

