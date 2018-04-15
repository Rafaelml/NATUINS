<!DOCTYPE html>
<html>
	<head>
		<title>Registro</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="registroBBDD.php" method="post">
			<fieldset>
				<legend>Registro</legend>
				<div id="nick">
					Nick:
					<input type="text" name="nick">
				</div>
				<div id="contra">
					Contraseña:
					<input type="password" name="pass">
				</div>
				<div id="recontra">
					Repetir contraseña:
					<input type="password" name="repass">
				</div>
				<div id="email">
					Email:
					<input type="text" name="email">
				</div>
				<div id="tel">
					Teléfono:
					<input type="text" name="tel">
				</div>
				<input type="submit" name="registro" value="Registro" />
				<button type="reset">Borrar</button>
			</fieldset>
		</form>
	</body>
</html>