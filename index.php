<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Работи Ми Се – Свържи се с бъдещето си</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <meta property="og:title" content="Работи Ми Се – Свържи се с бъдещето си">
    <meta property="og:description" content="Платформата за хора и бизнеси в хотелиерството, ресторантьорството и кетъринга.">
    <meta property="og:image" content="images/hero-bg.jpg">
    <meta property="og:url" content="https://rabotimise.com">
    <meta name="twitter:card" content="summary_large_image">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700;500;400&display=swap&subset=cyrillic" rel="stylesheet">
    <style>
        :root {
            --my-radius: 16px;
            --main-blue: #4ec3fa;
            --main-dark: #22304a;
            --main-bg: #f6f7fa;
            --btn-shadow: 0 2px 8px #55c3ff33;
            --btn-shadow-hover: 0 4px 20px #55c3ff55;
            --btn-border: 2px solid #d3dbe6;
            --main-text-dark: #3b4863;
        }
        html, body { background: var(--main-bg); overflow-x: hidden; }
        body, h1, h2, h3, h4, h5, h6, p, ul, li, label, .form-label, .footer, .how-list li, .col-title, .btn, .how-section h2, .partners-section h3, .extra-col, .contact-section h2, .contact-section .contact-content > div, .extras-section h3, .footer h5, .footer a, .extras-cols .icon, .partners-section .btn-citybook, .how-col-btn, .header .logo, .header .nav-btns a, .header .btn-citybook {
            color: var(--main-text-dark) !important;
            font-family: 'Quicksand', Arial, sans-serif;
        }
        .header {
            background: var(--main-dark);
            color: #fff;
            padding: 0.7rem 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            transition: box-shadow 0.2s;
        }
        .header.sticky { box-shadow: 0 2px 12px #22304a33; }
        .header .logo {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--main-blue) !important;
            margin-left: 32px;
        }
        .header .nav-btns a {
            margin-right: 10px;
            color: #fff !important;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }
        .header .nav-btns a:last-child {
            margin-right: 24px;
        }
        .header .btn-citybook {
            background: #55c3ff;
            color: #fff !important;
            font-size: 1em;
            padding: 0.45em 2em;
            border-radius: 999px;
            border: var(--btn-border);
            font-weight: 700;
            box-shadow: var(--btn-shadow);
            transition: background 0.2s, color 0.2s, box-shadow 0.2s, border 0.2s;
            letter-spacing: 0.02em;
            text-decoration: none;
            display: inline-block;
        }
        .header .btn-citybook:hover, .header .btn-citybook:focus {
            background: #249be0;
            color: #fff !important;
            box-shadow: var(--btn-shadow-hover);
            border: var(--btn-border);
            text-decoration: none;
        }
        /* --- HERO --- */
        .hero {
            position: relative;
            min-height: 90vh;
            height: 90vh;
            width: 100vw;
            margin: 0;
            padding: 0;
            overflow: hidden;
            z-index: 1;
            background: #1c2838;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .hero-bg {
            position: absolute;
            left: 0; top: 0;
            width: 100%;
            height: 100%;
            background: url('images/hero-bg.jpg') center center/cover no-repeat;
            z-index: 0;
            will-change: transform;
            transition: transform 0.22s cubic-bezier(.4,1.6,.5,1.01);
        }
        .hero::before {
            content: "";
            position: absolute;
            left: 0; top: 0; width: 100%; height: 100%;
            background: rgba(30, 40, 60, 0.48);
            z-index: 1;
            pointer-events: none;
        }
        .hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            color: #fff !important;
            width: 100vw;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .hero h1, .hero .section-title {
            font-size: 3.2rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            line-height: 1.1;
            margin-bottom: 18px;
            color: #fff !important;
        }
        .hero p {
            font-size: 1.4rem;
            margin: 24px 0 32px 0;
            color: #fff !important;
        }
        .hero-btn-wrap {
            position: absolute;
            left: 50%;
            bottom: 32px;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            width: auto;
            z-index: 4;
        }
        .btn-hero-start {
            background: #55c3ff;
            color: #fff !important;
            border-radius: 999px;
            font-size: 1.05em;
            padding: 10px 25px;
            font-weight: 700;
            border: var(--btn-border);
            box-shadow: var(--btn-shadow);
            letter-spacing: 0.01em;
            transition: background 0.2s, box-shadow 0.2s, border 0.2s, transform 0.18s;
            outline: none;
            text-decoration: none;
            display: inline-block;
        }
        .btn-hero-start:hover, .btn-hero-start:focus {
            background: #249be0;
            color: #fff !important;
            box-shadow: var(--btn-shadow-hover);
            border: var(--btn-border);
            transform: scale(1.04);
            text-decoration: none;
        }
        @media (max-width: 600px) {
            .hero h1, .hero .section-title { font-size: 2.1rem; }
            .btn-hero-start { font-size: 0.95em; padding: 8px 18px; }
            .hero-content { margin-bottom: 20px; }
        }

        /* Заглавия и синя черта – CityBook стил */
        .section-title {
            color: #3b4863 !important;
            font-weight: 500 !important;
            font-family: 'Quicksand', Arial, sans-serif;
            text-align: center;
            margin-bottom: 0;
            margin-top: 140px;
            position: relative;
            letter-spacing: 0;
        }
        .heading-line {
            display: block;
            margin: 16px auto 0 auto;
            width: 48px;
            height: 4px;
            background: #4ec3fa;
            border-radius: 2px;
        }
        @media (max-width: 600px) {
            .section-title { font-size: 1.5em; }
            .heading-line { width: 32px; }
        }

        /* --- HOW SECTION --- */
        .how-section {
            background: #fff;
            border-radius: var(--my-radius);
            border-bottom-left-radius: 0;
            box-shadow: 0 2px 16px #0001;
            padding: 32px 8vw;
            margin: 0;
            max-width: 100vw;
            width: 100vw;
            text-align: center;
            position: relative;
            z-index: 2;
        }
        .how-cols {
            display: flex;
            justify-content: center;
            gap: 64px;
            flex-wrap: nowrap;
            max-width: 1400px;
            margin: 0 auto;
            overflow-x: auto;
        }
        .how-col {
            flex: 1 1 0px;
            min-width: 0;
            background: #f6f7fa;
            border-radius: var(--my-radius);
            padding: 28px 36px;
            box-shadow: 0 8px 32px #4ec3fa33, 0 1.5px 8px #4ec3fa22;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 32px;
            max-width: 600px;
            width: 100%;
        }
        .how-col .col-title-sign {
            font-size: 1.1em;
            color: var(--main-text-dark) !important;
            font-weight: 500;
            margin-right: 0.38em;
            vertical-align: middle;
        }
        .how-col .col-title {
            font-weight: 500;
            font-size: 1.03em;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            color: #3b4863 !important;
            font-family: 'Quicksand', Arial, sans-serif;
        }
        .how-col-btn {
            background: #55c3ff;
            color: #fff !important;
            border-radius: 999px;
            font-size: 0.98em;
            padding: 0.28em 1.1em;
            font-weight: 700;
            box-shadow: var(--btn-shadow);
            border: var(--btn-border);
            letter-spacing: 0.01em;
            transition: background 0.2s, box-shadow 0.2s, border 0.2s, transform 0.18s;
            outline: none;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 16px;
            margin-top: 5px;
        }
        .how-col-btn:hover, .how-col-btn:focus {
            background: #249be0;
            color: #fff !important;
            box-shadow: var(--btn-shadow-hover);
            border: var(--btn-border);
            text-decoration: none;
            transform: scale(1.04);
        }
        .how-col a.how-col-btn { text-decoration: none !important; }
        .how-list {
            width: 100%;
            font-size: 0.97em;
            line-height: 1.27;
            margin: 10px 0 0 0;
            padding: 0;
            list-style: none;
            text-align: left;
            color: #3b4863 !important;
        }
        .how-list li {
            font-size: 0.97em;
            margin-bottom: 6px;
            display: flex;
            align-items: flex-start;
            white-space: normal;
            color: #3b4863 !important;
            word-break: break-word;
        }
        .how-list li::before {
            content: "•";
            color: var(--main-blue) !important;
            font-size: 1.09em;
            margin-right: 7px;
            vertical-align: middle;
            line-height: 1;
        }
        @media (max-width: 1100px) {
            .how-cols { flex-direction: column; gap: 18px; }
            .how-col { max-width: 100vw; padding: 18px 5vw; align-items: flex-start;}
            .how-list li { white-space: normal; }
        }

        /* --- CONTACT SECTION --- */
        .contact-section {
            background: linear-gradient(90deg, #55c3ff 0%, #22304a 100%);
            color: #fff;
            border-radius: 0;
            margin: 0;
            max-width: none;
            width: 100vw;
            left: 50%;
            right: 50%;
            transform: translateX(-50%);
            padding: 100px 0 110px 0;
            text-align: left;
            position: relative;
            overflow: hidden;
            min-height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
            z-index: 2;
        }
        .contact-section .contact-content {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-right: 0;
        }
        .contact-section h2,
        .contact-section .contact-content > div,
        .contact-section .contact-content > span {
            font-size: 1.18rem;
            font-weight: 600;
            margin-bottom: 0;
            margin-top: 0;
            color: #fff !important;
            display: inline-block;
        }
        .contact-section .btn-wrap {
            margin-left: 6px;
            display: flex;
            align-items: center;
        }
        .contact-section .btn-citybook {
            font-size: 0.98rem;
            padding: 8px 16px;
            border-radius: 999px;
            background: #55c3ff;
            color: #fff !important;
            border: var(--btn-border);
            box-shadow: var(--btn-shadow);
            font-weight: 600;
            display: inline-block;
            text-decoration: none !important;
            margin-left: 0;
        }
        .contact-section .btn-citybook:hover, .contact-section .btn-citybook:focus {
            background: #249be0;
            color: #fff !important;
            box-shadow: var(--btn-shadow-hover);
            border: var(--btn-border);
        }
        .random-symbols-bg {
            position: absolute;
            left: 0; top: 0; width: 100%; height: 100%;
            pointer-events: none;
            z-index: 2;
        }
        .random-symbols-bg span {
            position: absolute;
            color: #e6f1fa;
            opacity: 0.23;
            font-family: 'Quicksand', Arial, sans-serif;
            font-weight: 600;
            user-select: none;
            pointer-events: none;
            z-index: 10;
            text-shadow: 0 2px 8px #0001, 0 1px 4px #fff2;
            letter-spacing: 0.02em;
        }
        @media (max-width:900px) {
            .contact-section { flex-direction: column; min-height: 0; padding: 30px 0 28px 0;}
            .contact-section .contact-content, .contact-section .btn-wrap { padding: 0 12px; }
            .contact-section .btn-wrap { justify-content: flex-start; margin-top: 8px; }
            .contact-section .contact-content > div { white-space: normal; }
        }

        /* --- Партньори секция --- */
        .partners-section {
            background: #eaf6fb;
            margin: 0 auto 0 auto;
            padding: 84px 0 36px 0;
            width: 100vw;
            text-align: left;
            border-radius: 0 0 var(--my-radius) var(--my-radius);
        }
        .partners-section h3 {
            font-size: 2.1em;
            font-weight: 500 !important;
            color: #3b4863 !important;
            text-align: left;
            margin-left: 48px;
            font-family: 'Quicksand', Arial, sans-serif;
            margin-bottom: 0;
        }
        .partners-section .heading-line {
            margin-left: 48px;
        }
        .partners-swiper {
            max-width: 1100px;
            margin: 40px auto 0 auto;
            position: relative;
            padding-bottom: 100px;
        }
        .partners-swiper .swiper-wrapper {
            display: flex;
            align-items: stretch;
        }
        .partners-swiper .swiper-slide { 
            display: flex;
            align-items: center;
            justify-content: center;
            height: 350px;
            transition: box-shadow 0.3s, transform 0.3s, opacity 0.3s;
            opacity: 0.7;
            filter: blur(0.5px);
        }
        .partners-swiper .swiper-slide-active {
            opacity: 1;
            filter: none;
        }
        .partners-swiper .swiper-slide-active > div {
            transform: scale(1.13);
            box-shadow: 0 16px 48px #0002, 0 0 0 4px #4ec3fa33;
            z-index: 2;
        }
        .partners-swiper .swiper-slide > div {
            transition: box-shadow 0.3s, transform 0.3s;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 32px #0001;
            padding: 28px 16px;
            min-width: 280px;
            min-height: 220px;
            max-width: 320px;
            width: 100%;
            margin: 0 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .partners-section .btn-citybook {
            font-size: 1.12em;
            padding: 12px 38px;
            border-radius: 999px;
            background: #55c3ff;
            color: #fff !important;
            border: var(--btn-border);
            box-shadow: var(--btn-shadow);
            font-weight: 700;
            display: inline-block;
            text-decoration: none !important;
            margin-left: 20px;
            margin-top: 0;
        }
        .partners-section .btn-citybook:hover, .partners-section .btn-citybook:focus {
            background: #249be0;
            color: #fff !important;
            box-shadow: var(--btn-shadow-hover);
            border: var(--btn-border);
        }
        .partners-swiper .swiper-slide.swiper-slide-active > div {
            box-shadow: 0 24px 64px #4ec3fa44, 0 0 0 7px #4ec3fa22;
            transform: scale(1.19) translateY(-10px);
            z-index: 3;
        }
        .partners-swiper .swiper-button-next,
        .partners-swiper .swiper-button-prev {
            color: #4ec3fa;
            top: 50%;
            transform: translateY(-50%);
            position: absolute;
            width: 48px;
            height: 48px;
            z-index: 10;
        }
        .partners-swiper .swiper-button-prev { left: -60px; }
        .partners-swiper .swiper-button-next { right: -60px; }
        .partners-swiper .swiper-pagination {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 16px;
            margin: 0;
            text-align: center;
            z-index: 2;
        }
        .partners-row {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top: 24px;
            margin-right: 60px;
        }
        @media (max-width: 1100px) {
            .partners-swiper .swiper-button-prev { left: 0; }
            .partners-swiper .swiper-button-next { right: 0; }
        }
        /* --- Promo row (business CTA) --- */
        .promo-row {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eaf6fb;
            padding: 24px 16px;
            margin: 0 auto 0 auto;
            width: 100%;
        }
        .promo-text {
            font-size: 1.1em;
            color: #22304a;
            margin-right: 18px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="logo" style="cursor:pointer;" onclick="window.scrollTo({top:0,behavior:'smooth'});">Работи Ми Се</div>
    <div class="nav-btns">
        <a href="register.php" class="btn-citybook">Регистрирай се</a>
        <a href="login.php" class="btn-citybook">Вход</a>
    </div>
</div>

<div class="hero" style="margin-bottom:0;">
    <div class="hero-bg" id="heroBg"></div>
    <div class="hero-content" id="heroContent">
        <h1 class="section-title" style="color:#fff !important;font-weight:700 !important;">Ще ви помогнем да го намерите...</h1>
        <p style="color:#fff !important;">Платформата за хора и бизнеси в хотелиерството, ресторантьорството и кетъринга.</p>
    </div>
    <div class="hero-btn-wrap">
        <a href="#for-whom" class="btn-hero-start" id="heroStartBtn">Как работи?</a>
    </div>
</div>

<div id="for-whom" class="how-section">
    <h2 class="section-title">За кого е полезна платформата</h2>
    <span class="heading-line"></span>
    <div class="how-cols" style="margin-top:32px;">
        <div class="how-col">
            <div class="col-title"><span class="col-title-sign">#</span>Работодатели</div>
            <a href="how_employer.php" class="how-col-btn">Как работи за вас</a>
            <ul class="how-list">
                <li>Влагате сърце в бизнеса си, но трудно намирате хора със същия ангажимент и страст</li>
                <li>Бизнесът ви се развива добре и трябва да увеличите екипа</li>
                <li>Служител напуска и вие трябва да намерите заместник бързо</li>
                <li>Често ви се налага да попълвате "дупки" в графика</li>
                <li>Организирате събитие и имате нужда от допълнителен екип</li>
                <li>Омръзна ви да разчитате на агенции с високи комисиони и съмнително качество</li>
                <li>Искате директен контакт със служители – без посредници</li>
            </ul>
        </div>
        <div class="how-col">
            <div class="col-title"><span class="col-title-sign">@</span>Служители</div>
            <a href="how_employee.php" class="how-col-btn">Как работи за вас</a>
            <ul class="how-list">
                <li>Искате да се развивате в този бранш, но усилията и старанието ви не се ценят</li>
                <li>Търсите работодател, който ви уважава и оценява труда ви</li>
                <li>Нуждаете се от втора работа или временна заетост</li>
                <li>Искате да работите допълнително и да избирате кога и къде</li>
                <li>Търсите разнообразие, гъвкавост и сигурен начин да намирате добри възможности</li>
                <li>Омръзна ви от агенции, които задържат голяма част от парите ви</li>
            </ul>
        </div>
    </div>
</div>

<div class="contact-section">
    <div class="contact-content">
        <span>Имате въпроси?</span>
        <span>Свържете се с нас за повече информация или съдействие.</span>
    </div>
    <div class="btn-wrap">
        <a href="#contact" id="contactBtn" class="btn-citybook">Свържи се с нас</a>
    </div>
    <div class="random-symbols-bg"></div>
</div>

<div class="partners-section">
    <h3>Партньори <a href="ad_request.php" class="btn-citybook">Стани партньор</a></h3>
    <span class="heading-line"></span>
    <div class="partners-swiper swiper-container">
        <div class="swiper-wrapper">
            <?php
            $ads = $pdo->query("SELECT * FROM ads WHERE status='active' AND paid=1 ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
            $ads_count = count($ads);
            if ($ads_count === 0): ?>
                <div class="swiper-slide">
                    <div style="padding:18px;text-align:center;color:#888;background:#fafafa;border-radius:16px;">
                        Очаквайте още партньори!
                        <div style="margin-top:12px;">
                            <a href="ad_request.php" class="btn btn-citybook">Стани партньор</a>
                        </div>
                    </div>
                </div>
            <?php
            else:
                if ($ads_count === 1) {
                    $ads = array_merge($ads, $ads, $ads);
                } elseif ($ads_count === 2) {
                    $ads = [$ads[0], $ads[1], $ads[0]];
                }
                foreach ($ads as $ad): ?>
                    <div class="swiper-slide">
                        <div>
                            <?php if ($ad['logo_path']): ?>
                                <img src="<?= htmlspecialchars($ad['logo_path']) ?>" alt="Лого" style="width:100%;max-width:100%;height:auto;display:block;margin:0;object-fit:contain;">
                            <?php endif; ?>
                            <div style="font-weight:500;font-size:1.1em;margin-bottom:8px;line-height:1.2;word-break:break-word;color:#3b4863;">
                                <?= nl2br(htmlspecialchars($ad['ad_text'])) ?>
                            </div>
                            <?php
                            $has_photo = false;
                            if (!empty($ad['photos_json'])):
                                $photos = json_decode($ad['photos_json'], true);
                                if (is_array($photos) && count($photos) && !empty($photos[0])):
                                    $has_photo = true;
                                    ?>
                                    <div style="width:100%;display:flex;justify-content:center;align-items:center;">
                                        <img src="<?= htmlspecialchars($photos[0]) ?>" alt="Рекламна снимка" style="width:100%;max-width:100%;height:auto;object-fit:contain;border-radius:10px;margin:10px 0;display:block;background:#fff;">
                                    </div>
                                <?php endif; endif; if (!$has_photo): ?>
                                <div style="color:#888;font-size:0.95em;margin:10px 0;">Няма качена рекламна снимка.</div>
                            <?php endif; ?>
                            <div style="margin-top:16px;">
                                <a href="<?= htmlspecialchars($ad['link']) ?>" target="_blank" class="btn btn-citybook">Виж повече</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            endif;
            ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="partners-row"></div>
</div>

<div class="promo-row">
    <div class="promo-text">Покажи бизнеса си пред хиляди професионалисти в HoReCa сектора.</div>
    <a href="ad_request.php" class="btn btn-citybook btn-lg" style="white-space:nowrap;">Стани партньор</a>
</div>

<div class="extras-section">
    <h3 class="section-title" style="margin-top:32px;">Наши екстри</h3>
    <span class="heading-line"></span>
    <div class="extras-cols">
        <div class="extra-col"><a href="#contact" style="text-decoration:none;color:inherit;"><div class="icon">⏰</div>24/7 съпорт</a></div>
        <div class="extra-col"><a href="#mobile" style="text-decoration:none;color:inherit;"><div class="icon">📱</div>Мобайл френдли</a></div>
        <div class="extra-col"><a href="admin_panel.php" style="text-decoration:none;color:inherit;"><div class="icon">🛠️</div>Админ панел</a></div>
    </div>
</div>

<div id="reviews" class="container my-5">
    <h3 class="section-title" style="margin-top:0;">Ревюта</h3>
    <span class="heading-line"></span>
    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
                <div class="mb-2"><b>Иван Петров</b> <span style="color:#f5b301;">★★★★★</span></div>
                <div>"Благодарение на платформата намерих страхотен екип за сезона!"</div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
                <div class="mb-2"><b>Мария Георгиева</b> <span style="color:#f5b301;">★★★★★</span></div>
                <div>"Много лесно кандидатствах и започнах нова работа!"</div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-md-3 mb-3">
                <h5 class="section-title" style="font-size:1.2em;margin-top:0;margin-bottom:8px;">За нас</h5>
                <span class="heading-line" style="margin-top:8px;"></span>
                <p>HoReCa Connect – Работи Ми Се е платформа за работа и екипи в хотелиерството, ресторантьорството и кетъринга.</p>
                <div><b>Mail:</b> <a href="mailto:admin@rabotimise.com" style="color:#4ec3fa;">admin@rabotimise.com</a></div>
            </div>
            <div class="col-12 col-md-3 mb-3" id="news">
                <h5 class="section-title" style="font-size:1.2em;margin-top:0;margin-bottom:8px;">Новини</h5>
                <span class="heading-line" style="margin-top:8px;"></span>
                <ul class="list-unstyled">
                    <li><a href="#" style="color:#4ec3fa;">Нов проект стартира!</a></li>
                    <li><a href="#" style="color:#4ec3fa;">Платформата в медиите</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3 mb-3" id="contact">
                <h5 class="section-title" style="font-size:1.2em;margin-top:0;margin-bottom:8px;">Контакт</h5>
                <span class="heading-line" style="margin-top:8px;"></span>
                <div><b>Адрес:</b> София, ул. Примерна 1</div>
                <div><b>Тел.:</b> +359 888 123 456</div>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <h5 class="section-title" style="font-size:1.2em;margin-top:0;margin-bottom:8px;">Последвайте ни</h5>
                <span class="heading-line" style="margin-top:8px;"></span>
                <a href="#" style="color:#4ec3fa;">Facebook</a> |
                <a href="#" style="color:#4ec3fa;">Instagram</a>
            </div>
        </div>
        <div class="text-center mt-3" style="opacity:0.8;">&copy; 2024 Работи Ми Се. Всички права запазени.</div>
    </div>
</div>

<button id="scrollTopBtn" class="scroll-top-btn" style="display:none;">
    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" style="display:block;margin:auto;" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 15L12 9L18 15" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</button>

<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Свържи се с нас</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="contactForm">
                    <div class="mb-3">
                        <label class="form-label">Име</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Имейл</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Съобщение</label>
                        <textarea name="message" class="form-control" rows="4" required></textarea>
                    </div>
                    <div id="contactResult" class="mb-2"></div>
                    <button type="submit" class="btn btn-citybook">Изпрати</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Sticky header shadow
    window.addEventListener('scroll', function() {
        document.querySelector('.header').classList.toggle('sticky', window.scrollY > 30);
    });

    // По-голям 3D паралакс ефект между фон и контент
    window.addEventListener('scroll', function() {
        var heroContent = document.getElementById('heroContent');
        var heroBg = document.getElementById('heroBg');
        var scrolled = window.scrollY;
        if(heroBg) heroBg.style.transform = "translateY(" + (scrolled*0.20) + "px) scale(1.06)";
        if(heroContent) heroContent.style.transform = "translateY(" + (scrolled*0.06) + "px)";
    });

    // Smooth scroll for hero button
    document.getElementById('heroStartBtn').addEventListener('click', function(e) {
        e.preventDefault();
        var target = document.getElementById('for-whom');
        if(target) {
            var y = target.getBoundingClientRect().top + window.pageYOffset - 0;
            window.scrollTo({top: y, behavior: 'smooth'});
        }
    });

    // Contact modal open
    document.getElementById('contactBtn').onclick = function() {
        var modal = new bootstrap.Modal(document.getElementById('contactModal'));
        modal.show();
    };
    // Contact form submit
    document.getElementById('contactForm').onsubmit = function(e) {
        e.preventDefault();
        var form = this;
        var result = document.getElementById('contactResult');
        result.textContent = 'Изпращане...';
        fetch('send_mail.php', {
            method: 'POST',
            body: new FormData(form)
        })
        .then(r => r.text())
        .then(txt => {
            result.textContent = txt;
            if(txt.toLowerCase().includes('успешно')) {
                form.reset();
                setTimeout(function() {
                    var modal = bootstrap.Modal.getInstance(document.getElementById('contactModal'));
                    if(modal) modal.hide();
                }, 2000);
            }
        })
        .catch(() => { result.textContent = 'Грешка при изпращане.'; });
    };

    // Swiper partners
    var swiper = new Swiper('.partners-swiper', {
        slidesPerView: 3,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 230,
            scale: 1.1,
            modifier: 2,
            slideShadows: false,
        },
        breakpoints: {
            0: { slidesPerView: 1 },
            600: { slidesPerView: 2 },
            900: { slidesPerView: 3 }
        }
    });

    // Scroll-to-top button logic
    const scrollBtn = document.getElementById('scrollTopBtn');
    window.addEventListener('scroll', function() {
        if(window.scrollY > 200) scrollBtn.style.display = 'flex';
        else scrollBtn.style.display = 'none';
    });
    scrollBtn.onclick = function() {
        window.scrollTo({top:0,behavior:'smooth'});
    };

    // Символи само ? с различни размери и по-разпръснати, 10% повече и да не се застъпват
    document.addEventListener('DOMContentLoaded', function() {
        var container = document.querySelector('.random-symbols-bg');
        if(container) {
            var positions = [];
            var count = 24;
            for(var i=0;i<count;i++) {
                var tries = 0, left, top, overlapped;
                do {
                    left = Math.random()*90;
                    top = Math.random()*90;
                    overlapped = positions.some(function(p){
                        return Math.abs(p.left-left)<11 && Math.abs(p.top-top)<11;
                    });
                    tries++;
                } while(overlapped && tries<30);
                positions.push({left, top});
                var span = document.createElement('span');
                span.textContent = '?';
                span.style.left = left + '%';
                span.style.top = top + '%';
                var sz = 1.3 + Math.random()*2.3;
                span.style.fontSize = sz + 'rem';
                span.style.opacity = (0.08 + Math.random()*0.22);
                span.style.fontWeight = "600";
                span.style.letterSpacing = "0.04em";
                span.style.transform = 'rotate('+(Math.random()*120-60)+'deg)';
                container.appendChild(span);
            }
        }
    });
</script>
</body>
</html>