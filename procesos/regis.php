<?php
        include 'conexion.php';

        /*if (!empty($_POST['regis'])) {
            if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) || empty($_POST['dni']) || empty($_POST['direccion']) || empty($_POST['edad']) || empty($_POST['sexo']) || empty($_POST['correo']) || empty($_POST['user']) || empty($_POST['clave'])) {
                echo "<div class='alert alert_info'>Uno de los campos está vacío</div>";
            }elseif (strlen($_POST['dni']) != 8) {
                echo "<div class='alert alert_info'>El DNI debe tener 8 caracteres</div>";
                
            }elseif (strlen($_POST['clave']) < 8) {
                echo "<div class='alert alert_info'>La contraseña debe tener al menos 8 caracteres</div>";
            } else {
                $Nombre = $_POST['nombre'];
                $Apellido = $_POST['apellido'];
                $Telefono = $_POST['telefono'];
                $Dni = $_POST['dni'];
                $Direccion = $_POST['direccion'];
                $Edad = $_POST['edad'];
                $Sexo = $_POST['sexo'];
                $Correo = $_POST['correo'];
                $User = $_POST['user'];
                $Clave = $_POST['clave'];
               
            

                $stmt = $conexion->prepare("SELECT * FROM cliente WHERE dni = :dni");
                $stmt->bindParam(':dni', $Dni);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    echo '<div class="alert alert_error">El DNI ya está registrado</div>';
                } else {
                    $stmt = $conexion->prepare("SELECT * FROM cliente WHERE correo = :correo");
                    $stmt->bindParam(':correo', $Correo);
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                        echo '<div class="alert alert_error">El correo electrónico ya está registrado</div>';
                    } else {
                        $stmt = $conexion->prepare("INSERT INTO cliente (nombre,	apellido,	telefono,	dni,	direccion,	edad,	sexo,	correo,	user,	clave) VALUES (:nombre,	:apellido,	:telefono,	:dni,	:direccion,	:edad,	:sexo,	:correo,	:user,	:clave)");

                        $stmt->bindParam(':nombre', $Nombre);
                        $stmt->bindParam(':apellido', $Apellido);
                        $stmt->bindParam(':telefono', $Telefono);
                        $stmt->bindParam(':dni', $Dni);
                        $stmt->bindParam(':direccion', $Direccion);
                        $stmt->bindParam(':edad', $Edad);
                        $stmt->bindParam(':sexo', $Sexo);
                        $stmt->bindParam(':correo',$Correo);
                        $stmt->bindParam(':user', $User);
                        $stmt->bindParam(':clave', $Clave);      
                            
                        
                        if ($stmt->execute()) {

                            header('Location: login2.php');

                            echo '<div class="alert alert_exitosa">Usuario registrado correctamente</div>';
                        } else {
                            echo '<div class="alert alert_error">Error al registrar usuario</div>';
                        }
                    }
                }
            }
        }*/

if (!empty($_POST['regis'])) {
    if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) || empty($_POST['dni']) || empty($_POST['direccion']) || empty($_POST['edad']) || empty($_POST['sexo']) || empty($_POST['correo']) || empty($_POST['user']) || empty($_POST['clave'])) {
        echo "<div class='alert alert_info'>Uno de los campos está vacío</div>";
    } elseif (strlen($_POST['dni']) != 8) {
        echo "<div class='alert alert_info'>El DNI debe tener 8 caracteres</div>";
    } elseif (strlen($_POST['clave']) < 8) {
        echo "<div class='alert alert_info'>La contraseña debe tener al menos 8 caracteres</div>";
    } else {
        $Nombre = $_POST['nombre'];
        $Apellido = $_POST['apellido'];
        $Telefono = $_POST['telefono'];
        $Dni = $_POST['dni'];
        $Direccion = $_POST['direccion'];
        $Edad = $_POST['edad'];
        $Sexo = $_POST['sexo'];
        $Correo = $_POST['correo'];
        $User = $_POST['user'];
        $Clave = $_POST['clave'];

        $stmt = $conexion->prepare("SELECT * FROM cliente WHERE dni = :dni");
        $stmt->bindParam(':dni', $Dni);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo '<div class="alert alert_error">El DNI ya está registrado</div>';
        } else {
            $stmt = $conexion->prepare("SELECT * FROM cliente WHERE correo = :correo");
            $stmt->bindParam(':correo', $Correo);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo '<div class="alert alert_error">El correo electrónico ya está registrado</div>';
            } else {
                $hashedPassword = password_hash($Clave, PASSWORD_DEFAULT);

                $stmt = $conexion->prepare("INSERT INTO cliente (nombre,	apellido,	telefono,	dni,	direccion,	edad,	sexo,	correo,	user,	clave) VALUES (:nombre,	:apellido,	:telefono,	:dni,	:direccion,	:edad,	:sexo,	:correo,	:user,	:clave)");

                $stmt->bindParam(':nombre', $Nombre);
                $stmt->bindParam(':apellido', $Apellido);
                $stmt->bindParam(':telefono', $Telefono);
                $stmt->bindParam(':dni', $Dni);
                $stmt->bindParam(':direccion', $Direccion);
                $stmt->bindParam(':edad', $Edad);
                $stmt->bindParam(':sexo', $Sexo);
                $stmt->bindParam(':correo', $Correo);
                $stmt->bindParam(':user', $User);
                $stmt->bindParam(':clave', $hashedPassword);

                if ($stmt->execute()) {
                    header('Location: login2.php');
                    echo '<div class="alert alert_exitosa">Usuario registrado correctamente</div>';
                } else {
                    echo '<div class="alert alert_error">Error al registrar usuario</div>';
                }
            }
        }
    }
}
?>