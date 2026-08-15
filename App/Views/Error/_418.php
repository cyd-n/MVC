<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>418 — I Am a Krater</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=EB+Garamond:ital@0;1&display=swap" rel="stylesheet">
<style>
  :root{
    --night:#160f08;
    --night-2:#0c0805;
    --marble:#f1e7d2;
    --amber:#e2a13d;
    --amber-bright:#f8cf7a;
    --gold:#c99a45;
    --gold-bright:#f6dd8c;
    --clay:#7a4a2a;
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
    z-index:0;
    background:radial-gradient(ellipse at 50% 25%, #241708 0%, var(--night) 55%, var(--night-2) 100%);
  }

  .ember{
    position:absolute;
    width:3px; height:3px;
    border-radius:50%;
    background:var(--amber-bright);
    box-shadow:0 0 6px 2px rgba(248,207,122,0.6);
    opacity:0;
    animation:emberRise linear infinite;
  }
  @keyframes emberRise{
    0%{ opacity:0; transform:translateY(0) translateX(0); }
    10%{ opacity:0.9; }
    90%{ opacity:0.4; }
    100%{ opacity:0; transform:translateY(-70vh) translateX(var(--drift,10px)); }
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
    margin-bottom:22px;
  }

  /* ---------------- krater scene ---------------- */
  .scene{
    position:relative;
    width:220px;
    height:220px;
    margin-bottom:12px;
  }

  .pedestal{
    position:absolute;
    bottom:0; left:50%;
    transform:translateX(-50%);
    width:110px; height:26px;
    background:linear-gradient(180deg, #d8cba9, #a89772);
    border-radius:3px;
    box-shadow:0 10px 30px rgba(0,0,0,0.5);
  }
  .pedestal::before{
    content:'';
    position:absolute;
    top:-8px; left:10px; right:10px;
    height:8px;
    background:linear-gradient(180deg, #ece0c2, #cdbd93);
    border-radius:2px;
  }

  .krater-wrap{
    position:absolute;
    bottom:24px; left:50%;
    transform-origin:50% 90%;
    transform:translateX(-50%) rotate(0deg);
    transition:transform 700ms cubic-bezier(.3,1.4,.4,1);
    cursor:pointer;
  }
  .krater-wrap.pour{
    transform:translateX(-50%) rotate(-32deg);
  }
  .krater-wrap svg{ width:150px; display:block; filter:drop-shadow(0 12px 20px rgba(0,0,0,0.5)); }

  .stream{
    position:absolute;
    left:calc(50% + 55px);
    bottom:52px;
    width:4px; height:0;
    background:linear-gradient(180deg, var(--amber-bright), var(--amber));
    border-radius:2px;
    transform-origin:top;
    opacity:0;
  }
  .krater-wrap.pour ~ .stream{
    animation:pourStream 900ms ease-out forwards;
  }
  @keyframes pourStream{
    0%{ height:0; opacity:0; }
    15%{ opacity:1; }
    70%{ height:70px; opacity:1; }
    100%{ height:70px; opacity:0; }
  }

  .droplet{
    position:absolute;
    width:5px; height:5px;
    border-radius:50%;
    background:var(--amber-bright);
    box-shadow:0 0 6px 1px rgba(248,207,122,0.6);
    opacity:0;
  }
  .droplet.show{
    animation:drop 650ms ease-in forwards;
  }
  @keyframes drop{
    0%{ opacity:1; transform:translateY(0); }
    100%{ opacity:0; transform:translateY(60px); }
  }

  .steam{
    position:absolute;
    top:-10px; left:50%;
    width:14px; height:60px;
    background:linear-gradient(180deg, transparent, rgba(241,231,210,0.28), transparent);
    border-radius:50%;
    filter:blur(4px);
    transform:translateX(-50%);
    animation:steamRise 3.4s ease-in-out infinite;
  }
  .steam.s2{ left:40%; animation-delay:1.1s; }
  .steam.s3{ left:60%; animation-delay:2.2s; }
  @keyframes steamRise{
    0%{ opacity:0; transform:translate(-50%,10px) scaleY(0.8); }
    30%{ opacity:0.7; }
    100%{ opacity:0; transform:translate(-50%,-60px) scaleY(1.3); }
  }

  .seal{
    position:absolute;
    top:-30px; left:50%;
    transform:translate(-50%,0) scale(0.4) rotate(4deg);
    width:92px; height:92px;
    border-radius:50%;
    background:radial-gradient(circle at 35% 30%, #2a1c0c, #130c06 75%);
    border:3px solid var(--gold);
    display:flex;
    align-items:center;
    justify-content:center;
    flex-direction:column;
    opacity:0;
    animation:sealRise 620ms 450ms cubic-bezier(.2,1.5,.4,1) forwards;
  }
  @keyframes sealRise{
    0%{ opacity:0; transform:translate(-50%,0) scale(2.2) rotate(4deg); }
    60%{ opacity:1; transform:translate(-50%,0) scale(0.94) rotate(4deg); box-shadow:0 0 26px 5px rgba(230,180,90,0.4); }
    100%{ opacity:1; transform:translate(-50%,0) scale(1) rotate(4deg); box-shadow:0 0 10px 2px rgba(230,180,90,0.2); }
  }
  .seal .code{
    font-family:'Cinzel', serif;
    font-weight:700;
    font-size:24px;
    color:var(--amber-bright);
    letter-spacing:1px;
  }
  .seal .label{
    font-family:'Cinzel', serif;
    font-size:6px;
    letter-spacing:1.5px;
    color:var(--gold-bright);
    margin-top:2px;
  }

  .subtitle{
    margin-top:26px;
    font-family:'Cinzel', serif;
    font-size:14px;
    letter-spacing:3px;
    opacity:0.92;
  }
  .desc{
    max-width:440px;
    margin:20px auto 0;
    font-size:16px;
    font-style:italic;
    line-height:1.7;
    opacity:0.75;
  }
  .hint{
    margin-top:10px;
    font-size:12.5px;
    letter-spacing:0.5px;
    opacity:0.45;
  }

  .btn{
    display:inline-block;
    margin-top:30px;
    padding:14px 32px;
    background:transparent;
    border:1px solid rgba(230,180,90,0.5);
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
    background:rgba(230,180,90,0.08);
    box-shadow:0 0 16px rgba(230,180,90,0.3);
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

  .vignette{
    position:fixed; inset:0;
    pointer-events:none;
    z-index:31;
    box-shadow: inset 0 0 220px 70px rgba(0,0,0,0.85);
  }

  @media (max-width:600px){
    .scene{ width:170px; height:170px; }
    .krater-wrap svg{ width:110px; }
    .desc{ font-size:14px; }
  }

  @media (prefers-reduced-motion: reduce){
    .ember, .steam{ animation:none; display:none; }
    .seal{ animation:none; opacity:1; transform:translate(-50%,0) scale(1) rotate(4deg); }
    .krater-wrap{ transition:none; }
  }
</style>
</head>
<body>

<div class="sky" id="sky"></div>

<div class="stage">
  <div class="eyebrow">A VESSEL OF THE GODS</div>

  <div class="scene">
    <div class="seal">
      <span class="code">418</span>
      <span class="label">I AM A KRATER</span>
    </div>

    <div class="pedestal"></div>

    <div class="krater-wrap" id="krater">
      <div class="steam"></div>
      <div class="steam s2"></div>
      <div class="steam s3"></div>
      <svg viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg">
        <path d="M50,10 L100,10 L96,26 L54,26 Z" fill="var(--clay)"/>
        <path d="M30,120 Q20,50 54,30 L96,30 Q130,50 120,120 Q75,140 30,120 Z" fill="var(--clay)"/>
        <path d="M30,120 Q20,50 54,30 L96,30 Q130,50 120,120" fill="none" stroke="#5c3416" stroke-width="2"/>
        <path d="M40,60 Q75,50 110,60 L108,72 Q75,64 42,72 Z" fill="var(--gold)" opacity="0.6"/>
        <ellipse cx="75" cy="34" rx="21" ry="6" fill="var(--amber)"/>
        <path d="M15,50 Q0,55 6,75 Q10,90 28,86" fill="none" stroke="var(--clay)" stroke-width="10" stroke-linecap="round"/>
        <path d="M135,50 Q150,55 144,75 Q140,90 122,86" fill="none" stroke="var(--clay)" stroke-width="10" stroke-linecap="round"/>
      </svg>
    </div>

    <div class="stream"></div>
    <div class="droplet" id="d1" style="left:calc(50% + 55px); top:118px;"></div>
    <div class="droplet" id="d2" style="left:calc(50% + 58px); top:130px;"></div>
    <div class="droplet" id="d3" style="left:calc(50% + 52px); top:140px;"></div>
  </div>

  <div class="subtitle">I AM A KRATER, NOT A KETTLE</div>
  <p class="desc">I hold nectar for the feast of the gods, mixed by Hebe's own hand. I was never made to brew your coffee, and I will not begin today.</p>
  <p class="hint">tip me, if you like — I only pour what I was made to pour</p>

  <a href="/" class="btn">Return to the mortal feast</a>
  <div class="footnote">εἰμὶ κρατήρ, οὐ βρικός — I am a krater, not a kettle</div>
</div>

<div class="vignette"></div>

<script>
(function(){
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // drifting embers
  if(!reduced){
    var sky = document.getElementById('sky');
    var count = window.innerWidth < 600 ? 14 : 26;
    for(var i=0;i<count;i++){
      var e = document.createElement('div');
      e.className = 'ember';
      e.style.left = (Math.random()*100) + 'vw';
      e.style.bottom = (Math.random()*20) + 'vh';
      e.style.setProperty('--drift', (Math.random()*40-20) + 'px');
      e.style.animationDuration = (6 + Math.random()*6) + 's';
      e.style.animationDelay = (Math.random()*6) + 's';
      sky.appendChild(e);
    }
  }

  // click the krater to tip it and pour a stream of nectar
  var krater = document.getElementById('krater');
  var drops = [document.getElementById('d1'), document.getElementById('d2'), document.getElementById('d3')];
  var pouring = false;

  krater.addEventListener('click', function(){
    if(pouring) return;
    pouring = true;
    krater.classList.add('pour');

    drops.forEach(function(d, idx){
      setTimeout(function(){
        d.classList.remove('show');
        void d.offsetWidth;
        d.classList.add('show');
      }, 250 + idx*140);
    });

    setTimeout(function(){
      krater.classList.remove('pour');
      pouring = false;
    }, 1500);
  });
})();
</script>

</body>
</html>