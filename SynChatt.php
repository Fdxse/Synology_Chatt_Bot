<?php
class SynChatt
{
    protected $url;
    protected $userID;
    public $textToSend;

    function __construct(string $url, int $UserID) {
        $this -> url = $url;
        $this -> userID = $UserID;
    }
    function __destruct() {
        #print "Destroying " . __CLASS__ . "\n";
    }
    function printurl(){
        print ($this -> url);
    }
    
    function addmessage(string $message){
        if(strlen($this->textToSend) == 0){
            $this -> textToSend = $message;
        }
        else
        {
            $this -> textToSend .= "\n".$message;
        }
    }

    function SendMessageToChatt(){
        if (strlen($this->textToSend) > 0) {
            $data = array('text' => $this -> textToSend, "user_ids" => [$this -> userID]);
            // use key 'http' even if you send the request to https://...
            $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => "payload=".json_encode($data),
            ),
            );
            
            $context  = stream_context_create($options);
            $result = file_get_contents($this -> url, false, $context);
            return $result;
        }
    }
}
?>