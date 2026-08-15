<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>405 — Method Not Allowed</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Special+Elite&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#08080b;
    --wood:#1c140f;
    --wood-dark:#120d09;
    --blood:#7a0f0f;
    --blood-bright:#c22626;
    --bone:#c7c2b8;
    --eye:#8a9a5b;
  }

  *{box-sizing:border-box;}

  html,body{
    margin:0; padding:0;
    width:100%; height:100%;
    background:var(--bg);
    overflow:hidden;
  }

  body{
    font-family:'IBM Plex Mono', monospace;
    color:var(--bone);
  }

  .stage{
    position:relative;
    width:100vw; height:100vh;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:24px;
  }

  .eyebrow{
    font-family:'Special Elite', cursive;
    font-size:12px;
    letter-spacing:5px;
    color:var(--blood-bright);
    opacity:0.85;
    margin-bottom:28px;
  }

  /* ---------------- door ---------------- */
  .door-wrap{
    position:relative;
    width:min(220px, 46vw);
    margin-bottom:30px;
  }

  .door{
    position:relative;
    width:100%;
    aspect-ratio:5/8;
    background:
      repeating-linear-gradient(
        90deg,
        var(--wood) 0px, var(--wood) 14px,
        var(--wood-dark) 15px, var(--wood-dark) 16px
      );
    border:3px solid #0d0906;
    border-radius:4px 4px 2px 2px;
    box-shadow:
      inset 0 0 40px rgba(0,0,0,0.75),
      0 20px 60px rgba(0,0,0,0.6);
  }

  .peephole{
    position:absolute;
    top:32%;
    left:50%;
    transform:translate(-50%,-50%);
    width:15%;
    aspect-ratio:1;
    background:radial-gradient(circle at center, #030202 55%, #000 100%);
    border-radius:50%;
    box-shadow:0 0 0 4px #0d0906, inset 0 0 8px rgba(0,0,0,0.9);
    overflow:hidden;
  }

  .iris{
    position:absolute;
    top:50%; left:50%;
    width:60%; height:60%;
    border-radius:50%;
    background:radial-gradient(circle at 35% 35%, var(--eye), #29321a 70%);
    transform:translate(-50%,-50%);
    transition:transform 90ms linear;
  }
  .pupil{
    position:absolute;
    top:50%; left:50%;
    width:38%; height:38%;
    border-radius:50%;
    background:#020202;
    transform:translate(-50%,-50%);
  }
  .eyelid{
    position:absolute;
    inset:0;
    background:#050403;
    transform-origin:top;
    transform:scaleY(0);
  }
  .blinking .eyelid{
    animation:blink 260ms ease-in-out;
  }
  @keyframes blink{
    0%{ transform:scaleY(0); }
    45%{ transform:scaleY(1); }
    100%{ transform:scaleY(0); }
  }

  .chains{
    position:absolute;
    inset:0;
    pointer-events:none;
  }
  .chain{
    position:absolute;
    background:repeating-linear-gradient(
      90deg,
      #2a2622 0px, #2a2622 6px,
      #0e0c0a 7px, #0e0c0a 12px
    );
    box-shadow:0 1px 3px rgba(0,0,0,0.8);
  }
  .chain.c1{ top:18%; left:-4%; width:108%; height:9px; transform:rotate(-4deg); }
  .chain.c2{ top:64%; left:-4%; width:108%; height:9px; transform:rotate(3deg); }

  .lock{
    position:absolute;
    top:60%; left:50%;
    transform:translate(-50%,-50%);
    width:15%;
    aspect-ratio:0.85;
    background:linear-gradient(#3a332c, #201a15);
    border-radius:3px;
    box-shadow:0 2px 6px rgba(0,0,0,0.7);
  }
  .lock::before{
    content:'';
    position:absolute;
    top:-45%; left:50%;
    width:55%; height:55%;
    border:5px solid #2a241f;
    border-bottom:none;
    border-radius:50% 50% 0 0;
    transform:translateX(-50%);
  }

  .rune-row{
    position:absolute;
    left:0; right:0;
    bottom:-38px;
    display:flex;
    justify-content:center;
    gap:14px;
  }
  .rune{
    font-family:'IBM Plex Mono', monospace;
    font-size:10px;
    letter-spacing:1px;
    padding:4px 7px;
    border:1px solid rgba(199,194,184,0.25);
    border-radius:2px;
    color:rgba(199,194,184,0.55);
  }
  .rune.ok{
    color:var(--eye);
    border-color:rgba(138,154,91,0.4);
  }
  .rune.blocked{
    color:var(--blood-bright);
    border-color:rgba(194,38,38,0.5);
    position:relative;
  }
  .rune.blocked::after{
    content:'';
    position:absolute;
    left:2px; right:2px; top:50%;
    height:1px;
    background:var(--blood-bright);
    transform:rotate(-8deg);
  }

  /* ---------------- stamp ---------------- */
  .stamp{
    position:absolute;
    top:-8%;
    right:-14%;
    width:58%;
    color:var(--blood-bright);
    border:5px solid var(--blood-bright);
    border-radius:8px;
    padding:6px 4px;
    transform:rotate(-11deg) scale(3);
    opacity:0;
    text-align:center;
    mix-blend-mode:screen;
    animation:stampSlam 520ms 500ms cubic-bezier(.2,1.6,.4,1) forwards;
  }
  .stamp .code{
    font-family:'Special Elite', cursive;
    font-size:clamp(28px, 6vw, 46px);
    line-height:1;
    display:block;
  }
  .stamp .label{
    font-size:8px;
    letter-spacing:2px;
    display:block;
  }
  @keyframes stampSlam{
    0%{ opacity:0; transform:rotate(-11deg) scale(3); }
    60%{ opacity:0.9; transform:rotate(-11deg) scale(0.94); }
    80%{ transform:rotate(-11deg) scale(1.04); }
    100%{ opacity:0.92; transform:rotate(-11deg) scale(1); }
  }

  .shake{
    animation:shake 420ms 480ms ease-out;
  }
  @keyframes shake{
    0%{ transform:translate(0,0); }
    20%{ transform:translate(-6px,2px); }
    40%{ transform:translate(5px,-2px); }
    60%{ transform:translate(-4px,1px); }
    80%{ transform:translate(3px,-1px); }
    100%{ transform:translate(0,0); }
  }

  /* ---------------- text block ---------------- */
  .subtitle{
    margin-top:52px;
    font-size:14px;
    letter-spacing:3px;
    color:var(--bone);
    opacity:0.7;
  }

  .desc{
    max-width:420px;
    margin:20px auto 0;
    font-size:13px;
    line-height:1.7;
    opacity:0.55;
  }

  .allowed{
    margin-top:10px;
    font-size:12px;
    letter-spacing:1px;
    opacity:0.5;
  }
  .allowed b{
    color:var(--eye);
    font-weight:600;
  }

  .btn{
    display:inline-block;
    margin-top:32px;
    padding:14px 30px;
    background:transparent;
    border:1px solid rgba(199,194,184,0.35);
    color:var(--bone);
    font-family:'IBM Plex Mono', monospace;
    font-size:12px;
    letter-spacing:3px;
    text-decoration:none;
    text-transform:uppercase;
    transition:border-color 200ms ease, color 200ms ease;
  }
  .btn:hover{
    border-color:var(--blood-bright);
    color:var(--blood-bright);
    animation:btnGlitch 260ms steps(2) infinite;
  }
  @keyframes btnGlitch{
    0%{ transform:translate(0,0); }
    50%{ transform:translate(1px,-1px); }
    100%{ transform:translate(-1px,0); }
  }
  .btn:focus-visible{
    outline:2px solid var(--blood-bright);
    outline-offset:3px;
  }

  .footnote{
    margin-top:14px;
    font-size:11px;
    letter-spacing:1px;
    opacity:0.35;
    font-family:'Special Elite', cursive;
  }

  /* ---------------- overlays ---------------- */
  .scanlines{
    position:fixed; inset:0; pointer-events:none; z-index:30;
    background:repeating-linear-gradient(
      to bottom,
      rgba(0,0,0,0.18) 0px, rgba(0,0,0,0.18) 1px,
      transparent 2px, transparent 3px
    );
    mix-blend-mode:overlay;
  }
  .vignette{
    position:fixed; inset:0; pointer-events:none; z-index:31;
    box-shadow: inset 0 0 200px 60px rgba(0,0,0,0.9);
  }

  .log{
    position:fixed;
    top:22px; left:28px;
    font-size:12px;
    letter-spacing:1px;
    opacity:0.7;
    z-index:20;
    display:flex;
    align-items:center;
    gap:8px;
  }
  .log-dot{
    width:8px;height:8px;border-radius:50%;
    background:var(--blood-bright);
    box-shadow:0 0 6px var(--blood-bright);
  }

  @media (max-width:600px){
    .desc{ font-size:12px; }
    .log{ font-size:10px; top:14px; left:14px; }
    .stamp{ right:-8%; width:64%; }
  }

  @media (prefers-reduced-motion: reduce){
    .stamp{ animation:none; opacity:0.92; transform:rotate(-11deg) scale(1); }
    .shake{ animation:none; }
    .blinking .eyelid{ animation:none; }
    .btn:hover{ animation:none; }
  }
</style>
</head>
<body>

<div class="stage" id="stage">
  <div class="eyebrow">ACCESS ATTEMPT REJECTED</div>

  <div class="door-wrap">
    <div class="door" id="door">
      <div class="chains">
        <div class="chain c1"></div>
        <div class="chain c2"></div>
      </div>
      <div class="peephole">
        <div class="iris" id="iris">
          <div class="pupil"></div>
        </div>
        <div class="eyelid" id="eyelid"></div>
      </div>
      <div class="lock"></div>
      <div class="stamp shake">
        <span class="code">405</span>
        <span class="label">NOT ALLOWED</span>
      </div>
    </div>
    <div class="rune-row">
      <span class="rune ok">GET</span>
      <span class="rune ok">POST</span>
      <span class="rune blocked">TRACE</span>
    </div>
  </div>

  <div class="subtitle">WRONG METHOD. WRONG DOOR.</div>
  <p class="desc">Something is watching through the hole in the door, and whatever you knocked with wasn't welcome. This entrance only answers to certain methods — try one of those instead.</p>
  <p class="allowed">Allowed here: <b>GET</b>, <b>POST</b></p>

  <a href="/" class="btn" id="tryBtn">Try a different way in</a>
  <div class="footnote">it's still watching</div>
</div>

<div class="scanlines"></div>
<div class="vignette"></div>

<div class="log">
  <span class="log-dot"></span>
  <span id="logText">ATTEMPTS: 001</span>
</div>

<script>
(function(){
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var door = document.getElementById('door');
  var iris = document.getElementById('iris');
  var eyelid = document.getElementById('eyelid');
  var logText = document.getElementById('logText');
  var tryBtn = document.getElementById('tryBtn');
  var attempts = 1;

  // eye tracks pointer, clamped to a small radius inside the socket
  function movePupil(clientX, clientY){
    var rect = iris.parentElement.getBoundingClientRect();
    var cx = rect.left + rect.width/2;
    var cy = rect.top + rect.height/2;
    var dx = clientX - cx;
    var dy = clientY - cy;
    var dist = Math.min(Math.hypot(dx,dy), 40);
    var angle = Math.atan2(dy,dx);
    var r = dist * 0.12;
    var ox = Math.cos(angle) * r;
    var oy = Math.sin(angle) * r;
    iris.style.transform = 'translate(calc(-50% + ' + ox + 'px), calc(-50% + ' + oy + 'px))';
  }

  window.addEventListener('pointermove', function(e){
    movePupil(e.clientX, e.clientY);
  });

  // idle drift when pointer hasn't moved, so it feels alive rather than dead
  var idleAngle = 0;
  if(!reduced){
    setInterval(function(){
      idleAngle += 0.4;
    }, 800);
  }

  // random blinking
  function scheduleBlink(){
    var delay = 2000 + Math.random()*4500;
    setTimeout(function(){
      if(!reduced){
        eyelid.parentElement.classList.add('blinking');
        setTimeout(function(){ eyelid.parentElement.classList.remove('blinking'); }, 280);
      }
      scheduleBlink();
    }, delay);
  }
  if(!reduced) scheduleBlink();

  // clicking "try a different way in" logs another failed attempt and rattles the door
  tryBtn.addEventListener('click', function(e){
    e.preventDefault();
    attempts++;
    logText.textContent = 'ATTEMPTS: ' + String(attempts).padStart(3,'0');
    if(!reduced){
      door.classList.remove('shake');
      void door.offsetWidth;
      door.style.animation = 'shake 420ms ease-out';
      setTimeout(function(){ door.style.animation = ''; }, 450);
    }
    setTimeout(function(){ window.location.href = '/'; }, 480);
  });
})();
</script>

</body>
</html>