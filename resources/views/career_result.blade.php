<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Recommendations</title>
</head>
<body>
    <h1>Career Recommendations</h1>
    @if(!empty($recommendedCareers))
        <ul>
            @foreach($recommendedCareers as $career)
                <li>{{ $career }}</li>
            @endforeach
        </ul>
    @else
        <p>No recommendations available at this time.</p>
    @endif
    <a href="/">Back</a>
</body>
</html>