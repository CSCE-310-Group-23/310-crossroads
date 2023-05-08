<?php
$con = mysqli_connect('localhost', 'root', '', 'cs_310_final_project');

$search_account_id = $_POST['search_account_id'];

$result = mysqli_query($con,"SELECT * FROM reviews WHERE account_id = $search_account_id");

echo "<form action='reviews.html' method='post'>";
echo "<input type='hidden' name='search_account_id' value='$search_account_id'>";
echo "<input type='submit' value='Return'>";
echo "</form>";

// prints the table again
echo "<table border='1'>
    <tr>
        <th>review_id</th>
        <th>review_text</th>
        <th>account_id</th>
        <th>item_id</th>
";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['review_id'] . "</td>";
    echo "<td>" . $row['review_text'] . "</td>";
    echo "<td>" . $row['account_id'] . "</td>";
    echo "<td>" . $row['item_id'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>