<!DOCTYPE html>
<html>
<head>
    <title>inserting PHP code into html</title>
    <title>Catherine</title>
    <link rel="stylesheet" href="../../home_style.css">
</head>
<body>
<h2>Hello, this is your admin page for items</h2>
<?php include 'home_page.php'; ?>
<h2> Select Action:
<form action = "http://localhost/CSCE310/310-crossroads/admin_acc/item_delete/item_delete.html">
    <button>
        Delete An Item
    </button>
</form>
<form action = "http://localhost/CSCE310/310-crossroads/admin_acc/item_edit_desc/item_desc.html">
    <button>
        Edit Item Description
    </button>
</form>
<form action = "http://localhost/CSCE310/310-crossroads/admin_acc/item_list_insertion/item_list.html">
    <button>
        Add New Item
    </button>
</form>
<form action = "http://localhost/CSCE310/310-crossroads/customer_acc/cust_home_page/cust_home_page.php">
    <button>
        Switch To Customer's View
    </button>
</form>
</h2>
</body>
</html>