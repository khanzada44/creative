<?php

$vdEnd = new DateTime('2026-11-11 23:59:59', new DateTimeZone('America/Chicago'));
$vdNow = new DateTime('now', new DateTimeZone('America/Chicago'));
if ($vdNow > $vdEnd) return; 

$vdCta   = function_exists('cvg_url') ? cvg_url('contact-us') : '/contact-us/';
$vdPhone = '+18556774898';
$vdPhoneText = '(855) 677-4898';
$vdEndIso = $vdEnd->format('c');
?>
<aside class="vdw" id="vdw" role="dialog" aria-label="Veterans Day offer" hidden>
  <button type="button" class="vdw-x" id="vdwClose" aria-label="Close offer">&times;</button>
  <span class="vdw-fx" id="vdwFx" aria-hidden="true"></span>

  <!-- Waving USA flag (pole + kapda) -->
  <div class="vdw-flagwrap" aria-hidden="true">
    <span class="vdw-pole"></span>
    <span class="vdw-flag" id="vdwFlag"></span>
    <span class="vdw-thanks">Thank You,<br><b>Veterans</b></span>
  </div>

  <div class="vdw-body">
    <p class="vdw-badge">★ Veterans Day Special ★</p>
    <p class="vdw-limited" aria-label="Limited Time Offer"><span id="vdwLimited">Limited Time Offer</span></p>
    <p class="vdw-headline">Get Up to <span>40% OFF!</span></p>
    <p class="vdw-sub">on this Veterans Day</p>

    <div class="vdw-timer" id="vdwTimer" aria-live="polite">
      <div><b id="vdwH">00</b></div>
      <div><b id="vdwM">00</b></div>
      <div><b id="vdwS">00</b></div>
    </div>

    <a class="vdw-cta" href="<?= htmlspecialchars($vdCta) ?>">
      Claim My 40% OFF
      <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>
    </a>
  </div>
</aside>

