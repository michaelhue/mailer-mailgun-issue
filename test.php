<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Mailer\Bridge\Mailgun\Transport\MailgunApiTransport;
use Symfony\Component\Mailer\Exception\HttpTransportException;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->safeLoad();
$dotenv->required(['MAILGUN_DOMAIN', 'MAILGUN_KEY', 'FROM', 'TO'])->notEmpty();

$transport = new MailgunApiTransport(
	key: getenv('MAILGUN_KEY'),
	domain: getenv('MAILGUN_DOMAIN'),
	region: getenv('MAILGUN_REGION')
);

$mailer = new Mailer($transport);

$message = (new Email())
	->from(getenv('FROM'))
	->to(getenv('TO'))
	->subject('MailgunApiTransport test')
	->text('This is your plain text message.')
	->html('<p>This is your HTML message.');

try {
	$mailer->send($message);
} catch (HttpTransportException $e) {
	print($e->getDebug());
	print($e->getResponse()->getContent(false));
}
