<?php
$notes = [];
if (file_exists('output_json.json')) {
    $notes = json_decode(file_get_contents('output_json.json'), true);
}

if (isset($_POST["submitBtn"])) {
    $newNote = trim(htmlspecialchars($_POST["inputValue"]));

    if(!empty($newNote)) {
        $notes[] = $newNote;
        file_put_contents('output_json.json', json_encode($notes));
    }
}
if (isset($_POST["toot"],$_POST["index"])) {
    $notes[$_POST["index"]] = $_POST["toot"];
    file_put_contents('output_json.json', json_encode($notes));
    header("Location: index.php");
}
// is button clicked?
if (isset($_POST["deleteBtn"])) {
    $index = $_POST["deleteIndex"];

    //delete
    unset($notes[$index]);

    //update .json
    file_put_contents('output_json.json', json_encode($notes));

    //refresh page
    header("Location: index.php");
    //stop execution
    exit;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
</head>
<body>
<h2>Add your todo</h2>
<form action="index.php" method="post">
    <label>
        <input type="text" name="inputValue"><br><br>
    </label>
    <button name="submitBtn" type="submit">Add</button>
</form>

<h2>Your Todos:</h2>
<ul>
    <!--- assigns value of todo to $note --->
    <?php foreach ($notes as $index => $note): ?>
        <li>
            <!--- display todo in the list --->
            <form action="index.php" method="post">
                <input hidden="hidden" type="submit" name="index" value="<?= $index ?>">
                <input type="text" name="toot" value="<?php echo $note; ?>">
            </form>

            <!--- display: inline - all being in the line --->
            <form action="index.php" method="post" style="display: inline;">
                <input type="hidden" name="deleteIndex" value="<?= $index; ?>">
                <button name="deleteBtn" type="submit">Delete</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
