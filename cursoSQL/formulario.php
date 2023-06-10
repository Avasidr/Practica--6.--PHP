<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset= "UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css"/>

        <title>Formulario en PHP con validación</title>
    </head>

    <body>
        <div class="group" id="group">
            <form method="Post" action="" id="myForm">

                <h1>Formulario en PHP con validación</h1>

                <label for="name" class="name">Nombre <span>(*)</span></label>
                <input type="text" name="name" id="name" class="form-input" required>

                <label for="lastname" class="lastname">Apellido <span>(*)</span></label>
                <input type="text" id="lastname" name="lastname" class="form-input" required>

                <label for="email" class="email">Correo <span>(*)</span></label>
                <input type="email" id="email" name="email" class="form-input" required> 
                <input type="submit" id="btn-submit" name="submit" class="form-btn" value="Enviar">


            </form>
        </div>

    <?php
    
        if($_POST){
            $nombre = $_POST['name'];
            $apellido = $_POST['lastname'];
            $email = $_POST['email'];



            // Establecer la conexión con la base de datos
            $servername = "localhost"; 
            $usermame = "root";
            $password = "";
            $dbname = "cursosql";


            $conn = new mysqli($servername, $usermame, $password, $dbname);


            // Verificar la conexión
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insertar datos
            $sql = "INSERT INTO usuario (nombre, apellido, email)
            VALUES ('$nombre', '$apellido', '$email')";


            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Cerrar la conexión
            $conn->close();


        }
        
    ?>


    </body>
</html>