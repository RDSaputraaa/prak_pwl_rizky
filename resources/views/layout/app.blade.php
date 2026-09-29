<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $title ?? 'Ruang Akademik') | Ruang Akademik</title>
    <style>
        :root {
            --ink: #000000;
            --muted: #000000;
            --line: #000000;
            --paper: #ffffff;
            --canvas: #ffffff;
            --green: #000000;
            --green-dark: #000000;
            --green-soft: #ffffff;
            --coral-soft: #ffffff;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            color: #000000;
            background: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            line-height: 1.5;
        }
        a { color: inherit; }
        .site-header { color: #000000; background: #ffffff; border-bottom: 1px solid #000000; }
        .nav-wrap, main, .footer-wrap { width: min(1120px, calc(100% - 48px)); margin: 0 auto; }
        .nav-wrap { min-height: 0; display: flex; align-items: center; justify-content: space-between; gap: 24px; padding: 10px 0; }
        .brand { display: inline-flex; align-items: center; gap: 8px; color: #000000; text-decoration: none; font-size: 15px; font-weight: 700; }
        .brand-mark { width: 26px; height: 26px; display: grid; place-items: center; border: 1px solid #000000; border-radius: 0; color: #000000; background: #ffffff; font-weight: 700; font-size: 15px; transform: none; }
        .nav-links { display: flex; align-items: center; gap: 12px; }
        .nav-link { padding: 3px 6px; border-radius: 0; color: #000000; text-decoration: none; font-size: 14px; }
        .nav-link:hover, .nav-link[aria-current="page"] { color: #000000; background: #ffffff; text-decoration: underline; }
        main { padding: 14px 0; }
        .page-heading { display: flex; align-items: flex-start; justify-content: space-between; gap: 24px; margin: 0 17px 34px 0; padding: 11px 8px 24px 25px; border: 3px dashed #000000; border-radius: 17px 2px 24px 5px; background: #ffffff; }
        .eyebrow { margin: 0 0 3px; color: #000000; font-size: 11px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; }
        h1 { margin: 7px 0 0; color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: 900; line-height: 1.5; text-decoration: underline wavy #000000; }
        .page-description { margin: 10px 0 0; color: var(--muted); }
        .visually-hidden { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0; }
        .button { min-height: 44px; display: inline-flex; align-items: center; justify-content: center; gap: 9px; margin-top: 16px; padding: 0 19px; border: 3px solid #000000; border-radius: 19px 2px 12px 0; color: #000000; background: #ffffff; text-decoration: none; font: inherit; font-weight: 700; cursor: pointer; transform: rotate(1deg); }
        .button:hover { border-color: #000000; color: #ffffff; background: #000000; }
        .button-secondary { color: var(--green); background: transparent; }
        .button-secondary:hover { color: white; }
        .notice { margin: 0 0 18px; padding: 12px 16px; border-left: 7px dotted #000000; color: #000000; background: #ffffff; }
        .table-shell { overflow: hidden; margin-left: 0; border: 0; border-radius: 0; background: #ffffff; }
        .table-toolbar { min-height: 69px; display: flex; align-items: center; justify-content: space-between; gap: 18px; padding: 10px 21px 15px 13px; border-bottom: 4px dotted #000000; background: #ffffff; }
        .table-count { margin: 0; color: #000000; font-size: 13px; font-weight: 600; }
        .search-field { width: min(290px, 100%); height: 40px; padding: 0 12px; border: 3px solid #000000; border-radius: 15px 2px 9px 0; color: #000000; background: #ffffff; font: inherit; }
        .search-field:focus, .field:focus { outline: 3px solid #000000; border-color: #000000; }
        .table-scroll { overflow-x: auto; }
        .user-table { width: 100%; border-collapse: collapse; text-align: left; background: #ffffff; }
        .user-table th { padding: 9px 12px; border: 1px solid #000000; color: #000000; background: #ffffff; font-size: 14px; font-weight: 700; letter-spacing: 0; text-transform: none; text-align: left; white-space: nowrap; }
        .user-table th:nth-child(even) { color: #000000; background: #ffffff; }
        .user-table td { padding: 8px 12px; border: 1px solid #000000; color: #000000; background: #ffffff; }
        .user-table tbody tr:nth-child(even), .user-table tbody tr:nth-child(odd), .user-table tbody tr:hover { color: #000000; background: #ffffff; }
        .student-name { font-weight: 700; }
        .student-id { color: inherit; font-variant-numeric: tabular-nums; }
        .class-tag { display: inline-block; min-width: 34px; padding: 5px 12px 3px; border: 1px solid #000000; border-radius: 50% 2px 9px 4px; color: #000000; background: #ffffff; text-align: center; font-size: 12px; font-weight: 700; }
        .empty-state { padding: 38px 24px 29px !important; color: #000000; text-align: left; background: #ffffff !important; }
        .user-table form { margin: 0; }
        .user-table button, .user-table a, .user-form button, .user-form > a { display: inline-block; padding: 5px 9px; border: 1px solid #000000; color: #000000; background: #ffffff; font: inherit; text-decoration: none; cursor: pointer; }
        .user-form { width: min(100%, 430px); margin: 9px 0 0 17px; }
        .user-form label { display: block; margin: 0 0 16px; }
        .user-form input, .user-form select { display: block; width: 100%; margin-top: 5px; padding: 8px; border: 1px solid #000000; border-radius: 0; color: #000000; background: #ffffff; font: inherit; }
        .form-shell { max-width: 690px; padding: 28px; border: 1px solid var(--line); border-radius: 6px; background: var(--paper); }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-field { display: grid; gap: 7px; }
        .form-field-wide { grid-column: 1 / -1; }
        .form-label { font-size: 13px; font-weight: 700; }
        .field { width: 100%; min-height: 44px; padding: 9px 11px; border: 1px solid var(--line); border-radius: 4px; background: white; font: inherit; }
        .field-error { color: #000000; font-size: 12px; text-decoration: underline; }
        .form-actions { display: flex; align-items: center; gap: 14px; margin-top: 26px; }
        .text-link { color: var(--muted); text-decoration: none; font-size: 14px; }
        .text-link:hover { color: var(--green); text-decoration: underline; }
        .site-footer { margin-top: 18px; border-top: 1px solid #000000; background: #ffffff; }
        .footer-wrap { min-height: 0; display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 8px 0; color: #000000; font-size: 12px; }
        .footer-name { color: #000000; font-weight: 700; text-decoration: none; }
        @media (max-width: 760px) {
            .nav-wrap, main, .footer-wrap { width: min(100% - 32px, 1120px); }
            .nav-wrap { min-height: 64px; }
            .brand { font-size: 13px; }
            .nav-links { gap: 0; }
            .nav-link { padding: 8px; font-size: 12px; }
            main { padding: 14px 0; }
            .page-heading { align-items: flex-start; flex-direction: column; margin-bottom: 18px; padding: 16px; }
            h1 { font-size: 24px; }
            .table-toolbar { align-items: stretch; flex-direction: column; }
            .search-field { width: 100%; }
            .user-table th, .user-table td { padding: 13px 14px; }
            .form-shell { padding: 20px; }
            .form-grid { grid-template-columns: 1fr; }
            .form-field-wide { grid-column: auto; }
            .footer-wrap { align-items: flex-start; flex-direction: column; justify-content: center; padding: 14px 0; }
        }
    </style>
</head>
<body>
    <x-navbar />
    <main>
        @yield('content')
    </main>
    <x-footer />
    @stack('scripts')
</body>
</html>