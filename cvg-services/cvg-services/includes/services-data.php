<?php
/**
 * Saari services ka data yahan hai.
 * Naya service add karne ke liye array mein ek naya item add karein.
 * Sub-service ke liye 'parent' => 'web-development' likhein.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cvg_up = trailingslashit( wp_get_upload_dir()['baseurl'] );   // https://yoursite.com/wp-content/uploads/
$cvg_addon = 'Add on: $50 for expedited services';

/* ---------- Helpers: 3 plans jaldi banane ke liye ---------- */
if ( ! function_exists( 'cvg_tiers' ) ) {
	function cvg_tiers( $prices, $feats, $names = array( 'Basic', 'Standard', 'Premium' ), $addon = '' ) {
		$out = array();
		foreach ( $names as $i => $name ) {
			$out[] = array(
				'name'     => $name,
				'price'    => $prices[ $i ],
				'features' => $feats[ $i ],
				'addon'    => $addon,
				'featured' => 1 === $i,
				'badge'    => 1 === $i ? 'Most Popular' : '',
			);
		}
		return $out;
	}

	function cvg_dev_plans( $tech, $p ) {
		return cvg_tiers(
			$p,
			array(
				array( "$tech Setup & Configuration", 'Up to 5 Pages / Modules', 'Responsive Design', '2 Revisions', '30 Days Support' ),
				array( "$tech Custom Development", 'Up to 12 Pages / Modules', 'Admin Panel / Dashboard', 'Third-party API Integration', 'Unlimited Revisions', '90 Days Support' ),
				array( "$tech Enterprise Solution", 'Unlimited Pages / Modules', 'Custom Features & Workflows', 'Performance & Security Hardening', 'Priority Support', '6 Months Support' ),
			),
			array( 'Starter', 'Business', 'Enterprise' )
		);
	}

	function cvg_dev( $slug, $title, $icon, $p ) {
		return array(
			'slug'       => $slug,
			'parent'     => 'web-development',
			'title'      => "$title Development",
			'short'      => $title,
			'icon'       => $icon,
			'subtitle'   => "Expert $title development for fast, secure and scalable projects",
			'introTitle' => "Reliable $title Solutions",
			'introText'  => "Our $title developers build clean, maintainable and high-performance solutions tailored to your business goals, from small projects to enterprise platforms.",
			'listTitle'  => "What we offer in $title:",
			'list'       => array( 'Custom Development', 'Third-party Integrations', 'Performance Optimization', 'Ongoing Support & Maintenance' ),
			'portfolio'  => array(),
			'plans'      => cvg_dev_plans( $title, $p ),
		);
	}
}

/* ---------- Logo portfolio images: uploads/2024/11/32.jpg ... 25.jpg ---------- */
$cvg_logo_portfolio = array();
foreach ( range( 32, 25 ) as $n ) {
	$cvg_logo_portfolio[] = $cvg_up . "2024/11/$n.jpg";
}

