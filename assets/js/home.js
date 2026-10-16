// Hero video popup
(function () {
  var dlg = document.getElementById('videoDialog');
  var open = document.getElementById('playBtn');
  if (!dlg || !open) return;
  var vid = dlg.querySelector('video');
  open.addEventListener('click', function () { dlg.showModal(); vid.play(); });
  function close() { vid.pause(); dlg.close(); }
  dlg.querySelector('.video-close').addEventListener('click', close);
  dlg.addEventListener('click', function (e) { if (e.target === dlg) close(); });
  dlg.addEventListener('close', function () { vid.pause(); });
})();