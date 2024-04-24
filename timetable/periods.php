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
            <h2>Record Period</h2>
            <form method="post">
                <label>Input Date:</label>
                <input type="date" name="date" required>
                <label>Period Start:</label>
                <input type="time" name="p_start" required>
                <label>Period End:</label>
                <input type="time" name="p_end" required>
                <button type="submit" name="save">Add Period</button>
                <?php
                if (isset($_POST['save'])) {
                    #period_id	date	start	End
                    $date = $_POST['date'];
                    $p_start = $_POST['p_start'];
                    $p_end = $_POST['p_end'];
                    $sql = "INSERT INTO `period`(`period_id`, `date`, `start`, `End`) VALUES ('','$date','$p_start','$p_end')";
                    $res = $db->query($sql);
                    echo "<p style='color:blue'> successfully recorded </p>";
                }
                ?>
            </form>
        </section>
        <section id="courseTable">
            <h2>View Period</h2>
            <table>

                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Period start</th>
                    <th>Period end</th>
                    <th>action</th>
                </tr>
                <?php
                $sql = "SELECT * FROM `period`";
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