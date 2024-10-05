<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกเกรดเพื่อแนะนำอาชีพ - CareerForYou</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --main-bg-color: #FFFCF2;
            --container-bg-color: #ffffff;
            --primary-color: #EB5E28;
            --secondary-color: #403D39;
            --text-color: #252422;
            --label-color: #403D39;
            --border-color: #CCC5B9;
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
        form {
            display: flex;
            flex-direction: column;
        }
        .course-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .course-item {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 16px;
            color: var(--label-color);
            margin-bottom: 8px;
            font-weight: 500;
        }
        select {
            font-size: 16px;
            padding: 12px;
            border: 2px solid var(--border-color);
            border-radius: 6px;
            background-color: var(--main-bg-color);
            color: var(--text-color);
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23403D39' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px;
        }
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(235, 94, 40, 0.1);
        }
        button {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            align-self: center;
            box-shadow: 0 4px 6px rgba(235, 94, 40, 0.1);
        }
        button:hover {
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
            .course-group {
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
        <h1>กรอกเกรดเพื่อค้นหาอาชีพที่เหมาะสม</h1>
        <form action="/result" method="POST">
            @csrf
            <div class="course-group">
                @foreach($courses as $course)
                    <div class="course-item">
                        <label for="{{ $course }}">{{ $course }}</label>
                        <select name="grades[{{ $course }}]" id="{{ $course }}">
                            <option value="">เลือกเกรด</option>
                            <option value="A">A</option>
                            <option value="B+">B+</option>
                            <option value="B">B</option>
                            <option value="C+">C+</option>
                            <option value="C">C</option>
                            <option value="D+">D+</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                @endforeach
            </div>
            <button type="submit">ค้นหาอาชีพที่เหมาะสม</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 CareerForYou. สงวนลิขสิทธิ์</p>
    </footer>
</body>
</html>