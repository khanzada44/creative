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
    width:256px;height:256px;border-radius:50%;border:1px solid rgba(255,255,255,.7);
    display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:24px;
    opacity:0;transform:translate3d(var(--hx,0px),0,0);
  }
  .abt-circle-wrap.is-in .abt-circle{
    opacity:1;transform:translate3d(0,0,0);
    transition:opacity .8s ease-out,transform .8s cubic-bezier(.22,.61,.36,1);
  }
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
    .abt-skater{transform:none!important}
  }
</style>

<section class="abt" id="about">
  <div class="abt-inner">

    <!-- ROW 1: text left, 15 Awards circle right -->
    <div class="abt-row is-top">
      <span class="abt-watermark" aria-hidden="true">ABOUT US</span>

      <div class="abt-col">
        <div class="abt-rv" style="--from:.9"><div class="abt-rv-in">
          <div class="abt-label"><span>About us</span></div>
          <h2>We are creative &amp; strong team</h2>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:150ms"><div class="abt-rv-in">
          <p>Our creative and professional agency has been developing products for 15 years. We are special.</p>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:300ms"><div class="abt-rv-in">
          <p class="dim">We’ve got a lot of awards for our work and develop applications that became popular in the world. We try not to miss important details in each area.</p>
        </div></div>
      </div>

      <div class="abt-circle-col">
        <div class="abt-circle-wrap" data-count="15">
          <div class="abt-circle"><span class="abt-num">0</span><span class="abt-cap">Awards Winning</span></div>
        </div>
      </div>
    </div>

    <!-- ROW 2: 9 Years circle + skater left, working day text right -->
    <div class="abt-row" id="abtRow2">
      <div class="abt-circle-skater">
        <div class="abt-circle-wrap" data-count="9" style="--hx:-160px">
          <div class="abt-circle"><span class="abt-num">0</span><span class="abt-cap">Years Experience</span></div>
        </div>
        <img class="abt-skater" id="abtSkater" src="<?= htmlspecialchars($skater) ?>" alt="" aria-hidden="true">
      </div>

      <div class="abt-col" style="z-index:auto">
        <div class="abt-rv" style="--from:.9"><div class="abt-rv-in">
          <h3>How our working day starts</h3>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:150ms"><div class="abt-rv-in">
          <p>A typical day at a web design company begins with a team huddle to align on priorities and check emails or messages. The team then focuses on client communication, planning, and brainstorming for current projects.</p>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:300ms"><div class="abt-rv-in">
          <p class="dim">Designers work on wireframes and visual designs, while developers focus on coding and website functionality. Throughout the day, there are client calls, feedback sessions, and internal reviews to ensure the project is on track. The day wraps up with a brief debrief meeting, preparing deliverables, and setting up tasks for the next day.</p>
        </div></div>
      </div>
    </div>

    <!-- ROW 3: Individual approach text left, 354 Projects circle right -->
    <div class="abt-row">
      <div class="abt-col" style="z-index:auto">
        <div class="abt-rv" style="--from:.9"><div class="abt-rv-in">
          <h3>Individual approach</h3>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:150ms"><div class="abt-rv-in">
          <p>As a web design company, our individual approach is centered around creativity, collaboration, and client satisfaction. We take the time to understand each client’s unique needs, goals, and brand identity, ensuring that our designs are tailored specifically for them.</p>
        </div></div>

        <div class="abt-rv" style="--from:.4;--delay:300ms"><div class="abt-rv-in">
          <p class="dim">Our process is highly collaborative, involving regular communication with clients to gather feedback and refine our work. We prioritize user experience (UX) and responsive design to ensure that websites are not only visually appealing but also intuitive and accessible across all devices.</p>
        </div></div>
      </div>

      <div class="abt-circle-col" style="z-index:auto">
        <div class="abt-circle-wrap" data-count="354">
          <div class="abt-circle"><span class="abt-num">0</span><span class="abt-cap">Successful Projects</span></div>
        </div>
      </div>
    </div>

  </div>
</section>

<script>
(function(){
  /* ---- Settings (tweak kar sakte ho) ---- */
  var SKATER_X = 0.18;   // scroll ke saath skater kitna right/left khisakta hai
  var SKATER_Y = 0.09;   // scroll ke saath skater kitna upar/neeche khisakta hai
  var COUNT_MS = 1600;   // counter ka time

  var sec = document.getElementById('about');
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---- Reveal + circles: screen ma aaye to .is-in, bahar jaye to hat jaye (repeat) ---- */
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