<?php
    $page_title = "Admission Dashboard";
    include 'includes/admin_header.php';
    include 'db.php';
    include 'error_handler.php';
?>

<h1 class="title_deg">Students Applying For Admission</h1>

<table class="admission_table">
    <thead>
        <tr>
            <th style="width: 200px;">Name</th>
            <th style="width: 250px;">Email</th>
            <th style="width: 150px;">Phone</th>
            <th style="width: 400px;">Messages</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Group by email and count submissions, get all messages with timestamps
            $sql = "SELECT 
                        name, 
                        email, 
                        phone, 
                        GROUP_CONCAT(message ORDER BY submitted_at DESC SEPARATOR '|||') as messages,
                        GROUP_CONCAT(submitted_at ORDER BY submitted_at DESC SEPARATOR '|||') as timestamps,
                        COUNT(*) as submission_count
                    FROM admission 
                    GROUP BY email, phone
                    ORDER BY MAX(submitted_at) DESC";
            
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                logError("Prepare failed: " . $conn->error, "admission.php");
                echo "<tr><td colspan='4' class='empty-state'>System error. Please try again later.</td></tr>";
            } else {
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 0) {
                    echo "<tr><td colspan='4' class='empty-state'>No applications yet.</td></tr>";
                } else {
                    while ($row = $result->fetch_assoc()) {
                        $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                        $email = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                        $phone = htmlspecialchars($row['phone'], ENT_QUOTES, 'UTF-8');
                        $count = $row['submission_count'];
                        
                        // Split messages and timestamps
                        $messages = explode('|||', $row['messages']);
                        $timestamps = explode('|||', $row['timestamps']);
                        
                        // Truncate name if too long
                        $name_display = $name;
                        $name_truncated = false;
                        if (strlen($name) > 25) {
                            $name_display = substr($name, 0, 25) . '...';
                            $name_truncated = true;
                        }
                        
                        echo "<tr>";
                        
                        // Name column with tooltip if truncated
                        if ($name_truncated) {
                            echo "<td class='truncate-cell' data-full-text='" . $name . "'>" . $name_display . "</td>";
                        } else {
                            echo "<td>" . $name_display . "</td>";
                        }
                        
                        echo "<td>" . $email . "</td>";
                        echo "<td>" . $phone . "</td>";
                        
                        // Messages column with count badge
                        echo "<td class='message-cell'>";
                        echo "<span class='submission-count'>×" . $count . "</span> ";
                        
                        // Create scrollable message container
                        echo "<div class='message-container'>";
                        foreach ($messages as $index => $message) {
                            $message_clean = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
                            $timestamp = isset($timestamps[$index]) ? $timestamps[$index] : '';
                            
                            echo "<div class='message-item'>";
                            echo "<div class='message-timestamp'>" . date('M d, Y - h:i A', strtotime($timestamp)) . "</div>";
                            echo "<div class='message-text'>" . nl2br($message_clean) . "</div>";
                            echo "</div>";
                        }
                        echo "</div>";
                        
                        echo "</td>";
                        echo "</tr>";
                    }
                }

                $stmt->close();
            }
        ?>
    </tbody>
</table>

<?php include 'includes/admin_footer.php'; ?>