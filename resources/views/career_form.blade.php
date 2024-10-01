<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Recommendation Form</title>
</head>
<body>
    <h1>Career Recommendation</h1>
    <form action="/recommend-career" method="POST">
        @csrf
        <div>
            @foreach($courses as $course)
                <label for="{{ $course }}">{{ $course }}</label>
                <select name="grades[{{ $course }}]" id="{{ $course }}">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="B+">B+</option>
                    <option value="C">C</option>
                    <option value="C+">C+</option>
                    <option value="D">D</option>
                    <option value="D+">D+</option>
                    <option value="F">F</option>
                </select>
                <br><br>
            @endforeach
        </div>
        <button type="submit">Get Career Recommendations</button>
    </form>
</body>
</html>