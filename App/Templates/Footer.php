<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Site Footer — Olympus Theme</title>
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
    min-height:100%;
  }

  .demo{
    max-width:760px;
    margin:0 auto;
    padding:80px 28px 60px;
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

  /* ================= FOOTER ================= */
  footer.site{
    position:relative;
    margin-top:60px;
    background:linear-gradient(180deg, rgba(11,13,18,0.4), var(--night));
    border-top:1px solid var(--line);
  }

  .footer-top{
    position:absolute;
    top:-1px; left:50%;
    transform:translate(-50%,-50%);
    width:44px; height:44px;
  }
  .footer-top svg{ width:100%; height:100%; display:block; }

  .footer-inner{
    max-width:1120px;
    margin:0 auto;
    padding:52px 28px 28px;
    display:grid;
    grid-template-columns:1.4fr 1fr 1fr 1.2fr;
    gap:36px;
  }

  .f-brand .brand-name{
    font-family:'Cinzel', serif;
    font-weight:700;
    font-size:15px;
    letter-spacing:3px;
    color:var(--gold-bright);
  }
  .f-brand p{
    font-size:13.5px;
    line-height:1.7;
    opacity:0.55;
    font-style:italic;
    margin-top:10px;
    max-width:280px;
  }

  .f-col h4{
    font-family:'Cinzel', serif;
    font-size:11px;
    letter-spacing:2.5px;
    color:var(--gold);
    opacity:0.85;
    margin:0 0 14px;
    text-transform:uppercase;
  }
  .f-col ul{
    list-style:none;
    margin:0; padding:0;
    display:flex;
    flex-direction:column;
    gap:9px;
  }
  .f-col a{
    color:var(--marble);
    opacity:0.65;
    text-decoration:none;
    font-size:13.5px;
    position:relative;
    transition:opacity 180ms ease, color 180ms ease, padding-left 180ms ease;
  }
  .f-col a:hover,
  .f-col a:focus-visible{
    opacity:1;
    color:var(--gold-bright);
    padding-left:6px;
  }
  .f-col a:focus-visible{
    outline:2px solid var(--gold-bright);
    outline-offset:2px;
  }

  .f-oath p{
    font-size:12.5px;
    line-height:1.7;
    opacity:0.5;
    font-style:italic;
  }
  .f-oath .greek{
    display:block;
    margin-top:10px;
    color:var(--gold-bright);
    opacity:0.7;
    font-size:12px;
  }

  .footer-divider{
    max-width:1120px;
    margin:0 auto;
    padding:0 28px;
  }
  .footer-divider .rule{
    height:1px;
    background:linear-gradient(90deg, transparent, var(--line) 20%, var(--line) 80%, transparent);
  }

  .footer-bottom{
    max-width:1120px;
    margin:0 auto;
    padding:20px 28px 30px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:16px;
    flex-wrap:wrap;
  }
  .footer-bottom .copy{
    font-size:12px;
    letter-spacing:0.5px;
    opacity:0.4;
  }
  .footer-legal{
    display:flex;
    gap:20px;
  }
  .footer-legal a{
    font-size:12px;
    letter-spacing:0.5px;
    color:var(--marble);
    opacity:0.4;
    text-decoration:none;
    transition:opacity 180ms ease, color 180ms ease;
  }
  .footer-legal a:hover,
  .footer-legal a:focus-visible{
    opacity:1;
    color:var(--gold-bright);
  }

  @media (max-width:820px){
    .footer-inner{
      grid-template-columns:1fr 1fr;
    }
    .f-brand{ grid-column:1 / -1; }
  }
  @media (max-width:520px){
    .footer-inner{ grid-template-columns:1fr; gap:28px; }
    .footer-bottom{ flex-direction:column; align-items:flex-start; }
  }
</style>
</head>
<body>

<footer class="site">
  <div class="footer-top">
    <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
      <circle cx="20" cy="20" r="6" fill="none" stroke="var(--gold-bright)" stroke-width="1.4"/>
      <polygon points="20,10 22,15 20,20 18,15" fill="var(--gold-bright)"/>
      <path d="M20,6 Q9,10 8,20 Q9,30 20,34" fill="none" stroke="var(--gold)" stroke-width="1.2"/>
      <path d="M20,6 Q31,10 32,20 Q31,30 20,34" fill="none" stroke="var(--gold)" stroke-width="1.2"/>
      <path d="M9,12 L12,14 M8,17 L11,18 M8,23 L11,22 M9,28 L12,26" stroke="var(--gold)" stroke-width="1.1"/>
      <path d="M31,12 L28,14 M32,17 L29,18 M32,23 L29,22 M31,28 L28,26" stroke="var(--gold)" stroke-width="1.1"/>
    </svg>
  </div>

  <div class="footer-inner">
    <div class="f-brand">
      <div class="brand-name">OLYMPUS</div>
      <p>Errors of the gods, rendered as decree, myth, and mortal consequence. Every wrong turn on this site leads somewhere it shouldn't.</p>
    </div>

    <div class="f-col">
      <h4>Info</h4>
      <ul>
        <li><a href="/"> · Coming soon</a></li>
      </ul>
    </div>

    <div class="f-col">
      <h4>Site</h4>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </div>

    <div class="f-col f-oath">
      <h4>Oath</h4>
      <p>Built for those who wander off the mapped path, and find out why the gods keep gates.</p>
      <span class="greek">οὐδεὶς ἐπιστρέφει ἀμαθής</span>
    </div>
  </div>

  <div class="footer-divider"><div class="rule"></div></div>

  <div class="footer-bottom">
    <div class="copy">&copy; <span id="year"></span> Infernairy — A frame work of the gods</div>
    <div class="footer-legal">
      <a href="/privacy">Privacy</a>
      <a href="/terms">Terms</a>
    </div>
  </div>
</footer>

<script>
  document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body>
</html>