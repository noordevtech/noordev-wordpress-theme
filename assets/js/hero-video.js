/* Hero showreel sound toggle (Vimeo background video).
   Depends on https://player.vimeo.com/api/player.js being loaded first. */
(function () {
  var iframe = document.getElementById('hero-vimeo');
  var btn    = document.getElementById('hero-sound-toggle');
  var label  = document.getElementById('hero-sound-label');
  var icon   = document.getElementById('hero-sound-icon');
  if (!window.Vimeo || !iframe || !btn) return;

  var player = new window.Vimeo.Player(iframe);
  var unmuted = false;

  btn.addEventListener('click', async function () {
    unmuted = !unmuted;
    try {
      await player.setMuted(!unmuted);
      await player.setVolume(unmuted ? 0.6 : 0);
    } catch (e) { /* ignore — Vimeo may be blocked */ }
    btn.setAttribute('aria-pressed', String(unmuted));
    if (label) label.textContent = unmuted ? 'Sound on' : 'Sound off';
    if (icon) {
      icon.innerHTML = unmuted
        ? '<path d="M4 9 H8 L13 4 V20 L8 15 H4 Z"/><path d="M16 9 C18 11 18 13 16 15"/><path d="M19 6 C22 9 22 15 19 18"/>'
        : '<path d="M4 9 H8 L13 4 V20 L8 15 H4 Z"/><path d="M17 8 L21 16 M21 8 L17 16"/>';
    }
  });
})();
