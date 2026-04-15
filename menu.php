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
            width: 450px;
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

        /* Estilos para la base de datos */
        .db-container {
            background: white;
            color: #333;
            padding: 20px;
            border-radius: 5px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .db-container h1 {
            font-size: 1.3em;
            margin-bottom: 20px;
            color: #333;
        }
        .db-form table {
            margin-bottom: 15px;
        }
        .db-form td {
            padding: 5px;
        }
        .db-form input[type="text"] {
            padding: 8px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .db-form input[type="submit"] {
            background: #e94560;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .db-form input[type="submit"]:hover {
            background: #c7354e;
        }
        .db-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .db-table th, .db-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .db-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .db-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .mensaje-exito {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
        }
        .mensaje-error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
        }
        hr {
            margin: 15px 0;
            border: none;
            border-top: 1px solid #ccc;
        }
        .btn-borrar {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }
        .btn-borrar:hover {
            background: #c82333;
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
        // ==================== BASE DE DATOS SIMULADA GLOBAL ====================
        let datosRegistros = [];
        let nextId = 1;

        function cargarDatos() {
            const guardado = localStorage.getItem('db_prueba_completa');
            if (guardado) {
                const data = JSON.parse(guardado);
                datosRegistros = data.registros || [];
                nextId = data.nextId || 1;
            } else {
                // Datos iniciales de ejemplo
                datosRegistros = [
                    { id: 1, nombre: "CFB", apellidos: "DFG" },
                    { id: 2, nombre: "CFB", apellidos: "DFG" },
                    { id: 3, nombre: "abierto", apellidos: "a" },
                    { id: 4, nombre: "Ernesto", apellidos: "Elizalde" },
                    { id: 5, nombre: "FROI", apellidos: "RESZ" },
                    { id: 6, nombre: "GGG", apellidos: "SSSS" },
                    { id: 7, nombre: "AFA", apellidos: "AFDFA" },
                    { id: 8, nombre: "A", apellidos: "A" },
                    { id: 9, nombre: "et", apellidos: "ag" }
                ];
                nextId = 10;
                guardarDatos();
            }
        }

        function guardarDatos() {
            localStorage.setItem('db_prueba_completa', JSON.stringify({
                registros: datosRegistros,
                nextId: nextId
            }));
        }

        function insertarRegistro(nombre, apellidos) {
            if (nombre && nombre.trim() !== '' && apellidos && apellidos.trim() !== '') {
                datosRegistros.push({ 
                    id: nextId++, 
                    nombre: nombre.trim(), 
                    apellidos: apellidos.trim() 
                });
                guardarDatos();
                return true;
            }
            return false;
        }

        function borrarRegistro(id) {
            const index = datosRegistros.findIndex(r => r.id === id);
            if (index !== -1) {
                datosRegistros.splice(index, 1);
                guardarDatos();
                return true;
            }
            return false;
        }

        // Función global para mostrar la tabla (para INSERT)
        window.mostrarTablaInsert = function() {
            const tbody = document.getElementById('tablaRegistrosInsert');
            if (!tbody) return;
            
            tbody.innerHTML = '';
            for (let i = 0; i < datosRegistros.length; i++) {
                const row = tbody.insertRow();
                const cell1 = row.insertCell(0);
                const cell2 = row.insertCell(1);
                cell1.innerHTML = datosRegistros[i].nombre;
                cell2.innerHTML = datosRegistros[i].apellidos;
            }
        };

        // Función global para mostrar la tabla con botón borrar (para DELETE)
        window.mostrarTablaDelete = function() {
            const tbody = document.getElementById('tablaRegistrosDelete');
            if (!tbody) return;
            
            tbody.innerHTML = '';
            for (let i = 0; i < datosRegistros.length; i++) {
                const row = tbody.insertRow();
                const cell1 = row.insertCell(0);
                const cell2 = row.insertCell(1);
                const cell3 = row.insertCell(2);
                cell1.innerHTML = datosRegistros[i].nombre;
                cell2.innerHTML = datosRegistros[i].apellidos;
                cell3.innerHTML = `<button class="btn-borrar" onclick="eliminarRegistro(${datosRegistros[i].id})">Borra</button>`;
                cell3.style.textAlign = 'center';
            }
        };

        // Función global para eliminar registro
        window.eliminarRegistro = function(id) {
            if (borrarRegistro(id)) {
                window.mostrarTablaDelete();
                const mensajeDiv = document.getElementById('mensajeDelete');
                if (mensajeDiv) {
                    mensajeDiv.innerHTML = '<div class="mensaje-exito">✓ Registro eliminado correctamente</div>';
                    setTimeout(() => {
                        mensajeDiv.innerHTML = '';
                    }, 2000);
                }
            }
        };

        // Función global para procesar inserción
        window.procesarInsercion = function(event) {
            event.preventDefault();
            const nombreInput = document.getElementById('dbNombre');
            const apellidosInput = document.getElementById('dbApellidos');
            const mensajeDiv = document.getElementById('mensajeInsercion');
            
            if (nombreInput && apellidosInput) {
                const nombre = nombreInput.value;
                const apellidos = apellidosInput.value;
                
                if (insertarRegistro(nombre, apellidos)) {
                    mensajeDiv.innerHTML = '<div class="mensaje-exito">✓ Registro insertado correctamente</div>';
                    nombreInput.value = '';
                    apellidosInput.value = '';
                    window.mostrarTablaInsert();
                    setTimeout(() => {
                        mensajeDiv.innerHTML = '';
                    }, 3000);
                } else {
                    mensajeDiv.innerHTML = '<div class="mensaje-error">✗ Error: Por favor complete ambos campos</div>';
                    setTimeout(() => {
                        mensajeDiv.innerHTML = '';
                    }, 3000);
                }
            }
            return false;
        };

        // Inicializar datos
        cargarDatos();

        // ==================== OTRAS FUNCIONES ====================
        let nombreIngresadoGet = '';
        let nombreIngresadoPost = '';

        window.procesarFormularioGet = function(event) {
            event.preventDefault();
            const nombreInput = document.getElementById('nombreInputGet');
            const resultadoDiv = document.getElementById('resultadoFormularioGet');
            if (nombreInput && resultadoDiv) {
                const nombre = nombreInput.value;
                if (nombre && nombre.trim() !== '') {
                    nombreIngresadoGet = nombre.trim();
                    resultadoDiv.innerHTML = '<div style="background:#f0f0f0; padding:15px; border-radius:5px; margin-top:20px;"><strong>El nombre que ha introducido es:</strong> ' + nombreIngresadoGet + '</div>';
                } else {
                    resultadoDiv.innerHTML = '<div style="background:#ffe0e0; padding:15px; border-radius:5px; margin-top:20px;"><strong>Error:</strong> Por favor ingrese un nombre</div>';
                }
            }
            return false;
        };

        window.procesarFormularioPost = function(event) {
            event.preventDefault();
            const nombreInput = document.getElementById('nombreInputPost');
            const resultadoDiv = document.getElementById('resultadoFormularioPost');
            if (nombreInput && resultadoDiv) {
                const nombre = nombreInput.value;
                if (nombre && nombre.trim() !== '') {
                    nombreIngresadoPost = nombre.trim();
                    resultadoDiv.innerHTML = '<div style="background:#f0f0f0; padding:15px; border-radius:5px; margin-top:20px;"><strong>El nombre que ha obtenido es:</strong> ' + nombreIngresadoPost + '</div>';
                } else {
                    resultadoDiv.innerHTML = '<div style="background:#ffe0e0; padding:15px; border-radius:5px; margin-top:20px;"><strong>Error:</strong> Por favor ingrese un nombre</div>';
                }
            }
            return false;
        };

        window.enviarEmailSimulado = function(event) {
            event.preventDefault();
            const direccion = document.getElementById('emailDireccion');
            const tipo = document.querySelector('input[name="tipo"]:checked');
            const resultadoDiv = document.getElementById('resultadoEmail');
            
            if (!direccion || !direccion.value || direccion.value.trim() === '') {
                resultadoDiv.innerHTML = '<div style="background:#ffe0e0; padding:15px; border-radius:5px;"><strong>Error:</strong> Por favor ingrese una direccion de email</div>';
                return;
            }
            
            let mensajeEmail = '';
            if (tipo && tipo.value === 'plano') {
                mensajeEmail = `Ejemplo de envio de email de texto plano\n\nPHP.\nhttp://www.php.net/\nManuales para desarrolladores web.`;
            } else {
                mensajeEmail = `<html><head><title>PHP. Manual de PHP</title></head><body>
Ejemplo de envio de email de HTML<br><br>
PHP.<br>
http://www.php.net/<br>
<u>Manuales</u> para <b>desarrolladores</b> web.
</body></html>`;
            }
            
            resultadoDiv.innerHTML = `<div style="background:#d4edda; color:#155724; padding:15px; border-radius:5px; margin-top:20px;">
                <strong>✓ Email simulado enviado correctamente</strong><br><br>
                <strong>Destinatario:</strong> ${direccion.value}<br>
                <strong>Formato:</strong> ${tipo && tipo.value === 'plano' ? 'Texto plano' : 'HTML'}<br>
                <strong>Asunto:</strong> Ejemplo de envio de email<br>
                <strong>Contenido:</strong><br>
                <div style="background:#fff; padding:10px; margin-top:10px; border-radius:5px; font-family:monospace; font-size:12px; overflow-x:auto;">${mensajeEmail.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</div>
                <br>
                <strong>Cabeceras:</strong> FROM: Pruebas &lt;webmaster@hotmail.com&gt;
            </div>`;
        };

        const programs = {};

        // PROGRAMA 1-35 (compressed for brevity)
        for(let i=1; i<=35; i++) {
            programs[i] = { title: "Programa " + i, output: "Contenido del programa " + i };
        }
        
        // Programas principales
        programs[1] = { title: "2.1 Nuestro primer PHP", output: "Parte de PHP<br>Linea 0<br>Linea 1<br>Linea 2<br>Linea 3<br>Linea 4<br>Linea 5<br>Linea 6<br>Linea 7<br>Linea 8<br>Linea 9" };
        programs[2] = { title: "2.2 Variables y tipos de datos", output: "1<br>3.34<br>Hola Mundo" };
        programs[3] = { title: "2.3 Operadores aritmeticos", output: "11<br>5<br>24<br>2.6666666666667<br>9<br>2" };
        programs[4] = { title: "2.4 Operadores de comparacion", output: "8 es igual a 3? false<br>8 es diferente de 3? true<br>8 es menor que 3? false<br>8 es mayor que 3? true<br>8 es mayor o igual a 3? true<br>3 es menor o igual a 3? true" };
        programs[5] = { title: "2.5 Operadores logicos", output: "AND: false<br>OR: true<br>NOT: false" };
        programs[6] = { title: "2.6 Estructura if-else", output: "a no es menor que b" };
        programs[7] = { title: "2.6 Estructura switch", output: "La variable contiene el valor arriba" };
        programs[8] = { title: "2.7 Bucle while", output: "El valor de i es 0-9" };
        programs[9] = { title: "2.7 Bucle for", output: "El valor de i es 0-9" };
        programs[10] = { title: "2.8 printf con formatos", output: "El numero dos con diferentes formatos: 2 2.000000 2.00" };
        programs[11] = { title: "2.8 printf con tabla", output: "Puede facilmente intercalar texto con numeros 3 <br><table border=1><tr><td>0</td><td>1</td><td>2</td><td>3</td><td>4</td></tr></table>" };
        programs[12] = { title: "2.9 strlen()", output: "strlen('12345'): 5" };
        programs[13] = { title: "2.9 explode()", output: "Esto<br>es<br>una<br>prueba" };
        programs[14] = { title: "2.9 sprintf()", output: "8x5 = 40" };
        programs[15] = { title: "2.9 substr()", output: "substr: una" };
        programs[16] = { title: "2.9 chop()", output: "chop(): Iguales" };
        programs[17] = { title: "2.9 strpos()", output: "strpos: 9" };
        programs[18] = { title: "2.9 str_replace()", output: "Un pez de color rojo, como rojo es la hierba." };
        programs[19] = { title: "2.10 Los arreglos (arrays)", output: "Array con posiciones 0-5" };
        programs[20] = { title: "2.11 Strings como indices", output: "La comida tipica de Valencia es: Paella" };
        programs[21] = { title: "2.12 Constantes", output: "SALUDO: Hola, mundo!<br>PI: 3.14159265" };
        programs[22] = { title: "2.13 Verificacion de tipos", output: "gettype: integer, double, string" };
        programs[23] = { title: "2.13 is_int()", output: "is_int: true<br>is_string: true<br>is_array: false" };
        programs[24] = { title: "2.14 Funciones", output: "Media de 4 y 6: 5<br>Media de 3242 y 524543: 263892.5" };
        programs[25] = { title: "3.1 Librerias - include", output: "Esta cabecera estara en todas sus paginas.<br><br>Pagina 1<br><br>Contenido...<br><br>fin<br><br>Este es el pie de pagina.<br>Autor: John Doe" };
        programs[26] = { title: "3.2 Paginas con plantillas", output: "Esta cabecera estara en todas sus paginas.<br><br>---<br><br>Esta es otra pagina<br><br>---<br><br>Pagina 1 completamente distinta<br>Pagina 2<br><br>---<br><br>Este es el pie de pagina.<br>Autor: John Doe" };
        programs[27] = { title: "3.3 Enlace externo con frame", output: "Frame con enlaces a PHP.net, W3Schools, Manual de PHP" };
        programs[28] = { title: "4.1 register_globals - GET", output: "Nombre recibido: Juan" };
        programs[29] = { title: "4.1 Uso de POST", output: "Formulario POST" };
        programs[30] = { title: "4.1 Uso de SERVER", output: "IP: 127.0.0.1<br>Navegador: Mozilla/5.0<br>Metodo: GET" };
        programs[31] = { title: "5.1 Formulario simple", output: `<div style="background:white; padding:20px; border-radius:5px;">
            <h1>Ejemplo de procesado de formularios</h1>
            <form onsubmit="procesarFormularioGet(event)">
                <label>Introduzca su nombre:</label>
                <input type="text" id="nombreInputGet" style="padding:8px; width:250px; display:block; margin:10px 0;">
                <input type="submit" value="Enviar" style="background:#e94560; color:white; border:none; padding:8px 20px; border-radius:4px; cursor:pointer;">
            </form>
            <div id="resultadoFormularioGet"></div>
        </div>` };
        programs[32] = { title: "5.2 Metodo GET vs POST", output: `<div style="background:white; padding:20px; border-radius:5px;">
            <h1>Ejemplo de procesado de formularios</h1>
            <div style="margin-bottom:20px;"><h3>GET</h3>
                <form onsubmit="procesarFormularioGet(event)">
                    <input type="text" id="nombreInputGet" style="padding:8px;">
                    <input type="submit" value="Enviar con GET">
                </form>
                <div id="resultadoFormularioGet"></div>
            </div>
            <hr>
            <div><h3>POST</h3>
                <form onsubmit="procesarFormularioPost(event)">
                    <input type="text" id="nombreInputPost" style="padding:8px;">
                    <input type="submit" value="Enviar con POST">
                </form>
                <div id="resultadoFormularioPost"></div>
            </div>
        </div>` };
        programs[33] = { title: "5.3 Envio de emails", output: `<div style="background:white; padding:20px; border-radius:5px;">
            <h1>Ejemplo de envio de email</h1>
            <form onsubmit="enviarEmailSimulado(event)">
                <label>Email:</label>
                <input type="text" id="emailDireccion" style="padding:8px; width:300px; display:block; margin:10px 0;">
                <input type="radio" name="tipo" value="plano" checked> Texto plano<br>
                <input type="radio" name="tipo" value="html"> HTML<br><br>
                <input type="submit" value="Enviar" style="background:#e94560; color:white; border:none; padding:8px 20px; border-radius:4px; cursor:pointer;">
            </form>
            <div id="resultadoEmail"></div>
        </div>` };
        programs[34] = { title: "6.1 Conexion a base de datos", output: "<div style='background:white; padding:20px;'><h1>Ejemplo de conexion</h1><div style='background:#f0f0f0; padding:15px;'><strong>Conexion con la base de datos conseguida.</strong></div></div>" };
        programs[35] = { title: "6.2 Consultas SELECT", output: "Consulta SQL: SELECT * FROM prueba<br><table border='1'><tr><th>ID</th><th>Nombre</th><th>Apellidos</th></tr><tr><td>1</td><td>Juan</td><td>Perez</td></tr><tr><td>2</td><td>Maria</td><td>Gonzalez</td></tr></table>" };
        
        // PROGRAMA 36 - INSERCION DE REGISTROS
        programs[36] = { 
            title: "6.3 Insercion de registros", 
            output: `<div class="db-container">
                <h1>Ejemplo de uso de bases de datos con PHP y MySQL</h1>
                <form class="db-form" onsubmit="procesarInsercion(event)">
                    <table>
                        <tr><td>Nombre:</td><td><input type="text" id="dbNombre" size="20" maxlength="30"></td></tr>
                        <tr><td>Apellidos:</td><td><input type="text" id="dbApellidos" size="20" maxlength="30"></td></tr>
                    </table>
                    <input type="submit" name="accion" value="Grabar">
                </form>
                <div id="mensajeInsercion"></div>
                <hr>
                <table class="db-table" border="1" cellspacing="0" cellpadding="8">
                    <thead><tr><th><b>Nombre</b></th><th><b>Apellidos</b></th></tr></thead>
                    <tbody id="tablaRegistrosInsert"></tbody>
                </table>
            </div>`
        };
        
        // PROGRAMA 37 - BORRADO DE REGISTROS (6.4)
        programs[37] = { 
            title: "6.4 Borrado de registros", 
            output: `<div class="db-container">
                <h1>Ejemplo de uso de bases de datos con PHP y MySQL</h1>
                <div id="mensajeDelete"></div>
                <table class="db-table" border="1" cellspacing="0" cellpadding="8">
                    <thead>
                        <tr>
                            <th><b>Nombre</b></th>
                            <th><b>Apellidos</b></th>
                            <th><b>Borrar</b></th>
                        </tr>
                    </thead>
                    <tbody id="tablaRegistrosDelete">
                    </tbody>
                </table>
            </div>`
        };
        
        programs[38] = { title: "7.1 Autenticacion HTTP basica", output: "Ventana de autenticacion HTTP" };
        programs[39] = { title: "7.2 Validacion con archivo", output: "Acceso concedido para: joe" };
        programs[40] = { title: "7.3 Validacion con .htaccess", output: "Usuario: joe<br>Contraseña cifrada" };
        programs[41] = { title: "7.4 Validacion con MySQL", output: "Usuario autenticado via MySQL" };
        programs[42] = { title: "8.1 Inicializacion de sesion", output: "ID de sesion: abc123<br>Visitas: 1" };
        programs[43] = { title: "8.2 Contador de sesion", output: "Nombre: mi_sesion<br>Visitas: 1" };
        programs[44] = { title: "8.3 Carrito de compra", output: "Carrito de compras con sesiones" };
        programs[45] = { title: "9.1 Establecer cookies", output: "Cookies: usuario (1h), preferencia (24h)" };
        programs[46] = { title: "9.1 Recuperar cookies", output: "Bienvenido Juan_Perez" };
        programs[47] = { title: "9.1 Eliminar cookies", output: "Cookie eliminada" };
        programs[48] = { title: "Arrays asociativos", output: "Capitales: Madrid, Paris, Roma, Berlin" };
        programs[49] = { title: "Arrays multidimensionales", output: "Juan:85, Ana:92, Luis:78" };
        programs[50] = { title: "Funciones con retorno", output: "Area circulo radio 5: 78.54" };
        programs[51] = { title: "Variables estaticas", output: "1,2,3" };
        programs[52] = { title: "Funciones variables", output: "Hola! Adios!" };
        programs[53] = { title: "foreach clave/valor", output: "Juan:25, Ana:22, Luis:30" };
        programs[54] = { title: "Funciones de fecha", output: "Fecha actual" };
        programs[55] = { title: "Funciones matematicas", output: "sqrt, pow, rand" };
        programs[56] = { title: "include y require", output: "include vs require" };
        programs[57] = { title: "Manejo de archivos", output: "fopen, fread, fwrite" };
        programs[58] = { title: "Lectura archivos", output: "file_get_contents" };
        programs[59] = { title: "Escritura archivos", output: "file_put_contents" };
        programs[60] = { title: "10.1 Calendario Simple", output: "<h3>Abril 2026</h3><table border='1' cellpadding='8'><tr><th>Do</th><th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sa</th></tr><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td></tr><tr><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td></tr><tr><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td></tr><tr><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td></tr><tr><td>29</td><td>30</td><td></td><td></td><td></td><td></td><td></td></tr></table>" };

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
            
            // Inicializar tablas según el programa
            if (id === 36) {
                window.mostrarTablaInsert();
            } else if (id === 37) {
                window.mostrarTablaDelete();
            }
            
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