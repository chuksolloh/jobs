<?php
#error_reporting(0);

# Assign post values to variables.
$email = $_POST['email'];

# Generate a random number.
$num = mt_rand();

$path = '';
$target = "../upload/"; 
$target = $target . $num . '_' . basename( $_FILES['cv']['name']); 
 
# Validate type file and write file to folder 
if(file_exists($_FILES['cv']['tmp_name']) && is_uploaded_file($_FILES['cv']['tmp_name'])){
    if($_FILES['cv']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || 
            $_FILES['cv']['type'] == 'application/pdf' ||
            $_FILES['cv']['type'] == 'application/msword'){
        if(move_uploaded_file($_FILES['cv']['tmp_name'], $target)) { 
            # send confirmation message.
            $path = $target;
        } 
        else { 
            # Set path to false.
            $res = FALSE; 
        }
    }else{
        header('Location: errormessage.php?email='. $email);
        exit();
        #die('Invalid file');
    }
}else{
    # set path to false.
    $path = FALSE;
}

if(!$path) {
    # No file upload. Set default to empty string.
    $path = '';
    header('Location: index.php');
}

try{
    # Establish connection...
    # define @host, @username, @password, @database name...
    #$conn = new mysqli('localhost', 'root', '', 'jobfinder');

    # Define connection for www.hired.com.ng
    $conn = new mysqli('mysql.hired.com.ng','hiredlandingpg','@hiredlandingpg','hired_landingpg');
    
    if(!$conn->connect_errno){
        # Check if user already exists.
        $res = findUserByEmail($conn, $email);
        
        if($res['code'] == 1 && $res['file_path'] == ''){
            $ret = updateResumeByEmail($conn, $email, $path);

            if($ret['code'] == 0){
                header('Location: index.php');
            }else if($ret['code'] == 1){
                header('Location: confirm.php');
            }
        }
    }
}catch(Exception $e){
    throw Exception('Error found - Details: Error Number - '.$e->getCode() .'. Error Message - '. $e->getMessage());
}

# Method for updating user's resume
function updateResumeByemail($conn, $email, $path){
    try{
        # Define sql statement.
        $sql = 'UPDATE employee
            SET cvpath = "'. $path .'" 
            WHERE email = "'. $email .'"';
        
        #echo $sql;
        $conn->query($sql);
        
        if($conn->affected_rows > 0){
            $ret = array(
                'code' => 1,
                'message' => 'Update successful.'
            );
        }else{
            $ret = array(
                'code' => 0,
                'message' => 'Update failed.'
            );
        }
        
        return $ret;
    }catch(Exception $e){
        throw Exception('Error found - Details: Error Number - '.$e->getCode() .'. Error Message - '. $e->getMessage());
    }
}


# Method that searches for an existing user by email.
function findUserByEmail($conn, $email){
    try{
        # Create sql statement.
        $sql = 'SELECT *
            FROM employee
            WHERE email = "'. $email . '"';
        # Execute sql statement.
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_array();
            # Define message.
            $ret = array(
                'code' => 1,
                'message' => 'User exists.',
                'file_path' => $row['cvpath']
            );
        }else{
            # Define message.
            $ret = array(
                'code' => 0,
                'message' => 'User does not exists.'
            );
        }
        # Return result in array format.
        return $ret;
    }catch(Exception $e){
        throw Exception('Error found - Details: Error Number - '.$e->getCode() .'. Error Message - '. $e->getMessage());
    }
}
?>
