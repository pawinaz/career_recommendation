<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อาชีพที่เหมาะสมกับคุณ - CareerForYou</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --main-bg-color: #FFFCF2;
            --container-bg-color: #ffffff;
            --primary-color: #EB5E28;
            --secondary-color: #403D39;
            --text-color: #252422;
            --label-color: #403D39;
            --card-bg-color: #CCC5B9;
            --hover-color: #cc4719;
            --font-family: 'Kanit', sans-serif;
        }
        body {
            font-family: var(--font-family);
            margin: 0;
            padding: 0;
            background-color: var(--main-bg-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: var(--text-color);
        }
        header {
            background-color: var(--secondary-color);
            color: var(--main-bg-color);
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .nav-links a {
            color: var(--main-bg-color);
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.3s ease;
        }
        .nav-links a:hover {
            color: var(--primary-color);
        }
        .container {
            max-width: 800px;
            width: 100%;
            padding: 40px;
            background-color: var(--container-bg-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            margin: 40px auto;
            flex: 1;
        }
        h1 {
            font-size: 32px;
            color: var(--text-color);
            text-align: center;
            margin-bottom: 30px;
        }
        .career-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            list-style-type: none;
            padding: 0;
        }
        .career-item {
            background-color: var(--card-bg-color);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .career-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .career-title {
            font-size: 20px;
            font-weight: bold;
            color: var(--text-color);
            margin-bottom: 10px;
        }
        .career-description {
            font-size: 16px;
            color: var(--label-color);
        }
        .no-results {
            text-align: center;
            font-size: 18px;
            color: var(--label-color);
            margin: 40px 0;
        }
        .back-button {
            display: inline-block;
            margin: 30px auto 0;
            padding: 12px 24px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(235, 94, 40, 0.1);
        }
        .back-button:hover {
            background-color: var(--hover-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(235, 94, 40, 0.2);
        }
        footer {
            background-color: var(--secondary-color);
            color: var(--main-bg-color);
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            .career-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">CareerForYou</div>
            <nav class="nav-links">
                <a href="{{ route('home') }}">หน้าแรก</a>
                <a href="{{ route('index') }}">แนะนำอาชีพ</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <h1>อาชีพที่เหมาะสมกับคุณ</h1>
        @if(!empty($recommendedCareers))
            <ul class="career-list">
                @foreach($recommendedCareers as $career)
                    <li class="career-item">
                        <div class="career-title">{{ $career }}</div>
                        <div class="career-description">คำอธิบายสั้นๆ เกี่ยวกับอาชีพนี้</div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="no-results">ขออภัย ไม่มีคำแนะนำอาชีพที่เหมาะสมในขณะนี้</p>
        @endif
        <div style="text-align: center;">
            <a href="/" class="back-button">กลับหน้าหลัก</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 CareerForYou. สงวนลิขสิทธิ์</p>
    </footer>
</body>
</html>