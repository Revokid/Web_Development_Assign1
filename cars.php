<?php
// Database connection
$host = "sql306.infinityfree.com";
$user = "if0_37424823";
$password = "Revokid123";  // Change if needed
$database = "if0_37424823_cars";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cars from the database
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Showroom Inventory</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; text-align: center; }
        table { width: 90%; margin: auto; border-collapse: collapse; background: white; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #4CAF50; color: white; }
        img { width: 120px; border-radius: 5px; }
        td:nth-child(6) { font-weight: bold; }
    </style>
</head>
<body>

<h2>Car Showroom Inventory</h2>

<table>
    <tr>
        <th>Image</th>
        <th>Model</th>
        <th>Brand</th>
        <th>Year</th>
        <th>Price ($)</th>
        <th>Availability</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td><img src='images/{$row['image']}' alt='{$row['model']}'></td>
                    <td>{$row['model']}</td>
                    <td>{$row['brand']}</td>
                    <td>{$row['year']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['availability']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No cars available.</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
