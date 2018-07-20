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
     $url = "https://gilvandro.junior@rotamed.com.br:gilvandro18@rotamed.zendesk.com/api/v2/search.json?query=type%3Aticket+status%3Aopen";
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
         $result = file_get_contents($url); 
        //Print Result
         $obj = json_decode($result);
     $cont = 0;
         foreach ($obj->results[$cont] as $x){
           $x = $obj->results[$cont];
             
           // ID DO TICKET
              echo '<h3>ID</h3>';
              echo '<pre>';
             //ID DO TICKET
              $posicao1 = (explode('"',$x->id));
             print_r($posicao1[0]);
             echo '</pre>';
           
           
           //URL DO JSON
             echo '<h3>URL</h3>';
             echo '<pre>';
         $posicao0 = (explode('"',$x->url));
             print_r($posicao0[0]);
             echo '</pre>';

             //SUBJECT
             echo '<h3>SUBJECT</h3>';
            echo '<pre>';
            $posicao2 = (explode('"',$x->subject));
             print_r($posicao2[0]);
             echo '</pre>';

             //DESCRIÇÃO DO TICKET
             echo '<h3>DESCRIPTION</h3>';
             echo '<pre>';
           $posicao3 = (explode('"',$x->description));
             print_r($posicao3[0]);
             echo '</pre>';

                 //Status do Ticket
             echo '<h3>Prioridade</h3>';
             echo '<pre>';
           $posicao5 = (explode('"',$x->priority));
             print_r($posicao5[0]);
             echo '</pre>'; 
           $cont = $cont +1;
           
         }


         // Closing
         curl_close($ch);


      ?>
   </font> 
   </td> 
</tr> 
</table> 
  </body>
</html>