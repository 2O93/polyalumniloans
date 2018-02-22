#/////////////craete the pdf///////////////
$subject1 = $ARGV[0];#Subject;
$email = $ARGV[1];#recepient's email address";
$message1 = $ARGV[2]; #email message;
#print $cc_more;
use MIME::Lite;

#send the email
	# set up email
	$reply_to = "kalumbec\@gmail.com";
	$to = "$email";
	$from = "kalumbec\@sdnp.org.mw";
	$subject = "subject1";
	$message = "$message1";

	# send email
 	email($to, $from, $subject, $message);
	# email function
 	sub email
 	{
	# get incoming parameters
	local ($to, $from, $subject, $message) = @_;
	# create a new message
	 $msg = MIME::Lite->new(
 	'Reply-to' =>$reply_to,
	 From => $from,
  	 To => $to,
	 Subject => $subject,
 	 Data => $message
	);

 	# send the email
 	MIME::Lite->send('smtp', 'kalata1.sdnp.org.mw', Timeout => 60);
 	$msg->send();
	}

