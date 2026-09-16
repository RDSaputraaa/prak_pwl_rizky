<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile {{ $nama }}</title>
    <style>
        :root {
            --ink: #202124;
            --muted: #d8d8d8;
            --page: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 32px 20px;
            color: var(--ink);
            background: var(--page);
            font-family: Arial, Helvetica, sans-serif;
        }

        .profile {
            width: min(100%, 360px);
            text-align: center;
        }

        .avatar {
            position: relative;
            width: 164px;
            height: 164px;
            margin: 0 auto 34px;
            overflow: hidden;
            border: 2px solid #8c8c8c;
            border-radius: 50%;
            background: #d5d5d5;
        }

        .avatar::before {
            content: "";
            position: absolute;
            top: 17px;
            left: 50%;
            width: 80px;
            height: 80px;
            transform: translateX(-50%);
            border-radius: 50%;
            background: #fff;
        }

        .avatar::after {
            content: "";
            position: absolute;
            right: 18px;
            bottom: -13px;
            left: 18px;
            height: 91px;
            border-radius: 52% 52% 0 0;
            background: #fff;
        }

        .details {
            display: grid;
            gap: 20px;
        }

        .detail {
            min-height: 44px;
            display: grid;
            place-items: center;
            padding: 8px 16px;
            overflow-wrap: anywhere;
            background: var(--muted);
            font-size: clamp(1.2rem, 4vw, 1.55rem);
            line-height: 1.2;
        }

        @media (max-width: 420px) {
            .profile {
                width: min(100%, 300px);
            }

            .avatar {
                width: 148px;
                height: 148px;
                margin-bottom: 28px;
            }
        }
    </style>
</head>
<body>
    <main class="profile">
        <div class="avatar" role="img" aria-label="Avatar profile"></div>

        <section class="details" aria-label="Data profile">
            <div class="detail">{{ $nama }}</div>
            <div class="detail">{{ $kelas }}</div>
            <div class="detail">{{ $NPM }}</div>
        </section>
    </main>
</body>
</html>