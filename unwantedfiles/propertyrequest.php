<?php
# Get post details.
$type = $_POST['requestType'];
$name = $_POST['fname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$info  = $_POST['info'];

try{
    # Compose message.
    $msg = 'Client: '. $name . "<br/>" .
           'Type of request: '. $type . "<br/>" .
           'Email: '. $email . "<br/>" .
           'Mobile number: '. $mobile . "<br/>" .
           'Additional Information: '. $info;
    
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '. $email . "\r\n";
    #echo $msg;
    //
    # Send composed email to f.a.esan consulting.
    $ret = mail('enquiry@faesanconsulting.com', 'Property Request', $msg, $headers);
    # Check if email was sent successfully.
    if($ret){
        $res = 'Thank you for filling out the form. A representative will be touch within the next 24 hours.';
        header("Location: requestconfirm.php?id=". $res);
    }else{
        $res = 'Unable to send mail. Please try again';
        header("Location: requestconfirm.php?id=". $res);
    }
}catch(Exception $e){
    throw new Exception('Unable to verify request. Please try again.');
}
?>
