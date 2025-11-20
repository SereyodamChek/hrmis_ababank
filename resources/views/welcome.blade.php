<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABA HRMIS — Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Noto+Sans+Khmer:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('aba-logo.png') }}">

    <style>
        :root {
            --brand-deep: #005D7B;
            --brand-cyan: #14B9C9;
            --brand-cyan-600: #0ea9b8;
            --ink-900: #1b2630;
            --ink-800: #2a3844;
            --ink-700: #3b4a57;
            --ink-500: #6b7a88;
            --line: #E6EEF2;
            --card: #ffffff;
            --bg: #f6f9fb;
            --shadow: 0 18px 45px rgba(20, 40, 60, .12), 0 2px 6px rgba(20, 40, 60, .06);
            --radius: 14px;
            --radius-sm: 10px;
            --radius-xs: 8px;
            --focus: 0 0 0 3px rgba(20, 185, 201, .25);
        }
        * {
            box-sizing: border-box
        }
        html,
        body {
            height: 100%
        }
        body {
            margin: 0;
            background: var(--bg);
            color: var(--ink-900);
            font-family: "Dangrek", "Dangrek", system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Dangrek", sans-serif;
            line-height: 1.45;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        .page {
            min-height: 100svh;
            display: flex;
            flex-direction: column;
            isolation: isolate;
            overflow: clip;
            position: relative;
        }
        .page::before,
        .page::after {
            content: "HRMIS";
            position: absolute;
            inset: auto -10vw auto -10vw;
            bottom: -6vh;
            font-weight: 800;
            font-size: 32vw;
            letter-spacing: -.04em;
            line-height: 1;
            color: #dfe8ec;
            opacity: .55;
            transform: skewY(-10deg);
            user-select: none;
            pointer-events: none;
            z-index: -1;
        }
        .page::after {
            top: -10vh;
            bottom: auto;
            opacity: .35;
            filter: blur(.3px);
        }
        header.topbar {
            max-width: 1280px;
            top: 24px;
            left: 230px;
            margin: 70px;
            padding: 0 50px 0 0;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            z-index: 40;
        }
        main.main {
            flex: 1;
            display: grid;
            place-items: center;
            padding: clamp(24px, 6vh, 72px) 24px;
        }
        .card {
            width: min(980px, 100%);
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }
        .card-grid {
            display: grid;
            grid-template-columns: 1fr;
        }
        @media (min-width: 960px) {
            .card-grid {
                grid-template-columns: 1.05fr 0.95fr;
            }
        }
        .brand-pane {
            display: none;
            background:
                radial-gradient(1200px 500px at -5% -10%, #3AD1DD 0%, rgba(20, 185, 201, .0) 50%),
                linear-gradient(135deg, #02607e 0%, #0d6f89 48%, #0a7288 100%);
            color: #E9FCFF;
            padding: 40px 36px 46px;
        }
        @media (min-width: 960px) {
            .brand-pane {
                display: block;
            }
        }
        .brand-title {
            margin: 0 0 8px 0;
            font-weight: 800;
            font-size: 28px;
            letter-spacing: .2px;
        }
        .brand-sub {
            margin: 0;
            font-size: 14.5px;
            color: #d7f6f9;
        }
        .brand-illus {
            margin-top: 28px;
            border: 1px dashed rgba(255, 255, 255, .22);
            border-radius: 12px;
            padding: 16px 14px;
            font-size: 13px;
            color: #e8fbfe;
            backdrop-filter: saturate(150%) blur(2px);
        }
        .form-pane {
            padding: 40px 44px;
        }
        @media (max-width:680px) {
            .form-pane {
                padding: 24px 18px;
            }
        }
        .card-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 18px;
        }
        .title {
            font-family: "Dangrek", "Dangrek", system-ui, sans-serif;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: .2px;
            color: var(--ink-900);
            margin: 0;
        }
        .lang {
            position: relative;
        }
        .icon-btn {
            border: 1px solid var(--line);
            background: #fff;
            height: 38px;
            width: 38px;
            border-radius: 9px;
            display: grid;
            place-items: center;
            cursor: pointer;
            transition: .15s ease;
        }
        .icon-btn:hover {
            box-shadow: var(--focus);
            border-color: #cfe8ee
        }
        .icon-btn:focus-visible {
            outline: none;
            box-shadow: var(--focus);
        }
        .lang-menu {
            position: absolute;
            top: 44px;
            right: 0;
            width: 220px;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 6px;
            display: none;
        }
        .lang.open .lang-menu {
            display: block;
        }
        .lang-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 9px;
            font-size: 14.5px;
            cursor: pointer;
        }
        .lang-item:hover {
            background: #f3fbfc;
        }
        .flag {
            width: 16px;
            height: 12px;
            display: inline-grid;
            place-items: center;
            font-size: 14px;
        }
        .muted {
            color: var(--ink-500);
            font-size: 13px;
        }
        .form {
            margin-top: 6px;
        }
        .label {
            font-family: "Dangrek", "Dangrek", system-ui, sans-serif;
            font-size: 13px;
            color: var(--ink-700);
            margin-bottom: 8px;
            display: block;
        }
        .control {
            width: 100%;
            height: 46px;
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 0 14px;
            font-size: 15px;
            background: #fff;
            outline: none;
            transition: .12s ease;
        }
        .control:focus {
            border-color: #c8e8eb;
            box-shadow: var(--focus);
        }
        .control+.label {
            margin-top: 14px;
        }
        .actions {
            margin-top: 18px;
        }
        .btn {
            appearance: none;
            border: 0;
            height: 46px;
            border-radius: 10px;
            padding: 0 18px;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: .2px;
            background: var(--brand-cyan);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            cursor: pointer;
            transition: .15s ease;
        }
        .btn:hover {
            background: var(--brand-cyan-600);
        }
        .btn:focus-visible {
            outline: none;
            box-shadow: var(--focus);
        }
        .assist {
            margin-top: 12px;
            text-align: center;
        }
        .assist a {
            color: var(--brand-deep);
            text-decoration: none;
            font-family: "Dangrek", "Dangrek", system-ui, sans-serif;
            font-size: 14px;
        }
        .assist a:hover {
            text-decoration: underline;
        }
        footer.footer {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px 40px;
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .footer-text {
            font-size: 13px;
            color: var(--ink-700);
        }
        .footer a {
            color: var(--brand-deep);
            text-decoration: none
        }
        .footer a:hover {
            text-decoration: underline
        }
        .svg-fit {
            display: block;
            height: auto
        }
        .aba-bank-badge {
            width: 146px;
            height: auto
        }
        .brand-logo {
            width: 232px;
            height: auto
        }
        .sep-dot {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: #b7c7cf;
            display: inline-block;
            margin: 0 8px;
            vertical-align: middle
        }
        @media (prefers-reduced-motion: reduce) {
            * {
                scroll-behavior: auto;
                transition: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <header class="topbar" aria-label="ABA Admin">
            <div class="logo">
                <svg data-v-865b1154="" viewBox="0 0 222 28" fill="none" class="" style="width: 222px; height: 28px;">
                    <path data-v-865b1154=""
                        d="M29.803 5.049H41.07c4.95 0 7.507 2.066 7.507 5.78 0 2.283-.926 3.844-2.858 4.703 2.497.955 3.696 2.733 3.696 5.416 0 4.345-3.06 6.952-8.707 6.952H29.803zm-15.515 0l8.611 22.85h-5.155l-1.628-4.698H6.84L5.28 27.9H.1L8.608 5.049zm54.173 0l8.62 22.85h-5.16l-1.631-4.698h-9.274L59.454 27.9h-5.18l8.503-22.851zM40.335 23.772c2.693 0 3.965-.869 3.965-2.96 0-2.234-1.272-3.022-3.996-3.022h-5.783v5.982zm-32.201-4.42h6.65L11.47 9.625zm54.179 0h6.647l-3.32-9.727zM40.138 13.88c2.355 0 3.49-.728 3.49-2.48 0-1.774-1.159-2.38-3.527-2.38h-5.58v4.86z"
                        fill="#005D7B"></path>
                    <path data-v-865b1154=""
                        d="M134.048 26.566v-2.978q2.599 2.233 5.715 2.233 1.548 0 2.571-.572 1.023-.571 1.023-1.733 0-.872-.631-1.426-.63-.555-1.873-.953l-2.39-.781q-2.141-.636-3.259-1.716t-1.118-2.969q0-2.106 1.758-3.377 1.759-1.272 4.397-1.271 2.944 0 5.161 1.452v2.906q-2.504-1.98-5.161-1.98-1.377 0-2.332.581-.956.582-.956 1.58 0 .925.592 1.39.593.462 1.989.953l2.657.853q4.071 1.325 4.071 4.649 0 2.287-1.911 3.54-1.854 1.253-4.588 1.253-1.625 0-3.164-.454-1.539-.453-2.551-1.18m59.664 0v-2.978c1.732 1.489 3.632 2.233 5.713 2.233 1.035 0 1.889-.19 2.574-.572q1.022-.571 1.023-1.733a1.83 1.83 0 00-.632-1.426q-.631-.555-1.876-.953l-2.388-.781q-2.14-.636-3.26-1.716-1.118-1.08-1.118-2.969-.002-2.106 1.756-3.377 1.76-1.272 4.396-1.271 2.949 0 5.166 1.452v2.906q-2.506-1.98-5.166-1.98-1.371 0-2.327.581-.956.582-.956 1.58.001.925.589 1.39c.397.308 1.058.626 1.991.953l2.658.853q4.07 1.325 4.071 4.649 0 2.287-1.912 3.54-1.857 1.253-4.589 1.253a11.2 11.2 0 01-3.163-.454q-1.542-.453-2.55-1.18m15.173 0v-2.978q2.6 2.233 5.714 2.233 1.55 0 2.568-.572 1.028-.571 1.028-1.733c0-.581-.216-1.057-.631-1.426q-.632-.555-1.877-.953l-2.387-.781q-2.14-.636-3.26-1.716t-1.119-2.969q-.001-2.106 1.757-3.377c1.172-.848 2.64-1.271 4.396-1.271q2.948 0 5.166 1.452v2.906q-2.506-1.98-5.166-1.98-1.371 0-2.328.581-.956.582-.956 1.58.002.925.59 1.39.593.462 1.99.953l2.658.853q4.07 1.325 4.072 4.649 0 2.287-1.913 3.54-1.856 1.253-4.588 1.253a11.1 11.1 0 01-3.164-.454q-1.54-.453-2.55-1.18m-78.828-15.198v16.505h-2.963v-2.088q-.784 1.053-2.122 1.734t-2.944.681q-2.887 0-4.473-1.634-1.587-1.634-1.587-4.376V11.368h2.982v10.368q0 1.78.946 2.842.947 1.062 2.839 1.062a4.48 4.48 0 002.686-.863 4.55 4.55 0 001.673-2.224V11.368zm59.511 15.397c-1.317.957-3.073 1.435-5.28 1.435q-3.8 0-6.057-2.251-2.316-2.307-2.315-6.174.002-3.885 2.141-6.301 2.182-2.451 5.599-2.451 3.447 0 5.287 2.197 1.847 2.197 1.846 5.883v.999h-11.986q.117 2.76 1.732 4.203 1.613 1.444 4.101 1.444c1.757 0 3.398-.52 4.932-1.562zm-31.345 1.108V11.368h2.94v2.07c.524-.69 1.239-1.265 2.154-1.725q1.363-.69 2.97-.69c1.925 0 3.422.547 4.505 1.643q1.614 1.643 1.612 4.385v10.822h-2.983V17.505q0-1.779-.975-2.842-.974-1.061-2.868-1.062-1.488 0-2.713.863-1.225.862-1.702 2.224v11.185zm-50.298-11.82q1.911.471 3.125 1.988 1.215 1.515 1.215 3.404 0 3.088-2.132 4.758t-5.859 1.67h-8.679V5.05h7.895q3.766 0 5.859 1.57t2.093 4.477q0 1.906-1.003 3.204-1.004 1.299-2.514 1.753m45.252-4.685v16.505h-2.941V11.368zm-54.58 6.065v7.88h5.677q2.39 0 3.68-1.062t1.29-2.878q0-1.834-1.281-2.887-1.281-1.054-3.689-1.053zm85.101-4.032q-1.76 0-3.061 1.163-1.299 1.162-1.678 3.34h8.961q-.092-1.96-1.167-3.232c-.709-.847-1.732-1.27-3.055-1.27m-85.102 1.562h4.894q2.409 0 3.69-.926 1.28-.925 1.28-2.778 0-3.65-4.97-3.65h-4.894zm55.002-8.589q.001.709-.566 1.254a1.87 1.87 0 01-1.347.544q-.721 0-1.299-.554-.57-.554-.571-1.244-.002-.744.565-1.262a1.87 1.87 0 011.305-.517q.786 0 1.347.517.567.518.566 1.262"
                        fill="#00CDD4"></path>
                    <path data-v-865b1154="" d="M84.752.2H79.94v9.14h4.811z" fill="#EC1E24"></path>
                </svg>
            </div>
        </header>
        <main class="main" role="main">
            <section class="card" role="region" aria-labelledby="login-title">
                <div class="card-grid">
                    <aside class="brand-pane" aria-hidden="true">
                        <svg data-v-865b1154="" viewBox="0 0 222 28" fill="none" class=""
                            style="width: 222px; height: 40px;">
                            <path data-v-865b1154=""
                                d="M29.803 5.049H41.07c4.95 0 7.507 2.066 7.507 5.78 0 2.283-.926 3.844-2.858 4.703 2.497.955 3.696 2.733 3.696 5.416 0 4.345-3.06 6.952-8.707 6.952H29.803zm-15.515 0l8.611 22.85h-5.155l-1.628-4.698H6.84L5.28 27.9H.1L8.608 5.049zm54.173 0l8.62 22.85h-5.16l-1.631-4.698h-9.274L59.454 27.9h-5.18l8.503-22.851zM40.335 23.772c2.693 0 3.965-.869 3.965-2.96 0-2.234-1.272-3.022-3.996-3.022h-5.783v5.982zm-32.201-4.42h6.65L11.47 9.625zm54.179 0h6.647l-3.32-9.727zM40.138 13.88c2.355 0 3.49-.728 3.49-2.48 0-1.774-1.159-2.38-3.527-2.38h-5.58v4.86z"
                                fill="#005D7B"></path>
                            <path data-v-865b1154=""
                                d="M134.048 26.566v-2.978q2.599 2.233 5.715 2.233 1.548 0 2.571-.572 1.023-.571 1.023-1.733 0-.872-.631-1.426-.63-.555-1.873-.953l-2.39-.781q-2.141-.636-3.259-1.716t-1.118-2.969q0-2.106 1.758-3.377 1.759-1.272 4.397-1.271 2.944 0 5.161 1.452v2.906q-2.504-1.98-5.161-1.98-1.377 0-2.332.581-.956.582-.956 1.58 0 .925.592 1.39.593.462 1.989.953l2.657.853q4.071 1.325 4.071 4.649 0 2.287-1.911 3.54-1.854 1.253-4.588 1.253-1.625 0-3.164-.454-1.539-.453-2.551-1.18m59.664 0v-2.978c1.732 1.489 3.632 2.233 5.713 2.233 1.035 0 1.889-.19 2.574-.572q1.022-.571 1.023-1.733a1.83 1.83 0 00-.632-1.426q-.631-.555-1.876-.953l-2.388-.781q-2.14-.636-3.26-1.716-1.118-1.08-1.118-2.969-.002-2.106 1.756-3.377 1.76-1.272 4.396-1.271 2.949 0 5.166 1.452v2.906q-2.506-1.98-5.166-1.98-1.371 0-2.327.581-.956.582-.956 1.58.001.925.589 1.39c.397.308 1.058.626 1.991.953l2.658.853q4.07 1.325 4.071 4.649 0 2.287-1.912 3.54-1.857 1.253-4.589 1.253a11.2 11.2 0 01-3.163-.454q-1.542-.453-2.55-1.18m15.173 0v-2.978q2.6 2.233 5.714 2.233 1.55 0 2.568-.572 1.028-.571 1.028-1.733c0-.581-.216-1.057-.631-1.426q-.632-.555-1.877-.953l-2.387-.781q-2.14-.636-3.26-1.716t-1.119-2.969q-.001-2.106 1.757-3.377c1.172-.848 2.64-1.271 4.396-1.271q2.948 0 5.166 1.452v2.906q-2.506-1.98-5.166-1.98-1.371 0-2.328.581-.956.582-.956 1.58.002.925.59 1.39.593.462 1.99.953l2.658.853q4.07 1.325 4.072 4.649 0 2.287-1.913 3.54-1.856 1.253-4.588 1.253a11.1 11.1 0 01-3.164-.454q-1.54-.453-2.55-1.18m-78.828-15.198v16.505h-2.963v-2.088q-.784 1.053-2.122 1.734t-2.944.681q-2.887 0-4.473-1.634-1.587-1.634-1.587-4.376V11.368h2.982v10.368q0 1.78.946 2.842.947 1.062 2.839 1.062a4.48 4.48 0 002.686-.863 4.55 4.55 0 001.673-2.224V11.368zm59.511 15.397c-1.317.957-3.073 1.435-5.28 1.435q-3.8 0-6.057-2.251-2.316-2.307-2.315-6.174.002-3.885 2.141-6.301 2.182-2.451 5.599-2.451 3.447 0 5.287 2.197 1.847 2.197 1.846 5.883v.999h-11.986q.117 2.76 1.732 4.203 1.613 1.444 4.101 1.444c1.757 0 3.398-.52 4.932-1.562zm-31.345 1.108V11.368h2.94v2.07c.524-.69 1.239-1.265 2.154-1.725q1.363-.69 2.97-.69c1.925 0 3.422.547 4.505 1.643q1.614 1.643 1.612 4.385v10.822h-2.983V17.505q0-1.779-.975-2.842-.974-1.061-2.868-1.062-1.488 0-2.713.863-1.225.862-1.702 2.224v11.185zm-50.298-11.82q1.911.471 3.125 1.988 1.215 1.515 1.215 3.404 0 3.088-2.132 4.758t-5.859 1.67h-8.679V5.05h7.895q3.766 0 5.859 1.57t2.093 4.477q0 1.906-1.003 3.204-1.004 1.299-2.514 1.753m45.252-4.685v16.505h-2.941V11.368zm-54.58 6.065v7.88h5.677q2.39 0 3.68-1.062t1.29-2.878q0-1.834-1.281-2.887-1.281-1.054-3.689-1.053zm85.101-4.032q-1.76 0-3.061 1.163-1.299 1.162-1.678 3.34h8.961q-.092-1.96-1.167-3.232c-.709-.847-1.732-1.27-3.055-1.27m-85.102 1.562h4.894q2.409 0 3.69-.926 1.28-.925 1.28-2.778 0-3.65-4.97-3.65h-4.894zm55.002-8.589q.001.709-.566 1.254a1.87 1.87 0 01-1.347.544q-.721 0-1.299-.554-.57-.554-.571-1.244-.002-.744.565-1.262a1.87 1.87 0 011.305-.517q.786 0 1.347.517.567.518.566 1.262"
                                fill="#ffffffff"></path>
                            <path data-v-865b1154="" d="M84.752.2H79.94v9.14h4.811z" fill="#EC1E24"></path>
                        </svg>
                        <br>
                        <p class="brand-sub">ប្រព័ន្ធគ្រប់គ្រងធនធានមនុស្ស​ និងទិន្នន័យបុគ្គលិករបស់ធនាគារអេប៊ីអេ។
                        </p>
                    </aside>
                    <div class="form-pane">
                        <div class="card-head">
                            <h1 id="login-title" class="title">ចូលគណនី</h1>
                            <div class="lang" id="lang">
                                <button class="icon-btn" type="button" aria-haspopup="true" aria-expanded="false"
                                    aria-controls="lang-menu" id="lang-btn" title="Language">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <circle cx="12" cy="12" r="9" stroke="#7a8a96" stroke-width="1.5" />
                                        <path d="M3.5 12h17M12 3c3 3.5 3 14 0 18M12 3c-3 3.5-3 14 0 18" stroke="#7a8a96"
                                            stroke-width="1.3" stroke-linecap="round" />
                                    </svg>
                                </button>
                                <div class="lang-menu" id="lang-menu" role="menu" aria-label="Languages">
                                    <div class="lang-item" role="menuitem" tabindex="0">
                                        <span class="flag">🇰🇭</span>
                                        <div>
                                            <div>ខ្មែរ</div>
                                            <div class="muted">ភាសាខ្មែរ</div>
                                        </div>
                                    </div>
                                    <div class="lang-item" role="menuitem" tabindex="0">
                                        <span class="flag">🇬🇧</span>
                                        <div>
                                            <div>English</div>
                                        </div>
                                    </div>
                                    <div class="lang-item" role="menuitem" tabindex="0">
                                        <span class="flag">🇨🇳</span>
                                        <div>
                                            <div>中文</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .form { font-family: 'Dangrek', "Noto Sans Khmer", "Inter", system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif !important; }
                            .form .label { display: block; margin-bottom: 6px; font-size: 14px; }
                            .form .label .req { color: #d9534f; margin-left: 4px; }
                            .form .control { width: 100%; padding: 10px 12px; border: 1px solid #e9eaef; border-radius: 6px; box-sizing: border-box; font-family: inherit; }
                            .form .control::placeholder { font-family: 'Dangrek', "Noto Sans Khmer", "Inter", sans-serif !important; }
                            .form .actions { margin-top: 50px; }
                            .form .btn { background: #0bbcd4; color: #fff; padding: 10px 14px; border-radius: 6px; border: none; cursor: pointer; font-family: 'Dangrek', "Noto Sans Khmer", "Inter", sans-serif !important; }
                            .form .assist { margin-top: 12px; }
                            .form .assist a { font-family: 'Dangrek', "Noto Sans Khmer", "Inter", sans-serif !important; }
                        </style>
                        <form class="form" method="post" action="{{ url('/login') }}">
                            @csrf
                            @if($errors->has('login'))
                                <div style="color:#b94545;margin-bottom:12px;font-weight:600">{{ $errors->first('login') }}</div>
                            @endif
                            <label class="label" for="username">ឈ្មោះអ្នកប្រើ <span class="req">*</span></label>
                            <input class="control" id="username" name="username" type="text" autocomplete="username"
                                placeholder="បញ្ចូលឈ្មោះអ្នកប្រើ" required>
                            <label class="label" for="password">ពាក្យសម្ងាត់ <span class="req">*</span></label>
                            <input class="control" id="password" name="password" type="password"
                                autocomplete="current-password" placeholder="បញ្ចូលពាក្យសម្ងាត់" required>
                            <div class="actions">
                                <button class="btn" type="submit">ចូល</button>
                            </div>
                            <div class="assist">
                                <a href="#" aria-label="Forgot password">ភ្លេចពាក្យសម្ងាត់?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
        <style>
            .footer { display: flex; align-items: left; justify-content: flex-start !important; gap: 50px; padding: 60px 24px; margin-left: 500px; }
            .footer .footer-text { margin-left: 12px; line-height: 1.4; }
            .footer .aba-bank-badge { flex: 0 0 auto; }
        </style>
        <footer class="footer"><svg class="aba-bank-badge svg-fit"
                viewBox="0 0 146 25" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 24.5234H146V0H0V24.5234Z" fill="#005D7B" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M48.0455 14.9751C48.999 14.9751 49.4393 14.6546 49.4393 13.8722C49.4393 13.0441 48.999 12.7526 48.0392 12.7526H45.9798V14.9751H48.0455ZM47.9685 11.2966C48.8125 11.2966 49.218 11.0252 49.218 10.3773C49.218 9.71287 48.804 9.49216 47.9599 9.49216H45.9798V11.2966H47.9685ZM44.2969 8.02075H48.3085C50.0701 8.02075 50.9718 8.77585 50.9718 10.1663C50.9718 11.0172 50.6507 11.5978 49.9601 11.9183C50.8418 12.2673 51.2798 12.9374 51.2798 13.932C51.2798 15.5375 50.1802 16.5081 48.1756 16.5081H44.2969V8.02075Z"
                    fill="#FEFEFE" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M55.8563 13.3399H58.2208L57.0425 9.71332L55.8563 13.3399ZM58.0285 8.02063L61.094 16.5086H59.2718L58.6804 14.7623H55.3943L54.8291 16.5086H52.9893L56.0176 8.02063H58.0285Z"
                    fill="#FEFEFE" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M63.2959 8.02063H65.1329L68.5838 13.8549V8.02063H70.3153V16.5086H68.5011L65.0296 10.6754V16.5086H63.2959V8.02063Z"
                    fill="#FEFEFE" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M73.6914 8.02063H75.4417V11.4961L78.7541 8.02063H80.9463L77.557 11.4585L81.252 16.5086H79.1094L76.3502 12.6231L75.4417 13.515V16.5086H73.6914V8.02063Z"
                    fill="#FEFEFE" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M11.672 13.3333H14.0348L12.856 9.72041L11.672 13.3333ZM13.858 8.02087L16.9183 16.5083H15.0853L14.5081 14.7637H11.2117L10.6574 16.5083H8.81641L11.8391 8.02087H13.858Z"
                    fill="#FEFEFE" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M23.111 14.9751C24.0686 14.9751 24.5208 14.6523 24.5208 13.8756C24.5208 13.0469 24.0686 12.7521 23.1007 12.7521H21.0465V14.9751H23.111ZM23.042 11.3012C23.8786 11.3012 24.2824 11.0297 24.2824 10.3779C24.2824 9.72028 23.8707 9.49558 23.0283 9.49558H21.0465V11.3012H23.042ZM19.3691 8.02075H23.3722C25.131 8.02075 26.0395 8.78668 26.0395 10.1663C26.0395 11.016 25.711 11.596 25.0249 11.9148C25.9118 12.2702 26.3378 12.93 26.3378 13.9258C26.3378 15.5403 25.2496 16.5081 23.2438 16.5081H19.3691V8.02075Z"
                    fill="#FEFEFE" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M30.9193 13.3333H33.2821L32.1021 9.72041L30.9193 13.3333ZM33.1041 8.02087L36.1661 16.5083H34.3343L33.7543 14.7637H30.459L29.9041 16.5083H28.0654L31.0852 8.02087H33.1041Z"
                    fill="#FEFEFE" />
                <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="146" height="25">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 24.5234H146V0H0V24.5234Z" fill="white" />
                </mask>
                <g mask="url(#mask0)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.9541 9.70612H38.5943V6.33386H36.9541V9.70612Z"
                        fill="#EC1F24" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M96.7427 9.95868C96.5824 9.99461 96.4672 10.0203 96.3503 9.97636C96.2602 9.94214 96.19 9.84348 96.1267 9.75394L95.042 8.26885C94.9792 8.17988 94.904 8.08064 94.8156 8.04414C94.6992 7.99795 94.5823 8.02646 94.4226 8.06239L90.9209 9.02451V15.5329L94.4346 14.5765C94.596 14.5411 94.7123 14.5126 94.8281 14.5583C94.9165 14.5942 94.9878 14.6917 95.0505 14.7807L96.1313 16.2635C96.1946 16.353 96.267 16.4471 96.3554 16.4859C96.4718 16.5287 96.5875 16.5042 96.7478 16.4665L100.252 15.5312V9.01881L96.7427 9.95868Z"
                        fill="#EC1F24" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M126.088 9.6496H126.095L126.439 10.7452H125.732L126.088 9.6496ZM125.578 11.2237H126.601L126.779 11.794H127.408L126.432 9.02454H126.431L125.623 9.41805L124.774 11.794H125.385L125.578 11.2237Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M123.679 11.3161H122.969V10.5752H123.706C123.915 10.5752 124.124 10.6676 124.124 10.9111C124.124 11.1923 123.961 11.3161 123.679 11.3161ZM122.969 9.50303H123.633C123.895 9.50303 124.058 9.57261 124.058 9.80016C124.058 10.0203 123.876 10.1087 123.649 10.1087H122.969V9.50303ZM124.274 10.3015C124.39 10.2433 124.614 10.1321 124.614 9.73458C124.614 9.44942 124.44 9.02454 123.76 9.02454H122.997L122.412 9.30912V11.794H123.586C124.154 11.794 124.305 11.6976 124.464 11.543C124.61 11.4005 124.703 11.1923 124.703 10.9722C124.703 10.699 124.614 10.4286 124.274 10.3015Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M129.91 11.7939V9.02559L129.369 9.28794V10.9533H129.362L128.261 9.02502L127.65 9.32216V11.7939H128.192V9.81947H128.199L129.331 11.7939H129.91Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M131.023 10.8571L131.293 10.5794L132.151 11.7941H132.896L131.699 10.1585L132.83 9.02584L131.931 9.18382L131.023 10.1511V9.02527L130.443 9.30757V11.7941H131.023V10.8571Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M106.004 10.7452L106.359 9.6496H106.367L106.711 10.7452H106.004ZM106.702 9.02454L105.895 9.41862L105.046 11.7945H105.657L105.849 11.2237H106.873L107.051 11.7945H107.681L106.703 9.02454H106.702Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M117.344 10.7452L117.699 9.6496H117.707L118.051 10.7452H117.344ZM118.04 9.02454L117.232 9.41805L116.384 11.794H116.995L117.187 11.2237H118.211L118.389 11.794H119.019L118.041 9.02454H118.04Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M108.758 11.7939V9.51492H109.311L109.594 9.02502H107.622L107.34 9.51207V9.51492H108.178V11.7939H108.758Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M110.404 9.02478H110.403L109.824 9.30651V11.7936H110.404V9.02478Z" fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M112.121 9.44135C112.434 9.44135 112.875 9.63469 112.875 10.4092C112.875 11.1848 112.434 11.3781 112.121 11.3781C111.809 11.3781 111.368 11.1848 111.368 10.4092C111.368 9.63469 111.809 9.44135 112.121 9.44135ZM112.121 11.8675C112.489 11.8675 113.454 11.7095 113.454 10.4092C113.454 9.11 112.489 8.95203 112.121 8.95203C112.096 8.95203 112.068 8.9526 112.037 8.95431L111.078 9.42196C110.908 9.63925 110.789 9.95407 110.789 10.4092C110.789 11.7095 111.755 11.8675 112.121 11.8675Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M103.051 9.81955H103.059L104.191 11.794H104.77V9.02511L104.23 9.28802V10.9533H104.222L103.121 9.02454L102.511 9.32224V11.794H103.051V9.81955Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M115.557 10.9535H115.549L114.448 9.02527L113.838 9.3224V11.7947H114.379V9.81971H114.387L115.518 11.7947H116.097V9.02527L115.557 9.28875V10.9535Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M121.262 11.2926H119.883V9.02502L119.304 9.30733V11.7939H120.972L121.262 11.2926Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M111.846 14.4856L112.201 13.3895H112.209L112.553 14.4856H111.846ZM112.544 12.7644L111.736 13.1585L110.888 15.5356H111.499L111.691 14.9647H112.715L112.893 15.5356H113.523L112.545 12.7644H112.544Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M122.532 14.4856L122.887 13.3895H122.895L123.239 14.4856H122.532ZM123.231 12.7644L122.422 13.1585L121.573 15.5356H122.184L122.377 14.9647H123.401L123.579 15.5356H124.209L123.231 12.7644H123.231Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M117.316 14.4856L117.672 13.3895H117.679L118.023 14.4856H117.316ZM118.015 12.7644L117.207 13.1585L116.357 15.5356H116.968L117.162 14.9647H118.186L118.364 15.5356H118.993L118.016 12.7644H118.015Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M110.325 14.5892C110.256 14.9291 110.031 15.1099 109.71 15.1099C109.219 15.1099 109.022 14.6622 109.022 14.1644C109.022 13.3807 109.432 13.196 109.71 13.196C110.19 13.196 110.278 13.5079 110.325 13.6745H110.905C110.874 13.2655 110.538 12.6941 109.706 12.6941C109.696 12.6941 109.685 12.6947 109.675 12.6947L108.718 13.1606C108.538 13.4013 108.431 13.7338 108.431 14.1569C108.431 15.1139 108.96 15.6118 109.699 15.6118C110.395 15.6118 110.789 15.1915 110.905 14.5892H110.325Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M115.529 14.6945H115.521L114.419 12.7645L113.809 13.0622V15.5357H114.35V13.5595H114.357L115.49 15.5357H116.07V12.7645L115.529 13.028V14.6945Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M120.412 15.057H119.847V13.2423H120.404C120.651 13.2423 121.042 13.3084 121.042 14.1268C121.042 14.582 120.884 15.057 120.412 15.057ZM120.505 12.7638H119.861L119.279 13.0478V15.5355H120.482C121.398 15.5355 121.634 14.6789 121.634 14.0841C121.634 13.5594 121.44 12.7638 120.505 12.7638Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M107.134 13.2542L107.417 12.7643H106.049L105.442 13.0591V15.5354H106.022V14.3697H106.961L107.244 13.8798H106.022V13.2542H107.134Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M103.727 15.1373C103.414 15.1373 102.973 14.9445 102.973 14.1689C102.973 13.3927 103.414 13.1999 103.727 13.1999C104.04 13.1999 104.481 13.3927 104.481 14.1689C104.481 14.9445 104.04 15.1373 103.727 15.1373ZM103.727 12.7095C103.702 12.7095 103.673 12.71 103.643 12.7123L102.682 13.18C102.512 13.3973 102.394 13.7127 102.394 14.1689C102.394 15.4692 103.36 15.6278 103.727 15.6278C104.094 15.6278 105.061 15.4692 105.061 14.1689C105.061 12.868 104.094 12.7095 103.727 12.7095Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M132.029 15.1373C131.716 15.1373 131.275 14.9445 131.275 14.1689C131.275 13.3927 131.716 13.1999 132.029 13.1999C132.342 13.1999 132.783 13.3927 132.783 14.1689C132.783 14.9445 132.342 15.1373 132.029 15.1373ZM132.029 12.7095C132.004 12.7095 131.975 12.71 131.944 12.7123L130.984 13.18C130.814 13.3973 130.695 13.7127 130.695 14.1689C130.695 15.4692 131.661 15.6278 132.029 15.6278C132.396 15.6278 133.362 15.4692 133.362 14.1689C133.362 12.868 132.396 12.7095 132.029 12.7095Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M126.556 14.5067H127.167V14.8575C127.088 14.9219 126.99 14.9789 126.88 15.0234C126.763 15.0679 126.653 15.0936 126.544 15.0936C126.317 15.0936 126.134 15.0109 125.993 14.8449C125.852 14.6852 125.785 14.4366 125.785 14.1115C125.785 13.8058 125.852 13.5754 125.993 13.4226C126.128 13.2697 126.311 13.1927 126.544 13.1927C126.702 13.1927 126.831 13.2315 126.929 13.3142C127.032 13.3906 127.106 13.499 127.142 13.633H127.668C127.655 13.3855 127.523 13.0844 127.314 12.9315C127.127 12.7952 126.874 12.7211 126.544 12.7211C126.495 12.7211 126.446 12.7211 126.397 12.7273L125.528 13.1802C125.486 13.2372 125.443 13.3016 125.406 13.365C125.296 13.5885 125.235 13.8434 125.235 14.1309C125.235 14.3989 125.29 14.6407 125.388 14.8643C125.492 15.0936 125.651 15.2658 125.852 15.3873C126.061 15.5082 126.299 15.5652 126.574 15.5652C126.794 15.5652 127.008 15.5207 127.222 15.438C127.43 15.3491 127.595 15.2533 127.705 15.1381V14.0413H126.556V14.5067Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M129.123 13.9332H128.732V13.2317H129.148C129.362 13.2317 129.49 13.2317 129.533 13.2374C129.625 13.2568 129.686 13.2887 129.735 13.3463C129.784 13.4034 129.808 13.4798 129.808 13.5756C129.808 13.6589 129.79 13.7227 129.753 13.7798C129.717 13.8374 129.668 13.8756 129.607 13.895C129.539 13.9206 129.38 13.9332 129.123 13.9332ZM129.943 14.5326C129.869 14.4493 129.778 14.3729 129.661 14.3027C129.894 14.2714 130.065 14.1818 130.181 14.0478C130.297 13.9138 130.359 13.7416 130.359 13.5379C130.359 13.3777 130.315 13.2317 130.242 13.1039C130.163 12.9762 130.059 12.8867 129.936 12.8422C129.808 12.7914 129.6 12.7657 129.319 12.7657H128.769L128.2 13.0657V15.5209H128.732V14.3666H128.836C128.958 14.3666 129.05 14.3792 129.105 14.3986C129.166 14.4236 129.215 14.4624 129.27 14.5138C129.319 14.5708 129.411 14.7048 129.545 14.9215L129.931 15.5209H130.573L130.248 14.9854C130.12 14.7687 130.022 14.6221 129.943 14.5326Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M135.298 14.2901C135.298 14.5068 135.286 14.6596 135.273 14.7554C135.255 14.8513 135.212 14.9277 135.132 14.9916C135.059 15.0623 134.943 15.0936 134.79 15.0936C134.644 15.0936 134.527 15.0554 134.442 14.9916C134.356 14.9214 134.301 14.8319 134.276 14.7172C134.264 14.6471 134.259 14.4937 134.259 14.2581V12.7656L133.727 13.0399V14.2325C133.727 14.545 133.739 14.7748 133.776 14.9345C133.8 15.0423 133.849 15.145 133.928 15.2402C134.002 15.336 134.106 15.413 134.234 15.4763C134.362 15.5339 134.558 15.5653 134.809 15.5653C135.017 15.5653 135.188 15.5402 135.316 15.4832C135.444 15.4256 135.548 15.3548 135.628 15.2596C135.702 15.1638 135.756 15.0492 135.787 14.9151C135.817 14.7748 135.83 14.545 135.83 14.2136V12.7656L135.298 13.0462V14.2901Z"
                        fill="#FEFEFE" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M137.805 13.8374C137.762 13.895 137.707 13.9395 137.634 13.9708C137.566 13.9965 137.425 14.0159 137.218 14.0159H136.925V13.2317H137.181C137.371 13.2317 137.499 13.2374 137.566 13.2505C137.652 13.2699 137.725 13.3075 137.78 13.372C137.835 13.4353 137.866 13.518 137.866 13.6201C137.866 13.7033 137.841 13.7735 137.805 13.8374ZM138.257 13.0783C138.159 12.938 138.031 12.849 137.878 12.804C137.78 12.7789 137.573 12.7657 137.248 12.7657H136.967L136.393 13.0652V15.5209H136.925V14.4818H137.273C137.511 14.4818 137.695 14.4687 137.823 14.443C137.915 14.4179 138.007 14.3792 138.098 14.309C138.19 14.2457 138.263 14.1562 138.324 14.041C138.385 13.9263 138.41 13.7798 138.41 13.6138C138.41 13.3908 138.361 13.2117 138.257 13.0783Z"
                        fill="#FEFEFE" />
                </g>
            </svg>
            <div class="footer-text">
                Advanced Bank of Asia Ltd. 148 Preah Sihanouk Blvd, Sangkat Boeung Keng Kang I, Khan Boeung Keng Kang,
                Phnom Penh, Cambodia
                <span class="sep-dot" aria-hidden="true"></span>
                <a href="#" title="Privacy Policy">Privacy Policy</a>
            </div>
        </footer>
    </div>
    <script>
        (function () {
            const wrapper = document.getElementById('lang');
            const btn = document.getElementById('lang-btn');
            const menu = document.getElementById('lang-menu');

            function toggle(open) {
                const willOpen = open ?? !wrapper.classList.contains('open');
                wrapper.classList.toggle('open', willOpen);
                btn.setAttribute('aria-expanded', String(willOpen));
            }
            btn.addEventListener('click', e => { e.stopPropagation(); toggle(); });
            document.addEventListener('click', (e) => { if (!wrapper.contains(e.target)) toggle(false); });
            document.addEventListener('keydown', (e) => { if (e.key === 'Escape') toggle(false); });
        })();
    </script>
</body>
</html>