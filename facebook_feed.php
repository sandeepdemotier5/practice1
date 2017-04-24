<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="col-md-6">
</div>
<div class="col-md-6">
<?php
//Set your App ID and App Secret.
$appID = '352996131769901';
$appSecret = 'f26707f3eb9a9b6f7f0c30b719839f3c';

//Create an access token using the APP ID and APP Secret.
$accessToken = $appID . '|' . $appSecret;

//The ID of the Facebook page in question.
$id = '186581841860206';

//Tie it all together to construct the URL
$url = "https://graph.facebook.com/$id/posts?fields=id,picture,type,from,message,status_type,object_id,name,caption,description,link,created_time&access_token=$accessToken";

//Make the API call
$result = file_get_contents($url);

//Decode the JSON result.
$fbdata = json_decode($result, true);



foreach ($fbdata['data'] as $post )
{

 $post_created = date('j M - Y', strtotime($post['created_time']));
        $post_text = $post['message'];
        $post_url = $post['link'];
        $post_picture = $post['picture'];    
        //echo '<a href="'.$post_url.'"><img src="'.$post_picture.'"></a><br/>';

?>
<div class="col-md-6">
<div class="thumbnail">
<a href="<?= $post_url ?>" target="_blank">
<img src="<?= $post_picture ?>" alt="Lights">

</a>
</div>
</div>

<?php } ?>

</div>
</div>
</div>

</body>
</html>

<style type="text/css">

</style>