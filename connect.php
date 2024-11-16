<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo php</title>
</head>
<body>
    <?php
       try{
        $dsn = "mysql:host=localhost;dbname=web";
        $user = "root";
        $pass = "1234";
        $con = new PDO($dsn,$user,$pass);
 
        if($con != null){
           echo "Ket noi thanh cong !";
        }else{
           echo "Ket noi khong thanh cong !";
        }
       }catch(PDOException $e){
           echo "Error: " . $e->getMessage();
       }
    ?>
</body>
</html>