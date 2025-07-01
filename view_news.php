<?php
include('db.php');
$sql = "SELECT * FROM nws ORDER BY posted_on DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View News</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Latest News</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Posted On</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['posted_on']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