return array(

	/* ===================== TOP LEVEL ===================== */
	array(
		'slug'        => 'logo-design',
		'title'       => 'Logo Design Solutions',
		'short'       => 'Logo Design',
		'icon'        => '🎨',
		'subtitle'    => 'Crafting Unique, Memorable Logos for Your Brand',
		'introTitle'  => 'Serving Millions of Brands Worldwide',
		'introText'   => 'A logo is the first impression of your brand. We specialize in designing custom logos that reflect your business’s identity and connect with your target audience. Whether you’re launching a new company or rebranding, our logo design solutions create symbols that leave a lasting impact.',
		'listTitle'   => 'Our Logo Design Services include:',
		'list'        => array( 'Custom Logo Design', 'Logo Redesign & Refresh', 'Brand Identity Development', 'Vector-Based Designs' ),
		'introImages' => array( $cvg_up . '2024/12/logo.png', $cvg_up . '2024/12/home-creative3.png' ),
		'portfolio'   => $cvg_logo_portfolio,
		'plans'       => array(
			array( 'name' => 'Basic Logo', 'price' => 45, 'addon' => $cvg_addon, 'features' => array( '3 Custom Logo Design Concepts', '1 Dedicated Designer', '4 Revisions', '48 to 72 hours TAT', '100% Unique Design Guarantee', '100% Satisfaction Guarantee', '100% Money Back Guarantee' ) ),
			array( 'name' => 'Startup Logo', 'price' => 80, 'addon' => $cvg_addon, 'features' => array( '5 Custom Logo Design Concepts', 'By 2 Designers', 'UNLIMITED Revisions', '48 to 72 hours TAT', 'All Final Files Format (AI, PSD, EPS, PNG, GIF, JPG, PDF)', '100% Satisfaction Guarantee', '100% Unique Design Guarantee' ) ),
			array( 'name' => 'Professional Logo', 'price' => 125, 'featured' => true, 'badge' => 'Most Popular', 'addon' => $cvg_addon, 'features' => array( 'UNLIMITED Logo Design Concepts', 'By 4 Designers', 'UNLIMITED Revisions', 'Stationery Design (Business Card, Letterhead, Envelope)', 'FREE MS Word Letterhead', '48 to 72 hours TAT', 'All Final Files Format (AI, PSD, EPS, PNG, GIF, JPG, PDF)', '100% Money Back Guarantee *' ) ),
			array( 'name' => 'Elite Logo', 'price' => 175, 'addon' => $cvg_addon, 'features' => array( 'UNLIMITED Logo Design Concepts', '1 Dedicated By 5 Award Winning Designers', 'Stationery Design (Business Card, Letterhead, Envelope)', 'Icon Design', 'UNLIMITED Revisions', 'FREE MS Word Letterhead', 'Free Email Signature', '100% Money Back Guarantee *' ) ),
			array( 'name' => 'Business Logo', 'price' => 245, 'addon' => $cvg_addon, 'features' => array( 'UNLIMITED Logo Design Concepts', 'By 8 Award Winning Designers', '2 Stationery Design Sets', 'Icon Design', 'Double Sided Flyer / Bi-Fold Brochure', 'FREE MS Word Letterhead', 'Free Email Signature', '100% Money Back Guarantee *' ) ),
			array( 'name' => 'Gold Logo', 'price' => 425, 'addon' => $cvg_addon, 'features' => array( 'UNLIMITED Logo Design Concepts', 'By 8 Award Winning Designers', 'Icon Design', '2 Stationery Design Sets', '3 Page Custom Website', '2 Stock Photos', '2 Banner Designs', 'jQuery Slider', '100% Money Back Guarantee *' ) ),
		),
	),

	array(
		'slug'       => 'illustration-design',
		'title'      => 'Illustration Design',
		'short'      => 'Illustration',
		'icon'       => '✏️',
		'subtitle'   => 'Original artwork that gives your brand a unique visual voice',
		'introTitle' => 'Illustrations That Tell Your Story',
		'introText'  => 'From characters and mascots to editorial and book illustrations, our artists create custom vector and digital artwork that makes your brand memorable.',
		'listTitle'  => 'Our Illustration Services include:',
		'list'       => array( 'Character & Mascot Design', 'Book & Editorial Illustration', 'Icon & Infographic Sets', 'Vector Artwork' ),
		'plans'      => cvg_tiers(
			array( 60, 140, 299 ),
			array(
				array( '1 Custom Illustration', '1 Dedicated Artist', '3 Revisions', 'PNG & JPG Files' ),
				array( '3 Custom Illustrations', '2 Artists', 'Unlimited Revisions', 'Vector Source Files (AI, EPS)', 'Commercial Use Rights' ),
				array( '8 Custom Illustrations', 'Dedicated Art Team', 'Unlimited Revisions', 'All Source Files', 'Priority Delivery' ),
			)
		),
	),

	array(
		'slug'       => 'web-design',
		'title'      => 'Web Design Solutions',
		'short'      => 'Web Design',
		'icon'       => '💻',
		'subtitle'   => 'Modern, responsive designs that turn visitors into customers',
		'introTitle' => 'Websites That Look Great and Convert',
		'introText'  => 'We design clean, conversion-focused websites that look perfect on every device and reflect your brand.',
		'listTitle'  => 'Our Web Design Services include:',
		'list'       => array( 'Custom UI / UX Design', 'Responsive Layouts', 'Landing Pages', 'Website Redesign' ),
		'plans'      => cvg_tiers(
			array( 299, 599, 1199 ),
			array(
				array( 'Up to 5 Pages', 'Mobile Responsive', 'Contact Form', '2 Revisions' ),
				array( 'Up to 10 Pages', 'Mobile Responsive', 'Basic SEO Setup', 'Unlimited Revisions', 'Free Stock Images' ),
				array( 'Up to 20 Pages', 'Custom Animations', 'Advanced SEO Setup', 'Speed Optimization', 'Priority Support' ),
			),
			array( 'Starter Site', 'Business Site', 'Premium Site' )
		),
	),

	array(
		'slug'       => 'web-development',
		'title'      => 'Web Developer Solutions',
		'short'      => 'Web Developer',
		'icon'       => '🧑‍💻',
		'subtitle'   => 'Full-stack development across every major technology',
		'introTitle' => 'Development Built Around Your Stack',
		'introText'  => 'Whether you need a Laravel backend, a Next.js front end, a Shopify store or WordPress maintenance, our developers deliver clean, secure and scalable code.',
		'listTitle'  => 'Technologies we work with:',
		'list'       => array( 'Laravel & Custom PHP', 'Node JS & Next.js', 'WordPress, WooCommerce & CMS', 'Shopify & Magento' ),
		'plans'      => cvg_dev_plans( 'Web', array( 499, 1199, 2999 ) ),
	),

	/* ============ SUB-SERVICES of Web Developer Solutions ============ */
	cvg_dev( 'laravel', 'Laravel', '🔴', array( 499, 1299, 3499 ) ),
	cvg_dev( 'nodejs', 'Node JS', '🟢', array( 499, 1299, 3499 ) ),
	cvg_dev( 'custom-php', 'Custom PHP', '🐘', array( 399, 999, 2499 ) ),
	cvg_dev( 'nextjs', 'Next.js', '⚡', array( 599, 1399, 3799 ) ),
	cvg_dev( 'wordpress', 'WordPress', '🔵', array( 299, 799, 1999 ) ),
	cvg_dev( 'shopify', 'Shopify', '🛍️', array( 399, 999, 2499 ) ),
	cvg_dev( 'magento', 'Magento', '🧲', array( 799, 1999, 4999 ) ),
	cvg_dev( 'woocommerce', 'WooCommerce', '🛒', array( 399, 999, 2499 ) ),
	cvg_dev( 'cms', 'CMS', '🗂️', array( 349, 899, 2199 ) ),
	array(
		'slug'       => 'website-maintenance',
		'parent'     => 'web-development',
		'title'      => 'Website Maintenance',
		'short'      => 'Website Maintenance',
		'icon'       => '🛠️',
		'subtitle'   => 'Keep your website secure, fast and always up to date',
		'introTitle' => 'Worry-Free Website Care',
		'introText'  => 'We handle updates, backups, security monitoring and fixes so your website stays online and performing at its best.',
		'listTitle'  => 'Maintenance includes:',
		'list'       => array( 'Core, Plugin & Theme Updates', 'Daily / Weekly Backups', 'Security Monitoring', 'Uptime & Speed Checks' ),
		'plans'      => cvg_tiers(
			array( 29, 59, 119 ),
			array(
				array( 'Monthly Updates', 'Weekly Backups', 'Uptime Monitoring', 'Email Support' ),
				array( 'Weekly Updates', 'Daily Backups', 'Security Scans', '2 Hours of Edits / Month', 'Priority Support' ),
				array( 'Real-time Monitoring', 'Daily Backups', 'Malware Removal', '5 Hours of Edits / Month', 'Dedicated Manager' ),
			),
			array( 'Basic Care', 'Pro Care', 'Business Care' )
		),
	),

	/* ===================== TOP LEVEL (continued) ===================== */
	array(
		'slug'       => 'branding',
		'title'      => 'Branding',
		'short'      => 'Branding',
		'icon'       => '✨',
		'subtitle'   => 'Complete brand systems that make you stand out',
		'introTitle' => 'A Brand People Remember',
		'introText'  => 'We build cohesive brand identities: logo, colors, typography, stationery and guidelines, so your business looks consistent everywhere.',
		'listTitle'  => 'Our Branding Services include:',
		'list'       => array( 'Brand Strategy & Identity', 'Color & Typography System', 'Stationery & Collateral', 'Brand Guidelines' ),
		'plans'      => cvg_tiers(
			array( 199, 449, 899 ),
			array(
				array( 'Logo + Color Palette', 'Typography Selection', 'Business Card', '3 Revisions' ),
				array( 'Complete Logo Package', 'Stationery Set', 'Social Media Kit', 'Brand Guidelines (PDF)', 'Unlimited Revisions' ),
				array( 'Full Brand Identity', 'Packaging / Collateral Design', 'Brand Strategy Session', 'Extended Guidelines', 'Priority Support' ),
			),
			array( 'Essential', 'Professional', 'Complete' )
		),
	),

	array(
		'slug'       => 'ecommerce',
		'title'      => 'Ecommerce Website Solutions',
		'short'      => 'Ecommerce',
		'icon'       => '🛒',
		'subtitle'   => 'Online stores built to sell',
		'introTitle' => 'Stores That Convert Visitors Into Buyers',
		'introText'  => 'We build secure, fast and conversion-focused online stores with smooth checkout and easy product management.',
		'listTitle'  => 'Our Ecommerce Services include:',
		'list'       => array( 'Store Setup & Design', 'Payment Gateway Integration', 'Product & Inventory Management', 'Conversion Optimization' ),
		'plans'      => cvg_tiers(
			array( 599, 1299, 2999 ),
			array(
				array( 'Up to 50 Products', 'Payment Gateway', 'Mobile Responsive', '2 Revisions' ),
				array( 'Up to 500 Products', 'Multiple Payment Gateways', 'Shipping & Tax Setup', 'SEO Setup', 'Unlimited Revisions' ),
				array( 'Unlimited Products', 'Custom Features', 'ERP / CRM Integration', 'Speed & Security Hardening', 'Priority Support' ),
			),
			array( 'Starter Store', 'Growth Store', 'Enterprise Store' )
		),
	),

	array(
		'slug'       => 'video-animation',
		'title'      => 'Stunning Video Animation Services',
		'short'      => 'Video Animation',
		'icon'       => '🎬',
		'subtitle'   => 'Explainer videos and motion graphics that tell your story in seconds',
		'introTitle' => 'Stories That Move',
		'introText'  => 'We create 2D and 3D animated videos, explainers and motion graphics that explain your product clearly and keep viewers watching.',
		'listTitle'  => 'Our Animation Services include:',
		'list'       => array( '2D & 3D Explainer Videos', 'Motion Graphics', 'Logo Animation', 'Social Media Videos' ),
		'plans'      => cvg_tiers(
			array( 149, 349, 799 ),
			array(
				array( '30 Second Video', 'Script Assistance', 'Stock Voice-over', '2 Revisions' ),
				array( '60 Second Video', 'Custom Script', 'Professional Voice-over', 'Background Music', 'Unlimited Revisions' ),
				array( '120 Second Video', 'Custom Characters', 'Premium Voice-over', 'Storyboard', 'Priority Delivery' ),
			),
			array( '30 Sec', '60 Sec', '120 Sec' )
		),
	),

	array(
		'slug'       => 'mobile-apps',
		'title'      => 'Mobile Apps',
		'short'      => 'Mobile Apps',
		'icon'       => '📱',
		'subtitle'   => 'iOS and Android apps with clean UX and strong performance',
		'introTitle' => 'Apps People Love to Use',
		'introText'  => 'From idea to App Store, we design, build and launch mobile apps that are fast, intuitive and ready to scale.',
		'listTitle'  => 'Our App Services include:',
		'list'       => array( 'iOS & Android Development', 'Cross-platform (Flutter / React Native)', 'UI / UX Design', 'App Store Launch' ),
		'plans'      => cvg_tiers(
			array( 999, 2999, 7999 ),
			array(
				array( 'Simple App (1 Platform)', 'UI Design', 'Basic Features', '30 Days Support' ),
				array( 'iOS + Android', 'Custom UI / UX', 'API & Backend Integration', 'Admin Panel', '90 Days Support' ),
				array( 'Complex App', 'Advanced Features', 'Scalable Backend', 'Store Submission', '6 Months Support' ),
			),
			array( 'MVP', 'Business App', 'Enterprise App' )
		),
	),

	array(
		'slug'       => 'digital-marketing',
		'title'      => 'Digital Marketing',
		'short'      => 'Digital Marketing',
		'icon'       => '📈',
		'subtitle'   => 'Measurable growth through SEO, social media and ads',
		'introTitle' => 'Marketing That Delivers Results',
		'introText'  => 'We combine SEO, content, social media and paid campaigns into one strategy that brings real, trackable growth.',
		'listTitle'  => 'Our Marketing Services include:',
		'list'       => array( 'Search Engine Optimization', 'Social Media Management', 'Google & Meta Ads', 'Content Marketing' ),
		'plans'      => cvg_tiers(
			array( 249, 549, 1199 ),
			array(
				array( 'Basic SEO', '10 Keywords', 'Monthly Report', 'Email Support' ),
				array( 'Advanced SEO', '30 Keywords', 'Social Media Management', 'Content Plan', 'Bi-weekly Reports' ),
				array( 'Full-funnel Marketing', 'Paid Ads Management', 'Content & Link Building', 'Conversion Optimization', 'Dedicated Manager' ),
			),
			array( 'Starter', 'Growth', 'Scale' )
		),
	),

	array(
		'slug'       => 'combo-packages',
		'title'      => 'Advance Combo Packages',
		'short'      => 'Combo Packages',
		'icon'       => '🚀',
		'subtitle'   => 'Bundle logo, website and marketing and save on your full launch',
		'introTitle' => 'Everything You Need in One Package',
		'introText'  => 'Launch your brand with one team. Our combo packages bundle design, development and marketing at a better price.',
		'listTitle'  => 'Combos can include:',
		'list'       => array( 'Logo + Stationery', 'Website Design & Development', 'SEO & Social Setup', 'Brand Guidelines' ),
		'plans'      => cvg_tiers(
			array( 499, 999, 1999 ),
			array(
				array( 'Logo Design', '5 Page Website', 'Business Card', 'Basic SEO Setup' ),
				array( 'Logo + Stationery', '10 Page Website', 'Social Media Kit', 'SEO Setup', 'Unlimited Revisions' ),
				array( 'Full Brand Identity', '20 Page Website / Store', 'Marketing Setup', 'Content Pack', 'Priority Support' ),
			),
			array( 'Starter Combo', 'Business Combo', 'Complete Combo' )
		),
	),
);
