<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="utf-8">
    <title>ROTAMED</title>
  </head>
  <body>
    <h2>
        ROTAMED
    </h2>
    <table width="280" cellspacing="1" cellpadding="3" border="0" bgcolor="black"> 
<tr> 
   <td><font color="white" face="arial, verdana, helvetica"> 
<b>Tickets</b> 
   </font></td> 
</tr> 
<tr> 
   <td bgcolor="white"> 
   <font face="arial, verdana, helvetica"> 
  <?php
   require '../controller/controller.php';

     // Get all tickets
 // $tickets = $client->tickets()->findAll(['per_page' => 1, 'page' => 1, ]);
   //var_dump($tickets);
     $url = "https://rotamed.zendesk.com/api/v2/search.json?query=type%3Aticket+status%3Aopen";
     $username = "gilvandro.junior@rotamed.com.br";
     $password = "gilvandro18";
     //  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// autenticação
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);

     
// Closing
curl_close($ch);

//$result = file_get_contents($url, "gilvandro.junior@rotamed.com.br", "gilvandro18");
// Will dump a beauty json :3
var_dump(json_decode($result["threads"][13/* thread id */]["title"/* thread key */], true));

// Will dump a beauty json :3
//var_dump(json_decode($result, true));
      ?>
   </font> 
   </td> 
</tr> 
</table> 
  </body>
</html>