Coming soon
===========

The API node is in active development. This is a list of planned changes:
 * API calls (from service to suite):
    * Used resources. This can be used to make sure that a resource is not used twice where that could be a problem
    * Programs using a resource (Can be used to add link to program on the resource editor page)
 * Resource validation end point (Will be called when a program is being saved, to make sure that the service is notified about the new usage of a resource, and can check if it is still a valid resource)
 * Resource options endpoint will allow the service to specify links to the resource. (Go to resource editor, and preview resource buttons in the node dialog)
