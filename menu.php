<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP - Manual Completo | Lavanda & Dorado</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #f5f2fc;
            height: 100vh;
            overflow: hidden;
        }

        /* Minimalista con lavanda y dorado */
        .app {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* Sidebar lavanda profundo */
        .sidebar {
            width: 450px;
            background: #faf7ff;
            backdrop-filter: blur(0px);
            color: #2d1b4e;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 8px 0 24px rgba(106, 90, 165, 0.08);
            border-right: 1px solid #ede7ff;
            z-index: 10;
        }

        .sidebar-header {
            padding: 28px 24px;
            background: #ffffff;
            border-bottom: 1px solid #f0eaff;
        }

        .sidebar-header h2 {
            font-size: 1.25rem;
            font-weight: 500;
            letter-spacing: -0.2px;
            background: linear-gradient(135deg, #9b7bdd 0%, #d4af37 100%);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .program-count {
            background: #f0eaff;
            color: #7c5cbf;
            display: inline-block;
            padding: 4px 12px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.3px;
            margin-top: 10px;
            border: 1px solid #e6dcff;
        }

        .menu-container {
            flex: 1;
            overflow-y: auto;
            padding: 16px 14px;
            scrollbar-width: thin;
            scrollbar-color: #d4af37 #f0eaff;
        }

        .menu-container::-webkit-scrollbar {
            width: 5px;
        }
        .menu-container::-webkit-scrollbar-track {
            background: #f0eaff;
            border-radius: 10px;
        }
        .menu-container::-webkit-scrollbar-thumb {
            background: #d4af37;
            border-radius: 10px;
        }

        .program-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .program-btn {
            background: transparent;
            border: none;
            color: #3e2a62;
            padding: 10px 14px;
            text-align: left;
            font-size: 0.8rem;
            font-weight: 450;
            cursor: pointer;
            border-radius: 14px;
            transition: all 0.2s ease;
            font-family: 'SF Mono', 'Fira Code', monospace;
            letter-spacing: -0.2px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .program-btn:hover {
            background: #f4efff;
            color: #9b7bdd;
            transform: translateX(2px);
        }

        .program-btn.active {
            background: linear-gradient(105deg, #faf5ff 0%, #fff9e8 100%);
            color: #b5942c;
            border-left: 3px solid #d4af37;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(212, 175, 55, 0.08);
        }

        .numero {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            font-weight: 600;
            color: #b5942c;
            font-size: 0.75rem;
            background: #fff5e0;
            border-radius: 20px;
            padding: 2px 0;
        }

        .program-btn.active .numero {
            background: #d4af37;
            color: #2d1b4e;
            font-weight: 600;
        }

        /* Main content: lavanda clara */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #fefcff;
            overflow: hidden;
        }

        .output-container {
            flex: 1;
            padding: 24px 28px;
            overflow-y: auto;
        }

        .output-card {
            background: #ffffff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(106, 90, 165, 0.08);
            border: 1px solid #f3edff;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: all 0.2s;
        }

        .output-header {
            background: #ffffff;
            padding: 18px 26px;
            border-bottom: 1px solid #f2ecff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .output-header h3 {
            color: #9b7bdd;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            background: #f8f4ff;
            padding: 4px 12px;
            border-radius: 40px;
            display: inline-block;
        }

        .clear-btn {
            background: #fff8e7;
            border: 1px solid #f3e5c0;
            color: #b5942c;
            padding: 6px 18px;
            border-radius: 40px;
            cursor: pointer;
            font-size: 0.75rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .clear-btn:hover {
            background: #d4af37;
            color: #2d1b4e;
            border-color: #d4af37;
        }

        .output-body {
            flex: 1;
            padding: 24px 28px;
            font-family: 'Inter', system-ui, 'Segoe UI', sans-serif;
            font-size: 0.9rem;
            line-height: 1.6;
            overflow-y: auto;
            background: #fefdfd;
        }

        .program-title {
            color: #9b7bdd;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0eaff;
            font-size: 1rem;
            letter-spacing: -0.2px;
        }

        .output-block {
            background: #fcfaff;
            border-radius: 20px;
            padding: 22px;
            border-left: 4px solid #d4af37;
            color: #2e2446;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }

        .output-block h4 {
            color: #c9a52c;
            margin-bottom: 14px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .info-message {
            text-align: center;
            padding: 60px 30px;
            color: #b6a2e0;
            font-weight: 400;
            background: #fefbff;
            border-radius: 24px;
        }

        /* Estilos para autenticación minimalista */
        .auth-container {
            background: white;
            color: #2d1b4e;
            padding: 20px;
            border-radius: 24px;
            border: 1px solid #ede7ff;
        }
        .auth-container h1 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #9b7bdd;
        }
        .acceso-exitoso {
            background: #f2f9f0;
            color: #5f7e3a;
            padding: 18px;
            border-radius: 20px;
            text-align: center;
            font-weight: 500;
            border-left: 3px solid #b5cc7e;
        }
        .error-acceso {
            background: #fff5f5;
            color: #bf6f6f;
            padding: 15px;
            border-radius: 20px;
            text-align: center;
        }
        .btn-iniciar {
            background: #d4af37;
            color: #2d1b4e;
            border: none;
            padding: 10px 28px;
            border-radius: 40px;
            cursor: pointer;
            margin-top: 20px;
            font-weight: 500;
            transition: 0.2s;
        }
        .btn-iniciar:hover {
            background: #c29e2a;
            transform: scale(0.98);
        }

        /* Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(45, 27, 78, 0.4);
            backdrop-filter: blur(4px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background: #ffffff;
            border: 1px solid #ede7ff;
            border-radius: 28px;
            padding: 28px;
            width: 400px;
            box-shadow: 0 20px 35px rgba(106, 90, 165, 0.2);
        }
        .modal-content h3 {
            margin-bottom: 18px;
            color: #9b7bdd;
            font-weight: 600;
        }
        .modal-info {
            background: #faf7ff;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 16px;
            font-size: 12px;
            color: #6e53a3;
        }
        .modal-content label {
            display: block;
            margin: 12px 0 6px;
            font-weight: 500;
            color: #4a3570;
        }
        .modal-content input {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 12px;
            border: 1px solid #e2d6ff;
            border-radius: 16px;
            background: #fefcff;
            font-size: 0.9rem;
        }
        .modal-content input:focus {
            outline: none;
            border-color: #d4af37;
        }
        .modal-buttons {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }
        .btn-aceptar {
            background: #d4af37;
            color: #2d1b4e;
            padding: 8px 20px;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            font-weight: 500;
        }
        .btn-cancelar {
            background: #f0eaff;
            color: #6e53a3;
            padding: 8px 20px;
            border: none;
            border-radius: 40px;
            cursor: pointer;
        }

        /* Cookies minimalista */
        .cookie-container {
            background: white;
            color: #2d1b4e;
            padding: 24px;
            border-radius: 24px;
            border: 1px solid #ede7ff;
        }
        .cookie-container h1 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #9b7bdd;
        }
        .cookie-form input {
            margin: 5px 0 12px;
            padding: 10px;
            border: 1px solid #e2d6ff;
            border-radius: 16px;
            background: #fefcff;
        }
        .cookie-form input[type="text"] {
            width: 260px;
        }
        .cookie-form input[type="submit"] {
            background: #d4af37;
            color: #2d1b4e;
            border: none;
            padding: 8px 22px;
            cursor: pointer;
            border-radius: 40px;
            font-weight: 500;
        }
        .cookie-info {
            background: #faf7ff;
            padding: 18px;
            border-radius: 20px;
            margin-top: 20px;
            border-left: 3px solid #d4af37;
        }
        .cookie-valor {
            font-weight: bold;
            color: #b5942c;
        }
        .btn-volver {
            background: #f0eaff;
            color: #6e53a3;
            border: none;
            padding: 8px 20px;
            border-radius: 40px;
            cursor: pointer;
            margin-top: 15px;
        }
        .mensaje-exito {
            background: #f2f9f0;
            color: #5f7e3a;
            padding: 12px;
            border-radius: 20px;
            margin-bottom: 15px;
        }
        .cookie-recuperada {
            background: #faf7ff;
            color: #6e53a3;
            padding: 18px;
            border-radius: 20px;
            text-align: center;
            font-weight: 500;
        }
        .cookie-no-existe {
            background: #fff5f5;
            color: #bf6f6f;
            padding: 18px;
            border-radius: 20px;
            text-align: center;
        }
        
        /* Librería minimalista dorada */
        .libreria-ejemplo {
            background: white;
            color: #2d1b4e;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            border: 1px solid #f0eaff;
        }
        .libreria-header {
            background: #faf7ff;
            padding: 14px 18px;
            font-weight: 600;
            border-bottom: 1px solid #ede7ff;
            font-size: 0.85rem;
            color: #9b7bdd;
        }
        .libreria-content {
            padding: 24px 20px;
            background: white;
            min-height: 150px;
        }
        .libreria-footer {
            background: #fefcf5;
            padding: 14px 18px;
            border-top: 1px solid #f3edff;
            font-style: normal;
            font-size: 0.8rem;
            color: #b5942c;
        }

        /* formularios minimalistas */
        .formulario-ejemplo {
            background: white;
            padding: 20px;
            border-radius: 24px;
            border: 1px solid #f0eaff;
        }
        .formulario-ejemplo h1 {
            color: #9b7bdd;
            font-size: 1.2rem;
        }
        .metodo-info {
            background: #faf7ff;
            padding: 10px 15px;
            border-radius: 16px;
            margin: 12px 0;
            font-size: 0.8rem;
        }
        .formulario-ejemplo input[type="text"] {
            padding: 10px 12px;
            border-radius: 20px;
            border: 1px solid #e2d6ff;
            width: 260px;
            margin: 8px 0;
        }
        .formulario-ejemplo input[type="submit"] {
            background: #d4af37;
            border: none;
            padding: 8px 24px;
            border-radius: 40px;
            color: #2d1b4e;
            font-weight: 500;
            cursor: pointer;
        }
        hr {
            border-color: #ede7ff;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ede7ff;
            padding: 10px 12px;
            text-align: left;
        }
        th {
            background: #faf7ff;
            color: #9b7bdd;
            font-weight: 500;
        }
        button {
            font-family: inherit;
        }
        .btn-eliminar {
            background: #f9e6e6;
            color: #bf6f6f;
            border: none;
            padding: 6px 16px;
            border-radius: 40px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="app">
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>✦ Manual de PHP ✦</h2>
                <span class="program-count">59 Programas</span>
            </div>
            <div class="menu-container" id="menuContainer">
            </div>
        </div>

        <div class="main-content">
            <div class="output-container">
                <div class="output-card">
                    <div class="output-header">
                        <h3>▸ ejecución del programa</h3>
                        <button class="clear-btn" onclick="clearOutput()">Limpiar</button>
                    </div>
                    <div class="output-body" id="outputBody">
                        <div class="info-message">
                            ✦ selecciona un programa del menú izquierdo (1 al 60) ✦<br>para ver la salida esperada
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal global de autenticación -->
    <div id="authModal" class="modal-overlay">
        <div class="modal-content">
            <h3>✧ Autenticación requerida ✧</h3>
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
                    resultadoDiv.innerHTML = '<div class="acceso-exitoso">✦ Ha conseguido el acceso a la <strong>zona restringida</strong>.</div>';
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
                    resultadoDiv.innerHTML = `<div class="mensaje-exito">✓ Se ha establecido una cookie de nombre <strong>ejemusuario</strong> con el valor: <strong class="cookie-valor">${nombre.trim()}</strong> que será válida durante 1 hora.</div>`;
                    formularioDiv.style.display = 'none';
                    infoDiv.style.display = 'block';
                    document.getElementById('cookieValorMostrado').innerHTML = nombre.trim();
                } else {
                    resultadoDiv.innerHTML = `<div style="background:#fff5f5; color:#bf6f6f; padding:10px; border-radius:5px;">✗ Error: Por favor ingrese un nombre</div>`;
                    setTimeout(() => { resultadoDiv.innerHTML = ''; }, 3000);
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

        window.recuperarCookie = function() {
            const resultadoDiv = document.getElementById('cookieRecuperadaResultado');
            const valorCookie = obtenerCookie('ejemusuario');
            if (resultadoDiv) {
                if (valorCookie) {
                    resultadoDiv.innerHTML = `<div class="cookie-recuperada">Se ha establecido una cookie de nombre <strong>ejemusuario</strong> con el valor: <strong class="cookie-valor">${valorCookie}</strong></div>`;
                } else {
                    resultadoDiv.innerHTML = `<div class="cookie-no-existe">⚠️ No hay ninguna cookie establecida. Primero use el programa "9.1 Establecer cookies" para crear una cookie.</div>`;
                }
            }
        };

        // ==================== CARRITO DE COMPRAS ====================
        let carritoCompras = {};
        function cargarCarrito() { const guardado = localStorage.getItem('carrito_compras'); if (guardado) carritoCompras = JSON.parse(guardado); else carritoCompras = {}; }
        function guardarCarrito() { localStorage.setItem('carrito_compras', JSON.stringify(carritoCompras)); }
        function actualizarCarrito(producto, cantidad) {
            if (producto && producto.trim() !== '' && cantidad && !isNaN(cantidad) && parseInt(cantidad) > 0) {
                const cant = parseInt(cantidad);
                carritoCompras[producto] = (carritoCompras[producto] || 0) + cant;
                guardarCarrito();
                return true;
            }
            return false;
        }
        window.mostrarCarrito = function() {
            const container = document.getElementById('carritoLista');
            if (!container) return;
            container.innerHTML = '';
            if (Object.keys(carritoCompras).length === 0) container.innerHTML = '<div style="color: #b6a2e0;">El carrito está vacío</div>';
            else for (const [producto, cantidad] of Object.entries(carritoCompras)) { const div = document.createElement('div'); div.innerHTML = `✦ Artículo: ${producto}  ud: ${cantidad}`; container.appendChild(div); }
        };
        window.agregarAlCarrito = function(event) {
            event.preventDefault();
            const productoInput = document.getElementById('productoInput');
            const cantidadInput = document.getElementById('cantidadInput');
            const mensajeDiv = document.getElementById('mensajeCarrito');
            if (productoInput && cantidadInput) {
                const producto = productoInput.value, cantidad = cantidadInput.value;
                if (actualizarCarrito(producto, cantidad)) {
                    mensajeDiv.innerHTML = '<div class="mensaje-exito">✓ Producto añadido al carrito</div>';
                    productoInput.value = ''; cantidadInput.value = '';
                    window.mostrarCarrito();
                    setTimeout(() => { mensajeDiv.innerHTML = ''; }, 2000);
                } else {
                    mensajeDiv.innerHTML = '<div style="background:#fff5f5; color:#bf6f6f; padding:10px; border-radius:5px;">✗ Error: Ingrese un producto válido y una cantidad numérica positiva</div>';
                    setTimeout(() => { mensajeDiv.innerHTML = ''; }, 3000);
                }
            }
            return false;
        };
        window.vaciarCarrito = function() { carritoCompras = {}; guardarCarrito(); window.mostrarCarrito(); const mensajeDiv = document.getElementById('mensajeCarrito'); if(mensajeDiv) { mensajeDiv.innerHTML = '<div class="mensaje-exito">✓ Carrito vaciado correctamente</div>'; setTimeout(() => { mensajeDiv.innerHTML = ''; }, 2000); } };
        cargarCarrito();

        // ==================== BASE DE DATOS SIMULADA ====================
        let datosRegistros = [], nextId = 1;
        function cargarDatos() {
            const guardado = localStorage.getItem('db_prueba_completa');
            if (guardado) { const data = JSON.parse(guardado); datosRegistros = data.registros || []; nextId = data.nextId || 1; }
            else { datosRegistros = [ { id: 1, nombre: "CFB", apellidos: "DFG" }, { id: 2, nombre: "CFB", apellidos: "DFG" }, { id: 3, nombre: "abierto", apellidos: "a" }, { id: 4, nombre: "Ernesto", apellidos: "Elizalde" }, { id: 5, nombre: "FROI", apellidos: "RESZ" }, { id: 6, nombre: "GGG", apellidos: "SSSS" }, { id: 7, nombre: "AFA", apellidos: "AFDFA" }, { id: 8, nombre: "A", apellidos: "A" }, { id: 9, nombre: "et", apellidos: "ag" } ]; nextId = 10; guardarDatos(); }
        }
        function guardarDatos() { localStorage.setItem('db_prueba_completa', JSON.stringify({ registros: datosRegistros, nextId: nextId })); }
        function insertarRegistro(nombre, apellidos) { if (nombre && nombre.trim() !== '' && apellidos && apellidos.trim() !== '') { datosRegistros.push({ id: nextId++, nombre: nombre.trim(), apellidos: apellidos.trim() }); guardarDatos(); return true; } return false; }
        function borrarRegistro(id) { const index = datosRegistros.findIndex(r => r.id === id); if (index !== -1) { datosRegistros.splice(index, 1); guardarDatos(); return true; } return false; }
        window.mostrarTablaInsert = function() { const tbody = document.getElementById('tablaRegistrosInsert'); if (!tbody) return; tbody.innerHTML = ''; for (let i = 0; i < datosRegistros.length; i++) { const row = tbody.insertRow(); row.insertCell(0).innerHTML = datosRegistros[i].nombre; row.insertCell(1).innerHTML = datosRegistros[i].apellidos; } };
        window.mostrarTablaDelete = function() { const tbody = document.getElementById('tablaRegistrosDelete'); if (!tbody) return; tbody.innerHTML = ''; for (let i = 0; i < datosRegistros.length; i++) { const row = tbody.insertRow(); row.insertCell(0).innerHTML = datosRegistros[i].nombre; row.insertCell(1).innerHTML = datosRegistros[i].apellidos; row.insertCell(2).innerHTML = `<button style="background:#f9e6e6; color:#bf6f6f; border:none; padding:5px 14px; border-radius:40px; cursor:pointer;" onclick="eliminarRegistro(${datosRegistros[i].id})">Borra</button>`; row.cells[2].style.textAlign = 'center'; } };
        window.eliminarRegistro = function(id) { if (borrarRegistro(id)) { window.mostrarTablaDelete(); const mensajeDiv = document.getElementById('mensajeDelete'); if (mensajeDiv) { mensajeDiv.innerHTML = '<div class="mensaje-exito">✓ Registro eliminado correctamente</div>'; setTimeout(() => { mensajeDiv.innerHTML = ''; }, 2000); } } };
        window.procesarInsercion = function(event) { event.preventDefault(); const nombreInput = document.getElementById('dbNombre'), apellidosInput = document.getElementById('dbApellidos'), mensajeDiv = document.getElementById('mensajeInsercion'); if (nombreInput && apellidosInput) { const nombre = nombreInput.value, apellidos = apellidosInput.value; if (insertarRegistro(nombre, apellidos)) { mensajeDiv.innerHTML = '<div class="mensaje-exito">✓ Registro insertado correctamente</div>'; nombreInput.value = ''; apellidosInput.value = ''; window.mostrarTablaInsert(); setTimeout(() => { mensajeDiv.innerHTML = ''; }, 3000); } else { mensajeDiv.innerHTML = '<div style="background:#fff5f5; color:#bf6f6f; padding:10px; border-radius:5px;">✗ Error: Por favor complete ambos campos</div>'; setTimeout(() => { mensajeDiv.innerHTML = ''; }, 3000); } } return false; };
        window.procesarFormularioGet = function(event) { event.preventDefault(); const nombreInput = document.getElementById('nombreInputGet'), resultadoDiv = document.getElementById('resultadoFormularioGet'); if (nombreInput && resultadoDiv) { const nombre = nombreInput.value; if (nombre && nombre.trim() !== '') resultadoDiv.innerHTML = '<div style="background:#faf7ff; padding:15px; border-radius:20px;"><strong>El nombre que ha introducido es:</strong> ' + nombre.trim() + '</div>'; else resultadoDiv.innerHTML = '<div style="background:#fff5f5; padding:15px; border-radius:20px;"><strong>Error:</strong> Por favor ingrese un nombre</div>'; } return false; };
        window.procesarFormularioPost = function(event) { event.preventDefault(); const nombreInput = document.getElementById('nombreInputPost'), resultadoDiv = document.getElementById('resultadoFormularioPost'); if (nombreInput && resultadoDiv) { const nombre = nombreInput.value; if (nombre && nombre.trim() !== '') resultadoDiv.innerHTML = '<div style="background:#faf7ff; padding:15px; border-radius:20px;"><strong>El nombre que ha obtenido es:</strong> ' + nombre.trim() + '</div>'; else resultadoDiv.innerHTML = '<div style="background:#fff5f5; padding:15px; border-radius:20px;"><strong>Error:</strong> Por favor ingrese un nombre</div>'; } return false; };
        window.enviarEmailSimulado = function(event) { event.preventDefault(); const direccion = document.getElementById('emailDireccion'), tipo = document.querySelector('input[name="tipo"]:checked'), resultadoDiv = document.getElementById('resultadoEmail'); if (!direccion || !direccion.value || direccion.value.trim() === '') { resultadoDiv.innerHTML = '<div style="background:#fff5f5; padding:15px; border-radius:20px;"><strong>Error:</strong> Por favor ingrese una direccion de email</div>'; return; } let mensajeEmail = ''; if (tipo && tipo.value === 'plano') mensajeEmail = `Ejemplo de envio de email de texto plano\n\nPHP.\nhttp://www.php.net/\nManuales para desarrolladores web.`; else mensajeEmail = `<html><head><title>PHP. Manual de PHP</title></head><body>Ejemplo de envio de email de HTML<br><br>PHP.<br>http://www.php.net/<br><u>Manuales</u> para <b>desarrolladores</b> web.</body></html>`; resultadoDiv.innerHTML = `<div style="background:#f2f9f0; color:#5f7e3a; padding:15px; border-radius:20px;"><strong>✓ Email simulado enviado correctamente</strong><br><br><strong>Destinatario:</strong> ${direccion.value}<br><strong>Formato:</strong> ${tipo && tipo.value === 'plano' ? 'Texto plano' : 'HTML'}<br><strong>Contenido:</strong><br><div style="background:#fff; padding:10px; margin-top:10px; border-radius:16px; font-family:monospace; font-size:12px;">${mensajeEmail.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</div></div>`; };
        cargarDatos();

        // ==================== TODOS LOS 59 PROGRAMAS ====================
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
        programs[25] = { title: "3.1 Librerias - include", output: `<div class="libreria-ejemplo"><div class="libreria-header">Esta cabecera estará en todas sus páginas.</div><div class="libreria-content"><strong>Página 1</strong><br><br>Contenido blablal blalb alb<br>más cosas...<br>fin</div><div class="libreria-footer">Este es el pie de página.<br>Autor: John Doe</div></div>` };
        programs[26] = { title: "3.2 Paginas con plantillas (Ejemplo 2)", output: `<div style="background:white; border-radius:20px;"><div style="background:#faf7ff; padding:12px 15px; font-weight:600;">Esta cabecera estará en todas sus páginas.</div><div style="padding:20px;">---<br><br>Esta es otra página<br><br>---<br><br><strong>Pagina 1</strong> completamente distinta<br><strong>Pagina 2</strong><br><br>pero comparte el pie y la cabecera con la otra.<br><br>---</div><div style="background:#fefcf5; padding:12px 15px;">Este es el pie de página.<br>Autor: John Doe</div></div>` };
        programs[27] = { title: "3.3 Enlace externo con frame", output: `<div style="background:white; border-radius:20px;"><div style="background:#faf7ff; padding:10px 15px;"><a href="https://www.php.net" target="contenidoFrame" style="color:#9b7bdd;">Ir a PHP.net</a> | <a href="https://www.w3schools.com/php/" target="contenidoFrame" style="color:#9b7bdd;">Ir a W3Schools PHP</a> | <a href="https://www.php.net/manual/es/" target="contenidoFrame" style="color:#9b7bdd;">Manual de PHP</a></div><iframe name="contenidoFrame" width="100%" height="450" style="border:1px solid #ede7ff; background:white;" srcdoc='<html><head><style>body{font-family:Segoe UI;padding:20px;}</style></head><body><div style="background:#faf7ff; padding:15px;"><strong>Parte de arriba.</strong></div><hr><h2>What is PHP?</h2><p>PHP is a widely-used general-purpose scripting language...</p><hr><h2>PHP 8.3 Released!</h2><p>The PHP development team announces PHP 8.3...</p><hr><div style="background:#fefcf5; padding:10px; text-align:center;"><strong>WebHosting Talk</strong><br>"Now Featuring PHP Forums"</div><hr><div style="background:#faf7ff; padding:10px;"><strong>Parte de abajo.</strong></div></body></html>'></iframe></div>` };
        programs[28] = { title: "4.1 register_globals - Uso de GET", output: "Nombre recibido: Juan" };
        programs[29] = { title: "4.1 Uso de POST", output: "Formulario POST para enviar datos" };
        programs[30] = { title: "4.1 Uso de $_SERVER", output: "IP del cliente: 127.0.0.1<br>Navegador: Mozilla/5.0<br>Metodo de peticion: GET" };
        programs[31] = { title: "5.1 Formulario simple (GET)", output: `<div class="formulario-ejemplo"><h1>Ejemplo de procesado de formularios</h1><div class="metodo-info"><strong>Metodo GET:</strong> Los datos se envian en la URL</div><form id="formularioGet" onsubmit="procesarFormularioGet(event)"><label>Introduzca su nombre:</label><input type="text" id="nombreInputGet" placeholder="Escriba su nombre"><br><input type="submit" value="Enviar"></form><div id="resultadoFormularioGet" style="margin-top:20px;"></div></div>` };
        programs[32] = { title: "5.2 Metodo GET vs POST", output: `<div class="formulario-ejemplo"><h1>Ejemplo de procesado de formularios</h1><div style="margin-bottom:30px;"><h3 style="color:#d4af37;">Metodo GET</h3><div class="metodo-info"><strong>GET:</strong> Los datos van en la URL</div><form id="formularioGetVsPost" onsubmit="procesarFormularioGet(event)"><label>Introduzca su nombre:</label><input type="text" id="nombreInputGet" placeholder="Escriba su nombre"><br><input type="submit" value="Enviar con GET"></form><div id="resultadoFormularioGet" style="margin-top:20px;"></div></div><hr><div><h3 style="color:#b5942c;">Metodo POST</h3><div class="metodo-info"><strong>POST:</strong> Los datos van en el cuerpo</div><form id="formularioPostVsGet" onsubmit="procesarFormularioPost(event)"><label>Introduzca su nombre:</label><input type="text" id="nombreInputPost" placeholder="Escriba su nombre"><br><input type="submit" value="Enviar con POST"></form><div id="resultadoFormularioPost" style="margin-top:20px;"></div></div></div>` };
        programs[33] = { title: "5.3 Envio email", output: `<div style="background:white; padding:20px; border-radius:24px;"><h1>Ejemplo de envio de email</h1><form onsubmit="enviarEmailSimulado(event)"><label>Email:</label><input type="text" id="emailDireccion" style="display:block; margin:10px 0; padding:8px; border-radius:16px; border:1px solid #ede7ff;"><input type="radio" name="tipo" value="plano" checked> Texto plano<br><input type="radio" name="tipo" value="html"> HTML<br><br><input type="submit" value="Enviar" style="background:#d4af37; border:none; padding:8px 20px; border-radius:40px;"></form><div id="resultadoEmail"></div></div>` };
        programs[34] = { title: "6.1 Conexion BD", output: "<div style='background:white; padding:20px; border-radius:24px;'><h1>Conexion</h1><div style='background:#faf7ff; padding:15px; border-radius:20px;'><strong>Conexion con la base de datos conseguida.</strong></div></div>" };
        programs[35] = { title: "6.2 Consultas SELECT", output: "<table style='width:100%;'><thead><tr><th>ID</th><th>Nombre</th><th>Apellidos</th></tr></thead><tbody><tr><td>1</td><td>Juan</td><td>Perez</td></tr><tr><td>2</td><td>Maria</td><td>Gonzalez</td></tr></tbody></table>" };
        programs[36] = { title: "6.3 Insercion registros", output: `<div style="background:white; padding:20px; border-radius:24px;"><h1>Ejemplo de BD con PHP y MySQL</h1><form onsubmit="procesarInsercion(event)"><div>Nombre: <input type="text" id="dbNombre" style="border-radius:20px; border:1px solid #ede7ff; padding:8px;"></div><div>Apellidos: <input type="text" id="dbApellidos" style="border-radius:20px; border:1px solid #ede7ff; padding:8px;"></div><input type="submit" value="Grabar" style="background:#d4af37; border:none; padding:6px 20px; border-radius:40px; margin-top:10px;"></form><div id="mensajeInsercion"></div><hr><table border="1"><thead><tr><th>Nombre</th><th>Apellidos</th></tr></thead><tbody id="tablaRegistrosInsert"></tbody></table></div>` };
        programs[37] = { title: "6.4 Borrado registros", output: `<div style="background:white; padding:20px; border-radius:24px;"><h1>Ejemplo de BD con PHP y MySQL</h1><div id="mensajeDelete"></div><table border="1"><thead><tr><th>Nombre</th><th>Apellidos</th><th>Borrar</th></tr></thead><tbody id="tablaRegistrosDelete"></tbody></table></div>` };
        programs[38] = { title: "7.1 Autenticacion HTTP basica", output: `<div class="auth-container"><h1>Autenticacion HTTP Basic</h1><div id="resultadoAutenticacion"></div><button class="btn-iniciar" onclick="mostrarModalAuth()">Iniciar autenticacion</button></div>` };
        programs[39] = { title: "7.2 Validacion archivo", output: "Acceso concedido para: joe" };
        programs[40] = { title: "7.3 Validacion .htaccess", output: "Usuario autenticado" };
        programs[41] = { title: "7.4 Validacion MySQL", output: "Usuario autenticado via MySQL" };
        programs[42] = { title: "8.1 Inicializacion sesion", output: "ID de sesion generado" };
        programs[43] = { title: "8.2 Ejemplo sesion", output: "Contador de visitas" };
        programs[44] = { title: "8.3 Carrito compra", output: `<div style="background:white; padding:24px; border-radius:24px;"><h1>Carrito de compras</h1><form onsubmit="agregarAlCarrito(event)">Dime el producto <input type="text" id="productoInput" size="20" style="border-radius:20px; border:1px solid #ede7ff;"><br>Cuantas unidades <input type="text" id="cantidadInput" size="20" style="border-radius:20px; border:1px solid #ede7ff;"><br><input type="submit" value="Añadir a la cesta" style="background:#d4af37; border:none; border-radius:40px; padding:6px 18px;"></form><div id="mensajeCarrito"></div><div><strong>El contenido de la cesta de la compra es:</strong><br><div id="carritoLista"></div></div><button onclick="vaciarCarrito()" style="background:#f0eaff; border:none; border-radius:40px; padding:6px 18px;">Vaciar carrito</button></div>` };
        programs[45] = { title: "9.1 Establecer cookies", output: `<div class="cookie-container"><h1>Ejemplo de uso de cookie</h1><div id="formularioCookie"><form class="cookie-form" onsubmit="establecerCookieEjemplo(event)">Introduzca su nombre:<br><input type="text" id="cookieNombre" placeholder="Escriba su nombre"><br><input type="submit" value="Enviar"></form></div><div id="cookieInfo" style="display: none;"><div class="cookie-info">Se ha establecido una cookie de nombre <strong>ejemusuario</strong> con el valor: <strong class="cookie-valor" id="cookieValorMostrado"></strong> que será válida durante 1 hora.</div><button class="btn-volver" onclick="volverAlFormulario()">Volver</button></div><div id="cookieResultado"></div></div>` };
        programs[46] = { title: "9.1 Recuperar cookies", output: `<div class="cookie-container"><h1>Ejemplo de recuperar cookie</h1><div id="cookieRecuperadaResultado" style="margin-bottom: 20px;"><div class="cookie-info" style="background:#faf7ff;">Haga clic en el botón para recuperar la cookie "ejemusuario"</div></div><button onclick="recuperarCookie()" style="background: #d4af37; color: #2d1b4e; border: none; padding: 10px 25px; border-radius: 40px;">Recuperar cookie</button><div style="margin-top: 20px; font-size: 12px;">* Nota: Primero debe establecer una cookie usando el programa "9.1 Establecer cookies"</div></div>` };
        programs[47] = { title: "9.2 Cookie con array", output: "Preferencias guardadas: tema=oscuro, idioma=es" };
        programs[48] = { title: "Arrays asociativo", output: "Capitales: Madrid, Paris, Roma" };
        programs[49] = { title: "Arrays multidimensional", output: "Notas: Matematicas 8.5, Lengua 7.2" };
        programs[50] = { title: "Funciones retorno", output: "Area del circulo (radio=5): 78.54" };
        programs[51] = { title: "Variables estaticas", output: "Contador: 1, 2, 3" };
        programs[52] = { title: "Funciones variables", output: "Hola! Adios!" };
        programs[53] = { title: "foreach clave/valor", output: "Juan tiene 25, Ana tiene 30" };
        programs[54] = { title: "Funciones fecha", output: "Fecha actual: " + new Date().toLocaleDateString() };
        programs[55] = { title: "Funciones matematicas", output: "sqrt(16)=4, pow(2,3)=8, rand(1,10)=7" };
        programs[56] = { title: "include y require", output: "Diferencia: include genera warning, require genera fatal error" };
        programs[57] = { title: "Manejo archivos", output: "fopen, fread, fwrite - operaciones basicas" };
        programs[58] = { title: "Lectura archivos", output: "Contenido del archivo: linea1, linea2" };
        programs[59] = { title: "Escritura archivos", output: "Datos guardados correctamente" };
        programs[60] = { title: "10.1 Calendario Simple", output: "<h3>Abril 2026</h3><table border='1' cellpadding='8'><tr><th>Do</th><th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sa</th></tr><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td></tr><tr><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td></tr><tr><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td></tr><tr><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td></tr><tr><td>29</td><td>30</td><td></td><td></td><td></td><td></td><td></td></tr></table>" };

        // Renderizar menú completo (1 al 59)
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
                    btn.onclick = (function(id) { return function() { showProgram(id); }; })(i);
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
            outputBody.innerHTML = `<div class="program-title">Programa ${id}: ${program.title}</div><div class="output-block"><h4>Salida del programa:</h4>${program.output}</div>`;
            if (id === 36) setTimeout(() => window.mostrarTablaInsert(), 50);
            if (id === 37) setTimeout(() => window.mostrarTablaDelete(), 50);
            if (id === 44) setTimeout(() => window.mostrarCarrito(), 50);
            document.querySelectorAll('.program-btn').forEach(btn => btn.classList.remove('active'));
            const activeBtn = Array.from(document.querySelectorAll('.program-btn')).find(btn => btn.innerHTML.includes(`>${id}<`));
            if (activeBtn) activeBtn.classList.add('active');
        }

        function clearOutput() {
            const outputBody = document.getElementById('outputBody');
            if(outputBody) outputBody.innerHTML = `<div class="info-message">✦ Selecciona un programa del menu izquierdo (1 al 59) para ver la salida esperada ✦</div>`;
            document.querySelectorAll('.program-btn').forEach(btn => btn.classList.remove('active'));
        }

        document.addEventListener('DOMContentLoaded', function() { renderMenu(); });
    </script>
</body>
</html>
