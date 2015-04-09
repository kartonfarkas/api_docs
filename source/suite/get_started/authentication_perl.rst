Perl
====

.. code-block:: perl

   use strict;
   use warnings;
   use LWP::UserAgent;
   use POSIX qw(strftime);
   use Digest::SHA1 qw(sha1_hex);
   use MIME::Base64 qw(encode_base64);

   my $agent = LWP::UserAgent->new;

   my $username = 'bob001';
   my $secretKey = 'Xhlo9vN0F3mm5D2dpml3II';

   my $nonce = 'd36e316282959a9ed4c89851497a717f';
   my $timestamp = strftime "%Y-%m-%dT%H:%M:%SZ", gmtime;
   my $text = $nonce . $timestamp . $secretKey;

   my $url = 'https://suite5.emarsys.net/api/v2/language';
   my $passwordDigest = encode_base64(sha1_hex($text), "");

   my $header = 'UsernameToken ' .
       "Username=\"$username\", " .
       "PasswordDigest=\"$passwordDigest\", " .
       "Nonce=\"$nonce\", " .
       "Created=\"$timestamp\"";

   $agent->default_header('X-WSSE' => $header);
   my $response = $agent->get($url);

   print $response->decoded_content . "\n";
