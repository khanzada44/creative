<section class="cvg-consult" id="cvg-consult">

  <!-- Left: text + form -->
  <div class="cvg-consult-left">
    <div class="cvg-consult-glow" aria-hidden="true"></div>

    <div class="cvg-consult-content">
      <p class="cvg-consult-eyebrow">Let's get started</p>
      <h2 class="cvg-consult-title">Get a Free<br><span class="cvg-consult-title-mint">Consultation</span></h2>
      <p class="cvg-consult-lead">
        We always try to implement our creative ideas at the highest level.
        Tell us about your project and we will make it work.
      </p>

      <!-- Set "action" to your form handler (e.g. a Formspree URL or your PHP mail script) -->
      <form class="cvg-consult-form" action="#" method="post">
        <div class="cvg-consult-row">
          <div class="cvg-consult-field">
            <label for="cvg-consult-name" class="cvg-consult-sr">Name</label>
            <input type="text" id="cvg-consult-name" name="name" class="cvg-consult-input" placeholder="Name" autocomplete="name">
          </div>
          <div class="cvg-consult-field">
            <label for="cvg-consult-email" class="cvg-consult-sr">Email</label>
            <input type="email" id="cvg-consult-email" name="email" class="cvg-consult-input" placeholder="Email" autocomplete="email" required>
          </div>
        </div>

        <div class="cvg-consult-field">
          <label for="cvg-consult-phone" class="cvg-consult-sr">Phone</label>
          <input type="tel" id="cvg-consult-phone" name="phone" class="cvg-consult-input" placeholder="Phone" autocomplete="tel">
        </div>

        <div class="cvg-consult-field">
          <label for="cvg-consult-message" class="cvg-consult-sr">Message</label>
          <textarea id="cvg-consult-message" name="message" rows="4" class="cvg-consult-input cvg-consult-textarea" placeholder="Message"></textarea>
        </div>

        <button type="submit" class="cvg-consult-btn">
          Send message
          <svg class="cvg-consult-btn-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>
        </button>
      </form>
    </div>
  </div>

  <!-- Right: photo -->
  <div class="cvg-consult-right">
    <!-- Replace with your photo's URL from the Media Library -->
	 ../wp-content/uploads/2024/07/consultation-photo.jpg
    <img src="../creative-converge-new/wp-content/uploads/2024/07/conbg-1.jpg" alt="Team discussing a project around a table" class="cvg-consult-photo" loading="lazy">
  </div>

</section>
<style>
    .cvg-consult {
  --cvg-bg: #0A0A0A;
  --cvg-field: #0D1211;
  --cvg-field-line: #22302C;
  --cvg-mint: #00D4A3;
  --cvg-mint-light: #5FF0C8;
  --cvg-ink: #04342C;
  --cvg-text: #F2F5F4;
  --cvg-text-2: #C9D6D2;
  --cvg-muted: #8FA39E;

  position: relative;
  overflow: hidden;
  box-sizing: border-box;
  width: 100%;
  min-height: 640px;
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
  background: var(--cvg-bg);
  color: var(--cvg-text);
  font-family: 'Poppins', sans-serif;
  -webkit-font-smoothing: antialiased;
}

.cvg-consult *,
.cvg-consult *::before,
.cvg-consult *::after { box-sizing: border-box; }

/* ---------- Left side ---------- */
.cvg-consult .cvg-consult-left {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  padding: 110px 70px 100px 40px;
}

.cvg-consult .cvg-consult-glow {
  position: absolute;
  width: 420px;
  height: 420px;
  left: 10%;
  top: 20%;
  border-radius: 50%;
  background: var(--cvg-mint);
  opacity: 0.08;
  filter: blur(90px);
  pointer-events: none;
}

.cvg-consult .cvg-consult-content {
  position: relative;
  z-index: 1;
  width: 100%;
  max-width: 520px;
}

.cvg-consult .cvg-consult-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  margin: 0 0 16px;
  padding: 0;
  font-size: 13px;
  font-weight: 500;
  line-height: 1.4;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--cvg-mint);
}

.cvg-consult .cvg-consult-eyebrow::before {
  content: "";
  width: 36px;
  height: 2px;
  background: var(--cvg-mint);
}

.cvg-consult .cvg-consult-title {
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
  font-size: 58px;
  font-weight: 700;
  line-height: 1.05;
  letter-spacing: -0.025em;
  text-transform: none;
  color: var(--cvg-text);
}

.cvg-consult .cvg-consult-title-mint { color: var(--cvg-mint); }

.cvg-consult .cvg-consult-lead {
  max-width: 470px;
  margin: 18px 0 0;
  padding: 0;
  font-size: 17px;
  line-height: 1.65;
  color: var(--cvg-muted);
}

/* ---------- Form ---------- */
.cvg-consult .cvg-consult-form {
  display: grid;
  gap: 16px;
  margin: 36px 0 0;
  padding: 0;
}

.cvg-consult .cvg-consult-row {
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
  gap: 16px;
}

.cvg-consult .cvg-consult-field { margin: 0; }

.cvg-consult .cvg-consult-sr {
  position: absolute;
  width: 1px;
  height: 1px;
  overflow: hidden;
  clip: rect(0 0 0 0);
  white-space: nowrap;
}

