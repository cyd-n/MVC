<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 — SIGNAL LOST</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Special+Elite&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#060505;
    --ink:#c7c2b8;
    --blood:#6b0f0f;
    --blood-bright:#c22a2a;
    --sick:#35402f;
    --x:50%;
    --y:50%;
  }

  *{box-sizing:border-box;}

  html,body{
    margin:0;
    padding:0;
    width:100%;
    height:100%;
    background:var(--bg);
    overflow:hidden;
    cursor:none;
  }

  body{
    font-family:'IBM Plex Mono', monospace;
    color:var(--ink);
  }

  .stage{
    position:relative;
    width:100vw;
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
  }

  /* ---------- hidden scene (revealed by flashlight) ---------- */
  .scene{
    position:absolute;
    inset:0;
    background:
      radial-gradient(ellipse at 20% 30%, rgba(53,64,47,0.12), transparent 40%),
      radial-gradient(ellipse at 80% 75%, rgba(107,15,15,0.10), transparent 45%),
      #08070a;
  }

  .figure{
    position:absolute;
    width:90px;
    filter:blur(0.2px);
    opacity:0.9;
  }
  .figure svg{ width:100%; display:block; }
  .figure.f1{ left:6%; bottom:0; width:120px; }
  .figure.f2{ right:9%; top:10%; width:70px; transform:scaleY(1.1); }
  .figure.f3{ left:46%; top:6%; width:50px; opacity:0.75; }

  .eye{
    fill:var(--blood-bright);
  }

  .whisper{
    position:absolute;
    font-family:'Special Elite', cursive;
    color:var(--blood-bright);
    font-size:13px;
    letter-spacing:2px;
    opacity:0.8;
    text-shadow:0 0 6px rgba(194,42,42,0.6);
  }
  .whisper.w1{ top:22%; left:12%; }
  .whisper.w2{ bottom:16%; right:14%; }
  .whisper.w3{ top:60%; left:60%; }

  /* ---------- darkness overlay with flashlight cutout ---------- */
  .dark{
    position:absolute;
    inset:0;
    background:#020202;
    -webkit-mask-image: radial-gradient(circle at var(--x) var(--y), transparent 0px, transparent 60px, rgba(0,0,0,0.55) 130px, black 230px);
    mask-image: radial-gradient(circle at var(--x) var(--y), transparent 0px, transparent 60px, rgba(0,0,0,0.55) 130px, black 230px);
    transition:mask-image 60ms linear;
    z-index:5;
  }

  .flicker-dark{
    animation:beamFlicker 6.3s infinite steps(1);
  }
  @keyframes beamFlicker{
    0%,96%,100%{ filter:brightness(1); }
    97%{ filter:brightness(0.4); }
    98%{ filter:brightness(1.3); }
    99%{ filter:brightness(0.2); }
  }

  /* ---------- main content ---------- */
  .content{
    position:relative;
    z-index:10;
    text-align:center;
    padding:0 24px;
    pointer-events:none;
  }

  .timecode{
    position:fixed;
    top:22px;
    left:28px;
    font-size:12px;
    letter-spacing:1px;
    color:var(--ink);
    opacity:0.75;
    z-index:20;
    display:flex;
    align-items:center;
    gap:8px;
  }
  .rec-dot{
    width:8px;height:8px;border-radius:50%;
    background:var(--blood-bright);
    animation:blink 1.1s infinite;
    box-shadow:0 0 6px var(--blood-bright);
  }
  @keyframes blink{ 0%,45%{opacity:1;} 50%,95%{opacity:0.15;} 100%{opacity:1;} }

  .eyebrow{
    font-family:'Special Elite', cursive;
    font-size:12px;
    letter-spacing:5px;
    color:var(--blood-bright);
    opacity:0.85;
    margin-bottom:18px;
  }

  h1{
    font-family:'Special Elite', cursive;
    font-size:clamp(90px, 20vw, 200px);
    line-height:0.9;
    margin:0;
    position:relative;
    letter-spacing:4px;
    color:var(--ink);
    text-shadow:0 0 30px rgba(0,0,0,0.8);
  }

  h1 .glitch-layer{
    position:absolute;
    inset:0;
    left:0; top:0; width:100%;
    pointer-events:none;
  }

  .glitching h1{
    animation:jitter 140ms steps(2) 1;
  }
  .glitching h1::before,
  .glitching h1::after{
    content:'404';
    position:absolute;
    inset:0;
    animation:none;
  }
  .glitching h1::before{
    color:var(--blood-bright);
    transform:translate(3px,0);
    clip-path:inset(20% 0 55% 0);
    mix-blend-mode:screen;
  }
  .glitching h1::after{
    color:var(--sick);
    transform:translate(-3px,0);
    clip-path:inset(60% 0 10% 0);
    mix-blend-mode:screen;
  }
  @keyframes jitter{
    0%{ transform:translate(0,0); }
    30%{ transform:translate(-2px,1px); }
    60%{ transform:translate(2px,-1px); }
    100%{ transform:translate(0,0); }
  }

  .subtitle{
    font-size:14px;
    letter-spacing:3px;
    color:var(--ink);
    opacity:0.65;
    margin-top:18px;
  }

  .desc{
    max-width:440px;
    margin:26px auto 0;
    font-size:13px;
    line-height:1.7;
    color:var(--ink);
    opacity:0.55;
  }

  .btn{
    pointer-events:auto;
    display:inline-block;
    margin-top:38px;
    padding:14px 32px;
    background:transparent;
    border:1px solid rgba(199,194,184,0.35);
    color:var(--ink);
    font-family:'IBM Plex Mono', monospace;
    font-size:12px;
    letter-spacing:3px;
    text-decoration:none;
    text-transform:uppercase;
    transition:border-color 200ms ease, color 200ms ease;
    position:relative;
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

  /* ---------- scanlines + vignette ---------- */
  .scanlines{
    position:fixed;
    inset:0;
    pointer-events:none;
    z-index:30;
    background:repeating-linear-gradient(
      to bottom,
      rgba(0,0,0,0.18) 0px,
      rgba(0,0,0,0.18) 1px,
      transparent 2px,
      transparent 3px
    );
    mix-blend-mode:overlay;
  }
  .vignette{
    position:fixed;
    inset:0;
    pointer-events:none;
    z-index:31;
    box-shadow: inset 0 0 200px 60px rgba(0,0,0,0.9);
  }

  canvas#static{
    position:fixed;
    inset:0;
    width:100%;
    height:100%;
    pointer-events:none;
    z-index:32;
    opacity:0.05;
    mix-blend-mode:overlay;
  }

  /* custom flashlight cursor dot */
  .cursor-dot{
    position:fixed;
    width:6px;height:6px;
    border-radius:50%;
    background:rgba(199,194,184,0.8);
    transform:translate(-50%,-50%);
    pointer-events:none;
    z-index:40;
    box-shadow:0 0 10px 3px rgba(199,194,184,0.5);
  }

  @media (max-width:600px){
    .desc{ font-size:12px; padding:0 10px; }
    .timecode{ font-size:10px; top:14px; left:14px; }
  }

  @media (prefers-reduced-motion: reduce){
    .rec-dot, .glitching h1, .btn:hover, .flicker-dark{ animation:none !important; }
    canvas#static{ display:none; }
  }
