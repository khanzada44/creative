<?php


function plan($name, $price, $features, $featured = false, $link = 'contact-us/index.php')
{
    return [
        "name"     => $name,
        "price"    => $price,
        "featured" => $featured,
        "badge"    => $featured ? "Most popular" : "",
        "link"     => $link,
        "features" => $features,
    ];
}

function portfolioImgs($prefix)
{
    $webBase = 'assets/images/portfolio/';
    $dir     = __DIR__ . '/../assets/images/portfolio/';

    if (!is_dir($dir)) {
        return [];
    }

    $found = [];
    $regex = '/^' . preg_quote($prefix, '/') . '-(\d+)\.(webp|jpe?g|png|avif)$/i';

    foreach (scandir($dir) as $file) {
        if (preg_match($regex, $file, $m)) {
            $found[(int) $m[1]] = $file;
        }
    }

    ksort($found, SORT_NUMERIC);

    return array_map(function ($file) use ($webBase) {
        return $webBase . $file;
    }, array_values($found));
}

function placeholderFaqs()
{
    $items = [
        [
            "question" => "How long does website development take?",
            "answer"   => "The timeline depends on the number of pages, features and project requirements.",
        ],
    ];
    for ($i = 0; $i < 7; $i++) {
        $items[] = [
            "question" => "Will my website work on mobile devices?",
            "answer"   => "Yes. We build responsive websites that adapt to mobile, tablet and desktop screens.",
        ];
    }
    return $items;
}

