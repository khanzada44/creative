<?php
require __DIR__ . '/pricing-data.php';

if (!function_exists('cvg_pp_e')) {
    function cvg_pp_e($s)
    {
        return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
    }
}

$cvgPPVisible = 8;   /* features shown before "+ more" */
$cvgPPFirst   = array_key_first($cvgPricing);
?>
<main class="cvg-pp" id="cvg-pricing-page">

    <!-- ================= 1. BANNER ================= -->
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
            box-shadow: none;
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
            box-shadow: none;
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
            box-shadow: none;
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
            box-shadow: none;
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
                        <?php foreach ($tab['packages'] as $i => $p):
                            $feats = $p['features'];
                            $count = 0;
                            $extra = 0;
                            foreach ($feats as $f) {
                                if (strpos($f, '## ') !== 0) $count++;
                            }
                        ?>
                            <article class="cvg-pp-card<?= !empty($p['popular']) ? ' cvg-pp-card--featured' : '' ?>" style="--i:<?= (int) $i ?>">
                                <?php if (!empty($p['popular'])): ?><span class="cvg-pp-shine" aria-hidden="true"></span><?php endif; ?>
                                <div class="cvg-pp-card-top">
                                    <h3 class="cvg-pp-name"><?= cvg_pp_e($p['name']) ?></h3>
                                    <?php if (!empty($p['popular'])): ?><span class="cvg-pp-badge">Most popular</span><?php endif; ?>
                                </div>
                                <p class="cvg-pp-price"><span class="cvg-pp-cur">$</span><?= cvg_pp_e($p['price']) ?><span class="cvg-pp-cents">.<?= cvg_pp_e($p['cents']) ?></span></p>
                                <?php if ($p['note'] !== ''): ?><p class="cvg-pp-note"><?= cvg_pp_e($p['note']) ?></p><?php endif; ?>

                                <ul class="cvg-pp-list">
                                    <?php $n = 0;
                                    foreach ($feats as $f):
                                        $isGroup = (strpos($f, '## ') === 0);
                                        if (!$isGroup) $n++;
                                        $hidden = $n > $cvgPPVisible || ($isGroup && $n >= $cvgPPVisible);
                                        if ($hidden && !$isGroup) $extra++;
                                        $cls = $isGroup ? 'cvg-pp-group' : ('cvg-pp-li' . (stripos($f, 'additional') !== false ? ' cvg-pp-addon' : ''));
                                    ?>
                                        <li class="<?= $cls ?><?= $hidden ? ' cvg-pp-extra' : '' ?>"><?= cvg_pp_e($isGroup ? substr($f, 3) : $f) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if ($extra > 0): ?>
                                    <button type="button" class="cvg-pp-more" aria-expanded="false" data-more="+ <?= $extra ?> more features">+ <?= $extra ?> more features</button>
                                <?php endif; ?>

                                <a href="<?= cvg_pp_e($p['link']) ?>" class="cvg-pp-btn <?= !empty($p['popular']) ? 'cvg-pp-btn--dark' : 'cvg-pp-btn--ghost' ?> cvg-pp-btn--block cvg-pp-buy">Buy now</a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>



</main>
<?php include __DIR__ . '/world-section.php'; ?>