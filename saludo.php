<!DOCTYPE html>
<html>
<head>
    <title>Resultado Formulario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>    
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            echo  "<h1>",$nombres," ",$apellidos,"</h1>" ;
        } else {
            echo "<p>Acceso no válido.</p>";
        }
        ?>
    </header>
    <div class="contenedor">
        <div class="columna1">
            <div class="general">
                <h3>CONTACTO</h3>
                <div class="linea-separacion"></div>
                    <?php
                        $telefono = $_POST["telefono"];
                        $correo = $_POST["correo"];
                        $nacionalidad = $_POST["nacionalidad"];
                        $web_personal = $_POST["web_personal"];

                        echo "<ul id ='guion'>";
                        echo "<li>Teléfono: $telefono</li>";
                        echo "<li>Correo Electrónico: $correo</li>";
                        echo "<li>Nacionalidad: $nacionalidad</li>";
                        if (!empty($web_personal)) {
                            echo "<li>Ocupacion: $web_personal</li>";
                        }
                        echo "</ul>";
                    ?>
                
                <h3>IDIOMAS</h3>
                <div class="linea-separacion"></div>
                    <?php
                        function imprimirIdiomaNivel($idioma, $nivel) {
                            if ($nivel !== "Ninguno") {
                                echo "$idioma: $nivel<br>";
                            }
                        }

                        echo "<ul id ='guion'>";
                        imprimirIdiomaNivel("Alemán", $_POST["idioma_aleman"]);
                        imprimirIdiomaNivel("Francés", $_POST["idioma_frances"]);
                        imprimirIdiomaNivel("Inglés", $_POST["idioma_ingles"]);
                        imprimirIdiomaNivel("Portugués", $_POST["idioma_portugues"]);
                        echo "</ul>";
                    ?>
                <h3>APTITUD</h3>
                <div class="linea-separacion"></div>
                    <?php
                        $aptitud = $_POST["aptitud"];

                        echo "<ul id ='guion'>";
                        echo "<li> $aptitud</li>";
                        echo "</ul>";
                    ?>
                <h3>HABILIDADES</h3>
                <div class="linea-separacion"></div>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["habilidades"])) {
                            
                            $habilidades = $_POST["habilidades"];
                        
                            echo "<ul id='guion'>";
                            foreach ($habilidades as $habilidad) {
                                echo "<li>" . $habilidad . "</li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "No se han seleccionado habilidades.";
                        }
                    }
                ?>
                <h3>LENGUAJES DE PROGRAMACION</h3>
                <div class="linea-separacion"></div>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["lenguajes_programacion"])) {
                            
                            $lenguajes = $_POST["lenguajes_programacion"];
                            
                        
                            echo "<ul id='guion'>";
                            foreach ($lenguajes as $lenguaje) {
                                echo "<li>" . $lenguaje . "</li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "No se han seleccionado habilidades.";
                        }
                    }
                ?>
                
            </div>
        </div>
        <div class="columna2">
            <div class="importante">
                <h3>PERFIL</h3>
                <div class="linea-separacion"></div>
                <?php
                    echo "<p id='guion'>";
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["perfil"])) {
                            $presentacion = $_POST["perfil"];

                            echo $presentacion;
                        } else {
                            echo "No se han ingresado comentarios.";
                        }
                    }
                    echo "</p>";
                ?>
                <h3>EXPERIENCIA LABORAL</h3>
                <div class="linea-separacion"></div>
                    <?php
                        $experienciaPuestos = $_POST["puesto"];
                        $experienciaPeriodos = $_POST["periodo"];
                        $experienciaCiudades = $_POST["ciudad"];
                        $experienciaCaracteristicas = $_POST["caracteristicas"];
                        
                        if (!empty($experienciaPuestos)) {
                            for ($i = 0; $i < count($experienciaPuestos); $i++) {
                                $puesto = $experienciaPuestos[$i];
                                $periodo = $experienciaPeriodos[$i];
                                $ciudad = $experienciaCiudades[$i];
                                $caracteristicas = explode("\n", $experienciaCaracteristicas[$i]);
                        
                                echo "<p id= 'subtitulos'><b id='subtitulos'>$puesto </b>   </p>";
                                echo "<i id='subtitulos'><b id='subtitulos'> $ciudad </b> | $periodo</i>";
                                echo "<ul>";
                                foreach ($caracteristicas as $caracteristica) {
                                    echo "<li id='subtitulos'>$caracteristica</li>";
                                }
                                echo "</ul>";
                            }
                        }
                    ?>

                <h3>FORMACIÓN</h3>
                <div class="linea-separacion"></div>
                    <?php
                        
                        $grado1 = $_POST["grado1"];
                        $periodo1 = $_POST["periodo1"];
                        $centro_estudios1 = $_POST["centro_estudios1"];
                        
                        $grado2 = $_POST["grado2"];
                        $periodo2 = $_POST["periodo2"];
                        $centro_estudios2 = $_POST["centro_estudios2"];
                      
                        for ($i = 0; $i < count($grado1); $i++) {
                            echo "<p id= 'subtitulos'><b id='subtitulos'> $grado1[$i] </b>   </p>";
                            echo "<i id='subtitulos'><b id='subtitulos'>  $centro_estudios1[$i]  </b> |  $periodo1[$i] </i>";
                        }
     
                        for ($i = 0; $i < count($grado2); $i++) {
                            echo "<p id= 'subtitulos'><b id='subtitulos'> $grado2[$i] </b>   </p>";
                            echo "<i id='subtitulos'><b id='subtitulos'>  $centro_estudios2[$i]  </b> |  $periodo2[$i] </i>";
                        }
                    ?>
            </div>
        </div>
    </div>
    <p><a href="index.html">Volver al formulario</a></p>
</body>
</html>