function serviceFaqs($slug)
{
    $faqs = [

        'logo-design-solutions' => [
            [
                "question" => 'How can Creative Converge help my business create a logo that stands out?',
                "answer" => 'As a professional logo design company in Dallas, Creative Converge approaches logo design by considering your business, audience, competitors, and the impression you want to make. Our goal is to develop a visual identity that feels right for your brand rather than simply following popular design trends.'
            ],
            [
                "question" => 'Can Creative Converge redesign my existing logo without losing brand recognition?',
                "answer" => 'Yes. Creative Converge can refresh your existing logo while retaining recognizable elements and improving typography, proportions, colors, and overall clarity. The extent of the changes depends on what works in your current logo and what needs improvement.'
            ],
            [
                "question" => 'What types of logos can I get designed by Creative Converge?',
                "answer" => 'Creative Converge can create wordmarks, custom logos, lettermarks, symbols, combination marks, mascots, and emblems, depending on your project requirements. The right style depends on your business identity, target audience, and where the logo will be used.'
            ],
            [
                "question" => 'Can Creative Converge design a logo that works across digital and print materials?',
                "answer" => 'Yes. We can plan logo variations for websites, social profiles, business cards, packaging, and promotional materials. File formats and alternate versions should be agreed upon before the project begins to ensure your logo is practical across different platforms.'
            ],
            [
                "question" => 'What should I share with Creative Converge before starting a logo design project?',
                "answer" => 'Start with your business name, a description of what you do, your target audience, and any ideas or visual references you have. We use this information to understand your direction and establish a focused design brief.'
            ],
        ],


        'illustration-design' => [
            [
                "question" => 'How can Creative Converge create illustrations that match my brand?',
                "answer" => "Creative Converge can develop an illustration style around your brand's personality, audience, message, and intended use. Whether you need expressive characters or clean conceptual artwork, the aim is to make the visuals feel connected to your business rather than interchangeable with stock graphics."
            ],
            [
                "question" => 'What kinds of custom illustrations can I request from Creative Converge?',
                "answer" => "Depending on your needs, Creative Converge can work on character illustrations, mascots, editorial artwork, website graphics, product illustrations, explainer visuals, and marketing assets. Sharing where the illustrations will appear helps determine the right style and format."
            ],
            [
                "question" => 'Can Creative Converge create illustrations for my website and social media?',
                "answer" => "Yes. Creative Converge can plan illustrations for website sections, social posts, campaign graphics, and other digital materials. Defining the platforms and intended uses at the beginning helps establish suitable dimensions and a consistent visual style."
            ],
            [
                "question" => 'Can Creative Converge illustrate an idea that is difficult to explain with words?',
                "answer" => "That's one of the useful applications of custom illustration. Creative Converge can help translate abstract concepts, product features, processes, or stories into visuals that are easier for your audience to understand."
            ],
            [
                "question" => 'What information does Creative Converge need to begin an illustration project?',
                "answer" => "Creative Converge can get started with your concept, intended audience, key message, preferred visual references, and where the artwork will be used. If your idea is still taking shape, a discussion about the purpose of the illustrations can help establish the creative direction."
            ],
        ],


        'web-design-solutions' => [
            [
                "question" => 'How does Creative Converge approach website design for a new business?',
                "answer" => "At Creative Converge, we start by understanding your business, your audience, and what you need your website to accomplish. That helps shape the page structure, visual direction, and user experience around your goals rather than relying on a one-size-fits-all design."
            ],
            [
                "question" => 'Can Creative Converge redesign my existing website without changing my entire brand?',
                "answer" => "Yes, a redesign doesn't always require starting from scratch. Creative Converge can help refresh your website's layout, usability, and visual presentation while retaining the brand elements that already work for your business. The right approach depends on the condition of your current site and what you want to improve."
            ],
            [
                "question" => 'Can Creative Converge design a website that supports my marketing goals?',
                "answer" => "Yes. Your website can be designed around the actions you want visitors to take, whether that's requesting a quote, booking a consultation, contacting your team, or purchasing a product. Creative Converge can align the page layouts, content hierarchy, and calls to action with those objectives."
            ],
            [
                "question" => 'What does Creative Converge need from me before starting a website design project?',
                "answer" => "It helps to share your business goals, target audience, existing website (if you have one), preferred design styles, and the features you need. If you don't have everything figured out yet, Creative Converge can use an initial project discussion to clarify the requirements and identify the next steps."
            ],
            [
                "question" => 'Can Creative Converge design websites for businesses serving customers across the United States?',
                "answer" => "Creative Converge can develop website design solutions for businesses targeting U.S. customers. The design can account for your audience, industry, content, and conversion goals, with details such as accessibility, mobile usability, and clear customer information considered throughout the project."
            ],
        ],


        'web-developer-solutions' => [
            [
                "question" => 'How can Creative Converge help if my business needs more than a basic website?',
                "answer" => "Creative Converge can help plan and develop more specialized digital solutions, such as custom functionality, customer portals, dashboards, and web applications, depending on the project requirements. The starting point is understanding what your business needs the website or application to accomplish."
            ],
            [
                "question" => 'Can Creative Converge develop custom features for my existing website?',
                "answer" => "Creative Converge can assess whether your existing platform and codebase can support the features you need. Depending on the setup, the solution may involve custom development, an integration, a plugin, or changes to the underlying architecture."
            ],
            [
                "question" => 'How does Creative Converge determine the right technology for a website project?',
                "answer" => "Creative Converge can evaluate your required features, expected traffic, integrations, budget, and plans for future growth before recommending a technical approach. Choosing technology around your actual needs helps avoid unnecessary complexity and limitations later."
            ],
            [
                "question" => 'Can Creative Converge connect my website to third-party business tools?',
                "answer" => "Potentially, yes. Creative Converge can assess integrations with services such as payment providers, CRM platforms, inventory systems, and external APIs. The available options depend on each provider's documentation, permissions, and technical requirements."
            ],
            [
                "question" => 'What happens after Creative Converge completes my website development project?',
                "answer" => "The handoff can cover agreed items such as testing, deployment, documentation, and guidance for managing the site. Creative Converge should also clarify whether ongoing maintenance, technical support, and future feature development are included or handled under a separate agreement."
            ],
        ],


'laravel' => [
    [
        "question" => 'Can Creative Converge build a custom web application using Laravel?',
        "answer" => "Creative Converge can assess Laravel for projects that need custom business logic, user accounts, dashboards, portals, or database-driven features. Whether it's the right framework depends on your requirements, existing systems, hosting environment, and long-term plans."
    ],
    [
        "question" => 'Can Creative Converge add custom features to my existing Laravel application?',
        "answer" => "Creative Converge can review your current application and determine how new functionality could be added. The work may involve extending existing features, creating API endpoints, connecting external services, or addressing issues in the current codebase."
    ],
    [
        "question" => 'Can Creative Converge connect a Laravel application to third-party software?',
        "answer" => "Creative Converge can evaluate integrations with compatible APIs, payment providers, CRM tools, and other business services. The implementation depends on the external platform's documentation, authentication requirements, and the data that needs to be exchanged."
    ],
    [
        "question" => 'Can Creative Converge help upgrade or troubleshoot an older Laravel project?',
        "answer" => "Creative Converge can assess the existing code, framework version, dependencies, and compatibility concerns before recommending a path forward. Depending on the condition of the application, that could mean fixing specific issues, upgrading components, or planning a larger refactor."
    ],
    [
        "question" => 'What should I consider when planning a Laravel project with Creative Converge?',
        "answer" => "Think about the core features, user roles, data requirements, integrations, security expectations, and future maintenance. Creative Converge can use these details to establish the project scope and identify technical decisions that need to be made before development."
    ],
],


'node-js' => [
    [
        "question" => 'Can Creative Converge use Node.js to build the backend for my web application?',
        "answer" => "Creative Converge can evaluate Node.js for backend services, APIs, data processing, and applications that need to communicate with other systems. The choice should depend on your application's workload, integrations, infrastructure, and development requirements."
    ],
    [
        "question" => 'Can Creative Converge develop real-time features using Node.js?',
        "answer" => "Node.js can support features such as live messaging, notifications, collaborative tools, and real-time updates when paired with suitable technologies. Creative Converge can assess the expected user load, data flow, and reliability requirements before planning the implementation."
    ],
    [
        "question" => 'Can Creative Converge build an API using Node.js for my website or mobile app?',
        "answer" => "Creative Converge can assess your data and functionality requirements and plan API endpoints that allow different applications to communicate. Authentication, access permissions, error handling, and data validation should all be considered as part of the design."
    ],
    [
        "question" => 'Can Creative Converge integrate a Node.js application with my existing database or software?',
        "answer" => "Creative Converge can review your current systems and determine whether compatible database connections, APIs, or other integration methods are available. The final approach depends on the systems involved and the security and performance requirements."
    ],
    [
        "question" => 'How can Creative Converge help maintain a Node.js application after development?',
        "answer" => "Ongoing work may include dependency updates, security reviews, automated testing, error monitoring, and performance checks. Creative Converge can help define a maintenance scope based on the application's complexity and how it supports your business operations."
    ],
],


'custom-php-development' => [
    [
        "question" => 'Can Creative Converge build a custom PHP solution for my business?',
        "answer" => "Creative Converge can assess PHP for websites, database-driven applications, business portals, and specialized functionality that doesn't fit your existing platform. The recommended approach depends on the features you need, your current systems, and how the application will be maintained."
    ],
    [
        "question" => 'Can Creative Converge add new functionality to my existing PHP website?',
        "answer" => "Creative Converge can review your current codebase and determine how new features could be introduced. Depending on the site's structure, that may involve adding functionality, connecting external services, improving existing workflows, or addressing technical issues."
    ],
    [
        "question" => 'Is custom PHP development from Creative Converge different from building a WordPress website?',
        "answer" => "Yes. WordPress provides a ready-made content management system built with PHP, while custom PHP development can be used to create more tailored application logic and workflows. Creative Converge can help determine which approach best fits your project instead of adding unnecessary complexity."
    ],
    [
        "question" => 'Can Creative Converge connect a custom PHP application to my business software?',
        "answer" => "Creative Converge can assess integrations with compatible APIs, databases, payment providers, and other business systems. Feasibility depends on the software involved, available access, security requirements, and the data that needs to be exchanged."
    ],
    [
        "question" => 'Can Creative Converge modernize an older PHP website instead of rebuilding it?',
        "answer" => "That depends on the code quality, PHP version, dependencies, security concerns, and required changes. Creative Converge can review the existing application and help compare an upgrade, targeted improvements, or a full rebuild before recommending a direction."
    ],
],


'next-js' => [
    [
        "question" => 'Can Creative Converge build a custom website using Next.js?',
        "answer" => "Creative Converge can assess Next.js for websites and web applications that need React-based interfaces, flexible rendering options, and structured routing. The framework should be selected based on your site's content, interactive features, integrations, and deployment requirements."
    ],
    [
        "question" => 'Can Creative Converge use Next.js to improve my website\'s search visibility?',
        "answer" => "Next.js offers rendering options that can help search engines access page content, but the framework alone doesn't guarantee higher rankings. Creative Converge can consider technical SEO, page structure, content quality, metadata, and performance as part of the website's overall approach."
    ],
    [
        "question" => 'Can Creative Converge connect a Next.js website to a CMS or external API?',
        "answer" => "Yes, provided the CMS or service supports a compatible integration method. Creative Converge can plan how content and data will move between systems, including authentication, update workflows, and how the website responds when a service is unavailable."
    ],
    [
        "question" => 'Can Creative Converge use Next.js for an e-commerce website?',
        "answer" => "Next.js can support custom storefronts and commerce experiences connected to a suitable commerce backend. Creative Converge can assess your product catalog, checkout requirements, payment integrations, and content needs to determine whether this approach fits your store."
    ],
    [
        "question" => 'Is Next.js the right choice for every website project at Creative Converge?',
        "answer" => "Not necessarily. A simpler website may be better served by a content management system or another platform, while a more interactive application may benefit from Next.js. Creative Converge can compare the options against your actual needs before settling on a technology."
    ],
],


'wordpress-development' => [
    [
        "question" => 'Can Creative Converge build a custom WordPress website instead of using a standard theme?',
        "answer" => "Creative Converge can assess a custom WordPress design and development approach based on your branding, page structure, and functionality needs. The goal is to create a site that fits your business while keeping content management practical for your team."
    ],
    [
        "question" => 'Can Creative Converge redesign my current WordPress website?',
        "answer" => "Yes, Creative Converge can review your current site's design, usability, plugins, and technical setup before proposing changes. Depending on the site's condition, the work might involve a redesign, theme customization, performance improvements, or a more extensive rebuild."
    ],
    [
        "question" => 'Can Creative Converge add e-commerce or booking features to a WordPress website?',
        "answer" => "WordPress can support features such as online stores, appointment booking, memberships, and forms through suitable plugins or custom development. Creative Converge can assess compatibility, required integrations, and ongoing maintenance needs before choosing an implementation."
    ],
    [
        "question" => 'Will Creative Converge make it easy for me to manage my WordPress content?',
        "answer" => "Creative Converge can configure the editing experience around your site's content and the tasks your team performs most often. The project handoff can cover how to update supported pages, publish content, and manage the relevant website features."
    ],
    [
        "question" => 'Can Creative Converge help improve the speed and security of my WordPress site?',
        "answer" => "Creative Converge can review factors such as hosting, image sizes, caching, plugins, software versions, and configuration. The appropriate improvements depend on the site's current condition, and performance or security results should be assessed rather than guaranteed in advance."
    ],
],


'shopify' => [
    [
        "question" => 'Do you provide custom Shopify store development?',
        "answer" => "Yes, we provide custom Shopify store development tailored to your brand identity, products, and business goals. From storefront design to specialized functionality, we help create a shopping experience that reflects your brand and serves your customers."
    ],
    [
        "question" => 'Can you migrate my online store to Shopify?',
        "answer" => "Yes, we can help migrate your existing online store from another eCommerce platform to Shopify. Depending on your current setup, migration may include products, customer records, order history, website content, and compatible store functionality."
    ],
    [
        "question" => 'Can you integrate payment gateways and shipping options into Shopify?',
        "answer" => "Yes, we can help configure compatible payment gateways, shipping methods, delivery rates, and other essential store features. Available options depend on your business location, Shopify plan, preferred providers, and regional availability."
    ],
    [
        "question" => 'Can you improve my Shopify store\'s speed and performance?',
        "answer" => "Yes, Shopify speed optimization can include image compression, theme improvements, app reviews, and code optimization. We identify potential performance issues and recommend changes to help your store load more efficiently."
    ],
    [
        "question" => 'How much do Shopify development services cost?',
        "answer" => "The cost depends on your store's design, required functionality, product catalog, third-party integrations, and customization needs. We review your project requirements to recommend a suitable scope and provide a tailored estimate."
    ],
],


'magento' => [
    [
        "question" => 'What are Magento development services?',
        "answer" => "Magento development services help businesses build, customize, and manage eCommerce websites using Magento, now known as Adobe Commerce. These services include store development, theme customization, extension integration, performance optimization, and ongoing maintenance."
    ],
    [
        "question" => 'Why should I choose Magento for my eCommerce store?',
        "answer" => "Magento is a flexible eCommerce platform that supports customizable storefronts, extensive product catalogs, and complex business requirements. It can be a good choice for businesses looking for greater control over their online store's functionality and customer experience."
    ],
    [
        "question" => 'Do you provide custom Magento website development?',
        "answer" => "Yes, we provide custom Magento website development tailored to your business goals, product range, and customer needs. From storefront design to specialized functionality, we help create an online store that reflects your brand and supports your operations."
    ],
    [
        "question" => 'Can you redesign or upgrade my existing Magento store?',
        "answer" => "Yes, we can help redesign your existing Magento store, improve its user experience, update its functionality, and address performance issues. The recommended approach depends on your current Magento version, store configuration, and business requirements."
    ],
    [
        "question" => 'Can you migrate my online store to Magento?',
        "answer" => "Yes, Magento migration services can help move your store from another eCommerce platform to Magento or Adobe Commerce. Depending on your existing setup, migration may include products, customer records, order history, website content, and selected functionality."
    ],
],


'woocommerce' => [
    [
        "question" => 'Why should I choose WooCommerce for my online store?',
        "answer" => "WooCommerce offers flexibility, extensive customization options, and integration with the WordPress ecosystem. It's a suitable option for businesses that want control over their store's design, products, content, and functionality."
    ],
    [
        "question" => 'Can you redesign or improve my existing WooCommerce store?',
        "answer" => "Yes, we can help redesign your WooCommerce store, improve its navigation, update its layout, and enhance its functionality. We assess your existing website to identify improvements that can make the shopping experience more intuitive."
    ],
    [
        "question" => 'Can you migrate my existing online store to WooCommerce?',
        "answer" => "Yes, we can help migrate your online store from another eCommerce platform to WooCommerce. Depending on your current setup, the process may include transferring products, customer information, order records, website content, and relevant store functionality."
    ],
    [
        "question" => 'Can you integrate payment gateways into my WooCommerce store?',
        "answer" => "Yes, we can integrate compatible payment gateways to help customers complete purchases securely and conveniently. Available options depend on your location, preferred payment provider, business requirements, and plugin compatibility."
    ],
    [
        "question" => 'Is WooCommerce suitable for mobile shopping?',
        "answer" => "Yes, we can develop or optimize your WooCommerce store for mobile phones, tablets, and desktops. Responsive design helps customers browse products, explore categories, and complete purchases across different screen sizes."
    ],
],


'cms-development' => [
    [
        "question" => 'Can Creative Converge build a CMS website that my team can update without coding?',
        "answer" => "Creative Converge can plan a content management system that lets authorized team members edit supported content through an administrative interface. The setup can be tailored around the types of pages, posts, images, and other information your business needs to manage."
    ],
    [
        "question" => 'Which content management system should I choose with Creative Converge?',
        "answer" => "The right CMS depends on your publishing needs, editing workflow, integrations, technical resources, and budget. Creative Converge can compare suitable options, including WordPress and headless CMS platforms, based on how your team will use the system."
    ],
    [
        "question" => 'Can Creative Converge customize a CMS to match my website\'s design and features?',
        "answer" => "Many CMS platforms support custom templates, content types, fields, and integrations. Creative Converge can assess which customizations are practical for your selected platform while keeping the content editing process manageable."
    ],
    [
        "question" => 'Can Creative Converge migrate my existing website content into a new CMS?',
        "answer" => "Creative Converge can evaluate the source website and plan the transfer of eligible pages, images, metadata, and other content. The scope depends on the current platform, data structure, and whether URLs or content formats need to change."
    ],
    [
        "question" => 'Can Creative Converge help maintain my CMS after the website launches?',
        "answer" => "A CMS may need platform updates, access-control reviews, backups, plugin or integration checks, and troubleshooting. Creative Converge can discuss ongoing maintenance options and define which responsibilities are included in your support arrangement."
    ],
],

    
'website-maintenance' => [
    [
        "question" => 'What website maintenance services can I discuss with Creative Converge?',
        "answer" => "Depending on your website and agreed scope, Creative Converge can assess needs such as software updates, backups, security checks, bug fixes, performance reviews, and technical troubleshooting. The maintenance plan should reflect your platform and the importance of the site to your business."
    ],
    [
        "question" => 'Can Creative Converge maintain a website that another developer built?',
        "answer" => "Creative Converge can first review the existing website, its technology, hosting setup, and any available documentation. That assessment helps identify potential risks and determine what information or access is needed before maintenance work can begin."
    ],
    [
        "question" => 'Can Creative Converge help fix website errors or broken functionality?',
        "answer" => "Creative Converge can investigate issues such as broken forms, layout problems, malfunctioning features, and compatibility errors. The appropriate fix depends on the underlying cause, so some issues may require a technical review before an estimate can be provided."
    ],
    [
        "question" => 'How can Creative Converge help keep my website secure and reliable?',
        "answer" => "Creative Converge can help establish maintenance practices such as updates, backups, monitoring, and access reviews, depending on the support scope. These measures reduce certain risks, but no maintenance plan can guarantee complete protection against every security issue or outage."
    ],
    [
        "question" => 'What should I confirm before choosing a website maintenance plan from Creative Converge?',
        "answer" => "Ask which updates, fixes, backups, and monitoring tasks are covered, how requests are handled, and what happens when an issue falls outside the agreement. Creative Converge should clearly distinguish routine maintenance from new development and larger repair projects."
    ],
],

        'branding' => [
            ["question" => 'What is included in a branding package?', "answer" => 'Depending on the plan: logo design, brand colours and fonts, stationery, a social media kit, and in higher plans a full brand style guide, marketing collateral and packaging design.'],
            ["question" => 'What is a brand style guide?', "answer" => 'It is a document that explains how to use your logo, colours, fonts and imagery, so your brand looks the same everywhere. It is included in the Professional and Premium plans.'],
            ["question" => 'Can you rebrand my existing business?', "answer" => 'Yes. We can refresh your current identity or create a completely new brand while respecting the recognition you have already built.'],
            ["question" => 'Do you help with brand messaging?', "answer" => 'Yes. Brand Premium includes brand messaging and a tagline, so your words match your visuals.'],
            ["question" => 'How long does a branding project take?', "answer" => 'Brand Starter usually takes about 1 week. Professional and Premium packages take 2 to 4 weeks because they include more designs and the brand guidelines.'],
            ["question" => 'Do I own all the brand files?', "answer" => 'Yes. Once the project is paid, all final logos, brand files and designs belong to you.'],
        ],
        'ecommerce-website-solutions' => [
            ["question" => 'Which platform will my online store use?', "answer" => 'We build on Shopify, WooCommerce, Magento or a custom platform, based on your products, budget and growth plans, and recommend the best fit.'],
            ["question" => 'How many products can I sell?', "answer" => 'Ecommerce Starter includes up to 25 product uploads, Business up to 100, and Enterprise unlimited products.'],
            ["question" => 'Which payment gateways can you integrate?', "answer" => 'Starter includes 1 payment gateway, and Business includes multiple gateways such as Stripe, PayPal, Square and Authorize.net.'],
            ["question" => 'Can I manage orders and stock myself?', "answer" => 'Yes. Business includes an admin panel with order management, and Enterprise adds full inventory and stock management with advanced reports.'],
            ["question" => 'Can you build a multi-vendor marketplace?', "answer" => 'Yes. Ecommerce Enterprise includes a multi-vendor or marketplace option where multiple sellers can list and sell products.'],
            ["question" => 'Will my store be mobile friendly and SEO ready?', "answer" => 'Yes. Every store is mobile responsive, and the Business plan includes SEO optimization to help customers find your products.'],
        ],
        'video-animation-services' => [
            ["question" => 'How long does an animated video take?', "answer" => 'A 30-second video usually takes 1 to 2 weeks, and longer videos take 2 to 4 weeks. This includes script, storyboard, voice-over and animation.'],
            ["question" => 'Do you write the script?', "answer" => 'Yes. Every plan includes script writing. Standard and Premium include a custom script and storyboard written around your message and audience.'],
            ["question" => 'Can I choose the voice-over artist?', "answer" => 'Yes. We share voice samples so you can pick the voice, accent and tone. Premium includes studio-quality voice-over.'],
            ["question" => 'What styles of animation do you offer?', "answer" => 'We create 2D explainer videos, motion graphics, character animation, and in the Premium plan 3D motion graphics.'],
            ["question" => 'Can I get versions for social media?', "answer" => 'Yes. Premium Animation includes social media cut-downs, short versions sized for Instagram, TikTok, YouTube Shorts and Facebook.'],
            ["question" => 'What resolution will the video be delivered in?', "answer" => 'Basic and Standard are delivered in HD 1080p. Premium is delivered in Full HD and 4K, with source files included.'],
        ],
        'mobile-apps' => [
            ["question" => 'Do you build apps for both Android and iOS?', "answer" => 'Yes. App Starter covers one platform (Android or iOS). App Business is a cross-platform app for both Android and iOS from one codebase.'],
            ["question" => 'How long does it take to build a mobile app?', "answer" => 'A Starter app usually takes 4 to 6 weeks, a Business app 8 to 12 weeks, and Enterprise apps are planned in phases based on features.'],
            ["question" => 'Will you publish the app to the App Store and Play Store?', "answer" => 'Yes. We handle the submission process. You will need your own Apple Developer and Google Play developer accounts, and we help you set them up.'],
            ["question" => 'Can I manage the app content myself?', "answer" => 'Yes. App Business includes an admin panel, and Enterprise includes an advanced admin dashboard to manage users, content and orders.'],
            ["question" => 'Can the app include payments, chat or maps?', "answer" => 'Yes. Business includes payment gateway integration and push notifications. Enterprise supports real-time chat, location tracking and streaming features.'],
            ["question" => 'Do I own the app source code?', "answer" => 'Yes. Once the project is paid, the app is yours, and App Enterprise includes full source code access.'],
        ],
        'digital-marketing' => [
            ["question" => 'How soon will I see results?', "answer" => 'Paid ads can bring traffic within days. SEO usually shows clear improvement in 3 to 6 months, because search engines take time to trust and rank a website.'],
            ["question" => 'Which social media platforms do you manage?', "answer" => 'Starter covers 2 platforms, Growth covers 4, and Premium covers all major platforms, such as Facebook, Instagram, LinkedIn, TikTok and X.'],
            ["question" => 'Is ad spend included in the monthly price?', "answer" => 'No. Our price covers management, strategy and content. Your ad budget is paid directly to Google, Meta or LinkedIn, and we help you choose the right amount.'],
            ["question" => 'How will I know if the marketing is working?', "answer" => 'You receive regular performance reports showing traffic, rankings, leads and ad results: monthly on Starter, bi-weekly on Growth and weekly with strategy calls on Premium.'],
            ["question" => 'Is there a long-term contract?', "answer" => 'Plans are billed monthly. We recommend at least 3 months, especially for SEO, so there is enough time to see real results.'],
            ["question" => 'Do you create the social media posts?', "answer" => 'Yes. We design and write your posts: 12 per month on Starter, 20 on Growth, and 30 posts plus reels and stories on Premium.'],
        ],
        'advance-combo-packages' => [
            ["question" => 'What is a combo package?', "answer" => 'A combo package bundles several services, such as logo, website, branding, video and marketing, into one plan so you get everything you need at a lower total price.'],
            ["question" => 'Which combo is best for a new business?', "answer" => 'The Startup Combo is ideal for new businesses. It includes a professional logo, a 5-page responsive website, stationery and a social media kit.'],
            ["question" => 'Can I customize a combo package?', "answer" => 'Yes. Tell us what you need, and we can swap or add services to create a package that fits your business and budget.'],
            ["question" => 'How long does a combo package take?', "answer" => 'It depends on the services included. We work on them in parallel, and a Startup Combo is usually complete in 2 to 3 weeks. You get a clear timeline with your quote.'],
            ["question" => 'Is support included?', "answer" => 'Yes. Startup includes 1 month of free support, Business 3 months of free maintenance, and Enterprise 6 months of free maintenance plus 24/7 priority support.'],
            ["question" => 'Do I get one point of contact for everything?', "answer" => 'Yes. The Business and Enterprise combos include a dedicated account manager who coordinates every service for you.'],
        ],
    ];
    return $faqs[$slug] ?? placeholderFaqs();
}

