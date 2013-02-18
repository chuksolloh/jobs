<?php
$name = $_POST['companyname'];
$email = $_POST['email'];

try{
    # Establish connection...
    # define @host, @username, @password, @database name...
    #$conn = new mysqli('localhost', 'root', '', 'jobfinder');
    
    # Define connection for www.hired.com.ng
    $conn = new mysqli('mysql.hired.com.ng','hiredlandingpg','@hiredlandingpg','hired_landingpg');
    
    if(!$conn->connect_errno){
        # Check if company already exists.
        $ret = findCompanyByEmail($conn, $email);
        if($ret['code'] == 1){
            header("Location: companyexists.php");
        }else{
            # Get message from addEmployee.
            $res = addEmployer($conn, $name, $email);
            if($res['code'] == 1){
                header("Location: confirm_1.php");
            }else{
                header("Location: companyexists.php");
            }
        }
    }else{
        throw Exception('Connect failed. '. mysqli_connect_error());
    }
}catch(Exception $e){
    throw Exception('Error found - Error code: '. $e->getCode() . '. Error message: ' . $e->getMessage());
}

# Adds new employer to database.
function addEmployer($conn, $name, $email){
    # Create sql statement...
    $sql = 'INSERT INTO employer(companyname, email) VALUES(
        "'. $conn->real_escape_string($name) . '" ,
        "'. $conn->real_escape_string($email) . '"); ';
    
    $ret = array();
    # Execute query statement...
    $conn->query($sql);
    if($conn->affected_rows > 0){
        # Define message...
        $ret = array(
            'code' => 1,
            'message' => 'Entry successful.'
        );
    }else{
        # Define message...
        $ret = array(
            'code' => 0,
            'message' => 'Unable to upload entry. Please try again.'
        );
    }
    # Close connection with database.
    $conn->close();
    # Return variable message...
    return $ret;
}

# Check if company already exists.
function findCompanyByEmail($conn, $email){
    try{
        # Build sql query statement.
        $sql = 'SELECT * 
            FROM employer
            WHERE email = "'. $email .'"';
        
        # Execute sql query statement.
        $result = $conn->query($sql);
        $ret = array();
        
        if($result->num_rows > 0){
            # Define message in array.
            $ret = array(
                'code' => 1,
                'message' => 'Company already exists.'
            );
        }else{
            # Define message in array.
            $ret = array(
                'code' => 0,
                'message' => 'Company does not exists.'
            );
        }
        # Return message.
        return $ret;
    }catch(Exception $e){
        # Throw a generalized error message.
        throw new Exception('Error found - Error number: '. $e->getCode() .'. Error message - '. $e->getMessage());
    }
}
?>
