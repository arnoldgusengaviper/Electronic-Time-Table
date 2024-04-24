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
    <section>
            <h2>Update Users</h2>
            <form method="post">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM `user` WHERE `user_id` ='$id'";
                $res = $db ->query($sql);
                $row = mysqli_fetch_array($res);
                ?>
                <label>UserName:</label>
                <input type="text" value="<?php echo $row[1]?>" name="userName" required>
                <label>Telephone:</label>
                <input type="tel" value="<?php echo $row[2]?>" name="telephone" required>
                <select name="status">
                    <option value="">Select the status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <button type="submit" name="save">Update User</button>
                <?php
                if (isset($_POST['save'])) {
                    #user_id	user_name	tel	email	status
                    $user_name = $_POST['userName'];
                    $tel = $_POST['telephone'];
                    $email = $_POST['email'];
                    $status = $_POST['status'];
                    $sql = "UPDATE `user` SET `user_name`='$user_name',`tel`='$tel',`status`='$status' WHERE `user_id`='$id'";
                    $res = $db->query($sql);
                    header('location:users.php');
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