$services = [


    [
        "title" => "Logo Design",
        "meta-title" => "Professional Logo Design Services | Creative Converge",
        "meta-description" => "Build a memorable brand identity with professional logo design services, including custom logos, redesigns, typography, color selection, and brand-ready files.",
        "slug" => "logo-design-solutions",
        "description" => "Your logo is more than decoration. We create distinctive visual identities that reflect your business, connect with your audience, and grow with your brand.",
        "subtitle" => "Your Logo Is Not a Decoration",

        "image" => "logo-design.jpg",
        "bannerImage" => "assets/img/banner-logo-design-baner.webp",

        "sub_services" => [],

        "listTitle" => "Our Logo Design Services Include:",
        "list" => [
            "Custom Logo Design",
            "Wordmark & Lettermark Design",
            "Symbol & Icon Design",
            "Logo Redesign & Refinement",
            "Color & Typography Selection",
            "Logo Variations & Formats",
            "Brand-Ready File Delivery",
        ],

        "introImages" => [
            "assets/img/logo-design-solutions-service-image.png",
        ],

        "introTitle" => "Looking Good Is Easy. Looking Like You Is the Challenge.",

        "introText" => "Before a single word is read, your logo should convey who you are. Instead of creating pretty marks, our professional logo designers develop visual identities based on audience psychology, brand positioning, research, and long-term scalability. A logo can be stylish and still say nothing about the business behind it. We explore ideas, shapes, typography, and visual details to find the right balance between personality, purpose, and recognition. The result should work beautifully on your website, business cards, product labels, and even a small profile image. Looking for affordable logo design near you? Creative Converge delivers thoughtful, professional logo design solutions built around your brand.",
        "introImages" => [
            "assets/img/logo-design-solutions-service-image.png",
        ],
        "portfolioLabel" => "Logo",
        "portfolio" => portfolioImgs('logo'),
        "plans" => [
            plan("Bronze", 25, [
                "3 Custom Logo Design Concepts",
                "1 Dedicated Designer",
                "4 Revisions",
                "2 Hours TAT",
                "100% Unique Design Guarantee",
                "100% Satisfaction Guarantee",
                "100% Money Back Guarantee *",
                "100% Ownership Rights",
            ]),
            plan("Silver", 60, [
                "5 Custom Logo Design Concepts",
                "By 2 Designers",
                "UNLIMITED Revisions",
                "48 to 72 Hours TAT",
                "All Final Files Format (AI, PSD, EPS, PNG, GIF, JPG, PDF)",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ], true),
            plan("Gold", 85, [
                "Unlimited Logo Design Concepts",
                "By 4 Designers",
                "UNLIMITED Revisions",
                "Stationery Design (Business Card, Letterhead, Envelope)",
                "FREE MS Word Letterhead",
                "48 to 72 Hours TAT",
                "All Final Files Format (AI, PSD, EPS, PNG, GIF, JPG, PDF)",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
            plan("Platinum", 175, [
                "UNLIMITED Logo Design Concepts",
                "By 5 Award Winning Designers",
                "Stationery Design (Business Card, Letterhead, Envelope)",
                "Icon Design",
                "UNLIMITED Revisions",
                "FREE MS Word Letterhead",
                "Free Email Signature",
                "All Final Files Format (AI, PSD, EPS, PNG, GIF, JPG, PDF)",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
                "48 to 72 Hours TAT",
            ]),
            plan("Titanium", 245, [
                "UNLIMITED Logo Design Concepts",
                "By 8 Award Winning Designers",
                "UNLIMITED Revisions",
                "2 Stationery Design Sets (Business Card, Letterhead, Envelope)",
                "Icon Design",
                "Double Sided Flyer Design / Bi-Fold Brochure",
                "FREE MS Word Letterhead",
                "Free Email Signature",
                "All Final Files Format (AI, PSD, EPS, PNG, GIF, JPG, PDF)",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee",
            ]),
            plan("Business", 425, [
                "UNLIMITED Logo Design Concepts",
                "By 8 Award Winning Designers",
                "Icon Design",
                "UNLIMITED Revisions",
                "2 Stationery Design Sets (Business Card, Letterhead, Envelope)",
                "FREE MS Word Letterhead",
                "Free Email Signature",
                "3 Page Custom Website",
                "2 Stock Photos",
                "2 Banner Designs",
                "jQuery Slider",
                "All Final Files Format (AI, PSD, EPS, PNG, GIF, JPG, PDF)",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
        ],
        "faqTitle" => "Logo Design FAQs",
        "faqSubtitle" => "Learn about our logo design process.",
        "faqItems" => serviceFaqs('logo-design-solutions'),
    ],


    [
        "title" => "Illustration Design",
        "mata-title" => "Custom Illustration Design Services | Creative Converge",
        "mata-description" => "Bring ideas to life with custom digital illustrations, character and mascot design, editorial artwork, product visuals, and marketing illustrations.",
        "slug" => "illustration-design",
        "description" => "Creative illustration design that brings concepts, stories, and brand personalities to life through original visuals tailored to your audience and purpose.",
        "subtitle" => "Give Your Ideas a Look, a Personality, and a Life of Their Own.",
        "image" => "illustration.jpg",
        "bannerImage" => "assets/img/banner-illustration-design.webp",
        "sub_services" => [],
        "listTitle" => "Our Illustration Design Services Include:",
        "list" => [
            "Custom Digital Illustrations",
            "Brand & Commercial Illustrations",
            "Character & Mascot Design",
            "Editorial & Concept Illustrations",
            "Product & Explainer Illustrations",
            "Website & App Illustrations",
            "Marketing & Social Media Illustrations",
        ],
        "introTitle" => "Give Your Ideas a Look, a Personality, and a Life of Their Own.",
        "introText" => "Some ideas are easier to understand when you can see them. Our illustration work brings concepts, stories, and brand personalities to life through original visuals created with your audience and purpose in mind. From expressive characters to detailed editorial artwork, every illustration is designed to communicate something worth remembering.",
        "introImages" => [
            "assets/gif/illustration-design-small.gif",
        ],
        "portfolio" => portfolioImgs('illustration'),
        "plans" => [
            plan("Basic Illustration", 149, [
                "1 Custom Illustration",
                "2 Concepts to Choose From",
                "2 Revisions",
                "JPG & PNG Files",
                "72 Hours Turnaround",
                "100% Satisfaction Guarantee",
            ]),
            plan("Standard Illustration", 299, [
                "3 Custom Illustrations",
                "Character or Scene Design",
                "Unlimited Revisions",
                "Vector Files (AI, EPS, SVG)",
                "Commercial Usage Rights",
                "48 to 72 Hours Turnaround",
                "Dedicated Support",
            ], true),
            plan("Premium Illustration", 499, [
                "6 Custom Illustrations",
                "Full Character Sheet & Poses",
                "Unlimited Revisions",
                "Print & Web Ready Files",
                "Storybook / Infographic Layout",
                "Source Files Included",
                "100% Ownership Rights",
                "Priority Support",
            ]),
        ],
        "faqItems" => serviceFaqs('illustration-design'),
    ],


    [
        "title" => "Web Design",
        "mata-title" => "Professional Web Design | Creative Converge",
        "mata-description" => "Creative Converge designs user-friendly, responsive websites with thoughtful UI/UX, custom layouts, landing pages, e-commerce experiences, and website redesign services.",
        "slug" => "web-design-solutions",
        "description" => "Your website has a job to do. It needs to tell your story, earn attention, and make the next step feel natural. At Creative Converge, we bring brand thinking, visual direction, and user experience together to create websites with a clear point of view.",
        "subtitle" => "From First Click to Lasting Impression, We Design for the Way People Think and Browse.",
        "image" => "web-design.jpg",
        "bannerImage" => "assets/img/banner-web-design.webp",
        "sub_services" => [],
        "listTitle" => "Our Web Design Services Include:",
        "list" => [
            "Custom Website Design",
            "UI/UX Design & User Journey Planning",
            "Responsive Web Design",
            "Landing Page Design",
            "E-commerce Website Design",
            "Website Redesign & Visual Refresh",
        ],
        "introTitle" => "From First Click to Lasting Impression, We Design for the Way People Think and Browse.",
        "introText" => "A great website needs to do more than look good. It should make your business easy to understand, help visitors find what they need, and give them a reason to take the next step. We bring together visual design, user experience, and thoughtful layouts to create websites that feel right for your brand and work for your audience.",
        "introImages" => [
            "assets/img/web-design.jpg",
        ],
        "portfolio" => portfolioImgs('webdesign'),
        "plans" => [
            plan("Bronze", 499, [
                "2 Stock Assets/Images",
                "3 Page Website",
                "1 jQuery Slider Banner",
                "Contact/Query Form",
                "Complete W3C Certified HTML",
                "48 to 72 Hours TAT",
                "Complete Deployment",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
            plan("Silver", 999, [
                "5 Stock Photos",
                "5 Page Website",
                "3 Banner Designs",
                "1 jQuery Slider Banner",
                "FREE Google Friendly Sitemap",
                "Complete W3C Certified HTML",
                "48 to 72 Hours TAT",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
                "Mobile Responsive will be Additional $200*",
                "CMS will be Additional $250*",
            ], true),
            plan("Gold", 1499, [
                "10 Unique Pages Website",
                "CMS / Admin Panel Support",
                "8 Stock Assets/Images",
                "5 Banner Designs",
                "1 jQuery Slider Banner",
                "FREE Google Friendly Sitemap",
                "Complete W3C Certified HTML",
                "48 to 72 Hours TAT",
                "Complete Deployment",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
                "Mobile Responsive will be Additional $200*",
            ]),
            plan("Platinum", 1999, [
                "Upto 15 Unique Pages Website",
                "Conceptual and Dynamic Website",
                "Mobile Responsive",
                "Online Reservation/Appointment Tool (Optional)",
                "Online Payment Integration (Optional)",
                "Custom Forms",
                "Lead Capturing Forms (Optional)",
                "Striking Hover Effects",
                "Newsletter Subscription (Optional)",
                "Newsfeed Integration",
                "Social Media Integration",
                "Search Engine Submission",
                "5 Stock Photos",
                "3 Unique Banner Designs",
                "1 jQuery Slider Banner",
                "Complete W3C Certified HTML",
                "48 to 72 Hours TAT",
                "Complete Deployment",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
            plan("Titanium", 2499, [
                "15 to 20 Pages Website",
                "Custom Made, Interactive, Dynamic & High End Design",
                "Custom WP (or) Custom PHP Development",
                "1 jQuery Slider Banner",
                "Up to 10 Custom Made Banner Designs",
                "10 Stock Assets/Images",
                "Unlimited Revisions",
                "Special Hoover Effects",
                "Content Management System (CMS)",
                "Online Appointment/Scheduling/Online Ordering Integration (Optional)",
                "Online Payment Integration (Optional)",
                "Multi Lingual (Optional)",
                "Custom Dynamic Forms (Optional)",
                "Signup Area (For Newsletters, Offers etc.)",
                "Search Bar",
                "Live Feeds of Social Networks Integration (Optional)",
                "Mobile Responsive",
                "FREE 5 Years Domain Name",
                "Free Google Friendly Sitemap",
                "Search Engine Submission",
                "Complete W3C Certified HTML",
                "Industry Specified Team of Expert Designers and Developers",
                "Complete Deployment",
                "Dedicated Accounts Manager",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee",
            ]),
            plan("Customized Web Portal ", 7999, [
                "WEBSITE",
                "Complete Custom Design & Development",
                "Dating Portal, Job Portal, Professional Network Portal, Social Network Portal, Restaurant Portal, Medical Portal, Enterprise Portal (Any One)",
                "Unique, User Friendly, Interactive, Dynamic, High End UI Design",
                "Unlimited Banner Designs",
                "Interactive Sliding Banners",
                "Special Hover Effects",
                "Unlimited Stock Assets/Images",
                "User Signup Area",
                "Client/User Dashboard Area",
                "Custom Coding and Development",
                "Content Management System (Custom)",
            ]),
        ],
        "faqItems" => serviceFaqs(''),
    ],
    [
        "title" => "Web Development ",
        "mata-title" => "Web Developer Solutions | Your Brand Name",
        "mata-description" => "Custom website development using modern technologies.",
        "slug" => "web-developer-solutions",
        "description" => "From business websites to more complex digital platforms, we turn designs and ideas into working digital experiences. We focus on clean implementation, practical functionality, responsive performance, and the features your business needs.",
        "image" => "web-development.jpg",
        "bannerImage" => "assets/img/banner-web-development.webp",
        "listTitle" => "Our Logo Design Services include:",
        "list" => [
            "Custom Website Development",
            "eCommerce Development",
            "CMS & WordPress Development",
            "Custom Web Applications",
            "Web Portal Development",
            "API Integration & Third-Party Connectivity",
            "Website Maintenance & Technical Support",
        ],
        "introImages" => [
            "assets/gif/web-development.gif",
        ],
        "portfolio" => portfolioImgs('webdeveloper'),
        "plans" => [
            plan("Bronze", 499, [
                "2 Stock Assets/Images",
                "3 Page Website",
                "1 jQuery Slider Banner",
                "Contact/Query Form",
                "Complete W3C Certified HTML",
                "48 to 72 Hours TAT",
                "Complete Deployment",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
            plan("Silver", 999, [
                "5 Stock Photos",
                "5 Page Website",
                "3 Banner Designs",
                "1 jQuery Slider Banner",
                "FREE Google Friendly Sitemap",
                "Complete W3C Certified HTML",
                "48 to 72 Hours TAT",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
                "Mobile Responsive will be Additional $200*",
                "CMS will be Additional $250*",
            ], true),
            plan("Gold", 1499, [
                "10 Unique Pages Website",
                "CMS / Admin Panel Support",
                "8 Stock Assets/Images",
                "5 Banner Designs",
                "1 jQuery Slider Banner",
                "FREE Google Friendly Sitemap",
                "Complete W3C Certified HTML",
                "48 to 72 Hours TAT",
                "Complete Deployment",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
                "Mobile Responsive will be Additional $200*",
            ]),
            plan("Platinum", 1999, [
                "Upto 15 Unique Pages Website",
                "Conceptual and Dynamic Website",
                "Mobile Responsive",
                "Online Reservation/Appointment Tool (Optional)",
                "Online Payment Integration (Optional)",
                "Custom Forms",
                "Lead Capturing Forms (Optional)",
                "Striking Hover Effects",
                "Newsletter Subscription (Optional)",
                "Newsfeed Integration",
                "Social Media Integration",
                "Search Engine Submission",
                "5 Stock Photos",
                "3 Unique Banner Designs",
                "1 jQuery Slider Banner",
                "Complete W3C Certified HTML",
                "48 to 72 Hours TAT",
                "Complete Deployment",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
            plan("Titanium", 2499, [
                "15 to 20 Pages Website",
                "Custom Made, Interactive, Dynamic & High End Design",
                "Custom WP (or) Custom PHP Development",
                "1 jQuery Slider Banner",
                "Up to 10 Custom Made Banner Designs",
                "10 Stock Assets/Images",
                "Unlimited Revisions",
                "Special Hoover Effects",
                "Content Management System (CMS)",
                "Online Appointment/Scheduling/Online Ordering Integration (Optional)",
                "Online Payment Integration (Optional)",
                "Multi Lingual (Optional)",
                "Custom Dynamic Forms (Optional)",
                "Signup Area (For Newsletters, Offers etc.)",
                "Search Bar",
                "Live Feeds of Social Networks Integration (Optional)",
                "Mobile Responsive",
                "FREE 5 Years Domain Name",
                "Free Google Friendly Sitemap",
                "Search Engine Submission",
                "Complete W3C Certified HTML",
                "Industry Specified Team of Expert Designers and Developers",
                "Complete Deployment",
                "Dedicated Accounts Manager",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee",
            ]),
            plan("Customized Web Portal ", 7999, [
                "WEBSITE",
                "Complete Custom Design & Development",
                "Dating Portal, Job Portal, Professional Network Portal, Social Network Portal, Restaurant Portal, Medical Portal, Enterprise Portal (Any One)",
                "Unique, User Friendly, Interactive, Dynamic, High End UI Design",
                "Unlimited Banner Designs",
                "Interactive Sliding Banners",
                "Special Hover Effects",
                "Unlimited Stock Assets/Images",
                "User Signup Area",
                "Client/User Dashboard Area",
                "Custom Coding and Development",
                "Content Management System (Custom)",
            ]),
        ],
        "faqItems" => serviceFaqs('web-developer-solutions'),

        "sub_services" => [


            [
                "title" => "Laravel",
                "mata-title" => "Laravel Development Services in Dallas | Creative Converge",
                "mata-description" => "Creative Converge provides custom Laravel development services, including web applications, API integrations, security, performance optimization, maintenance, and upgrades.",
                "slug" => "laravel",
                "description" => "A Laravel development agency in Dallas should be built on a foundation your team can understand and extend. Our Laravel development services use the framework’s structured approach to help organize application logic and create tailored solutions for your business workflows.",
                "subtitle" => "Laravel Development Services Built Around Your Business Needs",
                "image" => "laravel.jpg",
                "bannerImage" => "assets/img/banner-laravel.webp",
                "sub_services" => [],
                "introTitle" => "Laravel Development Services Built Around Your Business Needs",
                "introText" => "When your business outgrows basic website functionality, you need a solution that can handle more complex requirements without making everyday operations harder. Creative Converge offers custom Laravel web application development services for businesses that need custom web applications, reliable backend systems, and features built to the way they operate.",
                "listTitle" => "Our Laravel Development Services Include:",
                "list" => [
                    "Custom Laravel Development",
                    "Laravel Web Application Development",
                    "Laravel API Development & Integration",
                    "Laravel Security & Authentication",
                    "Laravel Performance Optimization",
                    "Laravel Maintenance & Upgrades",
                ],

                "introImages" => "assets/gif/laravel-development.gif",
                "portfolioLabel" => "Laravel",
                "portfolio" => portfolioImgs('laravel'),
                // "plans" => [
                //     plan("Laravel Starter", 999, [
                //         "Up to 5 Modules / Pages",
                //         "User Authentication & Roles",
                //         "Admin Dashboard",
                //         "MySQL Database Design",
                //         "Mobile Responsive UI",
                //         "Complete Deployment",
                //     ]),
                //     plan("Laravel Business", 2499, [
                //         "Up to 12 Modules",
                //         "Custom Admin Panel",
                //         "REST API Development",
                //         "Payment Gateway Integration",
                //         "Email & Notification System",
                //         "Third-Party API Integration",
                //         "1 Month Free Maintenance",
                //         "Dedicated Support",
                //     ], true),
                //     plan("Laravel Enterprise", 4999, [
                //         "Custom CRM / ERP System",
                //         "Multi-Role Access Control",
                //         "Queue, Cache & Job Optimization",
                //         "Advanced Reports & Analytics",
                //         "API & Microservice Architecture",
                //         "Security Audit & Hardening",
                //         "3 Months Free Maintenance",
                //         "Full Source Code Access",
                //         "24/7 Priority Support",
                //     ]),
                // ],
                "faqItems" => serviceFaqs('laravel'),
            ],

           
[
    "title" => "Node.js Development",
    "mata-title" => "Node.js Development Services in Dallas | Creative Converge",
    "mata-description" => "Creative Converge provides custom Node.js development services, including backend applications, API development, database integration, security, performance optimization, and maintenance.",
    "slug" => "node-js",
    "description" => "As a Node.js development agency in Dallas, we create server-side applications that support your business needs with a practical architecture and a clear plan for future changes.",
    "subtitle" => "Node.js Development Services for Fast, Reliable Web Applications",
    "image" => "node-js.jpg",
    "bannerImage" => "assets/img/banner-node-js.webp",
    "sub_services" => [],
    "introTitle" => "Node.js Development Services for Fast, Reliable Web Applications",
    "introText" => "When your application needs to handle frequent requests, exchange data in real time, or support growing user activity, the technology behind it matters. Creative Converge delivers custom Node.js application development services for businesses that need responsive applications, efficient server-side processing, and dependable integrations.",
    "listTitle" => "Our Node.js Development Services Include:",
    "list" => [
        "Custom Node.js Development",
        "Practical Application Development",
        "Node.js API Development",
        "Backend Architecture & Database Integration",
        "Node.js Security & Authentication",
        "Node.js Performance & Maintenance",
    ],

                "introImages" => "assets/gif/why-nodejs.gif",
                "portfolioLabel" => "Node JS",
                "portfolio" => portfolioImgs('nodejs'),
                // "plans" => [
                //     plan("Node Starter", 899, [
                //         "REST API with Express.js",
                //         "Up to 10 Endpoints",
                //         "JWT Authentication",
                //         "MongoDB / MySQL Integration",
                //         "API Documentation",
                //         "Complete Deployment",
                //     ]),
                //     plan("Node Business", 2199, [
                //         "Up to 30 API Endpoints",
                //         "Real-Time Features (Socket.io)",
                //         "GraphQL Integration",
                //         "Payment Gateway Integration",
                //         "Role-Based Access Control",
                //         "Third-Party API Integration",
                //         "1 Month Free Maintenance",
                //         "Dedicated Support",
                //     ], true),
                //     plan("Node Enterprise", 4499, [
                //         "Microservices Architecture",
                //         "Real-Time Chat / Streaming Apps",
                //         "Message Queues & Caching (Redis)",
                //         "Docker & CI/CD Setup",
                //         "Load Testing & Optimization",
                //         "Security Audit & Hardening",
                //         "3 Months Free Maintenance",
                //         "Full Source Code Access",
                //         "24/7 Priority Support",
                //     ]),
                // ],
                "faqItems" => serviceFaqs('node-js'),
            ],

           
[
    "title" => "Custom PHP Development",
    "mata-title" => "Custom PHP Development Services in Dallas | Creative Converge",
    "mata-description" => "Creative Converge provides custom PHP development services, including web applications, API integrations, security, maintenance, upgrades, and code optimization.",
    "slug" => "custom-php-development",
    "description" => "As a top-class custom PHP development agency in Dallas, we shape website features and application logic around your requirements, with an emphasis on practical functionality and code your team can maintain.",
    "subtitle" => "Custom PHP Development That Fits the Way Your Business Works",
    "image" => "custom-php.jpg",
    "bannerImage" => "assets/img/banner-custom-php.webp",
    "sub_services" => [],
    "introTitle" => "Custom PHP Development That Fits the Way Your Business Works",
    "introText" => "When readily available software can't handle your requirements, a customized solution can make all the difference. Creative Converge provides custom PHP development services for businesses that need tailored functionality, smoother workflows, and greater control over their web applications.",
    "listTitle" => "Our Custom PHP Development Services Include:",
    "list" => [
        "Custom PHP Web Development",
        "PHP Application Development",
        "PHP API Development & Integration",
        "PHP Security & Maintenance",
        "PHP Upgrades & Feature Enhancements",
        "PHP Code Optimization & Troubleshooting",
    ],

                "introImages" => "assets/gif/laravel-development.gif",

                "portfolioLabel" => "Custom PHP",
                "portfolio" => portfolioImgs('php'),
                // "plans" => [
                //     plan("PHP Starter", 699, [
                //         "Up to 5 Dynamic Pages",
                //         "MySQL Database Setup",
                //         "Admin Login Panel",
                //         "Contact / Query Forms",
                //         "Mobile Responsive",
                //         "Complete Deployment",
                //     ]),
                //     plan("PHP Business", 1799, [
                //         "Up to 15 Dynamic Pages",
                //         "Custom Admin Panel (CRUD)",
                //         "User Registration & Login",
                //         "Payment Gateway Integration",
                //         "Third-Party API Integration",
                //         "SEO Optimization",
                //         "1 Month Free Maintenance",
                //         "Dedicated Support",
                //     ], true),
                //     plan("PHP Enterprise", 3799, [
                //         "Complete Custom Web Portal",
                //         "Advanced Database Architecture",
                //         "Multi-Role User Management",
                //         "Reports, Charts & Exports",
                //         "Legacy Code Migration",
                //         "Security Audit & Hardening",
                //         "3 Months Free Maintenance",
                //         "Full Source Code Access",
                //         "24/7 Priority Support",
                //     ]),
                // ],
                "faqItems" => serviceFaqs('custom-php-development'),
            ],


[
    "title" => "Next.js Development",
    "mata-title" => "Next.js Development Services | Creative Converge",
    "mata-description" => "Creative Converge builds modern Next.js websites and web applications with efficient rendering, interactive experiences, API integrations, headless CMS connectivity, and ongoing maintenance.",
    "slug" => "next-js",
    "description" => "At Creative Converge, we use Next.js to build modern web experiences with thoughtful architecture, efficient rendering, and the flexibility to support evolving business needs.",
    "subtitle" => "Built for the Experience You Want to Deliver.",
    "image" => "next-js.jpg",
    "bannerImage" => "assets/img/banner-nextjs.webp",
    "sub_services" => [],
    "introTitle" => "Built for the Experience You Want to Deliver.",
    "introText" => "The challenge isn't simply getting a website online. It's making sure the right content reaches users efficiently, pages respond as expected, and new functionality doesn't turn into a technical headache down the road.",
    "listTitle" => "What We Can Build With Next.js:",
    "list" => [
        "Custom Next.js Development",
        "High-Performance Websites",
        "Server-Side & Static Rendering",
        "Interactive Web Applications",
        "API & Backend Integration",
        "Headless CMS Integration",
        "Ongoing Improvements & Maintenance",
    ],

                "introImages" => "assets/gif/why-nextjs.gif",
                "portfolioLabel" => "Next.js",
                "portfolio" => portfolioImgs('nextjs'),
                // "plans" => [
                //     plan("Next.js Starter", 999, [
                //         "Up to 5 Page Website",
                //         "Static Site Generation (SSG)",
                //         "Tailwind CSS UI",
                //         "Technical SEO & Meta Setup",web-design-solutions
                //         "Mobile Responsive",
                //         "Vercel Deployment",
                //     ]),
                //     plan("Next.js Business", 2299, [
                //         "Up to 12 Pages / Routes",
                //         "Server-Side Rendering (SSR)",
                //         "Headless CMS Integration",
                //         "API Routes & Forms",
                //         "Authentication Setup",
                //         "Core Web Vitals Optimization",
                //         "1 Month Free Maintenance",
                //         "Dedicated Support",
                //     ], true),
                //     plan("Next.js Enterprise", 4699, [
                //         "Full-Stack Next.js Application",
                //         "Database & ORM Integration",
                //         "Advanced Auth & Role Management",
                //         "Payment & Third-Party Integrations",
                //         "Multi-Language (i18n) Support",
                //         "CI/CD & Performance Monitoring",
                //         "3 Months Free Maintenance",
                //         "Full Source Code Access",
                //         "24/7 Priority Support",
                //     ]),
                // ],
                "faqItems" => serviceFaqs('next-js'),
            ],

          
[
    "title" => "WordPress Development",
    "mata-title" => "Custom WordPress Development Services | Creative Converge",
    "mata-description" => "Creative Converge builds custom WordPress websites with scalable themes, performance and SEO optimization, clean code, easy content management, and security best practices.",
    "slug" => "wordpress-development",
    "description" => "Your website should do more than look good; it should make running your business easier. Creative Converge is a WordPress development company that builds websites around your goals, your audience, and the way you work.",
    "subtitle" => "WordPress Websites Built to Work as Hard as You Do.",
    "image" => "wordpress-development.jpg",
    "bannerImage" => "assets/img/banner-wordpress.webp",
    "sub_services" => [],
    "introTitle" => "Your Website Should Work as Hard as You Do.",
    "introText" => "WordPress gives you flexibility, but flexibility without strategy can quickly become complicated. We build WordPress websites that are clean under the hood, easy to manage, and designed to grow with your business. No clunky themes, unnecessary plugins, or avoidable performance issues. Just a solid, scalable website built with speed, search visibility, and simple content updates in mind.",
    "listTitle" => "Our WordPress Development Services Include:",
    "list" => [
        "Custom WordPress Theme Development",
        "Website Speed & SEO Optimization",
        "Clean, Scalable Code Structure",
        "Easy Backend Content Management",
        "Security & Performance Best Practices",
    ],
                "introImages" => "assets/gif/why-wordpress.gif",
                "portfolioLabel" => "WordPress",
                "portfolio" => portfolioImgs('wordpress'),
                // "plans" => [
                //     plan("WordPress Starter", 399, [
                //         "Up to 5 Page WordPress Website",
                //         "Premium Theme Customization",
                //         "Contact Form",
                //         "Basic SEO Setup (Yoast / RankMath)",
                //         "Mobile Responsive",
                //         "Complete Deployment",
                //     ]),
                //     plan("WordPress Business", 899, [
                //         "Up to 10 Page WordPress Website",
                //         "Custom Theme Design",
                //         "Elementor / Gutenberg Page Builder",
                //         "Blog & Portfolio Setup",
                //         "Speed Optimization",
                //         "Security Hardening",
                //         "1 Month Free Maintenance",
                //         "Dedicated Support",
                //     ], true),
                //     plan("WordPress Enterprise", 1799, [
                //         "Up to 20 Page Custom Website",
                //         "Fully Custom Theme from Scratch",
                //         "Bespoke Plugin Development",
                //         "Membership / Booking Features",
                //         "Multilingual Support",
                //         "Advanced SEO & Schema Markup",
                //         "3 Months Free Maintenance",
                //         "Full Source Code Access",
                //         "24/7 Priority Support",
                //     ]),
                // ],
                "faqItems" => serviceFaqs('wordpress-development'),
            ],

            
[
    "title" => "Shopify",
    "mata-title" => "Shopify Store Development & Customization | Creative Converge",
    "mata-description" => "Creative Converge builds Shopify stores with custom theme customization, conversion-focused product pages, payment gateway setup, cart abandonment optimization, and mobile-first design.",
    "slug" => "shopify",
    "description" => "Selling online should feel like an opportunity, not a juggling act. Creative Converge delivers Shopify development services for businesses that want a distinctive storefront, practical selling tools, and a store that's easier to run day-to-day.",
    "subtitle" => "Distinctive Shopify Stores Designed for Better Shopping Experiences.",
    "image" => "shopify.jpg",
    "bannerImage" => "assets/img/banner-shopify.webp",
    "sub_services" => [],
    "introTitle" => "If Your Store Looks Good but Doesn't Sell, It's Just Decor.",
    "introText" => "A Shopify store isn't about aesthetics alone. It's about flow, trust, and momentum. We design stores that guide customers naturally from just browsing to checkout complete. Every product page, every scroll, and every click has a purpose. With clean layouts, persuasive visuals, and a smooth checkout experience, we help reduce friction and make shopping easier for your customers.",
    "listTitle" => "Our Shopify Development Services Include:",
    "list" => [
        "Custom Shopify Theme Customization",
        "Conversion-Focused Product Page Layouts",
        "Payment Gateway Setup",
        "Cart Abandonment Optimization",
        "Mobile-First Store Design",
    ],
                "introImages" => "assets/gif/why-shopify.gif",
                "portfolioLabel" => "Shopify",
                "portfolio" => portfolioImgs('shopify'),
                // "plans" => [
                //     plan("Shopify Starter", 499, [
                //         "Complete Store Setup",
                //         "Premium Theme Customization",
                //         "Up to 25 Product Uploads",
                //         "Payment Gateway Setup",
                //         "Mobile Responsive",
                //         "Complete Deployment",
                //     ]),
                //     plan("Shopify Business", 1199, [
                //         "Custom Shopify Theme Design",
                //         "Up to 100 Product Uploads",
                //         "App Integration & Configuration",
                //         "Shipping & Tax Setup",
                //         "Abandoned Cart Recovery Setup",
                //         "Basic SEO Optimization",
                //         "1 Month Free Maintenance",
                //         "Dedicated Support",
                //     ], true),
                //     plan("Shopify Enterprise", 2499, [
                //         "Fully Custom Liquid Theme",
                //         "Unlimited Product Uploads",
                //         "Custom App / Script Development",
                //         "Store Migration to Shopify",
                //         "CRO & Checkout Optimization",
                //         "Multi-Currency & Multi-Language",
                //         "3 Months Free Maintenance",
                //         "24/7 Priority Support",
                //     ]),
                // ],
                "faqItems" => serviceFaqs('shopify'),
            ],

           
[
    "title" => "Magento",
    "mata-title" => "Magento Development Services | Creative Converge",
    "mata-description" => "Creative Converge provides Magento development services, including custom store configuration, inventory management, secure checkout, API integrations, and performance optimization.",
    "slug" => "magento",
    "description" => "Creative Converge provides Magento development services for businesses looking for greater control over their eCommerce operations. We build tailored storefronts, configure essential features, and shape store functionality around the way your business sells.",
    "subtitle" => "Tailored Magento Solutions for Growing Businesses.",
    "image" => "magento.jpg",
    "bannerImage" => "assets/img/banner-magento.webp",
    "sub_services" => [],
    "introTitle" => "Advanced E-Commerce for Growing Enterprises.",
    "introText" => "Magento is powerful, but it works best when structured correctly. We build enterprise-level online stores designed to support complex catalogs and demanding traffic requirements. From backend product configuration to secure checkout architecture, we focus on performance, reliable functionality, and long-term scalability.",
    "listTitle" => "Our Magento Development Services Include:",
    "list" => [
        "Custom Magento Configuration",
        "Multi-Product Inventory Management",
        "Secure Checkout & Transaction Systems",
        "API & Third-Party Integrations",
        "Performance Optimization",
    ],
                "introImages" => "assets/gif/why-magento.gif",
                "portfolioLabel" => "Magento",
                "portfolio" => portfolioImgs('magento'),
                // "plans" => [
                //     plan("Magento Starter", 1499, [
                //         "Magento Store Installation & Setup",
                //         "Theme Customization",
                //         "Up to 50 Product Uploads",
                //         "Payment & Shipping Setup",
                //         "Mobile Responsive",
                //         "Complete Deployment",
                //     ]),
                //     plan("Magento Business", 3499, [
                //         "Custom Magento Theme Design",
                //         "Up to 500 Product Uploads",
                //         "Custom Extension Setup",
                //         "Multi-Store Configuration",
                //         "Third-Party Integrations",
                //         "Speed & Server Optimization",
                //         "1 Month Free Maintenance",
                //         "Dedicated Support",
                //     ], true),
                //     plan("Magento Enterprise", 6999, [
                //         "Fully Custom Magento Store",
                //         "B2B & B2C Features",
                //         "ERP / CRM Integration",
                //         "Custom Module Development",
                //         "Advanced Catalog & Inventory Setup",
                //         "Security Audit & Hardening",
                //         "3 Months Free Maintenance",
                //         "24/7 Priority Support",
                //     ]),
                // ],
                "faqItems" => serviceFaqs('magento'),
            ],

           
[
    "title" => "WooCommerce",
    "mata-title" => "WooCommerce Development Services | Creative Converge",
    "mata-description" => "Creative Converge develops WooCommerce stores with custom design, store setup, speed optimization, troubleshooting, product catalog functionality, and ongoing maintenance.",
    "slug" => "woocommerce",
    "description" => "At Creative Converge, we develop WooCommerce stores that bring your products, customer experience, and day-to-day operations together, giving you more control over how your online business works.",
    "subtitle" => "Flexible WooCommerce Stores Built Around Your Business.",
    "image" => "woocommerce.jpg",
    "bannerImage" => "assets/img/banner-woocommerce.webp",
    "sub_services" => [],
    "introTitle" => "What Could Your WordPress Site Become With WooCommerce?",
    "introText" => "Already like WordPress but ready to start selling? Our WooCommerce development services can help turn your site into a store that feels like a natural extension of your brand. We focus on product discovery, useful store features, and manageable workflows from catalog to checkout.",
    "listTitle" => "Our WooCommerce Development Services Include:",
    "list" => [
        "WooCommerce Store Setup",
        "WooCommerce Website Design",
        "WooCommerce Speed Optimization",
        "WooCommerce Troubleshooting & Customization",
        "Product Catalog & Store Functionality",
        "WooCommerce Maintenance & Support",
    ],
                "introImages" => "assets/gif/why-woocommerce.gif",
                "portfolioLabel" => "WooCommerce",
                "portfolio" => portfolioImgs('woocommerce'),
                // "plans" => [
                //     plan("WooCommerce Starter", 499, [
                //         "Complete Store Setup",
                //         "Theme Customization",
                //         "Up to 25 Product Uploads",
                //         "Payment Gateway Setup",
                //         "Mobile Responsive",
                //         "Complete Deployment",
                //     ]),
                //     plan("WooCommerce Business", 1099, [
                //         "Custom Store Design",
                //         "Up to 100 Product Uploads",
                //         "Shipping & Tax Configuration",
                //         "Coupons & Discount Setup",
                //         "Checkout Optimization",
                //         "Basic SEO Optimization",
                //         "1 Month Free Maintenance",
                //         "Dedicated Support",
                //     ], true),
                //     plan("WooCommerce Enterprise", 2299, [
                //         "Fully Custom Store & Theme",
                //         "Unlimited Product Uploads",
                //         "Custom Plugin Development",
                //         "Subscriptions & Memberships",
                //         "Multi-Vendor Marketplace Option",
                //         "Speed & Security Optimization",
                //         "3 Months Free Maintenance",
                //         "24/7 Priority Support",
                //     ]),
                // ],
                "faqItems" => serviceFaqs('woocommerce'),
            ],

           
[
    "title" => "CMS Development",
    "mata-title" => "Custom CMS Development Services | Creative Converge",
    "mata-description" => "Creative Converge provides CMS development services with custom configuration, intuitive admin interfaces, flexible content editing, media management, and secure database structures.",
    "slug" => "cms-development",
    "description" => "Creative Converge provides CMS development services that help businesses manage website content with less effort and greater control.",
    "subtitle" => "Flexible CMS Solutions Designed Around Your Workflow.",
    "image" => "cms-development.jpg",
    "bannerImage" => "assets/img/banner-cms.webp",
    "sub_services" => [],
    "introTitle" => "Manage Your Content Without Technical Complexity.",
    "introText" => "A Content Management System allows you to update text, images, blogs, or products without touching code. We customize CMS platforms to match your business model. Instead of overwhelming dashboards, we simplify your backend experience while maintaining the functionality your business needs.",
    "listTitle" => "Our CMS Development Services Include:",
    "list" => [
        "Custom CMS Configuration",
        "Intuitive Admin Interface",
        "Flexible Content Editing",
        "Media & Asset Management",
        "Secure Database Structure",
    ],

                "introImages" => "assets/gif/why-cms.gif",

                "portfolioLabel" => "CMS",
                "portfolio" => portfolioImgs('cms'),
                // "plans" => [
                //     plan("CMS Starter", 799, [
                //         "Custom Admin Panel",
                //         "Manage Pages, Blogs & Media",
                //         "Single User Role",
                //         "SEO Fields (Title, Meta)",
                //         "Mobile Responsive Admin",
                //         "Complete Deployment",
                //     ]),
                //     plan("CMS Business", 1799, [
                //         "Custom Admin Dashboard",
                //         "Multi-User Access Control",
                //         "Content Approval Workflow",
                //         "Media Library & Menu Builder",
                //         "API Integration",
                //         "Activity Logs",
                //         "1 Month Free Maintenance",
                //         "Dedicated Support",
                //     ], true),
                //     plan("CMS Enterprise", 3499, [
                //         "Fully Custom / Headless CMS",
                //         "Advanced Role & Permission System",
                //         "Multi-Language & Multi-Site Support",
                //         "CMS Migration from Old Platform",
                //         "Third-Party Systems Integration",
                //         "Security Audit & Hardening",
                //         "3 Months Free Maintenance",
                //         "24/7 Priority Support",
                //     ]),
                // ],
                "faqItems" => serviceFaqs('cms-development'),
            ],

          
[
    "title" => "Website Maintenance",
    "mata-title" => "Website Maintenance Services | Creative Converge",
    "mata-description" => "Creative Converge provides website maintenance services, including routine updates, security monitoring, backup scheduling, performance audits, and technical troubleshooting.",
    "slug" => "website-maintenance",
    "description" => "Our website maintenance services cover the practical tasks involved in maintaining your digital presence, from publishing fresh information to troubleshooting technical faults and managing essential website components.",
    "subtitle" => "Reliable Website Care to Keep Your Business Running Smoothly.",
    "image" => "website-maintenance.jpg",
    "bannerImage" => "assets/img/banner-website-maintenance.webp",
    "sub_services" => [],
    "introTitle" => "Because 'Set It and Forget It' Doesn't Work Online.",
    "introText" => "Websites aren't a one-and-done deal. They need regular updates, security checks, and performance tuning to keep running smoothly. At Creative Converge, our experts help keep your site secure, functional, and up to date so you're better prepared to handle technical issues before they disrupt your business.",
    "listTitle" => "Our Website Maintenance Services Include:",
    "list" => [
        "Routine System Updates",
        "Security Monitoring & Patching",
        "Backup Scheduling",
        "Performance Audits",
        "Technical Troubleshooting",
    ],
                "introImages" => "assets/gif/why-website-maintenance.gif",
                "portfolioLabel" => "Maintenance",
                "portfolio" => portfolioImgs('maintenance'),
                "plans" => [
                    plan("Basic Care (Monthly)", 39.99, [
                        "Daily Website Maintenance",
                        "WordPress / Plugin Updates",
                        "Security + Hacker Defense",
                        "Daily Backups & Restore",
                        "24/7 Monitoring",
                        "Daily Malware Scans",
                        "Daily Malware Removal",
                        "Monthly Website Report",
                        "404 Detection",
                        "WordPress Version Upgrade",
                        "Managed Server 1GB",
                        "Turnaround: 2 Business Days",
                        "Edits & Support: 30 Minutes / Month",
                        "2GB Bandwidth",
                        "Dedicated Account Manager",
                        "Up to 40 Stock Images",
                        "Complete W3C Certified HTML",
                        "Complete Deployment",
                        "100% Satisfaction Guarantee",
                        "100% Unique Design Guarantee",
                        "Money Back Guarantee",
                    ]),
                    plan("STARTUP (Monthly)", 59.99, [
                        "Daily Website Maintenance",
                        "WordPress / Plugin Updates",
                        "Security + Hacker Defense",
                        "Daily Backups & Restore",
                        "24/7 Monitoring",
                        "Daily Malware Scans",
                        "Daily Malware Removal",
                        "Monthly Website Report",
                        "404 Detection",
                        "WordPress Version Upgrade",
                        "Managed Server 2GB",
                        "Speed Optimization",
                        "Hide Login & Admin",
                        "Turnaround: 1 Business Day",
                        "Edits & Support: 60 Minutes / Month",
                        "Performance Scan",
                        "4GB Bandwidth",
                        "Dedicated Account Manager",
                        "Up to 40 Stock Images",
                        "Complete W3C Certified HTML",
                        "Complete Deployment",
                        "100% Satisfaction Guarantee",
                        "100% Unique Design Guarantee",
                        "Money Back Guarantee",
                    ], true),
                    plan("PROFESSIONAL (Monthly)", 99.99, [
                        "Daily Website Maintenance",
                        "WordPress / Plugin Updates",
                        "Security + Hacker Defense",
                        "Daily Backups & Restore",
                        "24/7 Monitoring",
                        "Daily Malware Scans",
                        "Monthly Website Report",
                        "404 Detection",
                        "WordPress Version Upgrade",
                        "Managed Server 5GB",
                        "Speed Optimization",
                        "Hide Login & Admin",
                        "Turnaround: 12 Hours",
                        "Edits & Support: 120 Minutes / Month",
                        "Performance Scan",
                        "8GB Bandwidth",
                        "Dedicated Account Manager",
                        "Up to 40 Stock Images",
                        "Complete W3C Certified HTML",
                        "Complete Deployment",
                        "100% Satisfaction Guarantee",
                        "100% Unique Design Guarantee",
                        "Money Back Guarantee",
                    ]),
                    plan("ELITE WEBSITE (Monthly)", 149.99, [
                        "Daily Website Maintenance",
                        "WordPress / Plugin Updates",
                        "Security + Hacker Defense",
                        "Daily Backups & Restore",
                        "24/7 Monitoring",
                        "Daily Malware Scans",
                        "Monthly Website Report",
                        "404 Detection",
                        "WordPress Version Upgrade",
                        "Managed Server 20GB",
                        "Speed Optimization",
                        "Hide Login & Admin",
                        "Turnaround: 12 Hours",
                        "Edits & Support: Unlimited Support",
                        "Performance Scan + Performance Report",
                        "Unlimited Bandwidth",
                        "Dedicated Account Manager",
                        "Up to 40 Stock Images",
                        "Complete W3C Certified HTML",
                        "Complete Deployment",
                        "100% Satisfaction Guarantee",
                        "100% Unique Design Guarantee",
                        "Money Back Guarantee",
                    ]),
                ],
                "faqItems" => serviceFaqs('website-maintenance'),
            ],

        ], // end sub_services
    ],     // end Web Developer Solutions
    [
        "title" => "Branding",
        "mata-title" => "title",
        "mata-description" => "Discription",
        "slug" => "branding",
        "description" => "Build a consistent and recognizable brand identity.",
        "image" => "branding.jpg",
        "bannerImage" => "assets/img/banner-branding.webp",
        "sub_services" => [],
        "listTitle" => "Our Logo Design Services include:",
        "list" => [
            "Custom Logo Design",
            "Logo Redesign & Refresh",
            "Brand Identity Development",
            "Vector-Based Designs",
        ],
        "introImages" => [
            "assets/img/branding-main.webp",
        ],
        "portfolio" => portfolioImgs('branding'),
        "plans" => [
            plan("Brand Starter", 399, [
                "Custom Logo Design",
                "Brand Color Palette & Fonts",
                "Business Card Design",
                "Letterhead & Envelope",
                "Social Media Profile Kit",
                "3 Revisions",
            ]),
            plan("Brand Professional", 799, [
                "Premium Logo Design (6 Concepts)",
                "Complete Brand Style Guide",
                "Full Stationery Set",
                "Social Media Kit (Profile + Covers)",
                "Brochure / Flyer Design",
                "Email Signature",
                "Unlimited Revisions",
                "Dedicated Account Manager",
            ], true),
            plan("Brand Premium", 1499, [
                "Logo + Brand Identity System",
                "Detailed Brand Guidelines Book",
                "Packaging / Label Design",
                "Complete Marketing Collateral",
                "Presentation Template",
                "Brand Messaging & Tagline",
                "Unlimited Revisions",
                "Priority 24/7 Support",
            ]),
        ],
        "faqItems" => serviceFaqs('branding'),
    ],
    [
        "title" => "Ecommerce Website",
        "mata-title" => "title",
        "mata-description" => "Discription",
        "slug" => "ecommerce-website-solutions",
        "description" => "Ecommerce website development for online businesses.",
        "image" => "ecommerce.jpg",
        "sub_services" => [],
        "bannerImage" => "assets/img/banner-ecommerce-website.webp",

        "listTitle" => "Our Logo Design Services include:",
        "list" => [
            "Custom Logo Design",
            "Logo Redesign & Refresh",
            "Brand Identity Development",
            "Vector-Based Designs",
        ],
        "introImages" => [
            "assets/gif/ecommerce-gif.gif",
        ],
        "portfolio" => portfolioImgs('ecommercewebsite'),
        "plans" => [
            plan("E-Commerce Basic", 399, [
                "Up-to 50 Products",
                "Content Management System (CMS)",
                "Mini Shopping Cart Integration",
                "Dedicated Designer & Developer",
                "Unlimited Revisions",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
            plan("E-Commerce Start Up", 799, [
                "Up-to 100 Products",
                "Content Management System (CMS)",
                "Mini Shopping Cart Integration",
                "Payment Module Integration",
                "Easy Product Search",
                "Dedicated Designer & Developer",
                "Unlimited Revisions",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ], true),
            plan("E-Commerce Professional", 1299, [
                "Customized Design",
                "Up-to 500 Products",
                "Content Management System (CMS)",
                "Full Shopping Cart Integration",
                "Payment Module Integration",
                "Easy Product Search",
                "Product Reviews",
                "5 Promotional Banners",
                "Team of Expert Designers & Developers",
                "Unlimited Revisions",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
            plan("E-Commerce Elite", 2199, [
                "8 Logo Design Concepts",
                "By 3 Award Winning Designers",
                "Icon Design",
                "UNLIMITED Revisions",
                "Stationery Design (Business Card, Letterhead & Envelope)",
                "15-20 Pages Website",
                "Custom Made, Interactive, Dynamic & High End Design",
                "Customized Design",
                "Content Management System (CMS)",
                "Full Shopping Cart Integration",
                "Payment Module Integration",
                "Sales & Inventory Management",
                "Customer Log-in Area",
                "Mobile Responsive",
                "Facebook, Twitter, YouTube, Google+ & Pinterest Page Designs",
                "Dedicated Account Manager",
                "Unlimited Revisions",
                "All Final File Formats",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
            plan("E-Commerce Advanced", 3199, [
                "UNLIMITED Logo Design Concepts",
                "By 6 Award Winning Designers",
                "Icon Design",
                "UNLIMITED Revisions",
                "Print Media",
                "Stationery Design (Business Card, Letterhead & Envelope)",
                "Invoice Design, Email Signature",
                "Bi-Fold Brochure (OR) 2 Sided Flyer Design",
                "Product Catalog Design",
                "Signage Design (OR) Label Design",
                "T-Shirt Design (OR) Car Wrap Design",
                "Website",
                "E-Commerce Store Design",
                "Product Detail Page Design",
                "Unique Banner Slider",
                "Featured Products Showcase",
                "Full Shopping Cart Integration",
                "Unlimited Products",
                "Unlimited Categories",
                "Product Rating & Reviews",
                "Easy Product Search",
                "Payment Gateway Integration",
                "Multi-Currency Support",
                "Content Management System",
                "Customer Log-in Area",
                "Mobile Responsive",
                "Social Media Plugins Integration",
                "Tell a Friend Feature",
                "Social Media Pages",
                "Facebook, Twitter, YouTube, Google+ & Pinterest Page Designs",
                "Value Added Services",
                "Dedicated Account Manager",
                "Unlimited Revisions",
                "All Final File Formats",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee *",
            ]),
        ],
        "faqItems" => serviceFaqs('ecommerce-website-solutions'),
    ],

    /* ================= 7. Video Animation ================= */
    [
        "title" => "Stunning Video Animation Services",
        "mata-title" => "title",
        "mata-description" => "Discription",
        "slug" => "video-animation-services",
        "description" => "Engaging video animation for brands and businesses.",
        "image" => "animation.jpg",
        "bannerImage" => "assets/img/banner-video-animation.webp",
        "sub_services" => [],
        "listTitle" => "Our Logo Design Services include:",
        "list" => [
            "Custom Logo Design",
            "Logo Redesign & Refresh",
            "Brand Identity Development",
            "Vector-Based Designs",
        ],
        "introImages" => [
            "assets/gif/animation-service-sideimg-gif.gif",
        ],
        "portfolio" => portfolioImgs('stunningvideo'),
        "plans" => [
            plan("Startup Video", 499, [
                "30 Second Video",
                "Professional Script",
                "Storyboard",
                "Animation",
                "Voice-Over & Sound Effects",
                "4 Weeks Delivery",
                "Unlimited Revisions",
            ]),
            plan("Classic Video", 999, [
                "60 Second Video",
                "Professional Script",
                "Sample Theme",
                "Storyboard",
                "Animation",
                "Voice-Over & Sound Effects",
                "5 Weeks Delivery",
            ], true),
            plan("Premium Video", 1499, [
                "90 Second Video",
                "Professional Script",
                "Sample Theme",
                "Storyboard",
                "Animation",
                "Voice-Over & Sound Effects",
                "6 Weeks Delivery",
            ]),
            plan("Premium Video", 2299, [
                "120 Second Video",
                "Professional Script",
                "Sample Theme",
                "Storyboard",
                "Animation",
                "Voice-Over & Sound Effects",
            ]),
        ],
        "faqItems" => serviceFaqs('video-animation-services'),
    ],

    // [
    //     "title" => "Mobiles Apps",
    //     "mata-title" => "title",
    //     "mata-description" => "Discription",
    //     "slug" => "mobile-apps",
    //     "description" => "Mobile application development solutions.",
    //     "image" => "mobile-apps.jpg",
    //     "sub_services" => [],
    //     "listTitle" => "Our Logo Design Services include:",
    //     "list" => [
    //         "Custom Logo Design",
    //         "Logo Redesign & Refresh",
    //         "Brand Identity Development",
    //         "Vector-Based Designs",
    //     ],
    //     "introImages" => [
    //         "assets/img/logo-design-solutions-service-image.png",
    //     ],
    //     "portfolio" => portfolioImgs('mobilesapps'),
    //     "plans" => [
    //         plan("App Starter", 1499, [
    //             "Single Platform (Android or iOS)",
    //             "Up to 8 Screens",
    //             "UI/UX Design",
    //             "User Login & Registration",
    //             "Basic API Integration",
    //             "App Store Submission",
    //         ]),
    //         plan("App Business", 3999, [
    //             "Cross-Platform App (Android + iOS)",
    //             "Up to 20 Screens",
    //             "Custom UI/UX Design",
    //             "Admin Panel",
    //             "Push Notifications",
    //             "Payment Gateway Integration",
    //             "App Store & Play Store Submission",
    //             "1 Month Free Support",
    //         ], true),
    //         plan("App Enterprise", 7999, [
    //             "Complex Native / Cross-Platform App",
    //             "Unlimited Screens & Features",
    //             "Real-Time Chat / Location / Streaming",
    //             "Custom Backend & API Development",
    //             "Advanced Admin Dashboard",
    //             "Third-Party Integrations",
    //             "3 Months Free Support",
    //             "Full Source Code Access",
    //             "24/7 Priority Support",
    //         ]),
    //     ],
    //     "faqItems" => serviceFaqs('mobile-apps'),
    // ],

    [
        "title" => "Digital Marketing",
        "mata-title" => "title",
        "mata-description" => "Discription",
        "slug" => "digital-marketing",
        "description" => "Digital marketing solutions to grow your business.",
        "image" => "digital-marketing.jpg",
        "bannerImage" => "assets/img/banner-digital-marketing.webp",
        "sub_services" => [],
        "listTitle" => "Our Logo Design Services include:",
        "list" => [
            "Custom Logo Design",
            "Logo Redesign & Refresh",
            "Brand Identity Development",
            "Vector-Based Designs",
        ],
        "introImages" => [
            "assets/gif/branding-creative-gif.gif",
        ],
        "portfolio" => portfolioImgs('digitalmarketing'),
        "plans" => [
            plan("Startup Plan", 350, [
                "3 Postings Per Week (Per Network): Facebook, Twitter, Instagram & Google+",
                "Content Creation",
                "Business Page Optimization",
                "Social Media Strategy (Overview)",
                "Facebook Likes Campaign",
                "Monthly Progress Report",
                "Copy Writing",
            ]),
            plan("Scaling Plan", 700, [
                "Copywriting & Visual Designs",
                "Business Page Optimization",
                "Ad Campaign Management",
                "Spam Monitoring",
                "Monthly Progress Report",
                "5 Postings Per Week: Facebook, Twitter, Instagram & Google+",
                "Reputation Management",
                "Social Account Setup",
                "Content Creation",
                "Social Media Listening",
                "Query and Comments Reply",
            ], true),
            plan("Venture Plan", 1200, [
                "Copywriting & Visual Designs",
                "Business Page Optimization",
                "Ad Campaign Management",
                "Spam Monitoring",
                "6 Postings Per Week: Facebook, Twitter, Instagram & Google+",
                "Reputation Management",
                "Social Account Setup",
                "Content Creation",
                "Social Media Hearing",
                "Query and Comments Reply",
            ]),
        ],
        "faqItems" => serviceFaqs('digital-marketing'),
    ],

    [
        "title" => "Advance Combo Packages",
        "mata-title" => "title",
        "mata-description" => "Discription",
        "slug" => "advance-combo-packages",
        "description" => "Combined services for your business needs.",
        "image" => "combo-packages.jpg",
        "bannerImage" => "assets/img/banner-advance-combo-packages.webp",
        "sub_services" => [],
        "listTitle" => "Our Logo Design Services include:",
        "list" => [
            "Custom Logo Design",
            "Logo Redesign & Refresh",
            "Brand Identity Development",
            "Vector-Based Designs",
        ],
        "introImages" => [
            "assets/gif/advance-combo-packages.gif",
        ],
        "portfolio" => portfolioImgs('advancecombo'),
        "plans" => [
            plan("Basic Combo ", 644, [
                "5 Custom Logo Design Concepts",
                "By 2 Designers",
                "Icon Design",
                "Business Card, Letterhead, Envelope, Fax Template",
                "MS Word Letterhead",
                "5 Page Website",
                "Mobile Responsive",
                "Team of Expert Designers & Developers",
                "8 Stock assets/images",
                "5 Banner Designs",
                "jQuery Sliders",
                "Free Google Friendly Sitemap",
                "Complete W3C Certified HTML",
                "Complete Deployment",
                "Facebook Page Design",
                "All Final File Formats",
                "Dedicated Account Manager",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee",
            ]),
            plan("Startup Combo", 994, [
                "Unlimited Logo Design Concepts",
                "+ Social Media Design",
                "Mobile Responsive",
                "3 Dedicated Designers",
                "Icon Design",
                "Business Card, Letterhead, Envelope",
                "MS Word Letterhead",
                "UNLIMITED Pages Website",
                "Content Management System (CMS)",
                "5 Stock Photos + 3 Banner Designs",
                "Complete W3C Certified HTML",
                "Complete Deployment",
                "Facebook Page Design",
                "All Final File Formats",
                "Dedicated Account Manager",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee",
            ], true),
            plan("Enterprise Combo", 1394, [
                "Unlimited Logo Concepts",
                "8 Dedicated Designers",
                "Icon Design",
                "2 Free Custom Stationary Designs",
                "MS Word Letterhead",
                "Trifold Brochure Design",
                "Presentation Folder Design",
                "Conceptual and Dynamic Liquid Website",
                "Team of Expert Designers & Developers",
                "Mobile Responsive",
                "Online Reservation/Appointment Tool (Optional)",
                "Custom Forms",
                "Lead Capturing Forms (Optional)",
                "Newsfeed Integration",
                "Social Media Integration",
                "Search Engine Submission",
                "15 Stock Assets/Images",
                "8 Unique Banner Designs",
                "jQuery Sliders",
                "Free Google Friendly Sitemap",
                "Complete W3C Certified HTML",
                "Facebook Page Design",
                "Twitter Page Design",
                "YouTube Page Design",
                "Google+ Page Design",
                "All Final File Formats",
                "Dedicated Account Manager",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee",
            ]),
            plan("Corporate Combo", 1994, [
                "Unlimited Logo Concepts",
                "8 Dedicated Designers",
                "Icon Design",
                "2 Free Custom Stationary Designs",
                "MS Word Letterhead",
                "Invoice Design",
                "Product Catalog Design",
                "Unlimited Pages Website",
                "Conceptual and Dynamic Website",
                "Content Management System (CMS)",
                "Easy Product Search",
                "Product Reviews",
                "Unlimited Products",
                "Unlimited Categories",
                "Promotional Product Showcase",
                "New Product Showcase",
                "Full Shopping Cart Integration",
                "Payment Module Integration",
                "Sales & Inventory Management",
                "Custom Forms",
                "Lead Capturing Forms (Optional)",
                "Newsfeed Integration",
                "Social Media Integration",
                "Search Engine Submission",
                "Team of Dedicated Designers, Developers and Brand Experts",
                "20 Stock Assets/Images",
                "6 Unique Banner Designs",
                "jQuery Slider",
                "Free Google Friendly Sitemap",
                "Complete W3C Certified HTML",
                "Facebook Page Design",
                "Twitter Page Design",
                "YouTube Page Design",
                "Google+ Page Design",
                "Pinterest Page Design",
                "All Final File Formats",
                "Dedicated Account Manager",
                "100% Ownership Rights",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee",
            ]),
            plan("Elite Combo", 3994, [
                "Unlimited Logo Concepts",
                "8 Dedicated Designers",
                "Icon Design",
                "2 Free Custom Stationary Designs",
                "MS Word Letterhead",
                "Invoice Design",
                "Product Catalog Design",
                "Complete Custom Design & Development",
                "Any One: Dating Portal, Job Portal, Professional Network, Social Network, Medical Portal, Restaurant Portal, News Portal, Enterprise Portal",
                "Unique, User Friendly, Interactive, Dynamic, High End UI Design",
                "Unlimited Banner Designs",
                "jQuery Slider",
                "Special Hoover Effects",
                "20 Stock Assets/Images",
                "Client/User Dashboard Area",
                "Custom Coding",
                "Custom PHP Development",
                "Content Management System (Custom)",
                "Online Appointment/Scheduling/Online Ordering Integration (Optional)",
                "Online Payment Integration (Optional)",
                "Multi Lingual (Optional)",
                "Custom Dynamic Forms (Optional)",
                "User Signup Area",
                "User Login Area",
                "User Dashboard Area",
                "Complete Database Creation",
                "Signup Automated Email Authentication",
                "Web Traffic Analytics Integration",
                "3rd Party API Integrations",
                "Signup Area (For Newsletters, Offers etc.)",
                "Search Bar for Easy Search",
                "Live Feeds of Social Networks Integration (Optional)",
                "Search Engine Submission",
                "Module-wise Architecture",
                "Extensive Admin Panel",
                "Award Winning Team of Expert Designers and Developers",
                "Complete Deployment",
                "100% Satisfaction Guarantee",
                "100% Unique Design Guarantee",
                "100% Money Back Guarantee",
            ]),

        ],
        "faqItems" => serviceFaqs('advance-combo-packages'),
    ],
];
