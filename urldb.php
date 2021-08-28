<?php
	require_once('connectiondb.php');
	//$resultm = '';
if(isset($_POST['submit'])){
     $url = urldecode($_POST['urlorg']);
     $urlenc = $_POST['urlenc'];
    $short_code = generateUniqueID(); 
    $sql ="INSERT INTO `urldb`(`urlorg`, `urlenc`, `hits`) VALUES ('$url', '$short_code', 0)";
   
    if(mysqli_query($con, $sql)){
        header("Location: index.php?short=".$short_code);
         
    }else{
        echo "Error:" .$sql. "<br>" .mysqli_error($con);
    }
    mysqli_close($con);
}
/*
function GetShortUrl($url){
 global $con;
 $query = "SELECT * FROM urldb WHERE urlorg = '".$url."' "; 
 $result = mysqli_query($con, $query);
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        return $row['urlenc'];
    }
} else {
$short_code = generateUniqueID();
$sql = "INSERT INTO `urldb`(`urlorg`, `urlenc`, `hits`) VALUES ('$url', '$short_code', 0)";
if(mysqli_query($con, $sql)){
       return $short_code;
} else{
        echo "Error:" .$sql. "<br>" .mysqli_error($con);
    }
}
}
*/

//generateuniqueid
function generateUniqueID(){
 global $con; 
 $token = substr(md5(uniqid(rand(), true)),0,6); 
 $query = "SELECT * FROM `urldb` WHERE urlenc = '".$token."' ";
 $result = mysqli_query($con, $query); 
 if (mysqli_num_rows($result) > 0) {
 generateUniqueID();
 } else {
 return $token;
 }
}
?>