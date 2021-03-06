<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
interface Swift_Signers_HeaderSigner extends Swift_Signer, Swift_InputByteStream
{
 public function ignoreHeader($header_name);
 public function startBody();
 public function endBody();
 public function setHeaders(Swift_Mime_SimpleHeaderSet $headers);
 public function addSignature(Swift_Mime_SimpleHeaderSet $headers);
 public function getAlteredHeaders();
}
