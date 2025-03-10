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

    <!-- 🔍 Search Form -->
    <form action="dashboard.php" method="GET">
        <input type="text" name="search" placeholder="Search by name, phone, or date">
        <button type="submit">Search</button>
    </form>

    <section class="appointments">
        <table>
            <tr>
                <th>Customer</th>
                <th>Phone</th>
                <th>Service</th>
                <th>Date & Time</th>
                <th>Actions</th>
            </tr>

            <?php
            $query = "SELECT id, customer_name, phone, service, appointment_date FROM appointments";

            // Search Logic
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $query .= " WHERE customer_name LIKE '%$search%' OR phone LIKE '%$search%' OR appointment_date LIKE '%$search%'";
            }

            $query .= " ORDER BY appointment_date ASC";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['customer_name']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['service']}</td>
                        <td>{$row['appointment_date']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }

            $conn->close();
            ?>
        </table>
    </section>

</body>
</html>
