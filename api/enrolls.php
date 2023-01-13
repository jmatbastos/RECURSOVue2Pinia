<?php
  
include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// ligação à base de dados
	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
	if($db) {	

		$json=file_get_contents('php://input');

		$data = json_decode($json, true);

		// criar query numa string
		$query  = "INSERT INTO enrolls SET user_id='" . $data['user_id'] . "',course_id='" . $data['course_id'] . "',enroll_date=NOW()";

		// executar a query
		if(!($result = @ mysqli_query($db, $query)))
			showerror($db);
			
		$user_id=$data['user_id'];
		// get last order id
			$query = "select cs.name as course_name, t.name as teacher_name, en.id, en.enroll_date from enrolls as en inner join (courses as cs, teachers as t) on (en.course_id=cs.id and cs.teacher_id=t.id ) where en.user_id='$user_id' order by en.id desc limit 1";
			if(!($result = @ mysqli_query($db, $query)))
				showerror($db);
			   
			$last_order = mysqli_fetch_assoc($result);

		// fechar a ligação à base de dados
		mysqli_close($db);

	} // end if db		
		
	// allow cross-origin requests (CORS)
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
	// convert to JSON
	$json=json_encode($last_order);
	echo $json;
		
	
}
	
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
		
		// ligação à base de dados
		$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
		if($db) {	
			$user_id = $_GET['user_id'];
		
			$query = "select cs.name as course_name, t.name as teacher_name, en.id, en.enroll_date from enrolls as en inner join (courses as cs, teachers as t) on (en.course_id=cs.id and cs.teacher_id=t.id ) where en.user_id='$user_id' order by en.enroll_date desc";
			
			if(!($result = @ mysqli_query($db, $query)))
				showerror($db);
			// vai buscar o resultado da query

			$nrows  = mysqli_num_rows($result);
			$enrolls = [];
			for($i=0; $i<$nrows; $i++)
				$enrolls[$i] = mysqli_fetch_assoc($result);

			// fechar a ligaçãbase de dados
			mysqli_close($db);

		} // end if db 	
		
		// allow cross-origin requests (CORS)
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
		// convert to JSON
		$enrollsJSON = json_encode($enrolls);
		echo $enrollsJSON;
		
    }

	// allow cross-origin requests (CORS)
	if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");	
	}	    



?>


