<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Site Header — Olympus Theme</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=EB+Garamond:ital@0;1&display=swap" rel="stylesheet">
<style>
  :root{
    --night:#0b0d12;
    --night-2:#05060a;
    --marble:#ece3d0;
    --gold:#c99a45;
    --gold-bright:#f6dd8c;
    --line:rgba(212,175,55,0.25);
  }

  *{box-sizing:border-box;}
  html,body{
    margin:0; padding:0;
    background:var(--night-2);
    color:var(--marble);
    font-family:'EB Garamond', serif;
  }

  /* ================= HEADER ================= */
  header.site{
    position:sticky;
    top:0;
    z-index:100;
    background:linear-gradient(180deg, var(--night), rgba(11,13,18,0.94));
    border-bottom:1px solid var(--line);
    backdrop-filter:blur(6px);
  }

  .header-inner{
    max-width:1120px;
    margin:0 auto;
    padding:16px 28px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:24px;
  }

  /* --- logo mark: laurel wreath around a small emblem --- */
  .brand{
    display:flex;
    align-items:center;
    gap:12px;
    text-decoration:none;
    color:inherit;
  }
  .brand-mark{
    width:34px; height:34px;
    flex-shrink:0;
  }
  .brand-mark svg{ width:100%; height:100%; display:block; }

  .brand-name{
    font-family:'Cinzel', serif;
    font-weight:700;
    font-size:16px;
    letter-spacing:3px;
    color:var(--gold-bright);
    white-space:nowrap;
  }
  .brand-sub{
    font-family:'EB Garamond', serif;
    font-style:italic;
    font-size:11px;
    letter-spacing:1px;
    color:var(--marble);
    opacity:0.5;
    display:block;
    margin-top:1px;
  }

  /* --- nav --- */
  nav.primary{
    display:flex;
    align-items:center;
    gap:6px;
  }
  nav.primary a{
    position:relative;
    font-family:'Cinzel', serif;
    font-size:11px;
    letter-spacing:2px;
    text-transform:uppercase;
    color:var(--marble);
    opacity:0.75;
    text-decoration:none;
    padding:10px 14px;
    transition:opacity 180ms ease, color 180ms ease;
  }
  nav.primary a::after{
    content:'';
    position:absolute;
    left:14px; right:14px;
    bottom:6px;
    height:1px;
    background:var(--gold-bright);
    transform:scaleX(0);
    transform-origin:left;
    transition:transform 220ms ease;
  }
  nav.primary a:hover,
  nav.primary a:focus-visible{
    opacity:1;
    color:var(--gold-bright);
  }
  nav.primary a:hover::after,
  nav.primary a:focus-visible::after{
    transform:scaleX(1);
  }
  nav.primary a.active{
    opacity:1;
    color:var(--gold-bright);
  }
  nav.primary a.active::after{
    transform:scaleX(1);
  }
  nav.primary a:focus-visible{
    outline:2px solid var(--gold-bright);
    outline-offset:2px;
  }

  /* --- mobile toggle --- */
  .menu-btn{
    display:none;
    background:transparent;
    border:1px solid var(--line);
    color:var(--gold-bright);
    width:38px; height:38px;
    border-radius:3px;
    align-items:center;
    justify-content:center;
    cursor:pointer;
  }
  .menu-btn svg{ width:16px; height:16px; }

  @media (max-width:820px){
    nav.primary{
      position:absolute;
      top:100%; left:0; right:0;
      flex-direction:column;
      align-items:stretch;
      gap:0;
      background:var(--night);
      border-bottom:1px solid var(--line);
      max-height:0;
      overflow:hidden;
      transition:max-height 260ms ease;
    }
    nav.primary.open{ max-height:320px; }
    nav.primary a{
      padding:14px 28px;
      border-top:1px solid rgba(212,175,55,0.12);
    }
    nav.primary a::after{ display:none; }
    .menu-btn{ display:flex; }
  }

  /* ================= demo body (just to show the header in context) ================= */
  .demo{
    max-width:760px;
    margin:0 auto;
    padding:64px 28px 100px;
    text-align:center;
  }
  .demo h1{
    font-family:'Cinzel', serif;
    font-size:20px;
    letter-spacing:3px;
    color:var(--gold-bright);
    opacity:0.9;
  }
  .demo p{
    font-style:italic;
    opacity:0.6;
    line-height:1.7;
    margin-top:16px;
  }
</style>
</head>
<body>

<header class="site">
  <div class="header-inner">
    <a href="/" class="brand">
      <span class="brand-mark">
        <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
          <circle cx="20" cy="20" r="6" fill="none" stroke="var(--gold-bright)" stroke-width="1.4"/>
          <polygon points="20,10 22,15 20,20 18,15" fill="var(--gold-bright)"/>
          <path d="M20,6 Q9,10 8,20 Q9,30 20,34" fill="none" stroke="var(--gold)" stroke-width="1.2"/>
          <path d="M20,6 Q31,10 32,20 Q31,30 20,34" fill="none" stroke="var(--gold)" stroke-width="1.2"/>
          <path d="M9,12 L12,14 M8,17 L11,18 M8,23 L11,22 M9,28 L12,26" stroke="var(--gold)" stroke-width="1.1"/>
          <path d="M31,12 L28,14 M32,17 L29,18 M32,23 L29,22 M31,28 L28,26" stroke="var(--gold)" stroke-width="1.1"/>
        </svg>
      </span>
      <span>
        <span class="brand-name">OLYMPUS</span>
        <span class="brand-sub">errors of the gods</span>
      </span>
    </a>

    <button class="menu-btn" id="menuBtn" aria-label="Toggle navigation" aria-expanded="false">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
        <line x1="3" y1="6" x2="21" y2="6"/>
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="18" x2="21" y2="18"/>
      </svg>
    </button>

    <nav class="primary" id="primaryNav">
      <a href="/" class="active">Home</a>
      <a href="/">About</a>
    </nav>
  </div>
</header>

<script>
  var btn = document.getElementById('menuBtn');
  var nav = document.getElementById('primaryNav');
  btn.addEventListener('click', function(){
    var open = nav.classList.toggle('open');
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
  });
</script>

</body>
</html>