<?php
require './vendor/autoload.php';
use Mailgun\Mailgun;

class Emailer {

	public function sendmail($subject, $message){
		$mailgun = new Mailgun('key-ebf1839c5ad2b8343f11521fa8d500a0', new \Http\Adapter\Guzzle6\Client());

		$domain = "sandboxbe52493b9205495392334e629e171c86.mailgun.org";

		$result = $mailgun->sendMessage($domain, array(
		    'from'    => 'Jason <postmaster@sandboxbe52493b9205495392334e629e171c86.mailgun.org>',
		    'to'      => 'Jason <jason.tian@i-tea.com.tw>',
		    'subject' => $subject,
		    'html'    => $message
		));
	}

}

?>