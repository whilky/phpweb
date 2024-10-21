<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'my_music');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get songs data
$sql = "SELECT song_name, artist_name, album_name, release_year FROM songs_tbl";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Song Collection</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>My Song Collection</h1>
    </header>
    <main>
        <table>
            <tr>
                <th>Song Name</th>
                <th>Artist Name</th>
                <th>Album Name</th>
                <th>Release Year</th>
                <th>Album Cover</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['song_name']."</td>
                            <td>".$row['artist_name']."</td>
                            <td>".$row['album_name']."</td>
                            <td>".$row['release_year']."</td>
                            <td><img src='images/".$row['album_name'].".jpg' alt='Album Cover'></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No songs found</td></tr>";
            }
            ?>
        </table>
    </main>
    <footer>
        <p>Created by [Your Name]</p>
    </footer>
    <script src="scripts.js"></script>
</body>
</html>