<style>
.vdw{
  --navy:#0b1f4d; --navy2:#13306f; --red:#e11d2e; --red2:#ff3b4e; --gold:#ffcc4d; --white:#fff;
  position:fixed; left:20px; bottom:20px; z-index:9998;
  width:260px; max-width:calc(100vw - 24px);
  zoom:.8;   /* poora widget chhota (0.8 = 80%). Aur chhota: .7 · Bara: .9 */
  font-family:'Poppins',system-ui,sans-serif; color:var(--white);
  border-radius:18px; overflow:hidden;
  /* Transparent (glass) — peeche ka page halka sa nazar aata hai */
  background:
    radial-gradient(120% 80% at 100% 0%, rgba(225,29,46,.28), transparent 55%),
    linear-gradient(160deg, rgba(19,48,111,.38) 0%, rgba(11,31,77,.32) 60%, rgba(7,20,51,.42) 100%);
  -webkit-backdrop-filter: blur(6px) saturate(140%);
  backdrop-filter: blur(6px) saturate(140%);
  box-shadow:0 18px 40px rgba(0,0,0,.25), 0 0 0 1px rgba(255,255,255,.22) inset;
  text-shadow:0 1px 3px rgba(0,0,0,.55);
  transform:translateY(30px) scale(.96); opacity:0;
  transition:transform .55s cubic-bezier(.2,1.3,.3,1), opacity .4s ease;
}
/* Aate waqt uchhal kar aata hai, phir halka sa tairta hai, aur border laal ↔ neeli chamakti hai */
.vdw.vdw-in{
  transform:none; opacity:1;
  animation:vdwPop .7s cubic-bezier(.2,1.6,.4,1) both, vdwFloat 4s ease-in-out .7s infinite, vdwRing 2.4s linear infinite;
}
/* chamakte taare peeche */
.vdw::before{
  content:""; position:absolute; inset:0; pointer-events:none; opacity:.35;
  background-image:
    radial-gradient(1.6px 1.6px at 20% 30%, #fff 50%, transparent 51%),
    radial-gradient(1.2px 1.2px at 70% 18%, #fff 50%, transparent 51%),
    radial-gradient(1.4px 1.4px at 85% 62%, #fff 50%, transparent 51%),
    radial-gradient(1px 1px at 40% 80%, #fff 50%, transparent 51%),
    radial-gradient(1.3px 1.3px at 58% 45%, #fff 50%, transparent 51%);
  animation:vdwTwinkle 3.5s ease-in-out infinite;
}
/* neeche laal-safed dhariyan */
.vdw::after{
  content:""; position:absolute; left:0; right:0; bottom:0; height:4px;
  background:repeating-linear-gradient(90deg, var(--red) 0 22px, #fff 22px 44px, #2a5bd7 44px 66px);
  background-size:66px 100%; animation:vdwStripes 1.2s linear infinite;
}
/* atishbazi (fireworks / confetti) */
.vdw-fx{ position:absolute; inset:0; pointer-events:none; z-index:2; overflow:hidden; }
.vdw-fx i{
  position:absolute; left:var(--x); top:var(--y); width:6px; height:6px; border-radius:50%;
  background:var(--c); opacity:0; box-shadow:0 0 6px var(--c);
  animation:vdwBurst 1.3s cubic-bezier(.15,.7,.3,1) var(--d) infinite;
}
.vdw-fx i.sq{ border-radius:1px; width:5px; height:8px; }
.vdw-x{
  position:absolute; top:8px; right:8px; z-index:3; width:24px; height:24px; border-radius:50%;
  border:0; cursor:pointer; font-size:16px; line-height:1; color:#fff; background:rgba(255,255,255,.14);
  transition:background .2s, transform .2s;
}
.vdw-x:hover{ background:var(--red); transform:rotate(90deg); }

/* ---------- Flag ---------- */
.vdw-flagwrap{ position:relative; height:58px; padding:12px 0 0 18px; }
.vdw-thanks{
  position:absolute; left:104px; top:16px; text-align:left;
  font-size:10.5px; font-style:italic; line-height:1.2; color:#cfd9ff;
}
.vdw-thanks b{ font-size:14px; font-style:normal; font-weight:800; color:#fff; }
.vdw-pole{
  position:absolute; left:15px; top:9px; width:3px; height:48px; border-radius:2px;
  background:linear-gradient(90deg,#d9dde4,#8b93a1);
}
.vdw-pole::before{ content:""; position:absolute; top:-5px; left:-2.5px; width:8px; height:8px; border-radius:50%; background:var(--gold); box-shadow:0 0 10px var(--gold); }
.vdw-flag{
  position:relative; display:flex; width:76px; height:40px; margin-left:2px;
  filter:drop-shadow(0 6px 10px rgba(0,0,0,.35));
}
.vdw-flag i{
  flex:1; height:100%; display:block;
  background-image:var(--vdw-flag-img); background-size:76px 40px; background-repeat:no-repeat;
  animation:vdwWave 1.9s ease-in-out infinite;
}
/* hawa ka saya (kapde ki silwatein) */
.vdw-flag::after{
  content:""; position:absolute; inset:0; pointer-events:none; mix-blend-mode:multiply;
  background:linear-gradient(90deg, rgba(0,0,0,0) 0%, rgba(0,0,0,.18) 18%, rgba(0,0,0,0) 32%, rgba(0,0,0,.16) 52%, rgba(0,0,0,0) 68%, rgba(0,0,0,.14) 86%, rgba(0,0,0,0) 100%);
  background-size:200% 100%; animation:vdwShade 1.9s linear infinite;
}

/* ---------- Text ---------- */
.vdw-body{ position:relative; z-index:1; padding:4px 16px 16px; text-align:center; }
.vdw-badge{
  display:inline-block; margin:0; padding:3px 10px; border-radius:999px;
  font-size:9.5px; font-weight:700; letter-spacing:.12em; text-transform:uppercase;
  color:#3a2600; background:linear-gradient(90deg,#ffd76b,#ffb92e); box-shadow:0 4px 14px rgba(255,185,46,.35);
  animation:vdwWiggle 4s ease-in-out 1.2s infinite;
  text-shadow:none;
}
.vdw-limited{
  display:inline-flex; align-items:center; gap:6px; margin:8px 0 2px; padding:3px 10px 3px 8px;
  border-radius:999px; font-size:10.5px; font-weight:800; letter-spacing:.14em; text-transform:uppercase;
  color:#fff; background:rgba(225,29,46,.22); border:1px solid rgba(255,90,105,.55);
  animation:vdwLimitedGlow 1.6s ease-in-out infinite;
}
.vdw-dot{ width:7px; height:7px; border-radius:50%; background:#ff3b4e; box-shadow:0 0 0 0 rgba(255,59,78,.7); animation:vdwDot 1s ease-out infinite; }
#vdwLimited span{ display:inline-block; animation:vdwLetter 1.8s ease-in-out infinite; animation-delay:calc(var(--i) * .06s); }
#vdwLimited span.sp{ width:.35em; }
.vdw-headline{ margin:0; font-size:18px; font-weight:800; line-height:1.15; }
.vdw-headline span{
  display:inline-block; font-size:28px;
  background:linear-gradient(90deg,#ff4d5e 0%,#ffffff 50%,#5b8cff 100%);
  background-size:200% 100%;
  -webkit-background-clip:text; background-clip:text; -webkit-text-fill-color:transparent; color:#fff;
  animation:vdwShine 3s linear infinite, vdwBig 3s ease-in-out infinite;
  text-shadow:none; filter:drop-shadow(0 1px 2px rgba(0,0,0,.45));
}
.vdw-sub{ margin:2px 0 0; font-size:11.5px; color:#dfe6ff; }

.vdw-timer{ display:flex; justify-content:center; gap:6px; margin:10px 0 0; }
.vdw-timer div{
  min-width:44px; padding:4px 0 3px; border-radius:9px;
  border:1px solid rgba(255,255,255,.3); background:rgba(255,255,255,.08);
}
.vdw-timer b{ display:block; font-size:15px; font-weight:800; line-height:1.1; }
.vdw-timer small{ font-size:8.5px; letter-spacing:.1em; text-transform:uppercase; color:#cfd9ff; }

.vdw-cta{
  display:flex; align-items:center; justify-content:center; gap:6px; margin-top:11px;
  padding:9px 14px; border-radius:999px; text-decoration:none;
  font-size:13px; font-weight:700; color:#fff !important;
  background:linear-gradient(90deg,var(--red) 0%,var(--red2) 100%);
  box-shadow:0 10px 24px rgba(225,29,46,.45);
  animation:vdwPulse 2.2s ease-in-out infinite;
  transition:transform .2s;
}
.vdw-cta{ position:relative; overflow:hidden; }
.vdw-cta::after{
  content:""; position:absolute; top:0; left:-60%; width:45%; height:100%;
  background:linear-gradient(100deg,transparent,rgba(255,255,255,.55),transparent); transform:skewX(-20deg);
  animation:vdwSweep 2.6s ease-in-out infinite;
}
.vdw-cta:hover{ transform:translateY(-2px) scale(1.02); }
/* seconds badalte waqt flip */
.vdw-timer b.flip{ animation:vdwFlip .35s ease; }
.vdw-cta svg{ width:13px; height:13px; fill:none; stroke:currentColor; stroke-width:2.6; stroke-linecap:round; }
.vdw-call{ display:inline-block; margin-top:9px; font-size:12.5px; color:#cfd9ff !important; text-decoration:underline; }
.vdw-call:hover{ color:#fff !important; }

@keyframes vdwPop{ 0%{ transform:translateY(60px) scale(.7) rotate(-6deg); opacity:0 } 60%{ transform:translateY(-8px) scale(1.04) rotate(1.5deg); opacity:1 } 100%{ transform:none; opacity:1 } }
@keyframes vdwFloat{ 0%,100%{ transform:translateY(0) } 50%{ transform:translateY(-5px) } }
@keyframes vdwRing{ 0%{ box-shadow:0 18px 40px rgba(0,0,0,.25), 0 0 0 2px rgba(255,59,78,.9), 0 0 22px rgba(255,59,78,.45) } 50%{ box-shadow:0 18px 40px rgba(0,0,0,.25), 0 0 0 2px rgba(91,140,255,.95), 0 0 22px rgba(91,140,255,.45) } 100%{ box-shadow:0 18px 40px rgba(0,0,0,.25), 0 0 0 2px rgba(255,59,78,.9), 0 0 22px rgba(255,59,78,.45) } }
@keyframes vdwStripes{ to{ background-position:66px 0 } }
@keyframes vdwBurst{ 0%{ opacity:0; transform:translate(0,0) scale(.4) } 10%{ opacity:1 } 100%{ opacity:0; transform:translate(var(--tx),var(--ty)) scale(1) rotate(220deg) } }
@keyframes vdwLimitedGlow{ 0%,100%{ box-shadow:0 0 0 0 rgba(255,59,78,0) } 50%{ box-shadow:0 0 14px 2px rgba(255,59,78,.55) } }
@keyframes vdwDot{ 0%{ box-shadow:0 0 0 0 rgba(255,59,78,.7) } 100%{ box-shadow:0 0 0 8px rgba(255,59,78,0) } }
@keyframes vdwLetter{ 0%,60%,100%{ transform:translateY(0); color:#fff } 30%{ transform:translateY(-3px); color:#ffd76b } }
@keyframes vdwBig{ 0%,70%,100%{ transform:scale(1) } 80%{ transform:scale(1.14) rotate(-2deg) } 90%{ transform:scale(.97) } }
@keyframes vdwWiggle{ 0%,88%,100%{ transform:rotate(0) } 91%{ transform:rotate(-5deg) } 94%{ transform:rotate(5deg) } 97%{ transform:rotate(-3deg) } }
@keyframes vdwSweep{ 0%,55%{ left:-60% } 100%{ left:130% } }
@keyframes vdwFlip{ 0%{ transform:rotateX(90deg); opacity:.3 } 100%{ transform:none; opacity:1 } }
@keyframes vdwWave{ 0%,100%{ transform:translateY(0) } 50%{ transform:translateY(-3px) } }
@keyframes vdwShade{ from{ background-position:0 0 } to{ background-position:-200% 0 } }
@keyframes vdwShine{ from{ background-position:0 0 } to{ background-position:-200% 0 } }
@keyframes vdwTwinkle{ 0%,100%{ opacity:.25 } 50%{ opacity:.5 } }
@keyframes vdwPulse{ 0%,100%{ box-shadow:0 10px 24px rgba(225,29,46,.45), 0 0 0 0 rgba(255,59,78,.5) } 50%{ box-shadow:0 10px 24px rgba(225,29,46,.45), 0 0 0 10px rgba(255,59,78,0) } }

@media (max-width:480px){
  .vdw{ left:12px; bottom:12px; zoom:.75; }
}
@media (prefers-reduced-motion:reduce){
  .vdw, .vdw *, .vdw::before, .vdw::after, .vdw-cta::after{ animation:none !important; transition:none !important; }
  .vdw-fx{ display:none; }
}
</style>

<script>
(function () {
  var box = document.getElementById('vdw');
  if (!box) return;
  var end = new Date('<?= $vdEndIso ?>').getTime();
  var FIRST_DELAY = 2000;    // page khulne ke kitni der baad pehli dafa aaye (2 sec)
  var REOPEN_DELAY = 15000;  // band karne ke kitni der baad dobara aaye (15 sec)
  if (Date.now() > end) return;

  /* ---- USA flag (13 stripes + 50 stars) SVG se banta hai ---- */
  var W = 190, H = 100, s = H / 13, cw = W * 0.4, ch = s * 7, svg = '';
  for (var i = 0; i < 13; i++) svg += '<rect y="' + (i * s) + '" width="' + W + '" height="' + s + '" fill="' + (i % 2 ? '#fff' : '#B22234') + '"/>';
  svg += '<rect width="' + cw + '" height="' + ch + '" fill="#3C3B6E"/>';
  for (var r = 0; r < 9; r++) {
    var n = r % 2 ? 5 : 6;
    for (var c = 0; c < n; c++) {
      var x = (r % 2 ? 2 : 1) * (cw / 12) + c * (cw / 6), y = (r + 1) * (ch / 10);
      svg += '<circle cx="' + x.toFixed(1) + '" cy="' + y.toFixed(1) + '" r="2.1" fill="#fff"/>';
    }
  }
  var url = 'url("data:image/svg+xml,' + encodeURIComponent('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ' + W + ' ' + H + '" preserveAspectRatio="none">' + svg + '</svg>') + '")';

  // Kapde ko patli patiyon mein kaat kar har pati ko thoda der se lehrao = waving flag
  var flag = document.getElementById('vdwFlag'), SL = 19, fw = 76;
  flag.style.setProperty('--vdw-flag-img', url);
  for (var k = 0; k < SL; k++) {
    var el = document.createElement('i');
    el.style.backgroundPosition = (-(k * fw / SL)) + 'px 0';
    el.style.animationDelay = (-(k * 0.06)) + 's';
    flag.appendChild(el);
  }

  /* ---- "Limited Time Offer" ke har harf ki lehar ---- */
  var lt = document.getElementById('vdwLimited');
  lt.innerHTML = lt.textContent.split('').map(function (ch, i) {
    return ch === ' ' ? '<span class="sp" style="--i:' + i + '"> </span>' : '<span style="--i:' + i + '">' + ch + '</span>';
  }).join('');

  /* ---- Atishbazi: 3 jagah se rangeen zarre phootte hain ---- */
  var fx = document.getElementById('vdwFx');
  var COLORS = ['#ff3b4e', '#ffffff', '#5b8cff', '#ffd76b'];
  var CENTERS = [[78, 12, 0], [22, 30, .45], [60, 26, .9]]; // x%, y%, delay(s)
  CENTERS.forEach(function (c) {
    for (var j = 0; j < 10; j++) {
      var a = (Math.PI * 2 * j) / 10, dist = 34 + Math.random() * 22;
      var p = document.createElement('i');
      if (j % 3 === 0) p.className = 'sq';
      p.style.cssText = '--x:' + c[0] + '%;--y:' + c[1] + '%;--c:' + COLORS[j % 4] +
        ';--tx:' + (Math.cos(a) * dist).toFixed(1) + 'px;--ty:' + (Math.sin(a) * dist + 14).toFixed(1) +
        'px;--d:' + (c[2] + Math.random() * .15).toFixed(2) + 's';
      fx.appendChild(p);
    }
  });

  /* ---- Countdown ---- */
  var H_ = document.getElementById('vdwH'), M_ = document.getElementById('vdwM'), S_ = document.getElementById('vdwS');
  var pad = function (v) { return (v < 10 ? '0' : '') + v; };
  var tick = function () {
    var left = Math.max(0, end - Date.now());
    if (!left) { box.remove(); return; }
    var t = Math.floor(left / 1000);
    H_.textContent = pad(Math.floor(t / 3600)); M_.textContent = pad(Math.floor(t % 3600 / 60)); S_.textContent = pad(t % 60);
    S_.classList.remove('flip'); void S_.offsetWidth; S_.classList.add('flip');
  };
  tick(); var timer = setInterval(tick, 1000);

  /* ---- Dikhao / band karo ----
     Pehli dafa 2 sec baad aata hai. × dabane par chhup jata hai aur
     15 sec baad DOBARA aa jata hai — har dafa (offer khatam hone tak). */
  var reopenTimer = null;
  function show() {
    if (!document.body.contains(box)) return;          // offer khatam ho gaya
    box.hidden = false;
    box.classList.remove('vdw-in');
    void box.offsetWidth;                               // animation dobara chalane ke liye
    requestAnimationFrame(function () { box.classList.add('vdw-in'); });
  }
  function hide() {
    box.classList.remove('vdw-in');
    setTimeout(function () { box.hidden = true; }, 400);
    clearTimeout(reopenTimer);
    reopenTimer = setTimeout(show, REOPEN_DELAY);
  }

  setTimeout(show, FIRST_DELAY);
  document.getElementById('vdwClose').addEventListener('click', hide);
})();
</script>