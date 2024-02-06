<?php
$row_tickmatch = $class->querytickmatch2($_POST);
$count = count($row_tickmatch['tickmatch']);

for ($i = 0; $i < $count; $i++) {
?>
    <tr>
        <td><?php echo $row_tickmatch['tickmatch'][$i]['Time']; ?></td>
        <td><?php echo number_format($row_tickmatch['tickmatch'][$i]['Last'], 2); ?></td>
        <td><?php echo number_format($row_tickmatch['tickmatch'][$i]['Vol'], 0); ?></td>
        <td><?php if ($row_tickmatch['tickmatch'][$i]['Type'] == "BUY") {
                echo '<span style="color:#32CD32;text-align:center;">' . $row_tickmatch['tickmatch'][$i]['Type'] . '</span>';
            } else {
                echo '<span style="color:#DC143C;text-align:center;">' . $row_tickmatch['tickmatch'][$i]['Type'] . '</span>';
            } ?>
        </td>
    </tr>


<?php } ?>