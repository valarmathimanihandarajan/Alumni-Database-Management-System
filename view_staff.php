<?php
include('db.php');
$sql = "SELECT * FROM stf";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Staff</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fce4ec;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #d81b60;
            margin-bottom: 25px;
            font-size: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #f8bbd0;
        }

        table th {
            background-color: #f8bbd0;
            color: #880e4f;
        }

        table tr:hover {
            background-color: #fce4ec;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Our Esteemed Staff Members</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Email</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
