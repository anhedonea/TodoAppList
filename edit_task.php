<?php
include 'database/db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form action="" method="POST">
    <input type="text" name="title" value="<?= $task['title'] ?>" required>
    <textarea name="description"><?= $task['description'] ?></textarea>
    <button type="submit">Update Task</button>
</form>
