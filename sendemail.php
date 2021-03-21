<?php 
  require 'vendor/autoload.php';
  include_once 'db/config.php';

  class SendEmail {
    public static function SendMail($to, $subject, $content) {
    $key = SENDGRID_API_KEY;  
    // var_dump(SENDGRID_API_KEY); exit;

      $email = new \SendGrid\Mail\Mail();
      $email->setFrom('charlesloehle@gmail.com', "Charles Loehle");
      $email->setSubject($subject);
      $email->addTo($to);
      $email->addContent('text/plain', $content);
      $sendgrid = new \SendGrid($key);

      try {
        $response = $sendgrid->send($email);
        return $response;
      } catch (PDOException $e) {
        echo 'Email exception: ' . $e->getMessage();
      }
    }
  }

?>