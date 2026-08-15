<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 — Lost Beyond the Styx</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=EB+Garamond:ital@0;1&display=swap" rel="stylesheet">
<style>
  :root{
    --night:#05090a;
    --night-2:#02040a;
    --marble:#d9dcd2;
    --stygian:#23413b;
    --stygian-bright:#6fae9c;
    --gold:#b98d3e;
    --gold-bright:#e6bd6d;
  }

  *{box-sizing:border-box;}
  html,body{
    margin:0; padding:0;
    width:100%; height:100%;
    background:var(--night);
    overflow:hidden;
    cursor:none;
  }
  body{
    font-family:'EB Garamond', serif;
    color:var(--marble);
  }

  .sky{
    position:fixed; inset:0;
    background:radial-gradient(ellipse at 50% 30%, #0c1a18 0%, var(--night) 55%, var(--night-2) 100%);
    z-index:0;
  }
  .fog{
    position:fixed; inset:0;
    z-index:1;
    background:
      radial-gradient(ellipse 60% 30% at 20% 85%, rgba(111,174,156,0.10), transparent 60%),
      radial-gradient(ellipse 50% 25% at 80% 90%, rgba(111,174,156,0.08), transparent 60%);
    animation:fogDrift 22s ease-in-out infinite alternate;
  }
  @keyframes fogDrift{
    0%{ transform:translateX(-3%); }
    100%{ transform:translateX(3%); }
  }

  .river{
    position:fixed;
    left:0; right:0; bottom:0;
    height:22vh;
    z-index:2;
    background:linear-gradient(180deg, transparent, rgba(35,65,59,0.55) 40%, rgba(10,20,18,0.9));
  }
  .river svg{ position:absolute; bottom:0; width:100%; height:60px; opacity:0.5; }

  /* ---------------- hidden scene (revealed by lantern) ---------------- */
  .scene{
    position:fixed; inset:0;
    z-index:3;
  }

  .shade{
    position:absolute;
    width:70px;
    opacity:0.85;
    filter:blur(0.3px);
  }
  .shade svg{ width:100%; display:block; }
  .shade.s1{ left:14%; bottom:14%; width:90px; }
  .shade.s2{ right:18%; bottom:20%; width:60px; }
  .shade.s3{ left:48%; bottom:10%; width:50px; opacity:0.7; }

  .boat{
    position:absolute;
    bottom:9%;
    left:-140px;
    width:120px;
    opacity:0.9;
    animation:drift 34s linear infinite;
  }
  @keyframes drift{
    0%{ left:-140px; }
    100%{ left:110%; }
  }

  .cerberus{
    position:absolute;
    right:6%;
    bottom:12%;
    width:100px;
    opacity:0.9;
  }
  .cerberus .eye{
    fill:var(--gold-bright);
    animation:eyeGlow 2.6s ease-in-out infinite;
  }
  @keyframes eyeGlow{
    0%,100%{ opacity:0.5; }
    50%{ opacity:1; }
  }

  .whisper{
    position:absolute;
    font-family:'EB Garamond', serif;
    font-style:italic;
    color:var(--stygian-bright);
    font-size:14px;
    letter-spacing:1px;
    opacity:0.75;
  }
  .whisper.w1{ top:24%; left:10%; }
  .whisper.w2{ bottom:30%; right:12%; }
  .whisper.w3{ top:56%; left:58%; }

  /* ---------------- lantern darkness overlay ---------------- */
  .dark{
    position:fixed; inset:0;
    background:#010202;
    -webkit-mask-image: radial-gradient(circle at var(--x) var(--y), transparent 0px, transparent 70px, rgba(0,0,0,0.55) 150px, black 260px);
    mask-image: radial-gradient(circle at var(--x) var(--y), transparent 0px, transparent 70px, rgba(0,0,0,0.55) 150px, black 260px);
    z-index:5;
  }

  /* ---------------- content ---------------- */
  .stage{
    position:relative;
    z-index:10;
    width:100vw; height:100vh;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:24px;
    pointer-events:none;
  }

  .eyebrow{
    font-family:'Cinzel', serif;
    font-size:12px;
    letter-spacing:5px;
    color:var(--stygian-bright);
    margin-bottom:24px;
  }

  .arch-wrap{
    position:relative;
    width:170px;
    margin-bottom:22px;
  }
  .arch{
    width:100%;
    height:170px;
    border-radius:85px 85px 4px 4px;
    background:
      radial-gradient(ellipse at 50% 30%, rgba(111,174,156,0.18), transparent 65%),
      linear-gradient(180deg, #14201d, #060a09);
    border:2px solid #1c2b27;
    box-shadow:inset 0 0 40px rgba(0,0,0,0.8);
    position:relative;
  }
  .arch::after{
    content:'';
    position:absolute;
    inset:16px;
    border-radius:70px 70px 3px 3px;
    background:radial-gradient(ellipse at 50% 100%, rgba(111,174,156,0.12), transparent 70%);
  }

  .seal{
    position:absolute;
    top:-8px; left:50%;
    transform:translate(-50%,-50%) scale(0.4) rotate(-4deg);
    width:96px; height:96px;
    border-radius:50%;
    background:radial-gradient(circle at 35% 30%, #1a2622, #0a0d0c 75%);
    border:3px solid var(--gold);
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
    opacity:0;
    animation:sealRise 700ms 500ms cubic-bezier(.2,1.4,.4,1) forwards;
  }
  @keyframes sealRise{
    0%{ opacity:0; transform:translate(-50%,-50%) scale(0.2) rotate(-4deg); }
    70%{ opacity:1; transform:translate(-50%,-50%) scale(1.06) rotate(-4deg); box-shadow:0 0 24px 4px rgba(111,174,156,0.4); }
    100%{ opacity:1; transform:translate(-50%,-50%) scale(1) rotate(-4deg); box-shadow:0 0 10px 2px rgba(111,174,156,0.2); }
  }
  .seal .code{
    font-family:'Cinzel', serif;
    font-weight:700;
    font-size:24px;
    color:var(--stygian-bright);
    letter-spacing:1px;
  }
  .seal .label{
    font-family:'Cinzel', serif;
    font-size:6px;
    letter-spacing:1.5px;
    color:var(--gold-bright);
    margin-top:2px;
  }

  .chthonic{
    position:absolute;
    top:50%; left:50%;
    width:1px; height:1px;
  }
  .medallion{
    position:absolute;
    top:0; left:0;
    width:24px; height:24px;
    transform:
      rotate(calc(var(--i) * 90deg + 45deg))
      translate(96px)
      rotate(calc(var(--i) * -90deg - 45deg))
      translate(-12px,-12px);
    border-radius:50%;
    background:radial-gradient(circle at 35% 30%, #16211d, #080b0a 80%);
    border:1px solid rgba(111,174,156,0.5);
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .medallion svg{ width:13px; height:13px; }

  .subtitle{
    margin-top:20px;
    font-family:'Cinzel', serif;
    font-size:14px;
    letter-spacing:3px;
    opacity:0.9;
  }
  .desc{
    max-width:440px;
    margin:20px auto 0;
    font-size:16px;
    font-style:italic;
    line-height:1.7;
    opacity:0.75;
  }
  .allowed{
    margin-top:12px;
    font-size:13px;
    letter-spacing:1px;
    opacity:0.55;
  }

  .btn{
    pointer-events:auto;
    display:inline-block;
    margin-top:32px;
    padding:14px 32px;
    background:transparent;
    border:1px solid rgba(111,174,156,0.5);
    color:var(--stygian-bright);
    font-family:'Cinzel', serif;
    font-size:11px;
    letter-spacing:3px;
    text-decoration:none;
    text-transform:uppercase;
    transition:border-color 200ms ease, background 200ms ease, box-shadow 200ms ease;
  }
  .btn:hover{
    border-color:var(--stygian-bright);
    background:rgba(111,174,156,0.08);
    box-shadow:0 0 16px rgba(111,174,156,0.3);
  }
  .btn:focus-visible{
    outline:2px solid var(--stygian-bright);
    outline-offset:3px;
  }

  .footnote{
    margin-top:16px;
    font-size:12px;
    letter-spacing:1px;
    opacity:0.4;
    font-style:italic;
  }

  .cursor-dot{
    position:fixed;
    width:6px; height:6px;
    border-radius:50%;
    background:var(--stygian-bright);
    transform:translate(-50%,-50%);
    pointer-events:none;
    z-index:40;
    box-shadow:0 0 12px 4px rgba(111,174,156,0.6);
  }

  .vignette{
    position:fixed; inset:0;
    pointer-events:none;
    z-index:31;
    box-shadow: inset 0 0 220px 70px rgba(0,0,0,0.9);
  }

  @media (max-width:600px){
    .chthonic{ display:none; }
    .desc{ font-size:14px; }
    .arch-wrap{ width:130px; }
    .arch{ height:130px; }
  }

  @media (prefers-reduced-motion: reduce){
    .fog, .boat, .cerberus .eye, .seal{ animation:none; }
    .seal{ opacity:1; transform:translate(-50%,-50%) scale(1) rotate(-4deg); }
    .dark{ mask-image:none; -webkit-mask-image:none; opacity:0.15; }
  }
</style>
</head>
<body>

<div class="sky"></div>
<div class="fog"></div>

<div class="scene">
  <div class="shade s1">
    <svg viewBox="0 0 60 140" xmlns="http://www.w3.org/2000/svg">
      <ellipse cx="30" cy="20" rx="12" ry="15" fill="rgba(217,220,210,0.35)"/>
      <path d="M12,32 Q30,26 48,32 L54,130 Q30,142 6,130 Z" fill="rgba(217,220,210,0.22)"/>
    </svg>
  </div>
  <div class="shade s2">
    <svg viewBox="0 0 60 140" xmlns="http://www.w3.org/2000/svg">
      <ellipse cx="30" cy="20" rx="12" ry="15" fill="rgba(217,220,210,0.3)"/>
      <path d="M12,32 Q30,26 48,32 L54,130 Q30,142 6,130 Z" fill="rgba(217,220,210,0.18)"/>
    </svg>
  </div>
  <div class="shade s3">
    <svg viewBox="0 0 60 140" xmlns="http://www.w3.org/2000/svg">
      <ellipse cx="30" cy="20" rx="12" ry="15" fill="rgba(217,220,210,0.28)"/>
      <path d="M12,32 Q30,26 48,32 L54,130 Q30,142 6,130 Z" fill="rgba(217,220,210,0.16)"/>
    </svg>
  </div>

  <div class="boat">
    <svg viewBox="0 0 140 70" xmlns="http://www.w3.org/2000/svg">
      <path d="M5,50 Q70,70 135,50 L120,58 Q70,66 20,58 Z" fill="#0e1614"/>
      <rect x="66" y="14" width="3" height="38" fill="#0e1614"/>
      <ellipse cx="67" cy="10" rx="9" ry="11" fill="rgba(111,174,156,0.35)"/>
      <path d="M50,16 Q66,8 84,16 L86,40 Q66,48 48,40 Z" fill="rgba(111,174,156,0.18)"/>
    </svg>
  </div>

  <div class="cerberus">
    <svg viewBox="0 0 140 90" xmlns="http://www.w3.org/2000/svg">
      <circle cx="35" cy="45" r="22" fill="#0a0e0c"/>
      <circle cx="70" cy="35" r="26" fill="#0a0e0c"/>
      <circle cx="105" cy="45" r="22" fill="#0a0e0c"/>
      <polygon points="20,28 28,10 36,28" fill="#0a0e0c"/>
      <polygon points="55,18 63,2 71,18" fill="#0a0e0c"/>
      <polygon points="69,18 77,2 85,18" fill="#0a0e0c"/>
      <polygon points="90,28 98,10 106,28" fill="#0a0e0c"/>
      <circle class="eye" cx="29" cy="43" r="2"/>
      <circle class="eye" cx="41" cy="43" r="2"/>
      <circle class="eye" cx="64" cy="33" r="2"/>
      <circle class="eye" cx="76" cy="33" r="2"/>
      <circle class="eye" cx="99" cy="43" r="2"/>
      <circle class="eye" cx="111" cy="43" r="2"/>
    </svg>
  </div>

  <div class="whisper w1">no one returns</div>
  <div class="whisper w2">it fell in the river</div>
  <div class="whisper w3">the ferryman remembers you</div>
</div>

<div class="river">
  <svg viewBox="0 0 1000 60" preserveAspectRatio="none">
    <path d="M0,30 Q250,10 500,30 T1000,30 V60 H0 Z" fill="var(--stygian)"/>
  </svg>
</div>

<div class="dark" id="dark"></div>

<div class="stage">
  <div class="eyebrow">LOST BEYOND THE STYX</div>

  <div class="arch-wrap">
    <div class="arch"></div>
    <div class="seal">
      <span class="code">404</span>
      <span class="label">NOT FOUND</span>
    </div>
    <div class="chthonic" id="chthonic"></div>
  </div>

  <div class="subtitle">THIS PAGE HAS CROSSED THE RIVER</div>
  <p class="desc">What you're looking for isn't on this side anymore. Charon carried it across, and whatever crosses the Styx does not come back the way it went.</p>
  <p class="allowed">You may still return, while you can.</p>

  <a href="/" class="btn">Pay the ferryman, go back</a>
  <div class="footnote">οὐδεὶς ἐπιστρέφει — no one returns</div>
</div>

<div class="vignette"></div>
<div class="cursor-dot" id="cursorDot"></div>

<script>
(function(){
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var root = document.documentElement;
  var dot = document.getElementById('cursorDot');

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
    curX += (targetX - curX) * 0.16;
    curY += (targetY - curY) * 0.16;
    root.style.setProperty('--x', curX + 'px');
    root.style.setProperty('--y', curY + 'px');
    dot.style.left = targetX + 'px';
    dot.style.top = targetY + 'px';
    requestAnimationFrame(raf);
  }
  raf();

  // the four chthonic figures ringed around the seal
  var figures = [
    // Hades - bident
    '<g stroke="var(--gold-bright)" stroke-width="1.3" fill="none"><line x1="12" y1="4" x2="12" y2="21"/><path d="M8,4 Q8,9 12,9 Q16,9 16,4"/></g>',
    // Persephone - pomegranate
    '<g><circle cx="12" cy="13" r="7" fill="var(--gold-bright)"/><polygon points="12,4 9,7 15,7" fill="var(--gold-bright)"/></g>',
    // Charon - oar
    '<g stroke="var(--gold-bright)" stroke-width="1.3" fill="none"><line x1="12" y1="3" x2="12" y2="21"/><ellipse cx="12" cy="6" rx="5" ry="2.4"/></g>',
    // Cerberus - three heads
    '<g fill="var(--gold-bright)"><circle cx="7" cy="14" r="3.4"/><circle cx="12" cy="10" r="4"/><circle cx="17" cy="14" r="3.4"/></g>'
  ];
  var ring = document.getElementById('chthonic');
  figures.forEach(function(svgInner, idx){
    var m = document.createElement('div');
    m.className = 'medallion';
    m.style.setProperty('--i', idx);
    m.innerHTML = '<svg viewBox="0 0 24 24">' + svgInner + '</svg>';
    ring.appendChild(m);
  });
})();
</script>

</body>
</html>