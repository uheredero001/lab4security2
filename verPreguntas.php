<span><a href='layout.html'>Inicio</a></spam>
<?php
$connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
if ($connect) {
	$sql = "SELECT * FROM Preguntas";
	$result = mysqli_query($connect,$sql);
	echo '<table border=1> <tr> <th> PREGUNTA </th> <th> RESPUESTA </th> <th> COMPLEJIDAD </th> <th> EMAIL </th> 
		<th> NUMERO </th> </tr>';
	
		
    	while($row = mysqli_fetch_array($result)) {
    		echo '<tr> 
    		<td><font size="3">' .$row["pregunta"]. '</td> 
    		<td><font size="3">' .$row["respuesta"]. '</td> 
    		<td><font size="3">' .$row["complejidad"]. '</td> 
    		<td><font size="3">' .$row["email"]. '</td> 
    		<td><font size="3">' .$row["Numero"]. '</td> 
    		</tr>';
    	
    	}
    	echo '</table>';
    	mysqli_close($result);
}
mysqli_close($connect);
?>