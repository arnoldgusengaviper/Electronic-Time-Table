<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Courses</a></li>
            <li><a href="periods.php">Periods</a></li>
            <li><a href="classes.php">Classes</a></li>
            <li><a href="#users">Users</a></li>
        </ul>
    </nav>
    <main>
        <section id="courses">
            <h2>Record Course</h2>
            <form method="post">
                <label for="courseName">Course Name:</label>
                <input type="text" name="courseName" required>
                <label for="courseDetail">Course Details:</label>
                <input type="text" name="courseDetails" required>
                <button type="submit" name="save">Add Course</button>
                <?php
                if (isset($_POST['save'])) {
                    $c_name = $_POST['courseName'];
                    $c_detail = $_POST['courseDetails'];
                    $sql = "INSERT INTO `courses`(`course_id`, `c_name`, `details`) VALUES ('','$c_name','$c_detail')";
                    $res = $db->query($sql);
                    echo "<p style='color:blue'> successfully recorded </p>";
                }
                ?>
            </form>
        </section>
        <section id="courseTable">
            <h2>View Courses</h2>
            <table>

                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Details</th>
                    <th>action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM `courses`";
                $res = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><a href="edit.php?id=<?php echo $row[0]; ?>">edit</a>   |
                            <a href="del.php?id=<?php echo $row[0]; ?>">delete</a>
                        </td>

                    </tr>
                <?php }
                ?>

            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Dashboard Inc.</p>
    </footer>
</body>

</html>