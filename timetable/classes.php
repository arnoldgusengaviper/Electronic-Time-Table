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
            <h2>Record Classes</h2>
            <form method="post">
                <label>Class Name:</label>
                <input type="text" name="classname" required>
                <button type="submit" name="save">Add Class</button>
                <?php
                if (isset($_POST['save'])) {
                    #class_id	name	
                    $c_name = $_POST['classname'];
                    $sql = "INSERT INTO `class`(`class_id`, `name`) VALUES ('','$c_name')";
                    $res = $db->query($sql);
                    echo "<p style='color:blue'> successfully recorded </p>";
                }
                ?>
            </form>
        </section>
        <section>
            <h2>View Class</h2>
            <table>

                <tr>
                    <th> ID</th>
                    <th>ClassName</th>
                    <th>Action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM `class`";
                $res = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><a href="edit_class.php?id=<?php echo $row[0]; ?>">edit</a>   |
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