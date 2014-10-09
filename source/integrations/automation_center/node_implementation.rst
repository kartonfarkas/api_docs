Implementing the HTTP interface
====================================

Authentication
--------------

We use the standard service authentication library of Emarsys to sign requests sent by Automation Center. Please refer to the authentication library documentation for details.

Note that each of the endpoints are available through HTTPS protocol.

Trigger endpoint
----------------

This endpoint is called by Automation Center, when the program execution reaches your node. It should start the execution of your service.

**HTTP Method:** POST

.. list-table:: **Parameters (sent as form data)**
  :header-rows: 1

  * - Parameter name
    - Type
    - Description
  * - environment
    - string
    - The Suite environment that triggered the event. (example: login.emarsys.net)
  * - customer_id
    - integer
    - The ID of the customer in Suite database
  * - program_type
    - string
    - Possible values: ‘batch’, ‘transactional’, ‘recurring’
  * - list_id
    - integer
    - Userlist ID in Suite database (Optional)
  * - user_id
    - integer
    - Contact ID in Suite database (Optional)
  * - resource_id
    - integer/string
    - The ID of a resource managed by the service. (Optional)
  * - queue_id
    - integer
    - Identifies the trigger request. This value is unique for each trigger event from a given environment.
  * - run_id
    - string
    - Identifies the program run. This value can be used to link together multiple trigger events from the same program resulting from a single entry.
  * - data
    - json
    - Campaign specific external data (Optional)


**Required response:** 
 * In case of success, the service needs to respond with a HTTP status code in the 200-299 range.
 * In case of error the HTTP status code should be in the range 400-499 in case of client error (i.e. the request is invalid, and cannot be fulfilled) or in the 500-599 range when there was a an error on server side. In case of server errors Automation Center will retry the request 3 times. 
 * In case of errors the service should also return a json containing a userMessage and a code key.
   Example: ::
      {“userMessage”:”Could not trigger event”,”code”:”45”}

.. image:: /_static/images/ac_node_trigger_workflow.png
