<?php

include 'db.php';

// ligaçã base de dados
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
if($db) {
   if($_SERVER['REQUEST_METHOD'] == 'GET') {
	// criar query numa string
	  $query  = "SELECT  c.name as cat_name, t.name as teacher_name, t.image as teacher_image, cs.id, cs.name, cs.description, cs.price, cs.image, cs.sales FROM courses as cs inner join (coursecategories as c, teachers as t) on (cs.cat_id = c.id and cs.teacher_id = t.id)";
 
	// executar a query
	if(!($result = @ mysqli_query($db, $query)))
		showerror($db);
	
	// vai buscar o resultado da query

	$nrows  = mysqli_num_rows($result);
	$courses = [];
	for($i=0; $i<$nrows; $i++)
		$courses[$i] = mysqli_fetch_assoc($result);

	
	// allow cross-origin requests (CORS)
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
	// convert to JSON
	$coursesJSON = json_encode($courses);
	echo $coursesJSON;
	 
    }

	// allow cross-origin requests (CORS)
	if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");	
	}	

// fechar a ligaçãbase de dados
mysqli_close($db);


} // end if

?>

