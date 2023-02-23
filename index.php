<?php

require __DIR__ . '/vendor/autoload.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $obj=new GuzzleHttp\Client();
    $res=$obj->request('GET',"https://restcountries.com/v3/name/{$_POST['country']}");
    $data=json_decode($res->getBody(),true)[0];
}else{
    //ss$country= $_POST['country'];
    if(!preg_match('/^[A-Za-z]+$/', $country))
    $msg="Invalid Name";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label>Enter Name</label>
            <input type="text" name="country"  >

            <button type="submit" name="submit">submit</button>
    </form>
    <?php if(isset($data)){?>
        <table border="1px">
        <tr>
                <th>Name</th>
                <td><?php echo $data['name'];?></td>
            </tr>
            <tr>
                <th>Capital</th>
                <td><?php echo $data['capital'][0]?></td>
            </tr>
            <tr>
                <th>Population</th>
                <td><?php echo $data['population']?></td>
            </tr>
            <tr>
                <th>Region</th>
                <td><?php echo $data['region']?></td>
            </tr>
            <tr>
                <th>Flag</th>
                <td><img src="<?php echo $data['flag']?>" alt="<?php echo $data['name']?> flag" width="200"></td>
            </tr>
        </table>
         <?php }?>
</body>
</html>