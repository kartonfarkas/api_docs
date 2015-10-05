.. meta::
   :http-equiv=refresh: 0; url=https://documentation.emarsys.com/resource/sample-code-ruby-2/

Ruby
====

.. code-block:: ruby

   require 'time'
   require 'base64'
   require 'digest/sha1'
   require 'net/https'

   username = 'customer001'
   secretKey = 'customersecret'

   nonce = 'd36e316282959a9ed4c89851497a717f'
   timestamp = Time.now.utc.iso8601
   text = nonce + timestamp + secretKey
   passwordDigest = Base64.encode64(Digest::SHA1.new.hexdigest(nonce + timestamp + secretKey)).strip

   url = 'https://api.emarsys.net/api/v2/language'

   header = 'UsernameToken ' +
         "Username=\"#{username}\", " +
         "PasswordDigest=\"#{passwordDigest}\", " +
         "Nonce=\"#{nonce}\", " +
         "Created=\"#{timestamp}\""

   uri = URI(url)
   req = Net::HTTP::Get.new(uri)

   req['X-WSSE'] = header

   res = Net::HTTP.start(uri.hostname, uri.port, :use_ssl => true) do |http|
     http.request(req)
   end

   puts res.body