</style>
</head>
<body>

<div class="stage">
  <div class="scene">
    <div class="figure f1">
      <svg viewBox="0 0 100 220" xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="50" cy="26" rx="17" ry="21" fill="#000"/>
        <path d="M22,46 Q50,40 78,46 L84,190 Q50,208 16,190 Z" fill="#000"/>
        <circle class="eye" cx="42" cy="24" r="2.2"/>
        <circle class="eye" cx="58" cy="24" r="2.2"/>
      </svg>
    </div>
    <div class="figure f2">
      <svg viewBox="0 0 100 220" xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="50" cy="26" rx="17" ry="21" fill="#000"/>
        <path d="M22,46 Q50,40 78,46 L84,190 Q50,208 16,190 Z" fill="#000"/>
        <circle class="eye" cx="43" cy="25" r="2"/>
        <circle class="eye" cx="57" cy="25" r="2"/>
      </svg>
    </div>
    <div class="figure f3">
      <svg viewBox="0 0 100 220" xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="50" cy="26" rx="17" ry="21" fill="#000"/>
        <path d="M22,46 Q50,40 78,46 L84,190 Q50,208 16,190 Z" fill="#000"/>
        <circle class="eye" cx="44" cy="25" r="1.6"/>
        <circle class="eye" cx="56" cy="25" r="1.6"/>
      </svg>
    </div>

    <div class="whisper w1">it saw you first</div>
    <div class="whisper w2">stop looking</div>
    <div class="whisper w3">go back</div>
  </div>

  <div class="dark flicker-dark" id="dark"></div>

  <div class="content">
    <div class="eyebrow">SIGNAL INTERRUPTED</div>
    <h1 id="glitchTitle">404</h1>
    <div class="subtitle">THIS PAGE WAS TAKEN</div>
    <p class="desc">The page you're looking for isn't here anymore. Something moved it, or moved through it. Whichever way you came from — go back the same way.</p>
    <a href="/" class="btn">Return to safety</a>
  </div>
