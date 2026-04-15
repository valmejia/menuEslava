<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Menú de Programas PHP</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: "Poppins", sans-serif;
      display: flex;
      height: 100vh;
      background: #f8fafc;
      color: #374151;
    }

    /* Visor principal */
    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      padding: 15px;
    }

    header {
      background: #2563eb;
      color: white;
      padding: 12px 20px;
      font-size: 18px;
      font-weight: 600;
      border-radius: 8px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    header i {
      font-size: 20px;
    }

    iframe {
      flex: 1;
      border: 1px solid #e5e7eb;
      background: white;
      border-radius: 8px;
    }

    /* Sidebar a la derecha */
    aside {
      width: 250px;
      background: #ffffff;
      border-left: 1px solid #e5e7eb;
      display: flex;
      flex-direction: column;
      padding: 15px;
      box-shadow: -2px 0 8px rgba(0,0,0,0.05);
    }

    aside h2 {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 15px;
      color: #2563eb;
      text-align: center;
    }

    .contenedor-programas {
      flex: 1;
      display: grid;
      grid-template-columns: 1fr;
      gap: 12px;
      overflow-y: auto;
    }

    .card {
      background: #f9fafb;
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      padding: 12px;
      text-align: center;
      font-size: 14px;
      cursor: pointer;
      transition: background 0.2s, transform 0.2s;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
    }

    .card i {
      font-size: 22px;
      color: #2563eb;
    }

    .card:hover {
      background: #eef2ff;
      transform: translateY(-2px);
    }

    /* Scroll */
    .contenedor-programas::-webkit-scrollbar { width: 6px; }
    .contenedor-programas::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 10px;
    }
  </style>
</head>
<body>

  <!-- Visor principal -->
  <main>
    <header><i class="fa-solid fa-laptop-code"></i> Visor de Programas</header>
    <iframe id="visor"></iframe>
  </main>

  <!-- Menú lateral derecho -->
  <aside>
    <h2><i class="fa-solid fa-cubes"></i> Programas</h2>
    <div class="contenedor-programas">
      <?php
      $carpeta = __DIR__;
      $archivos = scandir($carpeta);

      $primero = "";
      $primeroNombre = "";

      foreach ($archivos as $archivo) {
          if (pathinfo($archivo, PATHINFO_EXTENSION) == "php" && $archivo != "index.php") {
              $nombre = ucfirst(basename($archivo, ".php")); 
              $ruta = $archivo;
              if ($primero == "") {
                  $primero = $ruta; 
                  $primeroNombre = $nombre;
              }
              echo "<div class='card' onclick=\"cargar('$ruta', '$nombre')\">
                      <i class='fa-solid fa-file-code'></i>
                      $nombre
                    </div>";
          }
      }
      ?>
    </div>
  </aside>

  <script>
    function cargar(ruta, nombre) {
      document.getElementById("visor").src = ruta;
    }

    <?php if ($primero != ""): ?>
      window.onload = function() {
        cargar("<?= $primero ?>", "<?= $primeroNombre ?>");
      };
    <?php endif; ?>
  </script>

</body>
</html>
