<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Instagram Posts On Website</title>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</head>
<body>

<div class="container">
<div class="row">
    <?php
       // use this instagram access token generator http://instagram.pixelunion.net/
       $access_token="5325579655.3a81a9f.0033201cfdc04f8e9931ff0d9bdbf218";
       $user_id     = "5325579655";
       $photo_count=4;
       $display_size = "thumbnail";
     
       $json_link="https://api.instagram.com/v1/users/self/media/recent/?";
       $json_link.="access_token={$access_token}&count={$photo_count}";
       $json = file_get_contents($json_link);       
       $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
              

      foreach($obj['data'] as $item){
       
     $image_link = $item['images']['standard_resolution']['url'];
     $image = $item['images']['thumbnail']['url'];
     echo '<a href="'.$image_link.'"><img src="'.$image.'" /></a>';
}
?>
</div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> 
</body>
</html>
<style type="text/css">
.item_box{
height:500px;
}

.photo-thumb{
width:100%;
height:auto;
float:left; 
border: thin solid #d1d1d1;
margin:0 1em .5em 0;
float:left; 
}
</style>

