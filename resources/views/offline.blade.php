<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline - {{ config('app.name') }}</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f3f4f6;
        }
        .offline-content {
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #374151;
            margin-bottom: 1rem;
        }
        p {
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="offline-content">
        <h1>You're Offline</h1>
        <p>Please check your internet connection and try again.</p>
    </div>
</body>
</html>
