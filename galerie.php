<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Gallery</title>
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
        }

        .folder {
            display: inline-block;
            background: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            margin: 10px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .folder img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .folder:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
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

        body.dark-mode .folder {
            background: #1e1e1e;
        }

        body.dark-mode footer {
            background: linear-gradient(135deg, #333, #444);
        }
    </style>
</head>
<body>
    <header>
        <h1>Folders:</h1>
    </header>
    <main>
        <?php
        $baseDir = "images";
        $folders = scandir($baseDir);

        foreach ($folders as $folder) {
            if ($folder != '.' && $folder != '..' && is_dir($baseDir . '/' . $folder)) {
                $folderPath = $baseDir . '/' . $folder;
                $images = scandir($folderPath);
                foreach ($images as $image) {
                    if ($image != '.' && $image != '..') {
                        echo "<a href='show_images.php?folder=$folder' class='folder'>";
                        echo "<img src='$folderPath/$image' alt='$folder'>";
                        echo "<br>$folder</a>";
                        break;
                    }
                }
            }
        }
        ?>
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
