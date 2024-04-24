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
            <li><a href="#courses">Courses</a></li>
            <li><a href="#periods">Periods</a></li>
            <li><a href="#classes">Classes</a></li>
            <li><a href="#users">Users</a></li>
        </ul>
    </nav>
    <main>
        <section id="courses">
            <h2>Update Course</h2>
            <form method="post">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM `courses` WHERE `course_id` = '$id'";
                $res = mysqli_query($db,$sql);
                $row = mysqli_fetch_array($res);
                ?>
                <label for="courseName">Course Name:</label>
                <input type="text" value="<?php echo $row[1]?>" name="courseName" required>
                <label for="courseDetail">Course Details:</label>
                <input type="text" value="<?php echo $row[2]?>" name="courseDetails" required>
                <button type="submit" name="save">Update  Course</button>
                <?php
                if (isset($_POST['save'])) {
                    $c_name = $_POST['courseName'];
                    $c_detail = $_POST['courseDetails'];
                    $sql = "UPDATE `courses` SET `c_name`='$c_name',`details`='$c_detail' WHERE `course_id` = '$id'";
                    $res = $db->query($sql);
                    header('location:index.php');
                }
                ?>
            </form>
        </section>

    </main>
    <footer>
        <p>&copy; 2024 Dashboard Inc.</p>
    </footer>
</body>

</html>