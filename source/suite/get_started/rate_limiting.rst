.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/developers/api/getting-started/rate-limiting/

Rate Limiting
=============

Our goal is to maintain high quality of service for all clients. You must be able to make at least 200 requests per
minute. Please note that there can be use cases where this limit is lower, please contact us to discuss them and we can adjust our
service according to your needs.

If the rate limit is exceeded, we might block your requests depending on the load of our servers. To avoid this, you need to implement
error handling and monitoring for your client.
