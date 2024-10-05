<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แนะนำอาชีพสำหรับคุณ - ค้นพบเส้นทางอาชีพที่ใช่</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFFCF2;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
        }
        header {
            background-color: #403D39;
            color: #FFFCF2;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .logo:hover {
            color: #EB5E28;
        }
        .nav-links a {
            color: #FFFCF2;
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.3s ease;
        }
        .nav-links a:hover {
            color: #EB5E28;
        }
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 50px;
            flex-wrap: wrap;
        }
        .hero-text {
            flex: 1;
            min-width: 300px;
        }
        .hero-image {
            flex: 1;
            text-align: right;
            min-width: 300px;
            position: relative;
            overflow: hidden;
        }
        .hero-image img {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }
        .hero-image:hover img {
            transform: scale(1.05);
        }
        h1 {
            font-size: 48px;
            color: #252422;
            margin-bottom: 20px;
        }
        .highlight {
            color: #EB5E28;
            position: relative;
            display: inline-block;
        }
        .highlight::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            bottom: -5px;
            left: 0;
            background-color: #EB5E28;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        .highlight:hover::after {
            transform: scaleX(1);
        }
        p {
            font-size: 18px;
            color: #403D39;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .cta-button {
            background-color: #EB5E28;
            color: #FFFCF2;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .cta-button:hover {
            background-color: #D14F1F;
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .features {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .feature {
            flex-basis: calc(33.333% - 20px);
            margin-bottom: 20px;
            color: #403D39;
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }
        .feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        .feature-icon {
            color: #EB5E28;
            font-size: 36px;
            margin-bottom: 15px;
            display: block;
        }
        .feature h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #252422;
        }
        .feature p {
            font-size: 16px;
            line-height: 1.5;
        }
        footer {
            background-color: #403D39;
            color: #FFFCF2;
            padding: 20px 0;
            margin-top: auto;
        }
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .footer-links a {
            color: #FFFCF2;
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.3s ease;
        }
        .footer-links a:hover {
            color: #EB5E28;
        }
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
            }
            .hero-text, .hero-image {
                text-align: center;
                margin-bottom: 30px;
            }
            h1 {
                font-size: 36px;
            }
            .footer-content {
                flex-direction: column;
                text-align: center;
            }
            .footer-links {
                margin-top: 20px;
            }
            .footer-links a {
                display: block;
                margin: 10px 0;
            }
            .feature {
                flex-basis: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="logo">CareerForYou</div>
                <div class="nav-links">
                    <a href="{{ route('home')}}" >หน้าแรก</a>
                    <a href="{{ route('index')}}">แนะนำอาชีพ</a>
                </div>
            </nav>
        </div>
    </header>
    <main class="container">
        <section class="hero">
            <div class="hero-text">
                <h1>ระบบแนะนำ<span class="highlight">เส้นทางอาชีพ</span><br>ที่เหมาะกับนักศึกษา</h1>
                <p>เราช่วยให้คุณรู้จักอาชีพและสามารถวางแผนอนาคตได้อย่างมั่นใจ ค้นพบความเป็นไปได้ใหม่ๆ และเติบโตในเส้นทางอาชีพที่คุณเลือก</p>
                <a href="{{ route('index')}}" class="cta-button">เริ่มค้นหาอาชีพ</a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('image/naa.jpg') }}" alt="Career illustration" width="500" height="400">
            </div>
        </section>
        <section class="features">
            <div class="feature">
                <i class="fas fa-chart-line feature-icon"></i>
                <h3>วิเคราะห์ศักยภาพ</h3>
                <p>ค้นพบจุดแข็งและความสนใจของคุณผ่านแบบทดสอบที่ออกแบบมาโดยเฉพาะ</p>
            </div>
            <div class="feature">
                <i class="fas fa-compass feature-icon"></i>
                <h3>แนะนำอาชีพที่เหมาะสม</h3>
                <p>รับคำแนะนำอาชีพที่สอดคล้องกับความสามารถและความฝันของคุณ</p>
            </div>
            <div class="feature">
                <i class="fas fa-lightbulb feature-icon"></i>
                <h3>ข้อมูลเชิงลึก</h3>
                <p>เรียนรู้รายละเอียดเกี่ยวกับแต่ละอาชีพ ทั้งโอกาส ความท้าทาย และเส้นทางความก้าวหน้า</p>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="
