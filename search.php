<?php
  include "config.php";
  include "common_functions.php";

if (isset($_GET['search1'])) {
    $search = $_GET['search1'];

    $sql = "SELECT songs.*, artist.name
        FROM songs 
        LEFT JOIN artist ON songs.artist_id = artist.id
        WHERE songs.title LIKE '%$search%' OR artist.name LIKE '%$search%' OR '%$search%' 
        LIMIT 0, 25";

    $result = $conn->query($sql);

    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "<h2>Search Results:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div>";

            //displaying the song name
            echo "<h3>{$row['title']}</h3>";
            echo "<img src='{$row['image']}' alt='Album Cover' style='width: 150px; height: 150px;'>";
            
            // Display Artist Name
            echo "<p>Artist Name: {$row['name']}</p>";
        
            // Audio player
            echo "<audio controls>";
            echo "<source src='{$row['path']}' type='audio/mp3'>";
            echo "Your browser does not support the audio tag.";
            echo "</audio>";
        
            echo "</div>";
        }
        
    } else {
        echo "No results found.";
    }
}
$conn->close();
?>




