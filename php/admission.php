<?php
    $page_title = "Admission Dashboard";
    include 'includes/admin_header.php';
    include 'db.php';
    include 'error_handler.php';
?>

    <h1 class="title_deg">Students Apllying For Admission</h1>

    <table class = "admission_table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>
        <?php
            // Prepare statement (NO quotes around table name)
            $stmt = $conn->prepare("SELECT name, email, phone, message FROM admission");

            if ($stmt === false) {
                logError("Prepare failed: " . $conn->error, "admission.php");
                setErrorAndRedirect("System error. Please try again later.", "system_error", "admission.php");
            }

            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . htmlspecialchars($row['phone'], ENT_QUOTES, 'UTF-8') . "</td>";
                echo "<td>" . nl2br(htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8')) . "</td>";
                echo "</tr>";
            }

            $stmt->close();
        ?>
    </table>

<?php include 'includes/admin_footer.php'; ?>