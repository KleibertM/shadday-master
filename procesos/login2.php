<?php
    include ("conexion.php");
    include ("controlador.php");
?>

<link rel="stylesheet" href="../css/login.css">
<div class="form-structor">
	<form action="regis.php" method="POST" >
    <div class="signup">
		<h2 class="form-title" id="signup"><span> O </span> Registrate</h2>
		<div class="form-holder">
            <input type="text" class="input" name="nombre"required placeholder="Nombre">
            <input type="text" class="input" name="apellido"required placeholder="Apellido" >
            <input type="text" class="input"  name="telefono"required  placeholder="Telefono" >
            <input type="text" class="input" name="dni"required placeholder="DNI" >
            <input type="text" class="input" name="direccion"required placeholder="Direccion" >
            <input type="text" class="input" name="edad"required placeholder="Edad" >
                <select name="sexo" class="input" id="sexo"required aria-placeholder="Sexo" >
                    <option disabled selected value="">Seleccione un Sexo </option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select> 
            <input type="text" class="input" name="correo"required placeholder="Correo Electronico" >
            <input type="text" class="input" name="user"required placeholder="Nombre Usuario" >
            <input type="password" class="input" name="clave"required placeholder="Contraseña" >
		</div>
        <input type="submit" class="submit-btn" name="regis" value="Registrarse">
	</div>
    </form>
	<form action="login2.php" method="POST">
    <div class="login slide-up">
		<div class="center" id="center"  >
			<h2 class="form-title" id="login"><span> o </span>inicia Seccion</h2>
			<div class="form-holder">
				<input type="text" class="input" name="user"  placeholder="Nombre Usuario" />
				<input type="password" class="input" name="clave" placeholder="Contraseña" />
			</div>
            <input class="submit-btn" type="submit" name="iniciar_sesion" value="Iniciar sesión">
		</div>
	</div>
    </form>
</div>
<!----===== JS ===== -->
<script src="../js/login.js"></script>