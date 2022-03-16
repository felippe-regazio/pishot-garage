<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_MemorySpool implements Swift_Spool
{
 protected $messages = [];
 private $flushRetries = 3;
 public function isStarted()
 {
 return \true;
 }
 public function start()
 {
 }
 public function stop()
 {
 }
 public function setFlushRetries($retries)
 {
 $this->flushRetries = $retries;
 }
 public function queueMessage(Swift_Mime_SimpleMessage $message)
 {
 //clone the message to make sure it is not changed while in the queue
 $this->messages[] = clone $message;
 return \true;
 }
 public function flushQueue(Swift_Transport $transport, &$failedRecipients = null)
 {
 if (!$this->messages) {
 return 0;
 }
 if (!$transport->isStarted()) {
 $transport->start();
 }
 $count = 0;
 $retries = $this->flushRetries;
 while ($retries--) {
 try {
 while ($message = \array_pop($this->messages)) {
 $count += $transport->send($message, $failedRecipients);
 }
 } catch (Swift_TransportException $exception) {
 if ($retries) {
 // re-queue the message at the end of the queue to give a chance
 // to the other messages to be sent, in case the failure was due to
 // this message and not just the transport failing
 \array_unshift($this->messages, $message);
 // wait half a second before we try again
 \usleep(500000);
 } else {
 throw $exception;
 }
 }
 }
 return $count;
 }
}
