<?php
include('db.php');
$sql = "SELECT * FROM evt ORDER BY event_date ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fdeff4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #c2185b;
            font-size: 32px;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
        }

        table th, table td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #f8bbd0;
        }

        table th {
            background-color: #f8bbd0;
            color: #880e4f;
        }

        table tr:hover {
            background-color: #fdeff4;
        }

        @media (max-width: 600px) {
            table, tr, td, th {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upcoming Events</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo date("d-m-Y", strtotime($row['event_date'])); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
