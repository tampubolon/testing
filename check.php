<html>  
	<head>
		<title>	<?php echo "Flip | Mini Project";?></title>
	</head>
	
	<body>

	<?php
		// FLIP 2
   
		echo "<h1>Update Data Transaksi</h1>";
		echo "<hr></hr>";

		session_start();
		$id = $_SESSION['var']; // Variabel id dari submit.php


		$curl = curl_init();  //inisiasi curl
		
		function httpGet($url){

			$curl = curl_init();  
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_USERPWD, "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41");
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($curl,CURLOPT_URL,$url);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
			//  curl_setopt($ch,CURLOPT_HEADER, false); 
			$output=curl_exec($curl);
    
			return $output;
		}
 
		echo httpGet("https://nextar.flip.id/disburse/$id");
		
		

 
		echo"<br><br>";
		echo $id;
		echo"<br>";
	

	?>
	</body>
</html>


