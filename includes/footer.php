<?php /* footer.php - use: <?php include 'footer.php'; ?> */ ?>
<link rel="stylesheet" href="css/footer.css">

<footer class="site-footer" id="footer">
  <div class="footer-inner">

    <!-- Row 1 -->
    <div class="footer-row top">
      <div class="footer-col">
        <a href="/" class="cvg-alogo" aria-label="Creative Converge home">
          <svg class="cvg-alogo-mark" viewBox="-70 -70 140 140" aria-hidden="true">
            <defs>
              <linearGradient id="cvgAlogoGrad" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0" stop-color="#5FF0C8" />
                <stop offset=".5" stop-color="#00D4A3" />
                <stop offset="1" stop-color="#008A72" />
              </linearGradient>
            </defs>
            <!-- Outer C -->
            <path class="cvg-alogo-ring" pathLength="1" d="M38.3 -32.1 A50 50 0 1 0 38.3 32.1"
              fill="none" stroke="url(#cvgAlogoGrad)" stroke-width="16" stroke-linecap="round" />
            <!-- Inner ring (spins forever) -->
            <g>
              <path class="cvg-alogo-ring2" pathLength="1" d="M23 -19.3 A30 30 0 1 0 23 19.3"
                fill="none" stroke="#5FF0C8" stroke-width="5" stroke-linecap="round" />
              <animateTransform attributeName="transform" type="rotate" from="0 0 0" to="360 0 0"
                dur="7s" begin="1.4s" repeatCount="indefinite" />
            </g>
            <!-- Dot + its pulse halo -->
            <circle class="cvg-alogo-halo" cx="42" cy="0" r="9" fill="#5FF0C8" />
            <circle class="cvg-alogo-dot" cx="42" cy="0" r="9" fill="#5FF0C8" />
          </svg>

          <span class="cvg-alogo-text">
            <span class="cvg-alogo-w1"><span style="--i:0">C</span><span style="--i:1">r</span><span style="--i:2">e</span><span style="--i:3">a</span><span style="--i:4">t</span><span style="--i:5">i</span><span style="--i:6">v</span><span style="--i:7">e</span></span>
            <span class="cvg-alogo-w2"><span style="--i:0">C</span><span style="--i:1">o</span><span style="--i:2">n</span><span style="--i:3">v</span><span style="--i:4">e</span><span style="--i:5">r</span><span style="--i:6">g</span><span style="--i:7">e</span><span style="--i:8" class="cvg-alogo-dotc">.</span></span>
          </span>
        </a>

        <style>
          /* ---------- Size: change only this one number ---------- */
          .cvg-alogo {
            --cvg-alogo-size: 22px;
          }

          /* text size; the whole logo scales with it */

          .cvg-alogo {
            display: inline-flex;
            align-items: center;
            gap: 0.42em;
            font-size: var(--cvg-alogo-size);
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            line-height: 1;
            text-decoration: none;
            -webkit-font-smoothing: antialiased;
          }

          .cvg-alogo:hover {
            text-decoration: none;
          }

          .cvg-alogo .cvg-alogo-mark {
            width: 2.6em;
            height: 2.6em;
            flex: none;
            overflow: visible;
          }

          .cvg-alogo .cvg-alogo-text {
            display: flex;
            flex-direction: column;
            letter-spacing: -0.02em;
            line-height: 1;
          }

          .cvg-alogo .cvg-alogo-w1 {
            color: #F2F5F4;
            overflow: hidden;
            padding-bottom: 0.08em;
          }

          .cvg-alogo .cvg-alogo-w2 {
            color: #00D4A3;
          }

          .cvg-alogo .cvg-alogo-dotc {
            color: #5FF0C8;
          }

          .cvg-alogo .cvg-alogo-w1 span,
          .cvg-alogo .cvg-alogo-w2 span {
            display: inline-block;
          }

          /* Logo on a white background? add class "cvg-alogo--dark" to the <a> */
          .cvg-alogo.cvg-alogo--dark .cvg-alogo-w1 {
            color: #0A0A0A;
          }

          /* ---------- Intro (plays once) ---------- */
          .cvg-alogo .cvg-alogo-ring,
          .cvg-alogo .cvg-alogo-ring2 {
            stroke-dasharray: 1;
          }

          .cvg-alogo .cvg-alogo-ring {
            animation: cvgAlogoDraw 1.3s ease-in-out both;
          }

          .cvg-alogo .cvg-alogo-ring2 {
            animation: cvgAlogoDrawRev 1s ease-in-out 0.35s both;
          }

          .cvg-alogo .cvg-alogo-dot,
          .cvg-alogo .cvg-alogo-halo {
            transform-box: fill-box;
            transform-origin: center;
          }

          .cvg-alogo .cvg-alogo-dot {
            animation:
              cvgAlogoPop 0.6s cubic-bezier(.3, 1.6, .5, 1) 1.2s both,
              cvgAlogoPulse 2.4s ease-in-out 2s infinite;
          }

          .cvg-alogo .cvg-alogo-halo {
            opacity: 0;
            animation: cvgAlogoHalo 2.4s ease-out 2s infinite;
          }

          .cvg-alogo .cvg-alogo-w1 span {
            animation:
              cvgAlogoRise 0.6s cubic-bezier(.2, .9, .2, 1) calc(1.5s + var(--i) * 0.045s) both,
              cvgAlogoShine 3.6s ease-in-out calc(3.4s + var(--i) * 0.07s) infinite;
          }

          .cvg-alogo .cvg-alogo-w2 span {
            animation:
              cvgAlogoSlide 0.6s cubic-bezier(.2, .9, .2, 1) calc(1.65s + var(--i) * 0.04s) both,
              cvgAlogoShine 3.6s ease-in-out calc(3.4s + var(--i) * 0.07s) infinite;
          }

          /* ---------- Keyframes ---------- */
          @keyframes cvgAlogoDraw {
            from {
              stroke-dashoffset: 1;
            }

            to {
              stroke-dashoffset: 0;
            }
          }

          @keyframes cvgAlogoDrawRev {
            from {
              stroke-dashoffset: -1;
            }

            to {
              stroke-dashoffset: 0;
            }
          }

          @keyframes cvgAlogoPop {
            from {
              transform: scale(0);
            }

            to {
              transform: scale(1);
            }
          }

          @keyframes cvgAlogoPulse {

            0%,
            100% {
              transform: scale(1);
            }

            50% {
              transform: scale(1.18);
            }
          }

          @keyframes cvgAlogoHalo {
            0% {
              transform: scale(1);
              opacity: .55;
            }

            100% {
              transform: scale(2.6);
              opacity: 0;
            }
          }

          @keyframes cvgAlogoRise {
            from {
              transform: translateY(110%);
            }

            to {
              transform: none;
            }
          }

          @keyframes cvgAlogoSlide {
            from {
              transform: translateX(-0.8em);
              opacity: 0;
            }

            to {
              transform: none;
              opacity: 1;
            }
          }

          @keyframes cvgAlogoShine {

            0%,
            24%,
            100% {
              filter: brightness(1) drop-shadow(0 0 0 rgba(95, 240, 200, 0));
            }

            10% {
              filter: brightness(1.5) drop-shadow(0 0 6px rgba(95, 240, 200, .9));
            }
          }

          /* Visitors who turned off motion see the finished logo, still */
          @media (prefers-reduced-motion: reduce) {

            .cvg-alogo .cvg-alogo-ring,
            .cvg-alogo .cvg-alogo-ring2,
            .cvg-alogo .cvg-alogo-dot,
            .cvg-alogo .cvg-alogo-halo,
            .cvg-alogo .cvg-alogo-w1 span,
            .cvg-alogo .cvg-alogo-w2 span {
              animation: none;
            }
          }
        </style>
        <p class="footer-about">
          Our digital company of professionals has been developing products for 15 years.
          We’ve got a lot of awards for our work and develop applications that became popular in the world.
        </p>
      </div>

      <div class="footer-col">
        <h4>Domain</h4>
        <ul>
          <li>Domain Name</li>
          <li>Domain Search</li>
          <li>Domain Transfer</li>
          <li>Premium Domains</li>
          <li>DNS Updation</li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Website Builder</h4>
        <ul>
          <li>Wordpress</li>
          <li>Wix</li>
          <li>Square Space</li>
          <li>Tools</li>
          <li>Tutorial</li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Support</h4>
        <ul>
          <li><a href="/creative/Terms&Conditions/index.php">Terms &amp; Conditions</a></li>
          <li><a href="privacy-policy/index.php">Privacy Policy</a></li>
          <li><a href="privacy-policy/index.php">Payments</a></li>
          <li><a href="terms-conditions/index.php">Refund</a></li>
          <li><a href="terms-conditions/index.php">Installation</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="about-us/index.php">About Us</a></li>
          <li>Partner</li>
          <li><a href="services-2/index.php">Services</a></li>
          <li><a href="pricing/index.php">Pricing</a></li>
          <li><a href="cases-2/index.php">Portfolio</a></li>
        </ul>
      </div>
    </div>

    <!-- Row 2 -->
    <div class="footer-row bottom">
      <div class="footer-col">
        <div class="footer-social">
          <a href="https://www.facebook.com/websdesignusa" target="_blank" rel="noopener" aria-label="Facebook">
            <svg viewBox="0 0 512 512">
              <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
            </svg>
          </a>
          <a href="#" target="_blank" rel="noopener" aria-label="Twitter">
            <svg viewBox="0 0 512 512">
              <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
            </svg>
          </a>
          <a href="#" target="_blank" rel="noopener" aria-label="LinkedIn">
            <svg viewBox="0 0 448 512">
              <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
            </svg>
          </a>
          <a href="#" target="_blank" rel="noopener" aria-label="Instagram">
            <svg viewBox="0 0 448 512">
              <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
            </svg>
          </a>
        </div>
        <p class="footer-note">We are Experts in Our Field. We do everything at a high level.</p>
      </div>

      <div class="footer-col">
        <h4>Working hours:</h4>
        <ul>
          <li>Mon - Fri: 9 am - 6 pm</li>
          <li>Sat, Sun: Holiday</li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Address:</h4>
        <ul>
          <li><a href="https://maps.app.goo.gl/ReeC4BQuP1hzAKDx9" target="_blank" rel="noopener">19002 Mission Park Dr, Richmond, TX 77407</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Hit us up:</h4>
        <ul>
          <li><a href="mailto:info@websdesignusa.com">info@websdesignusa.com</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Trust Pilot</h4>
        <a class="trustpilot-link" href="https://www.trustpilot.com/review/websdesignusa.com" target="_blank" rel="noopener">Trustpilot</a>
      </div>
    </div>

  </div>

  <div class="footer-copy">
    <p>Copyright &copy; <?php echo date('Y'); ?> Webs Design USA. All Rights Reserved.</p>
  </div>

  <a class="to-top" href="#top" aria-label="Back to top">
    <svg viewBox="0 0 448 512">
      <path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z" />
    </svg>
  </a>
</footer>