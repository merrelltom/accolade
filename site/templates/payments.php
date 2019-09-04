<?php snippet('header');
$db = new SQLite3('assets/db/simple_postcode.db', SQLITE3_OPEN_READWRITE);
$res = $db->query('SELECT * FROM results');

if (isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, "id");
    if (isset($_POST['paid'])) {
        $statement = $db->prepare("UPDATE results set paid=1 WHERE id=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        $msg = 'Order '. $id . ' updated to PAID';
    } else {
        $statement = $db->prepare("UPDATE results set paid=0 WHERE id=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        $msg = 'Order '. $id . ' updated to UNPAID';
    } 
} else {
    $msg = null;
}
?>

<section id="payments-screen" class="screen payments-screen selected">
  <div class="screen-content">
    <?php 
        if ($msg != null) {
            echo '<h2 class="screen-title large-text message">'. $msg .'</h2>';
        }
    ?>
    <h2 class="screen-title large-text">Results and Payments</h2>
    <ul>
        <li><span>Order Number</span><span>Date/Time</span><span>Size</span><span>Price</span><span>Paid?</span>
        <?php while ($row = $res->fetchArray()) { ?>
        <li>
            <span><?php echo $row['id']; ?></span><span><?php echo $row['date_time']; ?></span><span><?php echo $row['trophy_size']; ?></span><span>£<?php echo $row['price']; ?></span>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><input type="checkbox" name="paid" value="1" <?php if ($row['paid'] == 1) { echo 'checked'; } ?>><input type="submit" name="submit" value="Update" />
            </form>
        </li>
        <?php } ?>
    </ul>
  </div>
</section>

<?php snippet('footer') ?>
