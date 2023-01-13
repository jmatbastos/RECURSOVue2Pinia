<?php

	include 'db.php';


	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		// ligação à base de dados
		$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
		if($db) {	   
			// criar query numa string
			  $query  = "SELECT  * FROM coursecategories";
		 
			// executar a query
			if(!($result = @ mysqli_query($db, $query)))
				showerror($db);
			
			// vai buscar o resultado da query

			$nrows  = mysqli_num_rows($result);
			$coursecategories = [];
			for($i=0; $i<$nrows; $i++)
				$coursecategories[$i] = mysqli_fetch_assoc($result);

			
			// allow cross-origin requests (CORS)
			header('Access-Control-Allow-Origin: *');
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
			// convert to JSON
			$coursecategoriesJSON = json_encode($coursecategories);
			echo $coursecategoriesJSON;
			// fechar a ligaçãbase de dados
			mysqli_close($db);
		}	 
	}

	// allow cross-origin requests (CORS)
	if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");	
	}



?>

