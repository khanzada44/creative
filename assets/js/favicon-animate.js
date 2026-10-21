/* Creative Converge — animated favicon (browser tab mein chalta hai)
   SVG ki <animate> favicon mein nahi chalti, is liye ye script har frame
   canvas par icon bana kar tab ka icon badalti hai. */
(function () {
  if (window.matchMedia && matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  var S = 64, k = S / 150;
  var c = document.createElement('canvas'); c.width = c.height = S;
  var x = c.getContext && c.getContext('2d'); if (!x || !c.toDataURL) return;

  document.querySelectorAll('link[rel~="icon"]').forEach(function (l) { l.parentNode.removeChild(l); });
  var link = document.createElement('link'); link.rel = 'icon'; link.type = 'image/png';
  document.head.appendChild(link);

  var grad = x.createLinearGradient(0, 0, S, S);
  grad.addColorStop(0, '#5FF0C8'); grad.addColorStop(0.5, '#00D4A3'); grad.addColorStop(1, '#00A884');

  function rr(w, h, r) { x.beginPath(); x.moveTo(r, 0); x.arcTo(w, 0, w, h, r); x.arcTo(w, h, 0, h, r); x.arcTo(0, h, 0, 0, r); x.arcTo(0, 0, w, 0, r); x.closePath(); }
  var A = Math.atan2(33.9, 40.4), B = Math.atan2(16.8, 20);   // arc gaps (same as the SVG)

  function draw(t) {
    x.setTransform(1, 0, 0, 1, 0, 0); x.clearRect(0, 0, S, S);
    x.fillStyle = '#0A0A0A'; rr(S, S, 30 * k); x.fill();
    x.setTransform(k, 0, 0, k, 73 * k, 75 * k);
    x.lineCap = 'round';
    x.strokeStyle = grad; x.lineWidth = 24;                       // outer C
    x.beginPath(); x.arc(0, 0, 53, A, Math.PI * 2 - A); x.stroke();
    var rot = (t / 3000) * Math.PI * 2;                           // inner ring: 3s per turn
    x.strokeStyle = '#5FF0C8'; x.lineWidth = 11;
    x.beginPath(); x.arc(0, 0, 26, B + rot, Math.PI * 2 - B + rot); x.stroke();
    var r = 13 + 3 * (0.5 - 0.5 * Math.cos((t / 1600) * Math.PI * 2)); // dot: 13 -> 16 -> 13 in 1.6s
    x.fillStyle = '#5FF0C8'; x.beginPath(); x.arc(46, 0, r, 0, Math.PI * 2); x.fill();
    link.href = c.toDataURL('image/png');
  }

  var timer = null, t0 = performance.now();
  function start() { if (!timer) timer = setInterval(function () { draw(performance.now() - t0); }, 100); }
  function stop() { clearInterval(timer); timer = null; }
  document.addEventListener('visibilitychange', function () { document.hidden ? stop() : start(); });
  draw(0); start();
})();