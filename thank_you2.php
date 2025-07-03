
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #4facfe, #00f2fe); /* Blue gradient */
            color: black;
            text-align: center;
        }

        /* Container Styling */
        .container {
            background: rgba(255, 255, 255, 0.9); 
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
        }

        /* Beautiful Heading */
        h2 {
            font-size: 28px;
            font-family: 'Pacifico', cursive;
            color: #333;
            margin-bottom: 15px;
        }

        /* Paragraph */
        p {
            font-size: 18px;
            margin-bottom: 20px;
            color: black;
        }

        /* Green Button */
        a {
            display: inline-block;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease-in-out;
            font-size: 16px;
        }

        a:hover {
            background: #218838;
        }

        /* Emoji Icon */
        .icon {
            font-size: 50px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">🎉</div>
        <h2>Thank You For Getting Review!</h2>
        <p>your review added successfully</p>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>