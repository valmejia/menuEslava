<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP - Manual Completo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0a0e27;
            height: 100vh;
            overflow: hidden;
        }

        .app {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        .sidebar {
            width: 420px;
            background: linear-gradient(180deg, #0f0c29 0%, #1a1a3e 50%, #0f0c29 100%);
            color: white;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 4px 0 20px rgba(0,0,0,0.3);
            z-index: 10;
        }

        .sidebar-header {
            padding: 20px;
            background: rgba(0,0,0,0.3);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h2 {
            font-size: 1.1em;
            margin-bottom: 5px;
            font-weight: normal;
        }

        .program-count {
            background: #e94560;
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.7em;
            margin-top: 8px;
        }

        .menu-container {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
        }

        .program-list {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .program-btn {
            background: rgba(255,255,255,0.05);
            border: none;
            color: #ddd;
            padding: 8px 12px;
            text-align: left;
            font-size: 0.75em;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.2s ease;
            font-family: monospace;
        }

        .program-btn:hover {
            background: rgba(233, 69, 96, 0.3);
            color: white;
            transform: translateX(3px);
        }

        .program-btn.active {
            background: #e94560;
            color: white;
        }

        .numero {
            display: inline-block;
            width: 32px;
            color: #e94560;
            font-weight: bold;
        }

        .program-btn.active .numero {
            color: white;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #1a1a2e;
            overflow: hidden;
        }

        .output-container {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .output-card {
            background: #0d1117;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .output-header {
            background: #161b22;
            padding: 12px 20px;
            border-bottom: 1px solid #30363d;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .output-header h3 {
            color: #e94560;
            font-size: 0.9em;
            font-weight: normal;
        }

        .clear-btn {
            background: #30363d;
            border: none;
            color: white;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.8em;
            transition: all 0.2s;
        }

        .clear-btn:hover {
            background: #e94560;
        }

        .output-body {
            flex: 1;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
            line-height: 1.8;
            overflow-y: auto;
        }

        .program-title {
            color: #58a6ff;
            font-weight: bold;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #30363d;
            font-size: 1em;
        }

        .output-block {
            background: #0a0c10;
            border-radius: 8px;
            padding: 15px;
            border-left: 3px solid #2ea043;
            color: #c9d1d9;
        }

        .output-block h4 {
            color: #2ea043;
            margin-bottom: 10px;
            font-size: 0.85em;
            font-weight: normal;
        }

        .info-message {
            text-align: center;
            padding: 50px;
            color: #8b949e;
        }

        /* Estilos para formularios */
        .formulario-ejemplo {
            background: white;
            color: #333;
            padding: 20px;
            border-radius: 5px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .formulario-ejemplo h1 {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #333;
        }
        .formulario-ejemplo label {
            display: block;
            margin-bottom: 10px;
        }
        .formulario-ejemplo input[type="text"] {
            padding: 8px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .formulario-ejemplo input[type="submit"] {
            background: #e94560;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .formulario-ejemplo input[type="submit"]:hover {
            background: #c7354e;
        }
        .resultado {
            background: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .metodo-info {
            background: #e8f4f8;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 12px;
        }
        
        .ejemplo-libreria {
            background: white;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-radius: 5px;
            overflow: hidden;
        }
        .ejemplo-libreria .header {
            background: #f5f5f5;
            padding: 12px 15px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
        }
        .ejemplo-libreria .content {
            padding: 20px 15px;
            background: white;
        }
        .ejemplo-libreria .footer {
            background: #f5f5f5;
            padding: 12px 15px;
            border-top: 1px solid #ddd;
            font-style: italic;
        }
        
        .frame-container {
            background: white;
            border-radius: 5px;
            overflow: hidden;
        }
        .frame-header {
            background: #f5f5f5;
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
        }
        .frame-header a {
            color: #0066cc;
            text-decoration: none;
            font-weight: bold;
        }
        .frame-header a:hover {
            text-decoration: underline;
        }
        iframe {
            width: 100%;
            height: 400px;
            border: 1px solid #ccc;
            background: white;
        }
        hr {
            margin: 10px 0;
            border: none;
            border-top: 1px solid #ccc;
        }
        
        /* Estilo para codigo PHP */
        .codigo-php {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 15px;
            border-radius: 5px;
            font-family: 'Consolas', monospace;
            font-size: 12px;
            overflow-x: auto;
            margin-bottom: 15px;
        }
        .codigo-php .tag {
            color: #569cd6;
        }
        .codigo-php .function {
            color: #dcdcaa;
        }
        .codigo-php .string {
            color: #ce9178;
        }
        .codigo-php .variable {
            color: #9cdcfe;
        }
        .codigo-php .comment {
            color: #6a9955;
        }
    </style>
</head>
<body>
    <div class="app">
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Manual de PHP</h2>
                <span class="program-count">60 Programas</span>
            </div>
            <div class="menu-container" id="menuContainer">
            </div>
        </div>

        <div class="main-content">
            <div class="output-container">
                <div class="output-card">
                    <div class="output-header">
                        <h3>Ejecucion del programa</h3>
                        <button class="clear-btn" onclick="clearOutput()">Limpiar</button>
                    </div>
                    <div class="output-body" id="outputBody">
                        <div class="info-message">
                            Selecciona un programa del menu izquierdo (1 al 60) para ver la salida esperada
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables globales para almacenar el nombre ingresado en ambos formularios
        let nombreIngresadoGet = '';
        let nombreIngresadoPost = '';

        // Función para procesar formulario GET
        window.procesarFormularioGet = function(event) {
            event.preventDefault();
            const nombreInput = document.getElementById('nombreInputGet');
            const resultadoDiv = document.getElementById('resultadoFormularioGet');
            if (nombreInput && resultadoDiv) {
                const nombre = nombreInput.value;
                if (nombre && nombre.trim() !== '') {
                    nombreIngresadoGet = nombre.trim();
                    resultadoDiv.innerHTML = '<div class="resultado"><strong>El nombre que ha introducido es:</strong> ' + nombreIngresadoGet + '</div>';
                } else {
                    resultadoDiv.innerHTML = '<div class="resultado" style="background:#ffe0e0;"><strong>Error:</strong> Por favor ingrese un nombre</div>';
                }
            }
            return false;
        };

        // Función para procesar formulario POST
        window.procesarFormularioPost = function(event) {
            event.preventDefault();
            const nombreInput = document.getElementById('nombreInputPost');
            const resultadoDiv = document.getElementById('resultadoFormularioPost');
            if (nombreInput && resultadoDiv) {
                const nombre = nombreInput.value;
                if (nombre && nombre.trim() !== '') {
                    nombreIngresadoPost = nombre.trim();
                    resultadoDiv.innerHTML = '<div class="resultado"><strong>El nombre que ha obtenido es:</strong> ' + nombreIngresadoPost + '</div>';
                } else {
                    resultadoDiv.innerHTML = '<div class="resultado" style="background:#ffe0e0;"><strong>Error:</strong> Por favor ingrese un nombre</div>';
                }
            }
            return false;
        };

        const programs = {};

        // PROGRAMA 1
        programs[1] = { title: "2.1 Nuestro primer PHP (echo + bucle for)", output: "Parte de PHP<br>Linea 0<br>Linea 1<br>Linea 2<br>Linea 3<br>Linea 4<br>Linea 5<br>Linea 6<br>Linea 7<br>Linea 8<br>Linea 9" };
        programs[2] = { title: "2.2 Variables y tipos de datos", output: "1<br>3.34<br>Hola Mundo" };
        programs[3] = { title: "2.3 Operadores aritmeticos", output: "11<br>5<br>24<br>2.6666666666667<br>9<br>2" };
        programs[4] = { title: "2.4 Operadores de comparacion", output: "8 es igual a 3? false<br>8 es diferente de 3? true<br>8 es menor que 3? false<br>8 es mayor que 3? true<br>8 es mayor o igual a 3? true<br>3 es menor o igual a 3? true" };
        programs[5] = { title: "2.5 Operadores logicos", output: "AND: (8==3) && (3>3) = false<br>OR: (8==3) || (3==3) = true<br>NOT: !(3<=3) = false" };
        programs[6] = { title: "2.6 Estructura if-else", output: "a no es menor que b" };
        programs[7] = { title: "2.6 Estructura switch", output: "La variable contiene el valor arriba" };
        programs[8] = { title: "2.7 Bucle while", output: "El valor de i es 0<br>El valor de i es 1<br>El valor de i es 2<br>El valor de i es 3<br>El valor de i es 4<br>El valor de i es 5<br>El valor de i es 6<br>El valor de i es 7<br>El valor de i es 8<br>El valor de i es 9" };
        programs[9] = { title: "2.7 Bucle for", output: "El valor de i es 0<br>El valor de i es 1<br>El valor de i es 2<br>El valor de i es 3<br>El valor de i es 4<br>El valor de i es 5<br>El valor de i es 6<br>El valor de i es 7<br>El valor de i es 8<br>El valor de i es 9" };
        programs[10] = { title: "2.8 printf con formatos", output: "El numero dos con diferentes formatos: 2 2.000000 2.00" };
        programs[11] = { title: "2.8 printf con variables y tabla", output: "Puede facilmente intercalar texto con numeros 3 <br><table border=1 cellpadding=5><tr><td align=right>0</td><td align=right>1</td><td align=right>2</td><td align=right>3</td><td align=right>4</td></tr><table>" };
        programs[12] = { title: "2.9 strlen()", output: "strlen('12345'): 5" };
        programs[13] = { title: "2.9 explode()", output: "explode(): <br>Esto<br>es<br>una<br>prueba" };
        programs[14] = { title: "2.9 sprintf()", output: "sprintf(): 8x5 = 40 <br>" };
        programs[15] = { title: "2.9 substr()", output: "substr('Devuelve una subcadena de otra',9,3): una" };
        programs[16] = { title: "2.9 chop()", output: "chop(): Iguales" };
        programs[17] = { title: "2.9 strpos()", output: "strpos('Busca la palabra dentro de la frase', 'palabra'): 9" };
        programs[18] = { title: "2.9 str_replace()", output: "str_replace(): Un pez de color rojo, como rojo es la hierba." };
        programs[19] = { title: "2.10 Los arreglos (arrays)", output: "Mi_array es: Array ( [0] => Pos0 [1] => Pos1 [2] => Pos2 [3] => Pos3 [4] => Pos4 [5] => Pos5 ) <br>Mi_array[5] es: Pos5<br>Mi_array[5] es: Posicion 6ta<br>Mi_array es: Array ( [0] => Pos0 [1] => Pos1 [2] => Pos2 [3] => Pos3 [4] => Pos4 [5] => Posicion 6ta )" };
        programs[20] = { title: "2.11 Strings como indices", output: "La comida tipica de Valencia es: Paella" };
        programs[21] = { title: "2.12 Constantes", output: "La constante SALUDO vale: Hola, mundo!<br>El valor de PI es: 3.14159265" };
        programs[22] = { title: "2.13 Verificacion de tipos - gettype()", output: "gettype($entero): integer<br>gettype($decimal): double<br>gettype($texto): string" };
        programs[23] = { title: "2.13 is_int() y otras funciones", output: "is_int($entero): true<br>is_string($texto): true<br>is_array($entero): false" };
        programs[24] = { title: "2.14 Funciones personalizadas", output: "Media de 4 y 6: 5<br>Media de 3242 y 524543: 263892.5" };
        
        // PROGRAMA 25
        programs[25] = { title: "3.1 Librerias - include (Ejemplo 1)", output: `<div style="background:white; color:#333; padding:0; border-radius:5px;">
    <div style="background:#f5f5f5; padding:12px 15px; font-weight:bold; border-bottom:1px solid #ddd;">Esta cabecera estará en todas sus páginas.</div>
    <div style="padding:20px 15px; background:white;">
        <strong>Página 1</strong><br><br>
        Contenido blabl blabl alb<br><br>
        más cosas...<br><br>
        fin
    </div>
    <div style="background:#f5f5f5; padding:12px 15px; border-top:1px solid #ddd;">
        Este es el pie de página.<br>
        Autor: John Doe
    </div>
</div>` };
        
        // PROGRAMA 26
        programs[26] = { title: "3.2 Paginas con plantillas (Ejemplo 2)", output: `<div style="background:white; color:#333; padding:0; border-radius:5px;">
    <div style="background:#f5f5f5; padding:12px 15px; font-weight:bold; border-bottom:1px solid #ddd;">Esta cabecera estará en todas sus páginas.</div>
    <div style="padding:20px 15px; background:white;">
        ---<br><br>
        Esta es otra página<br><br>
        ---<br><br>
        <strong>Pagina 1</strong> completamente distinta<br>
        <strong>Pagina 2</strong><br><br>
        pero comparte el pie y la cabecera con la otra.<br><br>
        ---
    </div>
    <div style="background:#f5f5f5; padding:12px 15px; border-top:1px solid #ddd;">
        Este es el pie de página.<br>
        Autor: John Doe
    </div>
</div>` };
        
        // PROGRAMA 27
        programs[27] = { title: "3.3 Enlace externo con frame", output: `<div style="background:white; border-radius:5px; overflow:hidden;">
    <div style="background:#f5f5f5; padding:10px 15px; border-bottom:1px solid #ddd;">
        <a href="https://www.php.net" target="contenidoFrame" style="color:#0066cc; text-decoration:none;">Ir a PHP.net</a> |
        <a href="https://www.w3schools.com/php/" target="contenidoFrame" style="color:#0066cc; text-decoration:none;">Ir a W3Schools PHP</a> |
        <a href="https://www.php.net/manual/es/" target="contenidoFrame" style="color:#0066cc; text-decoration:none;">Manual de PHP</a>
    </div>
    <div style="padding:0;">
        <iframe name="contenidoFrame" width="100%" height="450" style="border:1px solid #ccc; background:white;" srcdoc='
            <html><head><style>body{font-family:Segoe UI,sans-serif;padding:20px;}</style></head>
            <body>
                <div style="background:#f0f0f0; padding:15px;"><strong>Parte de arriba.</strong></div>
                <hr><h2>What is PHP?</h2><p>PHP is a widely-used general-purpose scripting language...</p>
                <hr><h2>PHP 8.3 Released!</h2><p>The PHP development team announces PHP 8.3...</p>
                <hr><div style="background:#f0f0f0; padding:10px; text-align:center;"><strong>WebHosting Talk</strong><br>"Now Featuring PHP Forums"</div>
                <hr><div style="background:#f0f0f0; padding:10px;"><strong>Parte de abajo.</strong></div>
            </body>
            </html>
        '></iframe>
    </div>
</div>` };
        
        programs[28] = { title: "4.1 register_globals - Uso de GET", output: "Nombre recibido: Juan" };
        programs[29] = { title: "4.1 Uso de POST", output: "Formulario POST para enviar datos" };
        programs[30] = { title: "4.1 Uso de $_SERVER", output: "IP del cliente: 127.0.0.1<br>Navegador: Mozilla/5.0<br>Metodo de peticion: GET" };
        
        // PROGRAMA 31 - FORMULARIO SIMPLE (GET)
        programs[31] = { 
            title: "5.1 Formulario simple (GET)", 
            output: `<div class="formulario-ejemplo">
                <h1>Ejemplo de procesado de formularios</h1>
                <div class="metodo-info"><strong>Metodo GET:</strong> Los datos se envian en la URL</div>
                <form id="formularioGet" onsubmit="procesarFormularioGet(event)">
                    <label>Introduzca su nombre:</label>
                    <input type="text" id="nombreInputGet" name="nombre" placeholder="Escriba su nombre">
                    <br>
                    <input type="submit" value="Enviar">
                </form>
                <div id="resultadoFormularioGet" style="margin-top:20px;"></div>
            </div>`
        };
        
        // PROGRAMA 32 - METODO GET vs POST
        programs[32] = { 
            title: "5.2 Metodo GET vs POST", 
            output: `<div class="formulario-ejemplo">
                <h1>Ejemplo de procesado de formularios</h1>
                
                <div style="margin-bottom:30px;">
                    <h3 style="color:#e94560;">Metodo GET</h3>
                    <div class="metodo-info"><strong>GET:</strong> Los datos van en la URL (se pueden ver en la barra de direcciones)</div>
                    <form id="formularioGetVsPost" onsubmit="procesarFormularioGet(event)">
                        <label>Introduzca su nombre:</label>
                        <input type="text" id="nombreInputGet" name="nombre" placeholder="Escriba su nombre">
                        <br>
                        <input type="submit" value="Enviar con GET">
                    </form>
                    <div id="resultadoFormularioGet" style="margin-top:20px;"></div>
                </div>
                
                <hr style="margin:20px 0;">
                
                <div style="margin-bottom:20px;">
                    <h3 style="color:#2ea043;">Metodo POST</h3>
                    <div class="metodo-info"><strong>POST:</strong> Los datos van en el cuerpo de la peticion (no se ven en la URL)</div>
                    <form id="formularioPostVsGet" onsubmit="procesarFormularioPost(event)">
                        <label>Introduzca su nombre:</label>
                        <input type="text" id="nombreInputPost" name="nombre" placeholder="Escriba su nombre">
                        <br>
                        <input type="submit" value="Enviar con POST">
                    </form>
                    <div id="resultadoFormularioPost" style="margin-top:20px;"></div>
                </div>
            </div>`
        };
        
        programs[33] = { title: "5.3 Envio de emails - mail()", output: "Correo preparado para enviar a: ejemplo@dominio.com<br>Asunto: Prueba de correo<br>Mensaje: Este es un mensaje de prueba desde PHP" };
        
        // PROGRAMA 34 - CONEXION A BASE DE DATOS (6.1)
        programs[34] = { 
            title: "6.1 Conexion a base de datos", 
            output: `<div style="background:white; color:#333; padding:20px; border-radius:5px;">
                <h1 style="font-size:1.3em; margin-bottom:15px;">Ejemplo de conexion a base de datos</h1>
                <div class="resultado" style="margin-top:15px;">
                    <strong>Conexion con la base de datos conseguida.</strong>
                </div>
            </div>`
        };
        
        programs[35] = { title: "6.2 Consultas a la base de datos", output: "Consulta SQL: SELECT * FROM prueba<br>Resultados:<br><table border='1'><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><tr><td>1</td><td>Juan<\/td><td>Perez<\/td><\/tr><tr><td>2<\/td><td>Maria<\/td><td>Gonzalez<\/td><\/tr><\/table>" };
        programs[36] = { title: "6.3 Insercion de registros", output: "INSERT SQL: INSERT INTO prueba (Nombre, Apellidos) VALUES ('Juan', 'Perez')<br>Registro insertado correctamente" };
        programs[37] = { title: "6.4 Borrado de registros", output: "DELETE SQL: DELETE FROM prueba WHERE ID_Prueba = 1<br>Registro eliminado correctamente" };
        programs[38] = { title: "7.1 Autenticacion HTTP basica", output: "Se mostraria ventana de autenticacion" };
        programs[39] = { title: "7.2 Validacion con archivo de texto", output: "Acceso concedido para: joe" };
        programs[40] = { title: "7.3 Validacion con .htaccess", output: "Usuario: joe<br>Contrasena cifrada: WvzodahMR9USk<br>Para usar .htaccess se necesita configurar el servidor Apache" };
        programs[41] = { title: "7.4 Validacion con MySQL", output: "Consulta SQL: SELECT * FROM users WHERE username='joe' AND password='1235'<br>Si la consulta devuelve registros, el usuario esta autenticado" };
        programs[42] = { title: "8.1 Inicializacion de sesion", output: "ID de sesion: abc123def456<br>Has visitado esta pagina 1 veces en esta sesion" };
        programs[43] = { title: "8.2 Ejemplo practico de sesion", output: "Nombre de sesion: mi_sesion<br>Numero de visitas: 1<br><a href='?'>Recargar pagina</a>" };
        programs[44] = { title: "8.3 Carrito de compra", output: "Carrito de compras:<br><ul></ul><a href='?producto=Manzana'>Agregar Manzana</a> | <a href='?producto=Pera'>Agregar Pera</a> | <a href='?producto=Naranja'>Agregar Naranja</a>" };
        programs[45] = { title: "9.1 Establecer cookies", output: "Cookies establecidas:<br>- usuario: Juan_Perez (valida 1 hora)<br>- preferencia: dark_mode (valida 24 horas)" };
        programs[46] = { title: "9.1 Recuperar cookies", output: "Bienvenido de nuevo, Juan_Perez<br>Todas las cookies:<br>- usuario: Juan_Perez" };
        programs[47] = { title: "9.1 Eliminar cookies", output: "Cookie 'usuario' eliminada (fecha expirada)<br>Para verificar, recargue la pagina" };
        programs[48] = { title: "Arrays - Array asociativo", output: "La capital de Espana es Madrid<br>La capital de Francia es Paris<br>La capital de Italia es Roma<br>La capital de Alemania es Berlin" };
        programs[49] = { title: "Arrays multidimensionales", output: "Juan tiene nota 85<br>Ana tiene nota 92<br>Luis tiene nota 78" };
        programs[50] = { title: "Funciones con valor retornado", output: "Area de circulo radio 5: 78.539816339745" };
        programs[51] = { title: "Variables estaticas", output: "Llamada 1: 1<br>Llamada 2: 2<br>Llamada 3: 3" };
        programs[52] = { title: "Funciones variables", output: "Hola! Adios!" };
        programs[53] = { title: "foreach con clave y valor", output: "Juan tiene 25 anos<br>Ana tiene 22 anos<br>Luis tiene 30 anos" };
        programs[54] = { title: "Funciones de fecha - date()", output: "Fecha actual: 14/04/2026<br>Hora actual: 12:00:00<br>Dia de la semana: Tuesday<br>Timestamp actual: 1744650000" };
        programs[55] = { title: "Funciones matematicas", output: "abs(-15): 15<br>sqrt(64): 8<br>pow(2,8): 256<br>rand(1,100): 42<br>max(3,7,2,9): 9" };
        programs[56] = { title: "include y require", output: "include: incluye el archivo, si no existe muestra warning<br>require: incluye el archivo, si no existe detiene la ejecucion<br>include_once/require_once: incluye solo una vez" };
        programs[57] = { title: "Manejo de archivos - fopen", output: "Abriendo archivo: ejemplo.txt en modo lectura<br>Se puede usar fread(), fgets(), fwrite(), fclose()" };
        programs[58] = { title: "Lectura de archivos - file_get_contents", output: "file_get_contents() lee todo el archivo de una vez<br>Contenido de ejemplo: Este es el contenido del archivo" };
        programs[59] = { title: "Escritura de archivos - file_put_contents", output: "Escribiendo en archivo.txt: Datos a guardar en el archivo<br>Archivo guardado correctamente" };
        programs[60] = { title: "10.1 Aplicacion de Calendario Simple", output: "<h3>Abril 2026</h3><table border='1' cellpadding='8' style='border-collapse: collapse;'><tr><th bgcolor='#3366CC' style='color:white'>Do</th><th bgcolor='#3366CC' style='color:white'>Lu</th><th bgcolor='#3366CC' style='color:white'>Ma</th><th bgcolor='#3366CC' style='color:white'>Mi</th><th bgcolor='#3366CC' style='color:white'>Ju</th><th bgcolor='#3366CC' style='color:white'>Vi</th><th bgcolor='#3366CC' style='color:white'>Sa</th>对待<tr><td align='center'>1<\/td><td align='center'>2<\/td><td align='center'>3<\/td><td align='center'>4<\/td><td align='center'>5<\/td><td align='center'>6<\/td><td align='center'>7<\/td><\/tr><tr><td align='center'>8<\/td><td align='center'>9<\/td><td align='center'>10<\/td><td align='center'>11<\/td><td align='center'>12<\/td><td align='center'>13<\/td><td align='center'>14<\/td><\/tr><tr><td align='center'>15<\/td><td align='center'>16<\/td><td align='center'>17<\/td><td align='center'>18<\/td><td align='center'>19<\/td><td align='center'>20<\/td><td align='center'>21<\/td><\/tr><tr><td align='center'>22<\/td><td align='center'>23<\/td><td align='center'>24<\/td><td align='center'>25<\/td><td align='center'>26<\/td><td align='center'>27<\/td><td align='center'>28<\/td><\/tr><tr><td align='center'>29<\/td><td align='center'>30<\/td><td>&nbsp;<\/td><td>&nbsp;<\/td><td>&nbsp;<\/td><td>&nbsp;<\/td><td>&nbsp;<\/td><\/tr><\/table>" };

        function renderMenu() {
            const container = document.getElementById('menuContainer');
            if (!container) return;
            
            container.innerHTML = '';
            const programList = document.createElement('div');
            programList.className = 'program-list';
            
            for (let i = 1; i <= 60; i++) {
                if (programs[i]) {
                    const btn = document.createElement('button');
                    btn.className = 'program-btn';
                    btn.innerHTML = '<span class="numero">' + i + '</span> ' + programs[i].title;
                    btn.onclick = (function(id) {
                        return function() { showProgram(id); };
                    })(i);
                    programList.appendChild(btn);
                }
            }
            container.appendChild(programList);
        }

        function showProgram(id) {
            const program = programs[id];
            if (!program) return;
            
            const outputBody = document.getElementById('outputBody');
            if (!outputBody) return;
            
            outputBody.innerHTML = `
                <div class="program-title">Programa ${id}: ${program.title}</div>
                <div class="output-block">
                    <h4>Salida del programa:</h4>
                    ${program.output}
                </div>
            `;
            
            document.querySelectorAll('.program-btn').forEach(btn => {
                btn.classList.remove('active');
                if (btn.innerHTML.indexOf('>' + id + '<') !== -1) {
                    btn.classList.add('active');
                }
            });
        }

        function clearOutput() {
            const outputBody = document.getElementById('outputBody');
            if (outputBody) {
                outputBody.innerHTML = `
                    <div class="info-message">
                        Selecciona un programa del menu izquierdo (1 al 60) para ver la salida esperada
                    </div>
                `;
            }
            document.querySelectorAll('.program-btn').forEach(btn => {
                btn.classList.remove('active');
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            renderMenu();
        });
    </script>
</body>
</html>