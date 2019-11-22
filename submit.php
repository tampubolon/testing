<html>   
	<head>
		<title><?php echo "Flip | Mini Project";?></title> 
	</head>
	
	<body>

	<?php  // FLIP 2
	
   
		echo "<h1>Hasil</h1>";
		echo "<hr></hr>";



		//panggil API Flip POST
		$myObj=new \stdClass();
		$myObj->bank_code = $_POST['bank_code'];
		$myObj->account_number = $_POST['acount_number'];
		$myObj->amount = $_POST['amount'];
		$myObj->remark = $_POST['remark'];


		$myJSON = json_encode($myObj);

		echo $myJSON;
		echo "<br/><br/>";
		
		
		$curl = curl_init();
		$url="https://nextar.flip.id/disburse";

		curl_setopt($curl, CURLOPT_POST, 1);    
		curl_setopt($curl, CURLOPT_POSTFIELDS, $myJSON);

		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		echo $result;
		echo "<br/>";echo "<br/>";

		$character = json_decode($result); //json to php obj

		$a=$character -> id;
		$b=$character -> amount;
		$c=$character -> status;
		$d=$character -> timestamp;
		$e=$character -> bank_code;
		$f=$character -> account_number;
		$g=$character -> beneficiary_name;
		$h=$character -> remark;
		$i=$character -> receipt;
		$j=$character -> time_served;
		$k=$character -> fee;

		echo "<br/>ID: ";
		echo $a;        //id
		echo "<br/>";


		$servername = "localhost";
		$username= "root";
		$password="";
		$dbname="flip";


		//create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		//check connection
		if($conn -> connect_error){
			die("Connection failed:" . $conn ->connect_error);
		}
		
		echo"Connected Successfully<br>";
		$sql= "INSERT INTO miniproject (id,amount,status,timestamp,bank_code,account_number,beneficiary_name,remark,receipt,time_served,fee) 
		VALUES('$a','$b','$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k')";

		if($conn -> query($sql) == TRUE) {
				echo"New Record created succesfully<br/>";
		}	
		
		else {
				echo"Error:" . $sql . "<br>" . $conn ->error;
		}
		echo "<br><br>";


		session_start();
		$_SESSION['var'] = $a;

		?>

		<a href="check.php">Click di sini</a>
		<?php echo " Untuk Mengetahui Data Terbaru Transaksi<br>"?>

	</body>
</html>























