<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.html");
    exit;
}

include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="angelicaScissors.css">
</head>
<body>

    <header>
        <h1>Upcoming Appointments</h1>
        <a href="logout.php">Logout</a>
    </header>

    <section class="appointments">
        <table>
            <tr>
                <th>Customer</th>
                <th>Phone</th>
                <th>Service</th>
                <th>Date & Time</th>
            </tr>

            <?php
            $result = $conn->query("SELECT customer_name, phone, service, appointment_date FROM appointments ORDER BY appointment_date ASC");

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['customer_name']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['service']}</td>
                        <td>{$row['appointment_date']}</td>
                      </tr>";
            }

            $conn->close();
            ?>
        </table>
    </section>

</body>
</html>
