<?php
$email = 'chuksolloh@gmail.com';
$conn = new mysqli('localhost', 'root', '', 'jobfinder');

try{
    $sql = 'SELECT email 
        FROM employee 
        WHERE email = "'. $email .'"';

    #echo $sql;
    
    $result = $conn->query($sql);
//    echo '<pre>';
//        print_r($conn);
//    echo '</pre>';
    $res = array();
    #$res = $result->fetch_array();
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){
            $res[] = $row;
        }
    }
    echo '<pre>';
        print_r($res);
    echo '</pre>';
}catch(Exception $e){
    throw new Exception('Error found. '. $e->getMessage() .'. Please try again.');
}
?>
