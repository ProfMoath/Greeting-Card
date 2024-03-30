<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greeting Card Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #282828;
            margin: 0;
            padding: 0;
            position: relative;
            min-height: 100vh;
        }
        header, footer {
            width: 100%;
            background-color: #075097;
            color: white;
            padding: 25px 0;
            position: fixed;
            z-index: 2;
            width: 100%;
            left: 0;
            animation: fadeIn 1s ease-out; /* Fade-in animation */
        }
        header {
            top: 0;
            border-radius: 20px 20px 0 0;
            text-align: Center;
        }
        footer {
            bottom: 0;
            border-radius: 0 0 50px 50px;
            text-align: center;
            animation: fadeIn 1s ease-out; /* Fade-in animation */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .container {
            max-width: 600px;
            margin: 150px auto 100px;
            padding: 70px;
            top:50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
            overflow-y: auto;
            animation: slideIn 1s ease-out; /* Slide-in animation */
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 20px 30px;
            background-color: #280000;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            transition: all 0.3s ease;
            animation: pulse 1.5s infinite alternate; /* Pulse animation */
        }
        button:hover {
            background-color: #700000;
            transform: scale(1.1);
        }
        #errorMessage {
            color: #ff0000;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }
        #cardContainer {
            position: relative;
            text-align: center;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }
        #cardImage {
            display: none;
            width: 100%;
            height: auto;
        }
        #greetingText {
            position: absolute;
            bottom: 87px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 14px;
            color: white;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        #downloadButton {
            display: none;
            margin-top: 20px;
        }
        @keyframes pulse {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(1.05);
            }
        }
        @keyframes slideIn {
            from {
                transform: translateY(-100px);
            }
            to {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="Picture4ssssssss.png" alt="Company Logo" style="width: 250px;">
        
    </header>
    <footer>
        <p>© 2024 Innovative Solutions. All rights reserved.</p>
    </footer>
    <div class="container">
        <h1>Greeting Card Generator</h1>
        <form id="employeeForm">
            <label for="employeeName">Enter Your Name:</label>
            <input type="text" id="employeeName" name="employeeName" required>
            <button type="button" onclick="generateGreetingCard()">Generate Card</button>
        </form>
        <div id="errorMessage"></div>
        <div id="cardContainer">
            <img id="cardImage" src="eid employees.png" alt="Greeting Card Preview">
        </div>
        <button id="downloadButton" onclick="downloadGreetingCard()">Download Greeting Card</button>
    </div>

    <script>
        function generateGreetingCard() {
            var employeeName = document.getElementById('employeeName').value;

            if (employeeName.trim() === '') {
                document.getElementById('errorMessage').innerText = 'Please enter your name.';
                return;
            }

            // Clear any previous error message
            document.getElementById('errorMessage').innerText = '';

            // Show the card container
            document.getElementById('cardContainer').style.display = 'block';

            // Show the download button
            document.getElementById('downloadButton').style.display = 'block';

            // Show the generated card image
            var cardImage = document.getElementById('cardImage');
            cardImage.style.display = 'block';

            // Create a new div for the greeting text
            var greetingText = document.createElement('div');
            greetingText.id = 'greetingText';
            greetingText.innerText = employeeName;
            document.getElementById('cardContainer').appendChild(greetingText);
        }

        function downloadGreetingCard() {
            var cardContainer = document.getElementById('cardContainer');
            var cardImage = document.getElementById('cardImage');
            var canvas = document.createElement('canvas');
            canvas.width = cardContainer.offsetWidth;
            canvas.height = cardContainer.offsetHeight;
            var context = canvas.getContext('2d');

            // Draw the background image
            var backgroundImage = new Image();
            backgroundImage.src = 'eid employees.png'; // Path to your background photo
            backgroundImage.onload = function() {
                context.drawImage(backgroundImage, 0, 0, canvas.width, canvas.height);
                
                // Draw the text
                var text = document.getElementById('greetingText').innerText;
                context.fillStyle = 'white';
                context.font = '14px Monaco';
                context.textAlign = 'center';
                context.fillText(text, canvas.width / 2, canvas.height - 92);
                
                // Convert the canvas to a data URL and trigger download
                var link = document.createElement('a');
                link.download = 'greeting_card.png';
                link.href = canvas.toDataURL('image/png').replace("image/png", "image/octet-stream");
                link.click();
            };
        }
    </script>
</body>
</html>