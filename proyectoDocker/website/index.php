<!DOCTYPE html>
<html>
<head>
    <title>Proyecto Infraestructura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #333;
            margin-top: 20px;
	    font-size: 56px;
        }
        .employee-button {
            margin: 10px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
            cursor: pointer;
            color: #333; /* Color del texto de los botones */
	    font-size: 20px;
        }
        .employee-info {
            display: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
            background-color: #fff;
            color: #333; /* Color del texto de la información adicional */
	    font-size: 25px;
        }
	.footer {
            margin-top: 20px;
	    position: fixed;
	    bottom: 0;
	    left: 20px;
	    width: 100%;
	    background-color: #f5f5f5;
	    padding: 10px 0;
	    text-align: left;
	    font-size: 14px;
	    color: #777;
        }
	.footer ul {
	    list-style-position: inside;
	    text-align: left;
	}
	.footer ul li {
    	    text-align: left;
 	    margin-left: 0px; /* O el valor que prefieras para la separación entre los puntos y el texto */
	}
    </style>
</head>
<body>
    <h1>Empleados Unibagué</h1>
    <?php
    $json = file_get_contents('http://empleados/');
    $obj = json_decode($json);

    $lista_enlazada = $obj->lista_enlazada;

    foreach ($lista_enlazada as $node) {
        $info = "<strong>Apellido:</strong> {$node->apellido}, <strong>Edad:</strong> {$node->edad}, <strong>Puesto:</strong> {$node->puesto}";
        echo "<button class='employee-button' data-info='{$info}'>{$node->nombre}</button>";
    }
    ?>
    <div class='employee-info'></div>

    <div class="footer">
	<strong>Hecho por:</strong>
	<ul>
		<li>Alejandro Ruiz, Codigo: 2220221020</li>
                <li>Juan David Reyes, Codigo: 2220221048</li>
                <li>Juan Jose Tique, Codigo: 2220241103</li>
	</ul>
	<strong>Asignatura:</strong>
	<ul>
		<li>Infraestructura y seguridad computacional</li>
	</ul>
	<strong>2024</strong>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.employee-button');
            const info = document.querySelector('.employee-info');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const isVisible = info.innerHTML === button.getAttribute('data-info');
                    info.innerHTML = isVisible ? '' : button.getAttribute('data-info');
                    info.style.display = isVisible ? 'none' : 'block';
                });
            });
        });
    </script>
</body>
</html>
