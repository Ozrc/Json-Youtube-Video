
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <title>Youtube Video - Oğuz Zarcı</title>
    <style>
    body {
        background: #555 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB9JREFUeNpi/P//PwM6YGLAAuCCmpqacC2MRGsHCDAA+fIHfeQbO8kAAAAASUVORK5CYII=);
        font: 13px 'Lucida sans', Arial, Helvetica;
        color: #eee;
        text-align: center;
    }
    
    a {
        color: #ccc;
    }
    
    /*-------------------------------------*/
    
    .cf:before, .cf:after{
      content:"";
      display:table;
    }
    
    .cf:after{
      clear:both;
    }

    .cf{
      zoom:1;
    }

    /*-------------------------------------*/	
    
    .form-wrapper {
        width: 450px;
        padding: 15px;
        margin: 150px auto 50px auto;
        background: #444;
        background: rgba(0,0,0,.2);
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        -moz-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
        box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
    }
    
    .form-wrapper input {
        width: 330px;
        height: 20px;
        padding: 10px 5px;
        float: left;    
        font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
        border: 0;
        background: #eee;
        -moz-border-radius: 3px 0 0 3px;
        -webkit-border-radius: 3px 0 0 3px;
        border-radius: 3px 0 0 3px;      
    }
    
    .form-wrapper input:focus {
        outline: 0;
        background: #fff;
        -moz-box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
        -webkit-box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
        box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
    }
    
    .form-wrapper input::-webkit-input-placeholder {
       color: #999;
       font-weight: normal;
       font-style: italic;
    }
    
    .form-wrapper input:-moz-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }
    
    .form-wrapper input:-ms-input-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }    
    
    .form-wrapper button {
		overflow: visible;
        position: relative;
        float: right;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 110px;
        font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
        color: #fff;
        text-transform: uppercase;
        background: #d83c3c;
        -moz-border-radius: 0 3px 3px 0;
        -webkit-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;      
        text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
    }   
      
    .form-wrapper button:hover{		
        background: #e54040;
    }	
      
    .form-wrapper button:active,
    .form-wrapper button:focus{   
        background: #c42f2f;    
    }
    
    .form-wrapper button:before {
        content: '';
        position: absolute;
        border-width: 8px 8px 8px 0;
        border-style: solid solid solid none;
        border-color: transparent #d83c3c transparent;
        top: 12px;
        left: -6px;
    }
    
    .form-wrapper button:hover:before{
        border-right-color: #e54040;
    }
    
    .form-wrapper button:focus:before{
        border-right-color: #c42f2f;
    }    
    
    .form-wrapper button::-moz-focus-inner {
        border: 0;
        padding: 0;
    }
    </style>
</head>

<body>

<a href="youtube.php"><img src="seo.png" width="380" height="150" /><br></a>


</body>
</html>







<?php
// youtube kanal bilgisi okuma
if(isset($_POST["kanal"])) {
    $yazUrl = str_replace(" ","+",$_POST["kanal"]);
    $url = "http://gdata.youtube.com/feeds/api/videos?q=".$yazUrl."&max-results=5&v=2&alt=jsonc&orderby=published";
    //echo $url;
    $jsonData = file_get_contents($url);
    $data = json_decode($jsonData, true);
    //var_dump($data["data"]["items"]["title"]);
    //echo $data["data"]["items"][0]["title"];
    for($i = 0; $i<count($data["data"]["items"]); $i++) {



?>

<b>Video Başlığı : </b>  <h4><?php echo $data["data"]["items"][$i]["title"]; ?></h4>
<b>Yükleme Tarihi : </b><p><?php echo $data["data"]["items"][$i]["uploaded"]; ?></p>
<b>Açıklama : </b><p><?php echo $data["data"]["items"][$i]["description"]; ?></p>
<iframe width="360" height="215" src="https://www.youtube.com/embed/<?php echo $data["data"]["items"][$i]["id"]; ?>" frameborder="0" allowfullscreen></iframe>


<a href="https://www.youtube.com/embed/<?php echo $data["data"]["items"][$i]["title"]; ?>"></a>

<br><br>

<hr width="380"> 
<br><br>
<?php }}?>