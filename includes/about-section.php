<?php /* about.php - use: <?php include __DIR__ . '/includes/about.php'; ?> */
$skater = 'assets/img/team-skater.png'; // image yahan rakhein: creative/assets/img/team-skater.png
?>
<style>
  /* ---------- ABOUT / TEAM EXPERIENCE ---------- */
  .abt{
    position:relative; width:100%; overflow:hidden; color:#fff;
    background:radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, 0.45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
    font-family:'Poppins','Segoe UI',Arial,sans-serif;
    padding:72px 16px;
  }
  .abt,.abt *{box-sizing:border-box}
  .abt-inner{max-width:1200px;margin:0 auto;width:100%;display:flex;flex-direction:column;gap:96px}
  .abt-row{display:grid;grid-template-columns:minmax(0,1fr);gap:48px;align-items:center}
  .abt-row.is-top{position:relative}

  /* watermark */
  .abt-watermark{
    position:absolute;top: -88px !important;left:0;z-index:0;pointer-events:none;user-select:none;
    font-size:72px;font-weight:800;text-transform:uppercase;letter-spacing:.1em;
    color:rgba(255,255,255,.05);line-height:1;
  }

  .abt-col{position:relative;z-index:10;display:flex;flex-direction:column;align-items:flex-start;width:100%;max-width:560px}
  .abt-circle-col{position:relative;z-index:10;display:flex;justify-content:center}

  /* label */
  .abt-label{display:flex;align-items:center;gap:12px;margin-bottom:12px}
  .abt-label:before{content:"";width:48px;height:1px;background:rgba(255,255,255,.8);display:inline-block}
  .abt-label span{font-size:12px;letter-spacing:.025em}

  /* text */
  .abt h2{margin:0 0 24px;font-size:36px;font-weight:400;line-height:1.25;letter-spacing:-.025em}
  .abt h3{margin:0 0 24px;font-size:24px;font-weight:400;line-height:1.25;letter-spacing:-.025em}
  .abt p{margin:0 0 16px;font-size:14px;line-height:1.625;color:#fff}
  .abt p.dim{color:rgba(255,255,255,.8);margin-bottom:0}

  /* reveal: fade + zoom-in (scroll par dobara chalta hai) */
  .abt-rv{width:100%}
  .abt-rv > .abt-rv-in{opacity:0;transform:scale(var(--from,.85));transform-origin:center}
  .abt-rv.is-in > .abt-rv-in{
    opacity:1;transform:scale(1);
    transition:opacity .9s ease-out var(--delay,0ms),transform .9s cubic-bezier(.22,.61,.36,1) var(--delay,0ms);
  }

  /* stat circle */
  .abt-circle-wrap{flex-shrink:0}
  .abt-circle{
    width:256px;height:256px;border-radius:50%;border:1px solid #00D4A3;
    display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:24px;
    opacity:0;transform:translate3d(var(--hx,0px),0,0);
  }
  .abt-circle-wrap.is-in .abt-circle{
    opacity:1;transform:translate3d(0,0,0);
    transition:opacity .8s ease-out,transform .8s cubic-bezier(.22,.61,.36,1);
  }
  /* ---- rotating ring: mint arc + glowing dot go round; number stays still ---- */
  .abt-circle{position:relative}
  .abt-circle::before{
    content:"";position:absolute;inset:-2px;border-radius:50%;padding:3px;pointer-events:none;
    background:conic-gradient(from 0deg, rgba(95,240,200,0) 0deg, rgba(95,240,200,0) 200deg, rgba(95,240,200,.35) 290deg, #5FF0C8 356deg, rgba(95,240,200,0) 360deg);
    -webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;
    mask:linear-gradient(#000 0 0) content-box exclude,linear-gradient(#000 0 0);
    animation:abtSpin var(--spin-speed,6s) linear infinite;animation-direction:var(--spin-dir,normal);
  }
  .abt-orbit{position:absolute;inset:-2px;border-radius:50%;pointer-events:none;
    animation:abtSpin var(--spin-speed,6s) linear infinite;animation-direction:var(--spin-dir,normal)}
  .abt-orbit i{position:absolute;left:50%;top:0;width:12px;height:12px;margin:-5px 0 0 -6px;border-radius:50%;
    background:#5FF0C8;box-shadow:0 0 0 4px rgba(95,240,200,.18),0 0 18px 4px rgba(0,212,163,.75)}
  /* the inner text never turns */
  .abt-num,.abt-cap{position:relative;z-index:1}
  /* a little faster on hover */
  .abt-circle-wrap:hover{--spin-speed:2.5s}
  @keyframes abtSpin{to{transform:rotate(360deg)}}
  .abt-circle-wrap[style*="reverse"] .abt-circle::before{transform:scaleX(-1)}
  .abt-circle-wrap[style*="reverse"] .abt-circle::before{animation-name:abtSpinFlip;animation-direction:normal}
  @keyframes abtSpinFlip{from{transform:scaleX(-1) rotate(0deg)}to{transform:scaleX(-1) rotate(360deg)}}

  .abt-num{font-size:60px;font-weight:300;letter-spacing:-.025em;line-height:1;margin-bottom:8px}
  .abt-cap{font-size:14px;color:#fff}

  /* row 2: circle + skater */
  .abt-circle-skater{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:24px}
  .abt-skater{width:160px;height:auto;pointer-events:none;user-select:none;will-change:transform}

  @media (min-width:640px){
    .abt-circle-skater{flex-direction:row}
    .abt-skater{width:224px}
    .abt-watermark{font-size:96px}
  }
  @media (min-width:768px){ .abt-watermark{top:-48px} }
  @media (min-width:1024px){
    .abt{padding:72px 72px}
    .abt-row{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}
    .abt h2{font-size:60px}
    .abt h3{font-size:36px}
    .abt p{font-size:16px}
    .abt-circle{width:320px;height:320px}
    .abt-num{font-size:72px}
    .abt-cap{font-size:16px}
    .abt-skater{width:290px}
    .abt-circle-skater{justify-content:flex-start}
    .abt-watermark{font-size:130px}
  }

  @media (prefers-reduced-motion:reduce){
    .abt-rv > .abt-rv-in,.abt-circle{opacity:1!important;transform:none!important;transition:none!important}
    .abt-circle::before,.abt-orbit{animation:none!important}
    .abt-skater{transform:none!important}
  }
</style>

<section class="abt" id="about">
  <div class="abt-inner">

    <!-- ROW 1: text left, 15 Awards circle right -->
    <div class="abt-row is-top">
      <span class="abt-watermark" aria-hidden="true">OUR STORY</span>

      <div class="abt-col">
        <div class="abt-rv" style="--from:.9"><div class="abt-rv-in">
          <div class="abt-label"><span>OUR STORY</span></div>
          <h2>Built Around the Power of &amp; Creative Convergence</h2>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:150ms"><div class="abt-rv-in">
          <p>The digital world brings together disciplines that were once treated separately. Design shapes perception. Technology creates possibilities. Content communicates value. Marketing connects businesses with audiences. When these elements work together, they can create a more coherent and effective digital experience. So that’s why, as a Dallas web development company, we bring these elements together to support a stronger digital presence.</p>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:300ms"><div class="abt-rv-in">
          <p class="dim">That idea sits at the heart of Creative Converge. As a premium web development company in Dallas and more. Our approach brings creative thinking and digital execution into the same conversation. Instead of viewing a logo, website, or marketing campaign as an isolated deliverable, we consider how each contributes to the overall brand experience. </p>
        </div></div>
      </div>

      <div class="abt-circle-col">
        <div class="abt-circle-wrap" data-count="15">
          <div class="abt-circle"><span class="abt-orbit" aria-hidden="true"><i></i></span><span class="abt-num">0</span><span class="abt-cap">Awards Winning</span></div>
        </div>
      </div>
    </div>

    <!-- ROW 2: 9 Years circle + skater left, working day text right -->
    <div class="abt-row" id="abtRow2">
      <div class="abt-circle-skater">
        <div class="abt-circle-wrap" data-count="9" style="--hx:-160px;--spin-dir:reverse">
          <div class="abt-circle"><span class="abt-orbit" aria-hidden="true"><i></i></span><span class="abt-num">0</span><span class="abt-cap">Years Experience</span></div>
        </div>
        <img class="abt-skater" id="abtSkater" src="<?= htmlspecialchars($skater) ?>" alt="" aria-hidden="true">
      </div>

      <div class="abt-col" style="z-index:auto">
        <div class="abt-rv" style="--from:.9"><div class="abt-rv-in">
          <h3>Helping Businesses Make Better Use of Digital</h3>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:150ms"><div class="abt-rv-in">
          <p>Our mission is to help businesses build a stronger digital presence as a top-quality Dallas web development company through thoughtful design, practical technology, and purposeful marketing. We aim to make digital solutions more aligned with the people who use them and the goals businesses want to achieve.</p>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:300ms"><div class="abt-rv-in">
          <p class="dim">Whether the task involves developing a website, creating a brand identity or approaching the work with a focus on relevance, usability, and clear communication. We want every project to have a defined purpose and every solution to make sense for the business behind it. </p>
        </div></div>
      </div>
    </div>

    <!-- ROW 3: Individual approach text left, 354 Projects circle right -->
    <div class="abt-row">
      <div class="abt-col" style="z-index:auto">
        <div class="abt-rv" style="--from:.9"><div class="abt-rv-in">
          <h3>A Digital Future Where Good Ideas Can Go Further</h3>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:150ms"><div class="abt-rv-in">
          <p>Our vision is to contribute to a digital landscape where businesses can express their identities confidently, deliver better online experiences, and connect with their audiences more effectively. Also want to be recognized as an affordable website design company in the USA.</p>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:300ms"><div class="abt-rv-in">
          <p class="dim">We believe creativity and technology are most valuable when they solve meaningful problems. By combining these disciplines with a thoughtful understanding of business needs, we aim to help brands adapt, improve, and pursue new opportunities in the digital space.</p>
        </div></div>
      </div>

      <div class="abt-circle-col" style="z-index:auto">
        <div class="abt-circle-wrap" data-count="354">
          <div class="abt-circle"><span class="abt-orbit" aria-hidden="true"><i></i></span><span class="abt-num">0</span><span class="abt-cap">Successful Projects</span></div>
        </div>
      </div>
    </div>  

  </div>
</section>

<script>
(function(){
 
  var SKATER_X = 0.18;  
  var SKATER_Y = 0.09; 
  var COUNT_MS = 1600;
  var sec = document.getElementById('about');
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var rvs = sec.querySelectorAll('.abt-rv');
  var circles = sec.querySelectorAll('.abt-circle-wrap');
  var rafs = new WeakMap();

  function countUp(wrap, on){
    var num = wrap.querySelector('.abt-num'), to = +wrap.dataset.count;
    cancelAnimationFrame(rafs.get(wrap) || 0);
    if(!on){ num.textContent = 0; return; }
    if(reduce){ num.textContent = to; return; }
    var start = performance.now();
    (function tick(now){
      var t = Math.min(1, (now - start) / COUNT_MS), e = 1 - Math.pow(1 - t, 3);
      num.textContent = Math.round(to * e);
      if(t < 1) rafs.set(wrap, requestAnimationFrame(tick));
    })(start);
  }

  if(reduce || !('IntersectionObserver' in window)){
    rvs.forEach(function(el){ el.classList.add('is-in') });
    circles.forEach(function(c){ c.classList.add('is-in'); countUp(c, true) });
  } else {
    var ioText = new IntersectionObserver(function(es){
      es.forEach(function(e){ e.target.classList.toggle('is-in', e.isIntersecting) });
    }, {threshold:.25});
    rvs.forEach(function(el){ ioText.observe(el) });

    var ioCircle = new IntersectionObserver(function(es){
      es.forEach(function(e){
        e.target.classList.toggle('is-in', e.isIntersecting);
        countUp(e.target, e.isIntersecting);
      });
    }, {threshold:.3});
    circles.forEach(function(c){ ioCircle.observe(c) });
  }

  /* ---- Skater parallax: scroll ke saath thoda right/upar jata hai ---- */
  var row = document.getElementById('abtRow2'), skater = document.getElementById('abtSkater'), ticking = false;
  if(!reduce && row && skater){
    function update(){
      ticking = false;
      var r = row.getBoundingClientRect(), vh = window.innerHeight;
      var s = vh/2 - (r.top + r.height/2);          // s > 0: row upar nikal gayi
      s = Math.max(-vh, Math.min(vh, s));
      skater.style.transform = 'translate3d(' + (s*SKATER_X) + 'px,' + (-s*SKATER_Y) + 'px,0)';
    }
    function onScroll(){ if(!ticking){ ticking = true; requestAnimationFrame(update) } }
    update();
    window.addEventListener('scroll', onScroll, {passive:true});
    window.addEventListener('resize', onScroll);
  }
})();
</script>