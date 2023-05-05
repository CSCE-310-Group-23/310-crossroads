<?php
$con = mysqli_connect('localhost', 'root', '', 'crossroadsgroup23');

$edit_review_id = $_POST['edit_review_id'];
$edit_review = $_POST['edit_review'];
$sql = "UPDATE reviews SET review_text = '$edit_review' WHERE review_ID = $edit_review_id";
mysqli_query($con, $sql);


echo "<form action='reviews.html' method='post'>";
echo "<input type='hidden' name='edit_review_id' value='$edit_review_id'>";
echo "<input type='submit' value='Return'>";
echo "</form>";

echo "<table border='1'>
    <tr>
        <th>review_ID</th>
        <th>review_text</th>
        <th>account_ID</th>
        <th>item_id</th>
";

$result = mysqli_query($con,"SELECT * FROM reviews WHERE review_ID = $edit_review_id");

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