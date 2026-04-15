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

        /* Estilos para autenticación */
        .auth-container {
            background: white;
            color: #333;
            padding: 20px;
            border-radius: 5px;
        }
        .auth-container h1 {
            font-size: 1.3em;
            margin-bottom: 20px;
        }
        .acceso-exitoso {
            background: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            font-size: 1.1em;
            font-weight: bold;
        }
        .error-acceso {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }
        .btn-iniciar {
            background: #e94560;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        .btn-iniciar:hover {
            background: #c7354e;
        }

        /* Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 380px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .modal-content h3 {
            margin-bottom: 15px;
        }
        .modal-info {
            background: #e0e0e0;
            padding: 8px;
            margin-bottom: 15px;
            font-size: 12px;
        }
        .modal-content label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        .modal-content input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .modal-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn-aceptar {
            background: #e94560;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-cancelar {
            background: #6c757d;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Estilos para cookies */
        .cookie-container {
            background: white;
            color: #333;
            padding: 20px;
            border-radius: 5px;
        }
        .cookie-container h1 {
            font-size: 1.3em;
            margin-bottom: 20px;
        }
        .cookie-form input {
            margin: 5px 0 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .cookie-form input[type="text"] {
            width: 250px;
        }
        .cookie-form input[type="submit"] {
            background: #e94560;
            color: white;
            border: none;
            padding: 8px 20px;
            cursor: pointer;
            margin-top: 10px;
        }
        .cookie-info {
            background: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .cookie-valor {
            font-weight: bold;
            color: #e94560;
        }
        .btn-volver {
            background: #6c757d;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
        }
        .mensaje-exito {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .cookie-recuperada {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            font-size: 1.1em;
        }
        .cookie-no-existe {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="app">
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Manual de PHP</h2>
                <span class="program-count">59 Programas</span>
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
                            Selecciona un programa del menu izquierdo (1 al 59) para ver la salida esperada
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal global de autenticación -->
    <div id="authModal" class="modal-overlay">
        <div class="modal-content">
            <h3>Escribir contraseña de red</h3>
            <div class="modal-info">
                <strong>Sitio:</strong> www.webestilo.com<br>
                <strong>Dominio:</strong> Acceso restringido
            </div>
            <label>Nombre de usuario:</label>
            <input type="text" id="authUsuario" value="Joe">
            <label>Contraseña:</label>
            <input type="password" id="authContrasena" value="123">
            <div style="margin: 15px 0;">
                <input type="checkbox" id="guardarPass"> 
                <label for="guardarPass" style="display: inline;">Guardar esta contraseña en la lista de contraseñas</label>
            </div>
            <div class="modal-buttons">
                <button class="btn-aceptar" onclick="procesarAutenticacion()">Aceptar</button>
                <button class="btn-cancelar" onclick="cancelarAutenticacion()">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        // ==================== AUTENTICACIÓN ====================
        window.mostrarModalAuth = function() {
            const modal = document.getElementById('authModal');
            if (modal) {
                modal.style.display = 'flex';
            }
        };

        window.procesarAutenticacion = function() {
            const usuario = document.getElementById('authUsuario').value;
            const contrasena = document.getElementById('authContrasena').value;
            const resultadoDiv = document.getElementById('resultadoAutenticacion');
            
            if (resultadoDiv) {
                if (usuario === "Joe" && contrasena === "123") {
                    resultadoDiv.innerHTML = '<div class="acceso-exitoso">Ha conseguido el acceso a la <strong>zona restringida</strong>.</div>';
                } else {
                    resultadoDiv.innerHTML = '<div class="error-acceso"><strong>Authorization Required.</strong><br>Nombre de usuario o contraseña incorrectos.</div>';
                }
            }
            
            const modal = document.getElementById('authModal');
            if (modal) {
                modal.style.display = 'none';
            }
        };

        window.cancelarAutenticacion = function() {
            const resultadoDiv = document.getElementById('resultadoAutenticacion');
            if (resultadoDiv) {
                resultadoDiv.innerHTML = '<div class="error-acceso"><strong>Authorization Required.</strong><br>Acceso denegado por el usuario.</div>';
            }
            const modal = document.getElementById('authModal');
            if (modal) {
                modal.style.display = 'none';
            }
        };

        // ==================== COOKIES SIMULADAS ====================
        let cookiesSimuladas = {};

        function cargarCookies() {
            const guardado = localStorage.getItem('cookies_simuladas');
            if (guardado) {
                cookiesSimuladas = JSON.parse(guardado);
            } else {
                cookiesSimuladas = {};
            }
        }

        function guardarCookies() {
            localStorage.setItem('cookies_simuladas', JSON.stringify(cookiesSimuladas));
        }

        function establecerCookie(nombre, valor, horas) {
            cookiesSimuladas[nombre] = { valor: valor, expira: horas + ' horas' };
            guardarCookies();
            return true;
        }

        function obtenerCookie(nombre) {
            if (cookiesSimuladas[nombre]) {
                return cookiesSimuladas[nombre].valor;
            }
            return null;
        }

        cargarCookies();

        // Programa 45 - Establecer cookie
        window.establecerCookieEjemplo = function(event) {
            event.preventDefault();
            const nombreInput = document.getElementById('cookieNombre');
            const resultadoDiv = document.getElementById('cookieResultado');
            const formularioDiv = document.getElementById('formularioCookie');
            const infoDiv = document.getElementById('cookieInfo');
            
            if (nombreInput) {
                const nombre = nombreInput.value;
                if (nombre && nombre.trim() !== '') {
                    establecerCookie('ejemusuario', nombre.trim(), 1);
                    
                    resultadoDiv.innerHTML = `
                        <div class="mensaje-exito">
                            ✓ Se ha establecido una cookie de nombre <strong>ejemusuario</strong> con el valor: 
                            <strong class="cookie-valor">${nombre.trim()}</strong> que será válida durante 1 hora.
                        </div>
                    `;
                    
                    formularioDiv.style.display = 'none';
                    infoDiv.style.display = 'block';
                    document.getElementById('cookieValorMostrado').innerHTML = nombre.trim();
                } else {
                    resultadoDiv.innerHTML = `
                        <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px;">
                            ✗ Error: Por favor ingrese un nombre
                        </div>
                    `;
                    setTimeout(() => {
                        resultadoDiv.innerHTML = '';
                    }, 3000);
                }
            }
            return false;
        };

        window.volverAlFormulario = function() {
            document.getElementById('formularioCookie').style.display = 'block';
            document.getElementById('cookieInfo').style.display = 'none';
            document.getElementById('cookieResultado').innerHTML = '';
            document.getElementById('cookieNombre').value = '';
        };

        // Programa 46 - Recuperar cookie
        window.recuperarCookie = function() {
            const resultadoDiv = document.getElementById('cookieRecuperadaResultado');
            const valorCookie = obtenerCookie('ejemusuario');
            
            if (resultadoDiv) {
                if (valorCookie) {
                    resultadoDiv.innerHTML = `
                        <div class="cookie-recuperada">
                            Se ha establecido una cookie de nombre <strong>ejemusuario</strong> con el valor: <strong class="cookie-valor">${valorCookie}</strong>
                        </div>
                    `;
                } else {
                    resultadoDiv.innerHTML = `
                        <div class="cookie-no-existe">
                            ⚠️ No hay ninguna cookie establecida. Primero use el programa "9.1 Establecer cookies" para crear una cookie.
                        </div>
                    `;
                }
            }
        };

        // ==================== CARRITO DE COMPRAS ====================
        let carritoCompras = {};

        function cargarCarrito() {
            const guardado = localStorage.getItem('carrito_compras');
            if (guardado) {
                carritoCompras = JSON.parse(guardado);
            } else {
                carritoCompras = {};
            }
        }

        function guardarCarrito() {
            localStorage.setItem('carrito_compras', JSON.stringify(carritoCompras));
        }

        function actualizarCarrito(producto, cantidad) {
            if (producto && producto.trim() !== '' && cantidad && !isNaN(cantidad) && parseInt(cantidad) > 0) {
                const cant = parseInt(cantidad);
                if (carritoCompras[producto]) {
                    carritoCompras[producto] += cant;
                } else {
                    carritoCompras[producto] = cant;
                }
                guardarCarrito();
                return true;
            }
            return false;
        }

        window.mostrarCarrito = function() {
            const container = document.getElementById('carritoLista');
            if (!container) return;
            
            container.innerHTML = '';
            if (Object.keys(carritoCompras).length === 0) {
                container.innerHTML = '<div style="color: #666;">El carrito está vacío</div>';
            } else {
                for (const [producto, cantidad] of Object.entries(carritoCompras)) {
                    const div = document.createElement('div');
                    div.innerHTML = `Artículo: ${producto}  ud: ${cantidad}`;
                    container.appendChild(div);
                }
            }
        };

        window.agregarAlCarrito = function(event) {
            event.preventDefault();
            const productoInput = document.getElementById('productoInput');
            const cantidadInput = document.getElementById('cantidadInput');
            const mensajeDiv = document.getElementById('mensajeCarrito');
            
            if (productoInput && cantidadInput) {
                const producto = productoInput.value;
                const cantidad = cantidadInput.value;
                
                if (actualizarCarrito(producto, cantidad)) {
                    mensajeDiv.innerHTML = '<div class="mensaje-exito">✓ Producto añadido al carrito</div>';
                    productoInput.value = '';
                    cantidadInput.value = '';
                    window.mostrarCarrito();
                    setTimeout(() => {
                        mensajeDiv.innerHTML = '';
                    }, 2000);
                } else {
                    mensajeDiv.innerHTML = '<div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px;">✗ Error: Ingrese un producto válido y una cantidad numérica positiva</div>';
                    setTimeout(() => {
                        mensajeDiv.innerHTML = '';
                    }, 3000);
                }
            }
            return false;
        };

        window.vaciarCarrito = function() {
            carritoCompras = {};
            guardarCarrito();
            window.mostrarCarrito();
            const mensajeDiv = document.getElementById('mensajeCarrito');
            if (mensajeDiv) {
                mensajeDiv.innerHTML = '<div class="mensaje-exito">✓ Carrito vaciado correctamente</div>';
                setTimeout(() => {
                    mensajeDiv.innerHTML = '';
                }, 2000);
            }
        };

        cargarCarrito();

        // ==================== BASE DE DATOS SIMULADA ====================
        let datosRegistros = [];
        let nextId = 1;

        function cargarDatos() {
            const guardado = localStorage.getItem('db_prueba_completa');
            if (guardado) {
                const data = JSON.parse(guardado);
                datosRegistros = data.registros || [];
                nextId = data.nextId || 1;
            } else {
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

        window.mostrarTablaInsert = function() {
            const tbody = document.getElementById('tablaRegistrosInsert');
            if (!tbody) return;
            tbody.innerHTML = '';
            for (let i = 0; i < datosRegistros.length; i++) {
                const row = tbody.insertRow();
                row.insertCell(0).innerHTML = datosRegistros[i].nombre;
                row.insertCell(1).innerHTML = datosRegistros[i].apellidos;
            }
        };

        window.mostrarTablaDelete = function() {
            const tbody = document.getElementById('tablaRegistrosDelete');
            if (!tbody) return;
            tbody.innerHTML = '';
            for (let i = 0; i < datosRegistros.length; i++) {
                const row = tbody.insertRow();
                row.insertCell(0).innerHTML = datosRegistros[i].nombre;
                row.insertCell(1).innerHTML = datosRegistros[i].apellidos;
                row.insertCell(2).innerHTML = `<button style="background:#dc3545; color:white; border:none; padding:5px 12px; border-radius:4px; cursor:pointer;" onclick="eliminarRegistro(${datosRegistros[i].id})">Borra</button>`;
                row.cells[2].style.textAlign = 'center';
            }
        };

        window.eliminarRegistro = function(id) {
            if (borrarRegistro(id)) {
                window.mostrarTablaDelete();
                const mensajeDiv = document.getElementById('mensajeDelete');
                if (mensajeDiv) {
                    mensajeDiv.innerHTML = '<div class="mensaje-exito">✓ Registro eliminado correctamente</div>';
                    setTimeout(() => { mensajeDiv.innerHTML = ''; }, 2000);
                }
            }
        };

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
                    setTimeout(() => { mensajeDiv.innerHTML = ''; }, 3000);
                } else {
                    mensajeDiv.innerHTML = '<div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px;">✗ Error: Por favor complete ambos campos</div>';
                    setTimeout(() => { mensajeDiv.innerHTML = ''; }, 3000);
                }
            }
            return false;
        };

        // ==================== OTRAS FUNCIONES ====================
        window.procesarFormularioGet = function(event) {
            event.preventDefault();
            const nombreInput = document.getElementById('nombreInputGet');
            const resultadoDiv = document.getElementById('resultadoFormularioGet');
            if (nombreInput && resultadoDiv) {
                const nombre = nombreInput.value;
                if (nombre && nombre.trim() !== '') {
                    resultadoDiv.innerHTML = '<div style="background:#f0f0f0; padding:15px; border-radius:5px;"><strong>El nombre que ha introducido es:</strong> ' + nombre.trim() + '</div>';
                } else {
                    resultadoDiv.innerHTML = '<div style="background:#ffe0e0; padding:15px; border-radius:5px;"><strong>Error:</strong> Por favor ingrese un nombre</div>';
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
                    resultadoDiv.innerHTML = '<div style="background:#f0f0f0; padding:15px; border-radius:5px;"><strong>El nombre que ha obtenido es:</strong> ' + nombre.trim() + '</div>';
                } else {
                    resultadoDiv.innerHTML = '<div style="background:#ffe0e0; padding:15px; border-radius:5px;"><strong>Error:</strong> Por favor ingrese un nombre</div>';
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
            
            resultadoDiv.innerHTML = `<div style="background:#d4edda; color:#155724; padding:15px; border-radius:5px;">
                <strong>✓ Email simulado enviado correctamente</strong><br><br>
                <strong>Destinatario:</strong> ${direccion.value}<br>
                <strong>Formato:</strong> ${tipo && tipo.value === 'plano' ? 'Texto plano' : 'HTML'}<br>
                <strong>Contenido:</strong><br>
                <div style="background:#fff; padding:10px; margin-top:10px; border-radius:5px; font-family:monospace; font-size:12px;">${mensajeEmail.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</div>
            </div>`;
        };

        cargarDatos();

        // ==================== PROGRAMAS ====================
        const programs = {};

        programs[1] = { title: "2.1 Nuestro primer PHP", output: "Parte de PHP<br>Linea 0-9" };
        programs[2] = { title: "2.2 Variables y tipos", output: "1<br>3.34<br>Hola Mundo" };
        programs[3] = { title: "2.3 Operadores aritmeticos", output: "11<br>5<br>24<br>2.67<br>9<br>2" };
        programs[4] = { title: "2.4 Operadores comparacion", output: "false<br>true<br>false<br>true<br>true<br>true" };
        programs[5] = { title: "2.5 Operadores logicos", output: "false<br>true<br>false" };
        programs[6] = { title: "2.6 if-else", output: "a no es menor que b" };
        programs[7] = { title: "2.6 switch", output: "La variable contiene el valor arriba" };
        programs[8] = { title: "2.7 while", output: "El valor de i es 0-9" };
        programs[9] = { title: "2.7 for", output: "El valor de i es 0-9" };
        programs[10] = { title: "2.8 printf", output: "El numero dos con diferentes formatos: 2 2.000000 2.00" };
        programs[11] = { title: "2.8 printf tabla", output: "Tabla con numeros 0-4" };
        programs[12] = { title: "2.9 strlen()", output: "5" };
        programs[13] = { title: "2.9 explode()", output: "Esto<br>es<br>una<br>prueba" };
        programs[14] = { title: "2.9 sprintf()", output: "8x5 = 40" };
        programs[15] = { title: "2.9 substr()", output: "una" };
        programs[16] = { title: "2.9 chop()", output: "Iguales" };
        programs[17] = { title: "2.9 strpos()", output: "9" };
        programs[18] = { title: "2.9 str_replace()", output: "Un pez de color rojo, como rojo es la hierba." };
        programs[19] = { title: "2.10 Arrays", output: "Array con posiciones 0-5" };
        programs[20] = { title: "2.11 Strings indices", output: "Paella" };
        programs[21] = { title: "2.12 Constantes", output: "Hola, mundo!<br>3.14159265" };
        programs[22] = { title: "2.13 gettype()", output: "integer<br>double<br>string" };
        programs[23] = { title: "2.13 is_int()", output: "true<br>true<br>false" };
        programs[24] = { title: "2.14 Funciones", output: "5<br>263892.5" };
        programs[25] = { title: "3.1 Librerias", output: "Cabecera y pie de pagina" };
        programs[26] = { title: "3.2 Plantillas", output: "Pagina con indice" };
        programs[27] = { title: "3.3 Frame", output: "Frame con enlaces" };
        programs[28] = { title: "4.1 GET", output: "Nombre recibido: Juan" };
        programs[29] = { title: "4.1 POST", output: "Formulario POST" };
        programs[30] = { title: "4.1 SERVER", output: "IP, navegador, metodo" };
        programs[31] = { title: "5.1 Formulario simple", output: `<div style="background:white; padding:20px;"><h1>Ejemplo de procesado de formularios</h1>
            <form onsubmit="procesarFormularioGet(event)"><label>Introduzca su nombre:</label>
            <input type="text" id="nombreInputGet" style="display:block; margin:10px 0; padding:8px;">
            <input type="submit" value="Enviar"></form><div id="resultadoFormularioGet"></div></div>` };
        programs[32] = { title: "5.2 GET vs POST", output: `<div style="background:white; padding:20px;"><h1>GET vs POST</h1>
            <div><h3>GET</h3><form onsubmit="procesarFormularioGet(event)"><input type="text" id="nombreInputGet"><input type="submit" value="Enviar"></form><div id="resultadoFormularioGet"></div></div>
            <hr><div><h3>POST</h3><form onsubmit="procesarFormularioPost(event)"><input type="text" id="nombreInputPost"><input type="submit" value="Enviar"></form><div id="resultadoFormularioPost"></div></div></div>` };
        programs[33] = { title: "5.3 Envio email", output: `<div style="background:white; padding:20px;"><h1>Ejemplo de envio de email</h1>
            <form onsubmit="enviarEmailSimulado(event)"><label>Email:</label><input type="text" id="emailDireccion" style="display:block; margin:10px 0; padding:8px;">
            <input type="radio" name="tipo" value="plano" checked> Texto plano<br><input type="radio" name="tipo" value="html"> HTML<br><br>
            <input type="submit" value="Enviar"></form><div id="resultadoEmail"></div></div>` };
        programs[34] = { title: "6.1 Conexion BD", output: "<div style='background:white; padding:20px;'><h1>Conexion</h1><div style='background:#f0f0f0; padding:15px;'><strong>Conexion con la base de datos conseguida.</strong></div></div>" };
        programs[35] = { title: "6.2 Consultas SELECT", output: "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><tr><td>1</td><td>Juan<\/td><td>Perez<\/td><\/tr><tr><td>2<\/td><td>Maria<\/td><td>Gonzalez<\/td><\/tr><\/table>" };
        programs[36] = { title: "6.3 Insercion registros", output: `<div style="background:white; padding:20px;"><h1>Ejemplo de BD con PHP y MySQL</h1>
            <form onsubmit="procesarInsercion(event)"><tr><tr><td>Nombre:</td><td><input type="text" id="dbNombre"></td></tr>
            <tr><td>Apellidos:</td><td><input type="text" id="dbApellidos"></td></tr></table>
            <input type="submit" value="Grabar"></form><div id="mensajeInsercion"></div><hr>
            <table border="1"><thead><tr><th>Nombre</th><th>Apellidos</th></thead><tbody id="tablaRegistrosInsert"></tbody></table></div>` };
        programs[37] = { title: "6.4 Borrado registros", output: `<div style="background:white; padding:20px;"><h1>Ejemplo de BD con PHP y MySQL</h1>
            <div id="mensajeDelete"></div>
            <table border="1"><thead><tr><th>Nombre</th><th>Apellidos</th><th>Borrar</th></thead><tbody id="tablaRegistrosDelete"></tbody></table></div>` };
        
        // PROGRAMA 38 - AUTENTICACIÓN HTTP
        programs[38] = { 
            title: "7.1 Autenticacion HTTP basica", 
            output: `<div class="auth-container">
                <h1>Autenticacion HTTP Basic</h1>
                <div id="resultadoAutenticacion"></div>
                <button class="btn-iniciar" onclick="mostrarModalAuth()">Iniciar autenticacion</button>
            </div>`
        };
        
        programs[39] = { title: "7.2 Validacion archivo", output: "Acceso concedido para: joe" };
        programs[40] = { title: "7.3 Validacion .htaccess", output: "Usuario autenticado" };
        programs[41] = { title: "7.4 Validacion MySQL", output: "Usuario autenticado via MySQL" };
        programs[42] = { title: "8.1 Inicializacion sesion", output: "ID de sesion generado" };
        programs[43] = { title: "8.2 Ejemplo sesion", output: "Contador de visitas" };
        programs[44] = { title: "8.3 Carrito compra", output: `<div style="background:white; padding:20px;"><h1>Carrito de compras</h1>
            <form onsubmit="agregarAlCarrito(event)">Dime el producto <input type="text" id="productoInput" size="20"><br>
            Cuantas unidades <input type="text" id="cantidadInput" size="20"><br>
            <input type="submit" value="Añadir a la cesta"><br></form>
            <div id="mensajeCarrito"></div><div><strong>El contenido de la cesta de la compra es:</strong><br>
            <div id="carritoLista"></div></div><button onclick="vaciarCarrito()">Vaciar carrito</button></div>` };
        
        // PROGRAMA 45 - ESTABLECER COOKIES
        programs[45] = { 
            title: "9.1 Establecer cookies", 
            output: `<div class="cookie-container">
                <h1>Ejemplo de uso de cookie</h1>
                <div id="formularioCookie">
                    <form class="cookie-form" onsubmit="establecerCookieEjemplo(event)">
                        Introduzca su nombre:<br>
                        <input type="text" id="cookieNombre" placeholder="Escriba su nombre">
                        <br>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
                <div id="cookieInfo" style="display: none;">
                    <div class="cookie-info">
                        Se ha establecido una cookie de nombre <strong>ejemusuario</strong> con el valor: 
                        <strong class="cookie-valor" id="cookieValorMostrado"></strong> que será válida durante 1 hora.
                    </div>
                    <button class="btn-volver" onclick="volverAlFormulario()">Volver</button>
                </div>
                <div id="cookieResultado"></div>
            </div>`
        };
        
        // PROGRAMA 46 - RECUPERAR COOKIES
        programs[46] = { 
            title: "9.1 Recuperar cookies", 
            output: `<div class="cookie-container">
                <h1>Ejemplo de recuperar cookie</h1>
                <div id="cookieRecuperadaResultado" style="margin-bottom: 20px;">
                    <div class="cookie-info" style="background:#e8f4f8;">
                        Haga clic en el botón para recuperar la cookie "ejemusuario"
                    </div>
                </div>
                <button onclick="recuperarCookie()" style="background: #e94560; color: white; border: none; padding: 10px 25px; border-radius: 4px; cursor: pointer;">Recuperar cookie</button>
                <div style="margin-top: 20px; font-size: 12px; color: #666;">* Nota: Primero debe establecer una cookie usando el programa "9.1 Establecer cookies"</div>
            </div>`
        };
        
        programs[48] = { title: "Arrays asociativo", output: "Capitales de paises" };
        programs[49] = { title: "Arrays multidimensional", output: "Notas de alumnos" };
        programs[50] = { title: "Funciones retorno", output: "Area del circulo" };
        programs[51] = { title: "Variables estaticas", output: "Contador: 1,2,3" };
        programs[52] = { title: "Funciones variables", output: "Hola! Adios!" };
        programs[53] = { title: "foreach clave/valor", output: "Edades" };
        programs[54] = { title: "Funciones fecha", output: "Fecha y hora actual" };
        programs[55] = { title: "Funciones matematicas", output: "sqrt, pow, rand" };
        programs[56] = { title: "include y require", output: "Diferencia entre include y require" };
        programs[57] = { title: "Manejo archivos", output: "fopen, fread, fwrite" };
        programs[58] = { title: "Lectura archivos", output: "file_get_contents" };
        programs[59] = { title: "Escritura archivos", output: "file_put_contents" };

        // Reorganizar para que los números sean consecutivos
        const programasReorganizados = {};
        let idx = 1;
        for (let i = 1; i <= 59; i++) {
            if (programs[i]) {
                programasReorganizados[idx] = programs[i];
                idx++;
            }
        }
        
        Object.keys(programs).forEach(key => delete programs[key]);
        Object.assign(programs, programasReorganizados);

        function renderMenu() {
            const container = document.getElementById('menuContainer');
            if (!container) return;
            
            container.innerHTML = '';
            const programList = document.createElement('div');
            programList.className = 'program-list';
            
            for (let i = 1; i <= 55; i++) {
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
            
            if (id === 36) setTimeout(() => window.mostrarTablaInsert(), 50);
            if (id === 37) setTimeout(() => window.mostrarTablaDelete(), 50);
            if (id === 44) setTimeout(() => window.mostrarCarrito(), 50);
            
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
                        Selecciona un programa del menu izquierdo (1 al 55) para ver la salida esperada
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