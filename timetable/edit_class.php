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
            <h2>Update Classes</h2>
            <form method="post">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM `class` WHERE `class_id` ='$id'";
                $res = $db ->query($sql);
                $row = mysqli_fetch_array($res);
                ?>
                <label>Class Name:</label>
                <input type="text" value="<?php echo $row[1]?>"  name="classname" required>
                <button type="submit" name="save">Add Class</button>
                <?php
                if (isset($_POST['save'])) {
                    #class_id	name	
                    $c_name = $_POST['classname'];
                    $sql = "UPDATE `class` SET `name`='$c_name' WHERE `class_id` ='$id'";
                    $res = $db->query($sql);
                    header('location:classes.php');
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