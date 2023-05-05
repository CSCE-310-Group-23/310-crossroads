<?php
$con = mysqli_connect('localhost', 'root', '', 'crossroadsgroup23');

$search_item_id = $_POST['search_item_id'];

$result = mysqli_query($con,"SELECT * FROM reviews WHERE item_id = $search_item_id");

echo "<form action='reviews.html' method='post'>";
echo "<input type='hidden' name='search_item_id' value='$search_item_id'>";
echo "<input type='submit' value='Return'>";
echo "</form>";

echo "<table border='1'>
    <tr>
        <th>review_ID</th>
        <th>review_text</th>
        <th>account_ID</th>
        <th>item_id</th>
";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['review_ID'] . "</td>";
    echo "<td>" . $row['review_text'] . "</td>";
    echo "<td>" . $row['account_ID'] . "</td>";
    echo "<td>" . $row['item_id'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>