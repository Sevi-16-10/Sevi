<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffffff;
            color: #333333;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
        }

        header {
            width: 100%;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin: 0;
            font-weight: 700;
        }

        main {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
            text-align: center;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .image-container img {
            width: 100px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .image-container img:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #0056b3;
        }

        footer {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            width: 100%;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
        }

        button#dark-mode-toggle {
            background: none;
            border: 2px solid white;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }

        body.dark-mode .image-container img {
            background: #1e1e1e;
        }

        body.dark-mode .back-link {
            background-color: #333;
        }

        body.dark-mode .back-link:hover {
            background-color: #555;
        }

        body.dark-mode footer {
            background: linear-gradient(135deg, #333, #444);
        }
    </style>
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($_GET['folder']); ?></h1>
    </header>
    <main>
        <div class="image-container">
            <?php
            if (isset($_GET['folder'])) {
                $baseDir = "images";
                $folder = $_GET['folder'];
                $folderPath = $baseDir . '/' . $folder;
                $images = scandir($folderPath);

                foreach ($images as $image) {
                    if ($image != '.' && $image != '..') {
                        echo "<img src='$folderPath/$image' alt='$image'>";
                    }
                }
            } else {
                echo "No folder specified.";
            }
            ?>
        </div>
        <a href="index.html" class="back-link">Back</a>
    </main>
    <footer>
        <button id="dark-mode-toggle">Toggle Dark Mode</button>
    </footer>
    <script>
        const toggleButton = document.getElementById('dark-mode-toggle');
        toggleButton.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
