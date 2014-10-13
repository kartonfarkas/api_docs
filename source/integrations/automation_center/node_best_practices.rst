Best practices
==============

RESTfull services
-----------------

As a general rule, all of the endpoints should be RESTfull services. Most importantly, please return meaningful HTTP status codes. The range 200-299 should be used for success, 400-499 for client and 500-599 for server errors. Also, it’s strongly advised that endpoint urls begin with a version number. For example ‘/v1/send_sms’ could be a trigger endpoint url.

Asynchronous execution
----------------------

Since most services will do something that may take considerable amount of time, it is highly advised that requests are added to some kind of queue (or database table) and executed in a separate process. This way your service can respond to Automation Center immediately, and won’t make it wait while you are processing the request.

Idempotent services
-------------------

When a trigger fails Automation Center retries. That also means that if the HTTP connection fails just before the service responds, we can end up with a situation where the service has already taken care of completing the triggered task, but Automation Center thinks the service failed, and the trigger should be repeated. For that reason it is strongly recommended, that service implementers check if they have received the exact same request before and ignore duplicates. The queue_id, run_id and environment id parameters together should form a unique id for each request.

Logging
-------

Although we have very detailed logs on Automation Center side about the communication with each service you should also log requests and failures. At the very minimum log every incoming request, and every response you send to Automation Center.

