<?php
$con = mysqli_connect('localhost', 'root', '', 'crossroadsgroup23');

$write_item_id = $_POST['write_item_id'];
$write_account_id = $_POST['write_account_id'];
$write_review = $_POST['write_review'];

$max_id_query = mysqli_query($con, "SELECT max(review_ID) FROM reviews");
$max_id = mysqli_fetch_array($max_id_query)[0];
$max_id++;

$sql = "INSERT INTO reviews (review_ID, review_text, account_ID, item_ID) VALUES ($max_id, '$write_review', $write_account_id, $write_item_id)";
mysqli_query($con, $sql);

echo "<form action='reviews.html' method='post'>";
echo "<input type='hidden' name='write_item_id' value='$write_item_id'>";
echo "<input type='submit' value='Return'>";
echo "</form>";

// prints the table again
echo "<table border='1' style='font-size: 24px'>
    <tr>
        <th>review_ID</th>
        <th>review_text</th>
        <th>account_ID</th>
        <th>item_id</th>
    </tr>";

$result = mysqli_query($con,"SELECT * FROM reviews");

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