</div>

<div class="scanlines"></div>
<div class="vignette"></div>
<canvas id="static"></canvas>
<div class="cursor-dot" id="cursorDot"></div>

<div class="timecode">
  <span class="rec-dot"></span>
  <span id="tc">REC 00:00:00</span>
</div>

<script>
(function(){
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var dark = document.getElementById('dark');
  var dot = document.getElementById('cursorDot');
  var root = document.documentElement;

  // flashlight follows pointer
  var targetX = window.innerWidth/2, targetY = window.innerHeight/2;
  var curX = targetX, curY = targetY;

  window.addEventListener('pointermove', function(e){
    targetX = e.clientX;
    targetY = e.clientY;
  });
  window.addEventListener('touchmove', function(e){
    if(e.touches && e.touches[0]){
      targetX = e.touches[0].clientX;
      targetY = e.touches[0].clientY;
    }
  });

  function raf(){
    curX += (targetX - curX) * 0.18;
    curY += (targetY - curY) * 0.18;
    root.style.setProperty('--x', curX + 'px');
    root.style.setProperty('--y', curY + 'px');
    dot.style.left = targetX + 'px';
    dot.style.top = targetY + 'px';
    requestAnimationFrame(raf);
  }
  raf();

  // glitch the 404 title at random intervals
  var title = document.getElementById('glitchTitle').parentElement;
  function scheduleGlitch(){
    var delay = 2200 + Math.random()*4200;
    setTimeout(function(){
      if(!reduced){
        title.classList.add('glitching');
        setTimeout(function(){ title.classList.remove('glitching'); }, 160);
      }
      scheduleGlitch();
    }, delay);
  }
  if(!reduced) scheduleGlitch();

  // fake VHS timecode counter
  var seconds = 0;
  var tc = document.getElementById('tc');
  setInterval(function(){
    seconds++;
    var h = String(Math.floor(seconds/3600)).padStart(2,'0');
    var m = String(Math.floor((seconds%3600)/60)).padStart(2,'0');
    var s = String(seconds%60).padStart(2,'0');
    tc.textContent = 'REC ' + h + ':' + m + ':' + s;
  }, 1000);

  // subtle static noise
  if(!reduced){
    var canvas = document.getElementById('static');
    var ctx = canvas.getContext('2d');
    function resize(){
      canvas.width = window.innerWidth * 0.25;
      canvas.height = window.innerHeight * 0.25;
    }
    resize();
    window.addEventListener('resize', resize);

    function drawStatic(){
      var w = canvas.width, h = canvas.height;
      var imgData = ctx.createImageData(w, h);
      for(var i=0; i<imgData.data.length; i+=4){
        var v = Math.random() * 255;
        imgData.data[i] = v;
        imgData.data[i+1] = v;
        imgData.data[i+2] = v;
        imgData.data[i+3] = 255;
      }
      ctx.putImageData(imgData, 0, 0);
    }
    setInterval(drawStatic, 120);
  }
})();
</script>

</body>
</html>