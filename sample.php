<?php
    require_once("SynChatt.php");
    if($_POST["token"] == '**ADD YOUR TOKEN HERE!!**')
    {
      $chatt = new SynChatt("**ADD YOUR CHATT URL HERE**",$_POST['user_id']);
      $chatt -> addmessage("Oh Hi there ".$_POST['username']."! I'm so very pleased to see you!");

      if (strlen($chatt -> textToSend) > 0)
      {
        $chatt -> SendMessageToChatt();
      }
    }
?>
