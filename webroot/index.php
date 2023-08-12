<?php
$requestBody = file_get_contents('php://input');
echo "Request Body: " . $requestBody;
?>


<?php
foreach ($_SERVER as $key => $value) {
    if (strpos($key, 'HTTP_') === 0) {
        $header = str_replace('HTTP_', '', $key);
        $header = str_replace('_', ' ', $header);
        $header = ucwords(strtolower($header));
        
        echo "$header: $value<br>";
    }
}
?>
<?php

print_r($_SERVER);
foreach ($_SERVER as $key => $value) {
    if (is_array($value)) {
        echo "$key: " . implode(', ', $value) . "<br>";
    } else {
        echo "$key: $value<br>";
    }
}
?><!DOCTYPE html>
<html>
<head>
    <title>Test Form</title>
</head>
<body>
    <h1>Test Form</h1>
    <form method="POST" action="test.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <button type="submit">Submit</button>
    </form>
    <form method="GET" action="test.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <button type="submit">Submit</button>
    </form>

    <?php
    // Handle the form submission
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = isset($_POST['param']);
        echo "<p>Posted Name: " . htmlspecialchars($name) . "</p>";
    }

    // Handle the query parameters from the URL
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['param'])) {
        $param = $_GET['param'];
        echo "<p>Query Parameter: " . htmlspecialchars($param) . "</p>";
    }
var_dump($_POST);
    ?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Variables Example</title>
</head>
<body>
    <h1>PHP Variables Example</h1>

    <h2>GET Variables:</h2>
    <?php if (!empty($_GET)): ?>
        <ul>erter
            <?php foreach ($_GET as $key => $value): ?>
                <li><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No GET variables found.</p>
    <?php endif; ?>

    <h2>POST Variables:</h2>
    <?php if (!empty($_POST)): ?>
        <ul>erter
            <?php foreach ($_POST as $key => $value): ?>
                <li><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No POST variables found.</p>
    <?php endif; ?>
</body>
</html>