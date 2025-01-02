<?php 
    if (count($data) == 0) {
?>
   <tr> <td colspan='100'> No data found </td> </tr> 
<?php 
    };
?>
<?php
    $count    = 1;
    $in_table = [];
    foreach($data as $d) {
        if (!in_array($d->$documentidname, $in_table)) {
            array_push($in_table,$d->$documentidname);
 ?>                                                                  
        <tr data-did = '<?php echo $d->$documentidname; ?>' class='item_row'>
            <!-- <td>
                <?php // echo $count; ?>
            </td> -->
            <td>
                <span class="m-widget11__title">
                    <?php 
                        //if (isset($d->subject)) {
                            echo $d->subject; 
                        //}
                    ?>
                </span>
                <span class="m-widget11__sub">
                    <?php if ($doctype == 1) { // internal doc type?>
                        by <?php echo $d->name; ?>
                    <?php } else if ($doctype == 2) { // external doc type?>
                        by <?php echo $d->sendersname; ?>
                    <?php } ?>
                </span>
            </td>
            <td>
                <?php if (isset($d->created_at)) { ?>
                    {{ \Carbon\Carbon::parse($d->created_at)->diffForHumans() }}
                <?php } ?>
            </td>
            <td>
                <?php echo date("l M. d, Y h:i A", strtotime($d->created_at)); ?>
            </td>
            <td>
                <span class="m-widget11__title">
                    <?php 
                        if (isset($d->remarks)) {
                            echo $d->remarks; 
                        }
                    ?>
                    <?php 
                        if (isset($d->actionneeded)) {
                            echo $d->actionneeded; 
                        }
                    ?>
                </span>
                <span class="m-widget11__sub">
                    <?php if ( isset($d->retdate)) { ?>
                            {{ \Carbon\Carbon::parse($d->retdate)->diffForHumans() }}
                    <?php } ?>
                </span>
            </td>
            <td class="m--align-right m--font-brand">
                <?php
                    switch($d->priority) {
                        case "confidential":
                            echo "<span class='m-badge m-badge--default m-badge--wide'> {$d->priority} </span>";
                            break;
                        case "high";
                            echo "<span class='m-badge m-badge--danger m-badge--wide'> {$d->priority} </span>";
                            break;
                        case "moderate";
                            echo "<span class='m-badge m-badge--success m-badge--wide'> {$d->priority} </span>";
                            break;
                        case "low":
                            echo "<span class='m-badge m-badge--primary m-badge--wide'> {$d->priority} </span>";
                            break;
                    }
                ?>
                
            </td>
        </tr>
    <?php 
        }
    $count++;
    }

?>