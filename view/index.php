<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="utf-8">
    <title>ROTAMED CONTROL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/font-style.css" rel="stylesheet">
    <link href="../css/flexslider.css" rel="stylesheet">
    <link href="../css/table.css" rel="stylesheet">

    <script type="text/javascript" src="../js/jquery.js"></script>    
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="../js/lineandbars.js"></script>
    
	<script type="text/javascript" src="../js/dash-charts.js"></script>
	<script type="text/javascript" src="../js/gauge.js"></script>
	
	<!-- NOTY JAVASCRIPT -->
	<script type="text/javascript" src="../js/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="../js/noty/layouts/top.js"></script>
	<script type="text/javascript" src="../js/noty/layouts/topLeft.js"></script>
	<script type="text/javascript" src="../js/noty/layouts/topRight.js"></script>
	<script type="text/javascript" src="../js/noty/layouts/topCenter.js"></script>
	
	<!-- You can add more layouts if you want -->
	<script type="text/javascript" src="../js/noty/themes/default.js"></script>
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script src="../js/jquery.flexslider.js" type="text/javascript"></script>

    <script type="text/javascript" src="../js/admin.js"></script>
    
    

    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

  	<!-- DataTables Initialization -->
    <script type="text/javascript" src="../js/datatables/jquery.dataTables.js"></script>
  			<script type="text/javascript" charset="utf-8">
  			    $(document).ready(function () {
  			        $('#dt1').dataTable();
  			    });
	</script>

  </head>
  <body style="background:#1f1f1f;">
    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img src="http://rotamed.com.br/wp-content/uploads/2015/08/logo1.png" alt="">   Zendesk Dashboard</a>
          <!--<a class="navbar-brand" href="index.html"><img src="images/logo30.png" alt=""> Zendesk Dashboard</a>-->
        </div> 
        </div>
    </div>
    <!--<table width="280" cellspacing="1" cellpadding="3" border="0" bgcolor="black"> 
<tr> 
   <td><font color="white" face="arial, verdana, helvetica"> 
<b>Tickets</b> 
   </font></td> 
</tr> 
<tr> 
   <td bgcolor="white"> 
   <font face="arial, verdana, helvetica"> -->
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
      
    echo'<div class="container">';
    echo'<div class="row">';
    
     
         foreach ($obj->results[$cont] as $x){
           $x = $obj->results[$cont];
         echo'<div class="col-sm-3 col-lg-3">';
         echo '<div class="dash-unit">';
           
           echo  '<dtitle>ID</dtitle>';
            $posicao1 = (explode('"',$x->id));
           echo  '<dtitle>';
             print_r($posicao1[0]);
           echo'</dtitle></br>';
           
           echo '<h3>Título</h3></br>';
            $posicao1 = (explode('"',$x->subject));
           echo  '<dtitle>';
             print_r($posicao1[0]);
           echo'</dtitle></br>';
           
           echo '<h3>Prioridade</h3></br>';
            $posicao1 = (explode('"',$x->priority));
           echo  '<dtitle>';
             print_r($posicao1[0]);
           echo'</dtitle></br>';
           
           echo '<h3>Descrição</h3></br>';
            $posicao1 = (explode('"',$x->description));
           echo  '<dtitle>';
             print_r($posicao1[0]);
           echo'</dtitle></br>';
           
           echo '</div>';
           echo '</div>';
                                         
           $cont = $cont +1;
           
         }
    echo '</div>';
    echo '</div>';
         // Closing
         curl_close($ch);


      ?>
   </font> 
   </td> 
</tr> 
</table> 
  </body>
</html>