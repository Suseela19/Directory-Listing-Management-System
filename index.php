<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Directory Listing Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="file"], input[type="submit"] {
            margin-top: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .download-btn, .delete-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Directory Listing Management System</h2>
        
        <!-- Form to upload a file -->
        <h3>Upload File</h3>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <input type="submit" value="Upload File" name="submit">
        </form>

        <!-- Display existing files -->
        <h3>Existing Files</h3>
        <table>
            <tr>
                <th>File Name</th>
                <th>Actions</th>
            </tr>
            <?php
            // Directory where files are stored
            $directory = 'uploads/';

            // Check if directory exists, create if not
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Scan directory for files
            $files = scandir($directory);

            // Remove . and .. from the list
            $files = array_diff($files, array('.', '..'));

            // Display each file as a row in the table
            foreach ($files as $file) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($file) . "</td>";
                echo '<td>
                        <a href="' . $directory . $file . '" class="download-btn" download>Download</a>
                        <a href="delete.php?filename=' . urlencode($file) . '" class="delete-btn">Delete</a>
                      </td>';
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
