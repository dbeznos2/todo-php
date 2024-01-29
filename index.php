<?php
if (isset($_POST["submitBtn"])) {
    $newNote = htmlspecialchars($_POST["inputValue"]);

    // Load and display from json
    $notes = [];
    if (file_exists('output_json.json')) {
        $notes = json_decode(file_get_contents('output_json.json'), true);
    }

    $notes[] = $newNote;


    file_put_contents('output_json.json', json_encode($notes));
}

$notes = [];
if (file_exists('output_json.json')) {
    $notes = json_decode(file_get_contents('output_json.json'), true);
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
    <?php foreach ($notes as $note): ?>
        <li><?php echo $note; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
