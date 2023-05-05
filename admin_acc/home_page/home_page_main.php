<!DOCTYPE html>
<html>
<head>
    <title>Catherine</title>
    <link rel="stylesheet" href="../../home_style.css">
</head>
<body>
<nav class="nav-bar">
    <a href="http://localhost/CSCE310/310-crossroads/customer_acc/cust_home_page/cust_home_page.php">Go Home</a>
    <a href="http://localhost/CSCE310/310-crossroads/admin_acc/home_page/home_page_main.php">Go To Admin Page</a>
    <a href="http://localhost/CSCE310/310-crossroads/customer_acc/cust_home_page/cust_home_page.php">Go To Customers' Selection</a>
    <a href="">Manage Account</a>
</nav>

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
</h2>
</body>
</html>