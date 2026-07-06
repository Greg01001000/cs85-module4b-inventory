<!--CS 85 Module 4, Assignment 4B by Gregory Hagen 7/5/26-->
<!DOCTYPE HTML>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Personal Inventory</title>
    </head>
<body>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->query("SELECT * FROM items");
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            echo "<p>{$item['item_name']} ({$item['quantity']} units)</p>";
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</body>
</html>