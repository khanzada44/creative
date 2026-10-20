<?php
require __DIR__ . '/pricing-data.php';

if (!function_exists('cvg_pp_e')) {
    function cvg_pp_e($s)
    {
        return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
    }
}

$cvgPPFirst = array_key_first($cvgPricing);
?>
<main class="cvg-pp" id="cvg-pricing-page">
    <section class="cvg-pp-banner">
        <span class="cvg-pp-glow cvg-pp-glow--a" aria-hidden="true"></span>
        <span class="cvg-pp-glow cvg-pp-glow--b" aria-hidden="true"></span>
        <span class="cvg-pp-gridbg" aria-hidden="true"></span>


        <div class="cvg-pp-wrap cvg-pp-banner-inner">
            <div class="cvg-pp-banner-copy">
                <p class="cvg-pp-eyebrow cvg-pp-rv">Welcome to Creative Converge</p>
                <h1 class="cvg-pp-h1">
                    <span class="cvg-pp-line"><span>Our Best</span></span>
                    <span class="cvg-pp-line"><span class="cvg-pp-mint">Prices</span></span>
                </h1>
                <p class="cvg-pp-lead cvg-pp-rv" style="--d:.35s">Our team welcomes your questions, comments and suggestions. It is our pleasure to hear from you.</p>
                <a href="#cvg-pp-packages" class="cvg-pp-btn cvg-pp-btn--mint cvg-pp-rv" style="--d:.5s">View packages
                </a>
            </div>

            <!-- Set action="" to your form handler -->
            <form class="cvg-pp-form cvg-pp-form--line cvg-pp-rv" style="--d:.25s" action="#" method="post" novalidate>
                <div class="cvg-pp-form-row">
                    <label class="cvg-pp-field"><span class="cvg-pp-sr">Name</span><input type="text" name="name" placeholder="Name" autocomplete="name" required></label>
                    <label class="cvg-pp-field"><span class="cvg-pp-sr">Phone</span><input type="tel" name="phone" placeholder="Phone" autocomplete="tel"></label>
                </div>
                <label class="cvg-pp-field"><span class="cvg-pp-sr">Email</span><input type="email" name="email" placeholder="Email" autocomplete="email" required></label>
                <label class="cvg-pp-field"><span class="cvg-pp-sr">Message</span><textarea name="message" rows="3" placeholder="Message"></textarea></label>
                <p class="cvg-pp-form-error" role="alert" hidden>Enter your name and a valid email.</p>
                <button type="submit" class="cvg-pp-btn cvg-pp-btn--outline">Send</button>
            </form>
        </div>
    </section>
    <style>
        /* ===== Underline-style form (like the screenshot) ===== */
        .cvg-pp .cvg-pp-form--line {
            gap: 34px;
            padding: 0;
            background: none;
            border: 0;
            border-radius: 0;
             
            -webkit-backdrop-filter: none;
            backdrop-filter: none;
        }

        .cvg-pp .cvg-pp-form--line .cvg-pp-form-row {
            gap: 14px;
        }

        .cvg-pp .cvg-pp-form--line .cvg-pp-field {
            position: relative;
        }

        .cvg-pp .cvg-pp-form--line .cvg-pp-field input,
        .cvg-pp .cvg-pp-form--line .cvg-pp-field textarea {
            height: 48px;
            padding: 0 16px;
            border: 0;
            border-bottom: 1.5px solid rgba(242, 245, 244, .35);
            border-radius: 0;
            background: transparent;
             
            font-size: 17px;
            color: #F2F5F4;
        }

        .cvg-pp .cvg-pp-form--line .cvg-pp-field textarea {
            height: 110px;
            padding-top: 10px;
        }

        .cvg-pp .cvg-pp-form--line .cvg-pp-field input::placeholder,
        .cvg-pp .cvg-pp-form--line .cvg-pp-field textarea::placeholder {
            color: #A7B4B0;
        }

        /* Mint line that grows from the left when a field is active */
        .cvg-pp .cvg-pp-form--line .cvg-pp-field::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            background: #00D4A3;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .45s cubic-bezier(.2, .9, .2, 1);
            pointer-events: none;
        }

        .cvg-pp .cvg-pp-form--line .cvg-pp-field:focus-within::after {
            transform: scaleX(1);
        }

        .cvg-pp .cvg-pp-form--line .cvg-pp-field input:focus,
        .cvg-pp .cvg-pp-form--line .cvg-pp-field textarea:focus {
            border-bottom-color: transparent;
             
        }

        /* Outline "Send" button */
        .cvg-pp .cvg-pp-btn--outline {
            justify-self: start;
            height: 46px;
            margin-top: 10px;
            padding: 0 30px;
            border: 2px solid #00A884;
            background: transparent;
            color: #00D4A3;
            font-size: 16px;
            font-weight: 500;
             
        }

        .cvg-pp .cvg-pp-btn--outline:hover {
            background: #00D4A3;
            border-color: #00D4A3;
            color: #04342C;
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(0, 212, 163, .3);
        }

        @media (max-width: 640px) {
            .cvg-pp .cvg-pp-form--line {
                gap: 26px;
            }
        }
    </style>

    <!-- ================= 2. PACKAGES WITH TABS ================= -->
    <section class="cvg-pp-packages" id="cvg-pp-packages">
        <div class="cvg-pp-wrap">
            <div class="cvg-pp-head">
                <p class="cvg-pp-eyebrow cvg-pp-rv">How much does it cost</p>
                <h2 class="cvg-pp-h2 cvg-pp-rv" style="--d:.1s">Pricing <span class="cvg-pp-mint">packages.</span></h2>
                <p class="cvg-pp-sub cvg-pp-rv" style="--d:.2s">Clear packages for every stage of your business. Add $50 to any plan for expedited delivery.</p>
            </div>

            <div class="cvg-pp-tabs-wrap cvg-pp-rv" style="--d:.25s">
                <div class="cvg-pp-tabs" role="tablist" aria-label="Pricing categories">
                    <?php foreach ($cvgPricing as $key => $tab): $on = ($key === $cvgPPFirst); ?>
                        <button type="button" role="tab" class="cvg-pp-tab<?= $on ? ' is-active' : '' ?>"
                            id="cvg-pp-tab-<?= cvg_pp_e($key) ?>" aria-controls="cvg-pp-panel-<?= cvg_pp_e($key) ?>"
                            aria-selected="<?= $on ? 'true' : 'false' ?>" tabindex="<?= $on ? '0' : '-1' ?>"
                            data-key="<?= cvg_pp_e($key) ?>"><?= cvg_pp_e($tab['label']) ?></button>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php foreach ($cvgPricing as $key => $tab): $on = ($key === $cvgPPFirst); ?>
                <div class="cvg-pp-panel<?= $on ? ' is-active' : '' ?>" role="tabpanel" id="cvg-pp-panel-<?= cvg_pp_e($key) ?>"
                    aria-labelledby="cvg-pp-tab-<?= cvg_pp_e($key) ?>" <?= $on ? '' : 'hidden' ?>>
                    <div class="cvg-pp-cards">
                        <?php foreach ($tab['packages'] as $i => $p): ?>
                            <article class="cvg-pp-card<?= !empty($p['popular']) ? ' cvg-pp-card--featured' : '' ?>" style="--i:<?= (int) $i ?>">
                                <?php if (!empty($p['popular'])): ?><span class="cvg-pp-shine" aria-hidden="true"></span><?php endif; ?>
                                <div class="cvg-pp-card-top">
                                    <h3 class="cvg-pp-name"><?= cvg_pp_e($p['name']) ?></h3>
                                    <?php if (!empty($p['popular'])): ?><span class="cvg-pp-badge">Most popular</span><?php endif; ?>
                                </div>
                                <p class="cvg-pp-price"><span class="cvg-pp-cur">$</span><?= cvg_pp_e($p['price']) ?><span class="cvg-pp-cents">.<?= cvg_pp_e($p['cents']) ?></span></p>
                                <?php if ($p['note'] !== ''): ?><p class="cvg-pp-note"><?= cvg_pp_e($p['note']) ?></p><?php endif; ?>

                                <!-- saari features ek scrollable list mein (ab "+ more" button nahi) -->
                                <ul class="cvg-pp-list" tabindex="0" aria-label="<?= cvg_pp_e($p['name']) ?> features">
                                    <?php foreach ($p['features'] as $f):
                                        $isGroup = (strpos($f, '## ') === 0);
                                        $cls = $isGroup ? 'cvg-pp-group' : ('cvg-pp-li' . (stripos($f, 'additional') !== false ? ' cvg-pp-addon' : ''));
                                    ?>
                                        <li class="<?= $cls ?>"><?= cvg_pp_e($isGroup ? substr($f, 3) : $f) ?></li>
                                    <?php endforeach; ?>
                                </ul>

                                <a href="<?= cvg_url($p['link']) ?>" class="cvg-pp-btn <?= !empty($p['popular']) ? 'cvg-pp-btn--dark' : 'cvg-pp-btn--ghost' ?> cvg-pp-btn--block cvg-pp-buy">Buy now</a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <style>
        /* ===== TABS: center + wrap (jo fit na hon neeche aa kar center mein) + underline ===== */
        .cvg-pp .cvg-pp-tabs-wrap {
            overflow: visible;
        }

        .cvg-pp .cvg-pp-tabs {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 8px 36px;
            max-width: 1000px;
            margin: 0 auto;
            overflow: visible;
        }

        .cvg-pp .cvg-pp-tab {
            position: relative;
            flex: 0 0 auto;
            padding: 10px 4px 12px;
            border: 0;
            border-radius: 0;
            background: transparent;
             
            color: #c9d6d2;
            font: inherit;
            font-size: 17px;
            font-weight: 500;
            white-space: nowrap;
            cursor: pointer;
            transition: color .25s ease;
        }

        /* underline */
        .cvg-pp .cvg-pp-tab::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            background: #00D4A3;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .4s cubic-bezier(.2, .9, .2, 1);
        }

        .cvg-pp .cvg-pp-tab:hover {
            color: #fff;
        }

        .cvg-pp .cvg-pp-tab:hover::after {
            transform: scaleX(.5);
        }

        .cvg-pp .cvg-pp-tab.is-active {
            color: #00D4A3;
        }

        .cvg-pp .cvg-pp-tab.is-active::after {
            transform: scaleX(1);
        }

        .cvg-pp .cvg-pp-tab:focus-visible {
            outline: 2px solid #00D4A3;
            outline-offset: 4px;
        }

        /* ===== CARDS: features list ke andar scroll ===== */
        .cvg-pp .cvg-pp-card {
            display: flex;
            flex-direction: column;
        }

        .cvg-pp .cvg-pp-list {
            flex: 1 1 auto;
            height: 300px;
            max-height: 300px;
            min-height: 0;
            overflow-y: auto;
            overscroll-behavior: contain;
            padding-right: 10px;
            margin-bottom: 28px;
            scrollbar-width: thin;
            scrollbar-color: #00D4A3 transparent;
        }

        .cvg-pp .cvg-pp-list::-webkit-scrollbar {
            width: 5px;
        }

        .cvg-pp .cvg-pp-list::-webkit-scrollbar-track {
            background: transparent;
        }

        .cvg-pp .cvg-pp-list::-webkit-scrollbar-thumb {
            background: #00D4A3;
            border-radius: 10px;
        }

        .cvg-pp .cvg-pp-buy {
            margin-top: auto;
        }

        @media (max-width: 640px) {
            .cvg-pp .cvg-pp-tabs {
                gap: 4px 22px;
            }

            .cvg-pp .cvg-pp-tab {
                font-size: 15px;
            }

            .cvg-pp .cvg-pp-list {
                height: 260px;
                max-height: 260px;
            }
        }
        /* tab click par page ka scroll anchor na ho */
        .cvg-pp,
        .cvg-pp .cvg-pp-panel {
            overflow-anchor: none;
        }

        .cvg-pp .cvg-pp-tab {
            scroll-margin: 0;
        }
    </style>

    <script>
        /* ===== Tab click par page idhar-udhar jump na kare =====
           Purani tabs script tab ko scrollIntoView / focus se "center" karti hai,
           jis se poora page side/upar-neeche chala jata hai. Yahan us ko tab buttons
           ke liye band kar diya hai (tabs ab wrap ho kar already center mein hain). */
        (function () {
            var root = document.getElementById('cvg-pricing-page');
            if (!root) return;

            var tabs = root.querySelectorAll('.cvg-pp-tab');
            var nativeFocus = HTMLElement.prototype.focus;

            tabs.forEach(function (tab) {
                tab.scrollIntoView = function () { };                       // no-op
                tab.focus = function (opts) {                               // focus bina scroll ke
                    nativeFocus.call(this, Object.assign({}, opts, { preventScroll: true }));
                };
            });

            /* Safety: panel badalne se height change ho to scroll position wapas wahi rakho */
            root.addEventListener('click', function (e) {
                if (!e.target.closest('.cvg-pp-tab')) return;
                var x = window.pageXOffset, y = window.pageYOffset;
                var restore = function () {
                    if (window.pageXOffset !== x || Math.abs(window.pageYOffset - y) > 2) {
                        window.scrollTo(x, y);
                    }
                };
                requestAnimationFrame(restore);
                setTimeout(restore, 60);
                setTimeout(restore, 250);
            }, true);
        })();
    </script>

</main>
<?php include __DIR__ . '/world-section.php'; ?>