.cvg-consult .cvg-consult-input {
  display: block;
  width: 100%;
  height: 58px;
  margin: 0;
  padding: 0 18px;
  border: 1px solid var(--cvg-field-line);
  border-radius: 14px;
  background: var(--cvg-field);
  box-shadow: none;
  color: var(--cvg-text);
  font-family: 'Poppins', sans-serif;
  font-size: 15px;
  line-height: 1.5;
  outline: none;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  -webkit-appearance: none;
          appearance: none;
}

.cvg-consult .cvg-consult-input::placeholder { color: var(--cvg-muted); opacity: 1; }

.cvg-consult .cvg-consult-textarea {
  height: 130px;
  min-height: 130px;
  padding-top: 16px;
  resize: vertical;
}

.cvg-consult .cvg-consult-input:hover { border-color: #2E403B; }

.cvg-consult .cvg-consult-input:focus {
  border-color: var(--cvg-mint);
  box-shadow: 0 0 0 4px rgba(0, 212, 163, 0.12);
}

.cvg-consult .cvg-consult-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  width: 100%;
  height: 54px;
  margin: 4px 0 0;
  padding: 0 28px;
  border: 0;
  border-radius: 999px;
  background: var(--cvg-mint);
  color: var(--cvg-ink);
  font-family: 'Poppins', sans-serif;
  font-size: 15px;
  font-weight: 600;
  line-height: 1;
  text-transform: none;
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.cvg-consult .cvg-consult-btn:hover {
  background: var(--cvg-mint);
  color: var(--cvg-ink);
  transform: translateY(-2px);
  box-shadow: 0 0 0 6px rgba(0, 212, 163, 0.12), 0 18px 48px rgba(0, 212, 163, 0.40);
}

.cvg-consult .cvg-consult-btn:focus-visible {
  outline: 2px solid var(--cvg-mint-light);
  outline-offset: 3px;
}

.cvg-consult .cvg-consult-btn-icon {
  width: 18px;
  height: 18px;
  fill: none;
  stroke: currentColor;
  stroke-width: 2.4;
  stroke-linecap: round;
  transition: transform 0.3s ease;
}

.cvg-consult .cvg-consult-btn:hover .cvg-consult-btn-icon { transform: translate(3px, -3px); }

/* ---------- Right side: photo ---------- */
.cvg-consult .cvg-consult-right {
  position: relative;
  min-height: 640px;
  overflow: hidden;
}

.cvg-consult .cvg-consult-photo {
  position: absolute;
  inset: 0;
  display: block;
  width: 100%;
  height: 100%;
  max-width: none;
  object-fit: cover;
  border-radius: 0;
}

/* Fades the photo into the black on the left, plus a soft green tint at the bottom */
.cvg-consult .cvg-consult-right::after {
  content: "";
  position: absolute;
  inset: 0;
  background:
    linear-gradient(90deg, #0A0A0A 0%, rgba(10, 10, 10, 0) 30%),
    linear-gradient(0deg, rgba(0, 33, 27, 0.55) 0%, rgba(0, 33, 27, 0) 50%);
  pointer-events: none;
}

.cvg-consult .cvg-consult-badge {
  position: absolute;
  right: 30px;
  bottom: 30px;
  z-index: 2;
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 14px 18px;
  border-radius: 16px;
  background: rgba(10, 10, 10, 0.78);
  border: 1px solid rgba(95, 240, 200, 0.25);
  -webkit-backdrop-filter: blur(10px);
          backdrop-filter: blur(10px);
}

.cvg-consult .cvg-consult-badge-num {
  font-size: 28px;
  font-weight: 700;
  line-height: 1;
  color: var(--cvg-mint);
}

.cvg-consult .cvg-consult-badge-text {
  font-size: 13px;
  line-height: 1.35;
  color: var(--cvg-text-2);
}

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
  .cvg-consult .cvg-consult-left { padding: 90px 40px 80px 24px; }
  .cvg-consult .cvg-consult-title { font-size: 44px; }
}

@media (max-width: 767px) {
  .cvg-consult { grid-template-columns: minmax(0, 1fr); }
  /* Photo on top, form below */
  .cvg-consult .cvg-consult-right { order: -1; min-height: 300px; }
  .cvg-consult .cvg-consult-right::after {
    background: linear-gradient(0deg, #0A0A0A 0%, rgba(10, 10, 10, 0) 45%);
  }
  .cvg-consult .cvg-consult-badge { right: 16px; bottom: 16px; }
  .cvg-consult .cvg-consult-left { padding: 40px 20px 70px; justify-content: flex-start; }
  .cvg-consult .cvg-consult-title { font-size: 36px; }
  .cvg-consult .cvg-consult-lead { font-size: 16px; }
  .cvg-consult .cvg-consult-row { grid-template-columns: minmax(0, 1fr); }
}

@media (prefers-reduced-motion: reduce) {
  .cvg-consult .cvg-consult-btn,
  .cvg-consult .cvg-consult-btn-icon,
  .cvg-consult .cvg-consult-input { transition: none; }
}
</style>