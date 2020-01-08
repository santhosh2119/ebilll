< ?php
 		  $conn = mysql_connect('localhost', 'root', '');
	  $db   = mysql_select_db('ebils');
 
		$name = $_POST['name'];
		$age = $_POST['age'];
 
		if(mysql_query("INSERT INTO user VALUES('$name', '$age')"))
		  echo "Successfully Inserted";
		else
		  echo "Insertion Failed";
?>