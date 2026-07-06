<!--CS 85 Module 4, Assignment 4B by Gregory Hagen 7/5/26-->
<!--GitHub URL: https://github.com/Greg01001000/cs85-module4b-inventory.git -->
<!--Test URL: http://localhost/cs85_projects/module4b/show_inventory.php -->
<!DOCTYPE HTML>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Personal Inventory</title>
    </head>
<body>
    <?php
    /* This code connects to a MySQL database, retrieves all rows and columns
    from the table named 'items', and shows all values in the columns 'item_name'
    and 'quantity' on the web page. It would be very difficult to find out the
    purchase dates of 5 things I own, and it would be a quite boring list; so I
    made a wish list of items for a trip I would like to take with my wife.

    The tools and code used here are ready, as-is, to work with a table of any
    number of rows, and they can easily be expanded to work with any number of 
    columns. But if we connect to a truly large table, we should be careful about
    retrieving all rows and columns, as this code does with our small table,
    because our server might not have enough RAM available to store and work with
    all that data.
    
    PDO provides methods that enable us, when sending code to a RDBMS, to 
    separate our intended SQL code from its accompanying data, whether that data
    came from an Internet user, a rogue employee, an intruder, malware that got
    access to our system, or any other untrusted source. Instead of trying to 
    anticipate every possible malicious code and engineer the most efficient way
    to filter it all out, PDO simply separates all the untrusted data from our
    intended SQL code, so that the RDBMS cannot possibly confuse them. */
    
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