<?php
date_default_timezone_set("America/Mexico_City");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">

<style>
  body{font-family: Arial, sans-serif; text-align:center; margin-top:40px;}
  input{padding:6px; margin:5px; width:80px;}
  button{padding:8px 15px; margin:6px;}
  #horaActual{font-size:2em; margin-top:20px; color:#2c3e50;}
  #estado{margin-top:10px;}
  #stopBtn{background:#e74c3c; color:white; border:none; padding:8px 15px; cursor:pointer;}
</style>
</head>
<body>
  <h2>Configura tu alarma exacta</h2>

  <form id="formAlarma">
    Hora: <input type="number" id="hora" min="0" max="23" required>
    Minuto: <input type="number" id="minuto" min="0" max="59" required>
    Segundo: <input type="number" id="segundo" min="0" max="59" required>
    <button type="submit">Activar</button>
    <button type="button" id="clearBtn">Borrar</button>
  </form>

  <div id="horaActual">--:--:--</div>
  <p id="estado">Alarma: <b>No programada</b></p>
  <button id="stopBtn" style="display:none">Detener sonido</button>

<script>
let horaAlarma=null, minutoAlarma=null, segundoAlarma=null;
let alarmActive=false, alarmTriggered=false;
let audioCtx=null, osc=null, gainNode=null;


function pad(n){ return n.toString().padStart(2,"0"); }


function actualizarHora(){
  let ahora = new Date();
  let h = ahora.getHours();
  let m = ahora.getMinutes();
  let s = ahora.getSeconds();

  document.getElementById("horaActual").textContent = `${pad(h)}:${pad(m)}:${pad(s)}`;

  if(alarmActive && !alarmTriggered){
    if(h === horaAlarma && m === minutoAlarma && s === segundoAlarma){
      alarmTriggered = true;
      alarmActive = false;
      document.getElementById("estado").innerHTML = "⏰ ¡Alarma activada!";
      alert(`⏰ ¡Son las ${pad(h)}:${pad(m)}:${pad(s)}!`);
      playTone();
    }
  }
}
setInterval(actualizarHora, 500);

// Crear contexto de audio
function ensureAudioContext(){
  if(!audioCtx){
    const AC = window.AudioContext || window.webkitAudioContext;
    audioCtx = new AC();
  }
  return audioCtx;
}

// Reproducir beep
function playTone(){
  const ctx = ensureAudioContext();
  osc = ctx.createOscillator();
  gainNode = ctx.createGain();

  osc.type = "sine";
  osc.frequency.value = 880; // tono agudo
  osc.connect(gainNode);
  gainNode.connect(ctx.destination);

  gainNode.gain.setValueAtTime(0.25, ctx.currentTime);
  osc.start();

  document.getElementById("stopBtn").style.display = "inline-block";
}

// Detener beep
function stopTone(){
  if(osc){
    osc.stop();
    osc.disconnect();
  }
  if(gainNode) gainNode.disconnect();
  osc=null; gainNode=null;
  document.getElementById("stopBtn").style.display = "none";
}

// Captura de formulario
document.getElementById("formAlarma").addEventListener("submit", function(e){
  e.preventDefault();
  horaAlarma = parseInt(document.getElementById("hora").value);
  minutoAlarma = parseInt(document.getElementById("minuto").value);
  segundoAlarma = parseInt(document.getElementById("segundo").value);
  alarmActive = true;
  alarmTriggered = false;
  ensureAudioContext();
  document.getElementById("estado").innerHTML = `Alarma programada para <b>${pad(horaAlarma)}:${pad(minutoAlarma)}:${pad(segundoAlarma)}</b>`;
});

// Botón borrar
document.getElementById("clearBtn").addEventListener("click", function(){
  alarmActive = false;
  alarmTriggered = false;
  horaAlarma = minutoAlarma = segundoAlarma = null;
  document.getElementById("estado").innerHTML = "Alarma: <b>No programada</b>";
});

// Botón detener sonido
document.getElementById("stopBtn").addEventListener("click", function(){
  stopTone();
  document.getElementById("estado").innerHTML = "Alarma: <b>No programada</b>";
});
</script>
</body>
</html>