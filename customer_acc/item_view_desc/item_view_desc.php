<?php
$con=mysqli_connect('localhost', 'root', '','CS_310_final_project');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$txtaccount = $_POST['txtaccount'];
try {
    $result = mysqli_query($con,"SELECT * FROM item_3 where account_ID ='95096179'");}
    
    $bg_color = '#ff0000';
    echo "<table border='1'>
    <tr>
    <th>item_id</th>
    <th>item_title</th>
    <th>item_price</th>
    <th>item_desc</th>
    <th>account_ID</th>
    </tr>";
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['item_id'] . "</td>";
    echo "<td>" . $row['item_title'] . "</td>";
    echo "<td>" . $row['item_price'] . "</td>";
    echo "<td>" . $row['item_desc'] . "</td>";
    echo "<td>" . $row['account_ID'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
    mysqli_close($con);
?>
