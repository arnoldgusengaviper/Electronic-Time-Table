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
            <h2>Record Users</h2>
            <form method="post">

                <label>UserName:</label>
                <input type="text" name="userName" required>
                <label>Telephone:</label>
                <input type="tel" name="telephone" required>
                <select name="status">
                    <option value="">Select the status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <button type="submit" name="save">Add User</button>
                <?php
                if (isset($_POST['save'])) {
                    #user_id	user_name	tel	email	status
                    $user_name = $_POST['userName'];
                    $tel = $_POST['telephone'];
                    $status = $_POST['status'];
                    $sql = "INSERT INTO `user`(`user_id`, `user_name`, `tel`,  `status`) VALUES ('','$user_name','$tel','$status')";
                    $res = $db->query($sql);
                    echo "<p style='color:blue'> successfully recorded </p>";
                }
                ?>
            </form>
        </section>
        <section id="courseTable">
            <h2>View Users</h2>
            <table>

                <tr>
                    <th> ID</th>
                    <th>User Name</th>
                    <th>Tel</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM `user`";
                $res = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><a href="edit_user.php?id=<?php echo $row[0]; ?>">edit</a>   |
                            <a href="del_user.php?id=<?php echo $row[0]; ?>">delete</a>
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