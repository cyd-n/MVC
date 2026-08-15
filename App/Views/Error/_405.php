<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>405 — Denied by Decree of Olympus</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=EB+Garamond:ital@0;1&display=swap" rel="stylesheet">
<style>
  :root{
    --night:#080c18;
    --night-2:#050710;
    --marble:#ece3d0;
    --marble-shadow:#9c9074;
    --bronze:#3a2c1c;
    --gold:#d4af37;
    --gold-bright:#f6dd8c;
    --sky-flash:#cfe6ff;
  }

  *{box-sizing:border-box;}
  html,body{
    margin:0; padding:0;
    width:100%; height:100%;
    background:var(--night);
    overflow:hidden;
  }
  body{
    font-family:'EB Garamond', serif;
    color:var(--marble);
  }

  .sky{
    position:fixed; inset:0;
    background:radial-gradient(ellipse at 50% 0%, #101a30 0%, var(--night) 55%, var(--night-2) 100%);
    z-index:0;
  }
  .star{
    position:absolute;
    width:2px; height:2px;
    background:var(--marble);
    border-radius:50%;
    opacity:0.6;
    animation:twinkle 3.5s ease-in-out infinite;
  }
  @keyframes twinkle{
    0%,100%{ opacity:0.15; }
    50%{ opacity:0.9; }
  }

  .flash{
    position:fixed; inset:0;
    background:var(--sky-flash);
    opacity:0;
    pointer-events:none;
    z-index:25;
  }
  .flash.hit{
    animation:flashPulse 260ms ease-out;
  }
  @keyframes flashPulse{
    0%{ opacity:0.55; }
    100%{ opacity:0; }
  }

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
  }

  .eyebrow{
    font-family:'Cinzel', serif;
    font-size:12px;
    letter-spacing:5px;
    color:var(--gold-bright);
    margin-bottom:26px;
  }

  /* ---------------- gate ---------------- */
  .gate-wrap{
    position:relative;
    display:flex;
    align-items:flex-end;
    filter:drop-shadow(0 20px 50px rgba(0,0,0,0.6));
  }

  .pediment{
    position:absolute;
    top:-46px;
    left:50%;
    transform:translateX(-50%);
    width:0; height:0;
    border-left:130px solid transparent;
    border-right:130px solid transparent;
    border-bottom:46px solid var(--marble);
  }
  .pediment::after{
    content:'';
    position:absolute;
    top:18px; left:-8px;
    width:16px; height:16px;
    border-radius:50%;
    background:radial-gradient(circle, var(--gold-bright), var(--gold));
    box-shadow:0 0 14px 3px rgba(212,175,55,0.6);
  }

  .column{
    width:22px;
    height:190px;
    background:
      repeating-linear-gradient(90deg, var(--marble) 0 3px, var(--marble-shadow) 3px 4px);
    border-top:8px solid var(--marble);
    border-bottom:8px solid var(--marble);
    flex-shrink:0;
  }

  .doors{
    position:relative;
    width:180px;
    height:190px;
    display:flex;
    background:#0c0805;
    border:2px solid #241a10;
  }
  .leaf{
    flex:1;
    background:
      linear-gradient(180deg, var(--bronze), #241a10);
    position:relative;
  }
  .leaf::before{
    content:'';
    position:absolute;
    inset:14px;
    border:1px solid rgba(212,175,55,0.35);
  }
  .leaf.left{ border-right:1px solid rgba(212,175,55,0.25); }

  /* ---------------- seal ---------------- */
  .seal{
    position:absolute;
    top:50%; left:50%;
    transform:translate(-50%,-50%) scale(0.4) rotate(-6deg);
    width:104px; height:104px;
    border-radius:50%;
    background:radial-gradient(circle at 35% 30%, #2a2115, #120d08 75%);
    border:3px solid var(--gold);
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
    opacity:0;
    animation:sealStrike 380ms 900ms cubic-bezier(.2,1.7,.4,1) forwards;
    box-shadow:0 0 0 rgba(212,175,55,0);
  }
  @keyframes sealStrike{
    0%{ opacity:0; transform:translate(-50%,-50%) scale(2.6) rotate(-6deg); }
    55%{ opacity:1; transform:translate(-50%,-50%) scale(0.92) rotate(-6deg); box-shadow:0 0 40px 6px rgba(212,175,55,0.5); }
    100%{ opacity:1; transform:translate(-50%,-50%) scale(1) rotate(-6deg); box-shadow:0 0 10px 2px rgba(212,175,55,0.25); }
  }
  .seal .code{
    font-family:'Cinzel', serif;
    font-weight:700;
    font-size:26px;
    color:var(--gold-bright);
    letter-spacing:1px;
  }
  .seal .label{
    font-family:'Cinzel', serif;
    font-size:6.5px;
    letter-spacing:1.5px;
    color:var(--gold);
    margin-top:2px;
  }

  /* ---------------- pantheon ring ---------------- */
  .pantheon{
    position:absolute;
    top:50%; left:50%;
    width:1px; height:1px;
  }
  .medallion{
    position:absolute;
    top:0; left:0;
    width:26px; height:26px;
    transform:
      rotate(calc(var(--i) * 30deg))
      translate(118px)
      rotate(calc(var(--i) * -30deg))
      translate(-13px,-13px);
    border-radius:50%;
    background:radial-gradient(circle at 35% 30%, #1c1710, #0c0906 80%);
    border:1px solid rgba(212,175,55,0.5);
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .medallion svg{ width:14px; height:14px; }

  /* ---------------- text ---------------- */
  .subtitle{
    margin-top:56px;
    font-family:'Cinzel', serif;
    font-size:14px;
    letter-spacing:3px;
    color:var(--marble);
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
    opacity:0.6;
    font-family:'EB Garamond', serif;
  }
  .allowed b{
    color:var(--gold-bright);
    font-weight:600;
  }

  .btn{
    display:inline-block;
    margin-top:34px;
    padding:14px 32px;
    background:transparent;
    border:1px solid rgba(212,175,55,0.5);
    color:var(--gold-bright);
    font-family:'Cinzel', serif;
    font-size:11px;
    letter-spacing:3px;
    text-decoration:none;
    text-transform:uppercase;
    transition:border-color 200ms ease, background 200ms ease, box-shadow 200ms ease;
  }
  .btn:hover{
    border-color:var(--gold-bright);
    background:rgba(212,175,55,0.08);
    box-shadow:0 0 16px rgba(212,175,55,0.3);
  }
  .btn:focus-visible{
    outline:2px solid var(--gold-bright);
    outline-offset:3px;
  }

  .footnote{
    margin-top:16px;
    font-size:12px;
    letter-spacing:1px;
    opacity:0.4;
    font-style:italic;
  }

  .spark{
    position:fixed;
    width:3px; height:3px;
    border-radius:50%;
    background:var(--gold-bright);
    box-shadow:0 0 6px 1px rgba(246,221,140,0.8);
    pointer-events:none;
    z-index:15;
    animation:sparkFade 700ms ease-out forwards;
  }
  @keyframes sparkFade{
    0%{ opacity:0.9; transform:scale(1); }
    100%{ opacity:0; transform:scale(0.2) translateY(10px); }
  }

  @media (max-width:600px){
    .pantheon{ display:none; }
    .doors{ width:130px; height:150px; }
    .column{ height:150px; }
    .desc{ font-size:14px; }
  }

  @media (prefers-reduced-motion: reduce){
    .seal{ animation:none; opacity:1; transform:translate(-50%,-50%) scale(1) rotate(-6deg); }
    .flash.hit{ animation:none; display:none; }
    .star{ animation:none; }
    .spark{ display:none; }
  }
</style>
</head>
<body>

<div class="sky" id="sky"></div>
<div class="flash" id="flash"></div>

<div class="stage">
  <div class="eyebrow">A DECREE FROM OLYMPUS</div>

  <div class="gate-wrap">
    <div class="pediment"></div>
    <div class="column"></div>
    <div class="doors">
      <div class="leaf left"></div>
      <div class="leaf right"></div>
      <div class="seal">
        <span class="code">405</span>
        <span class="label">UNWORTHY</span>
      </div>
      <div class="pantheon" id="pantheon"></div>
    </div>
    <div class="column"></div>
  </div>

  <div class="subtitle">THIS METHOD IS UNWORTHY OF THE GATES</div>
  <p class="desc">The Twelve have weighed the manner of your arrival and found it wanting. These gates yield only to the paths they have sanctioned.</p>
  <p class="allowed">Sanctioned by decree: <b>GET</b>, <b>POST</b></p>

  <a href="/" class="btn">Return to the mortal road</a>
  <div class="footnote">οἱ θεοὶ βλέπουν — the gods are still watching</div>
</div>

<script>
(function(){
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // starfield
  var sky = document.getElementById('sky');
  var starCount = window.innerWidth < 600 ? 40 : 80;
  for(var i=0;i<starCount;i++){
    var s = document.createElement('div');
    s.className = 'star';
    s.style.left = (Math.random()*100) + 'vw';
    s.style.top = (Math.random()*70) + 'vh';
    s.style.animationDelay = (Math.random()*3.5) + 's';
    sky.appendChild(s);
  }

  // the twelve olympians, arranged around the seal
  var gods = [
    // Zeus - thunderbolt
    '<polygon points="13,2 6,13 11,13 9,22 18,10 12,10" fill="var(--gold-bright)"/>',
    // Poseidon - trident
    '<g stroke="var(--gold-bright)" stroke-width="1.4" fill="none"><line x1="12" y1="4" x2="12" y2="21"/><line x1="6" y1="4" x2="6" y2="9"/><line x1="18" y1="4" x2="18" y2="9"/><line x1="6" y1="9" x2="18" y2="9"/></g>',
    // Hera - peacock eye
    '<g stroke="var(--gold-bright)" stroke-width="1.3" fill="none"><ellipse cx="12" cy="10" rx="6" ry="8"/><circle cx="12" cy="10" r="2" fill="var(--gold-bright)"/><line x1="12" y1="18" x2="12" y2="22"/></g>',
    // Athena - owl
    '<g stroke="var(--gold-bright)" stroke-width="1.3" fill="none"><circle cx="9" cy="11" r="2"/><circle cx="15" cy="11" r="2"/><polygon points="7,7 9,3 11,7"/><polygon points="13,7 15,3 17,7"/><ellipse cx="12" cy="16" rx="6" ry="5"/></g>',
    // Apollo - sun
    '<g stroke="var(--gold-bright)" stroke-width="1.3"><circle cx="12" cy="12" r="4" fill="none"/><line x1="12" y1="2" x2="12" y2="5"/><line x1="12" y1="19" x2="12" y2="22"/><line x1="2" y1="12" x2="5" y2="12"/><line x1="19" y1="12" x2="22" y2="12"/><line x1="5" y1="5" x2="7" y2="7"/><line x1="17" y1="17" x2="19" y2="19"/><line x1="19" y1="5" x2="17" y2="7"/><line x1="7" y1="17" x2="5" y2="19"/></g>',
    // Artemis - crescent moon
    '<g><circle cx="11" cy="12" r="7" fill="var(--gold-bright)"/><circle cx="15" cy="12" r="7" fill="#0c0906"/></g>',
    // Ares - shield
    '<polygon points="12,2 20,6 20,14 12,22 4,14 4,6" fill="none" stroke="var(--gold-bright)" stroke-width="1.3"/>',
    // Aphrodite - dove
    '<path d="M4,14 Q8,8 14,10 Q18,6 21,8 Q17,10 16,13 Q14,18 8,18 Q5,17 4,14 Z" fill="var(--gold-bright)"/>',
    // Hephaestus - hammer
    '<g fill="var(--gold-bright)"><rect x="10.5" y="5" width="3" height="15"/><rect x="6" y="2" width="12" height="4.5"/></g>',
    // Demeter - wheat sheaf
    '<g stroke="var(--gold-bright)" stroke-width="1.3"><line x1="12" y1="3" x2="12" y2="21"/><line x1="7" y1="7" x2="12" y2="13"/><line x1="17" y1="7" x2="12" y2="13"/><line x1="8" y1="12" x2="12" y2="16"/><line x1="16" y1="12" x2="12" y2="16"/></g>',
    // Dionysus - grapes
    '<g fill="var(--gold-bright)"><circle cx="9" cy="13" r="2"/><circle cx="15" cy="13" r="2"/><circle cx="12" cy="10" r="2"/><circle cx="12" cy="16" r="2"/><polygon points="12,4 9,8 15,8"/></g>',
    // Hermes - winged staff
    '<g stroke="var(--gold-bright)" stroke-width="1.3" fill="var(--gold-bright)"><line x1="12" y1="4" x2="12" y2="21"/><polygon points="12,5 5,3 8,9" fill="var(--gold-bright)" stroke="none"/><polygon points="12,5 19,3 16,9" fill="var(--gold-bright)" stroke="none"/></g>'
  ];

  var pantheon = document.getElementById('pantheon');
  gods.forEach(function(svgInner, idx){
    var m = document.createElement('div');
    m.className = 'medallion';
    m.style.setProperty('--i', idx);
    m.innerHTML = '<svg viewBox="0 0 24 24">' + svgInner + '</svg>';
    pantheon.appendChild(m);
  });

  // periodic lightning flash striking the seal
  var flash = document.getElementById('flash');
  function scheduleStrike(){
    var delay = 4500 + Math.random()*5000;
    setTimeout(function(){
      if(!reduced){
        flash.classList.remove('hit');
        void flash.offsetWidth;
        flash.classList.add('hit');
      }
      scheduleStrike();
    }, delay);
  }
  if(!reduced) scheduleStrike();

  // faint golden spark trail on pointer move
  if(!reduced){
    var lastSpark = 0;
    window.addEventListener('pointermove', function(e){
      var now = Date.now();
      if(now - lastSpark < 60) return;
      lastSpark = now;
      var sp = document.createElement('div');
      sp.className = 'spark';
      sp.style.left = e.clientX + 'px';
      sp.style.top = e.clientY + 'px';
      document.body.appendChild(sp);
      setTimeout(function(){ sp.remove(); }, 700);
    });
  }
})();
</script>

</body>
</html>