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
<link rel="stylesheet" href="<?= cvg_url('assets/css/pricing-page.css') ?>"></main>
<main class="cvg-pp" id="cvg-pricing-page">

    <section class="cvg-pp-banner">
        <span class="cvg-pp-glow cvg-pp-glow--a" aria-hidden="true"></span>
        <span class="cvg-pp-glow cvg-pp-glow--b" aria-hidden="true"></span>
        <span class="cvg-pp-gridbg" aria-hidden="true"></span>


        <div class="cvg-pp-wrap cvg-pp-banner-inner">
            <div class="cvg-pp-banner-copy">
                <p class="cvg-pp-eyebrow cvg-pp-rv" data-wm="Pricing">Welcome to Creative Converge</p>
                <h1 class="cvg-pp-h1">
                    <span class="cvg-pp-line"><span>Have a Project in Mind? Let's</span></span>
                    <span class="cvg-pp-line"><span class="cvg-pp-mint">Talk Numbers.</span></span>
                </h1>
                <p class="cvg-pp-lead cvg-pp-rv" style="--d:.35s">Not sure which web design package and pricing makes sense for your project? Tell us a little about what you're looking to create, and we'll help you explore your options. Whether you have a detailed brief or just the beginnings of an idea, this is a good place to start or get affordable web design packages.</p>
                <a href="#cvg-pp-packages" class="cvg-pp-btn cvg-pp-btn--mint cvg-pp-rv" style="--d:.5s">View packages
                </a>
            </div>

            <!-- Set action="" to your form handler -->
            <form class="cvg-pp-form cvg-pp-form--line cvg-pp-rv" style="--d:.25s" action="<?= cvg_url('email.php') ?>" method="post" novalidate>
                <div class="cvg-pp-form-row">
                    <label class="cvg-pp-field"><span class="cvg-pp-sr">Name</span><input type="text" id="name" name="name" placeholder="Name" autocomplete="name" required></label>
                    <label class="cvg-pp-field"><span class="cvg-pp-sr">Phone</span><input type="tel" id="phone" name="phone" placeholder="Phone" autocomplete="tel"></label>
                </div>
                <label class="cvg-pp-field"><span class="cvg-pp-sr">Email</span><input type="email" name="email" placeholder="Email" autocomplete="email" required></label>
                <label class="cvg-pp-field"><span class="cvg-pp-sr">Message</span><textarea id="msg_subject" name="msg_subject" rows="3" placeholder="Message"></textarea></label>
                <p class="cvg-pp-form-error" role="alert" hidden>Enter your name and a valid email.</p>
                <button type="submit" class="cvg-pp-btn cvg-pp-btn--outline">Send</button>
            </form>
        </div>
    </section>


    <!-- ================= 2. PACKAGES WITH TABS ================= -->
    <section class="cvg-pp-packages" id="cvg-pp-packages">
        <div class="cvg-pp-wrap">
            <div class="cvg-pp-head" data-wm="Packages">
                <p class="cvg-pp-eyebrow cvg-pp-rv">How much does it cost</p>
                <h2 class="cvg-pp-h2 cvg-pp-rv" style="--d:.1s">Find the Right Fit for <span class="cvg-pp-mint"> Your Next Move.</span></h2>
                <p class="cvg-pp-sub cvg-pp-rv" style="--d:.2s">Every business is at a different stage, and every project comes with its own priorities. Our web design packages in Dallas give you a clear starting point, so you can explore the options for the small </p>
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



    <script>
        (function() {
            var root = document.getElementById('cvg-pricing-page');
            if (!root) return;

            var tabs = root.querySelectorAll('.cvg-pp-tab');
            var nativeFocus = HTMLElement.prototype.focus;

            tabs.forEach(function(tab) {
                tab.scrollIntoView = function() {};
                tab.focus = function(opts) {
                    nativeFocus.call(this, Object.assign({}, opts, {
                        preventScroll: true
                    }));
                };
            });
            root.addEventListener('click', function(e) {
                if (!e.target.closest('.cvg-pp-tab')) return;
                var x = window.pageXOffset,
                    y = window.pageYOffset;
                var restore = function() {
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