
<form action="http://uherederosw1617.hol.es/lab4/insertarPregunta.php" method="post" accept-charset="UTF-8"> 
	<h2>Insercion de pregunta </h2>
		<p> Email: <input type="text" required name="email" value=""/>
		<p> Contraseña <input type="password" required name="password" value=""/>
		<p> Pregunta : <input type="text" required name="pregunta"  value="" />
		<p> Respuesta: <input type="text" required name="respuesta"value="" /> 
		<p> Comprejidad: <select name="complejidad">
  			<option value="1">1</option> 
  			<option value="2" selected>2</option>
  			<option value="3">3</option>
  			<option value="4">4</option>
  			<option value="5">5</option>
		</select> 
		<p> <input id="input_2" type="submit" />
</form>
<span><a href='layout.html'>Inicio</a></spam>

<?php
if(isset($_POST["email"])){
	$connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
	if ($connect) {

		$email=$_POST["email"];
		$pregunta=$_POST["pregunta"];
		$respuesta=$_POST["respuesta"];
		$password=$_POST["password"];
		$complejidad=$_POST["complejidad"];
		
		if($pregunta==""||$respuesta==""){
			echo "Pregunta o respuesta invalidas.";
		}
		else{
		$connect=mysqli_connect("mysql.hostinger.es","u906430108_u","4QYzSiq7","u906430108_quiz");
		if ($connect) {
			$sql="SELECT * FROM Usuario WHERE email='$email' and password='$password'";
			$resultado=mysqli_query($connect,$sql);
			$contador=mysqli_num_rows($resultado);
			mysqli_close($resultado);
		
			if($contador==1){
				$numero=mysqli_num_rows(mysqli_query($connect,"SELECT * FROM Preguntas"));
				$sql="INSERT INTO Preguntas (pregunta,respuesta,complejidad,email,Numero) VALUES ('$pregunta','$respuesta','$complejidad','$email','$numero')";
				$resultado=mysqli_query($connect,$sql);
				if(!mysqli_query($connect,$sql)){
					die('Error: ' .mysqli_error($connect));
				}
				else{
					echo " Pregunta introducida correctamente. <br />";
				}
			}	
			else{
				echo"DATOS INCORRECTOS.";
			}
			mysqli_close($connect);
		}
		}
	}
}
?>