<!-- 
    Used to "delete" (update) the reviews in the database
-->
<?php
    // connect to database
    $con = mysqli_connect('localhost', 'root', '', 'cs_310_final_project');
    // 
    $remove_review_id = $_POST['remove_review_id'];
    $sql = "UPDATE reviews SET review_text = 'This review has been deleted by the user.' WHERE review_id = '$remove_review_id'";
    mysqli_query($con, $sql);


    echo "<form action='reviews.html' method='post'>";
    echo "<input type='hidden' name='remove_review_id' value='$remove_review_id'>";
    echo "<input type='submit' value='Return'>";
    echo "</form>";

    // prints the table again
    echo "<table border='1' style='font-size: 24px'>
        <tr>
            <th>review_id</th>
            <th>review_text</th>
            <th>account_id</th>
            <th>item_id</th>
    ";

    $result = mysqli_query($con, "SELECT * FROM reviews WHERE review_id = $remove_review_id");

    while ($row = mysqli_fetch_array($result)) {
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
