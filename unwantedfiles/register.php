<?php
if(isset($_POST['submit'])){
    # Get post values and assign them to a variable.
    $sname = $_POST["sname"];
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $username = $_POST["name"];
    $password = $_POST["uid"];
    $fone = $_POST["fone"];
    $myname = "IMARKET PLANET";
    $mymail = "info@imarketplanet.com";
    
    try{
        # Create a connection.
        $conn = new mysqli('localhost', 'imarketp_imark', 'next123', 'imarketp_imarket');
        if(!$conn->connect_errno){
            # Define an array variable.
            $ret = array();
            $ret = addClient($conn, $sname, $fname, $email, $username, $password, $fone, $myname, $mymail);
            
            if($ret['code'] == 1){
                # Create a redirect message to an okay page.
                echo $ret['message'];
            }else{
                # Create a redirect message to a fail page.
                echo $ret['message'];
            }
        }else{
            throw new Exception('Error found - Error number: '. $e->getCode() .' Error message: '. $e->getMessage());
        }
    }catch(Exception $e){
        throw new Exception('Error found - Error number: '. $e->getCode() .' Error message: '. $e->getMessage());
    }
}else{
    # Redirect user back to registeration from.
    #header("Location: register.php");
    echo 'Submit from form';
}

function addClient($conn, $sname, $fname, $email, $username, $password, $fone, $myname, $mymail){
    try{
        $sql = 'INSERT INTO signup(fname, sname, email, fone, name, uid) VALUES(
            "'. $conn->real_escape_string($fname) .'",
            "'. $conn->real_escape_string($sname) .'",
            "'. $conn->real_escape_string($email) .'",
            "'. $conn->real_escape_string($fone) .'"
            "'. $conn->real_escape_string($username) .'"
            "'. $conn->real_escape_string($password) .'"); ';
        
        $conn->query($sql);
        
        $ret = array();
        
        if($conn->affected_rows > 0){
            $res = sendMail($sname, $username, $password, $email, $mymail);
            
            if($res['code'] == 1){
                $ret = array(
                    'code' => 1,
                    'message' => 'Insert completed. Notification email sent.'
                );
            }else{
                $ret = array(
                    'code' => 0,
                    'message' => 'Unable to insert and send email.'
                );
            }
        }
        else{
            $ret = array(
                'code' => 0,
                'message' => 'Unable to add user to database.'
            );
        }
        
        # Return result.
        return $ret;
    }catch(Exception $e){
        throw new Exception('Error found - '. $e->getMessage());
    }
}

function sendMail($sname, $username, $password, $email, $mymail){
    # Compose email message
    $msg = 'Dear '. $sname .'<br/>
        Thank you for coming on board the Imarketplanet platform,
        we wish you a happy business venture, your username is '. $username .'
        and your password is '. $password .'To your success! <br/>
        IMARKETPLANET COMMUNITY';
    
    # Define email header.
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: IMARKETPLANET COMMUNITY'. "\r\n";
    
    # Send mail.
    $res = mail($mymail, 'New Registration Alert', $msg, $headers);
    
    $ret = array();
    
    if($res){
        $ret = array(
            'code' => 1,
            'message' => 'Email sent successfully.'
        );
    }else{
        $ret = array(
            'code' => 0,
            'message' => 'Unable to send email.'
        );
    }
    return $ret;
}
?>
