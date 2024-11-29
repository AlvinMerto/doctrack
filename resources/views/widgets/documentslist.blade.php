<?php
    $count = 1;
    foreach($data as $d) {
        
 ?>                                                                  
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $count; ?>
                                                                            </td>
                                                                            <td>
                                                                                <span class="m-widget11__title">
                                                                                    <?php echo $d->getdocs->subject; ?>
                                                                                </span>
                                                                                <span class="m-widget11__sub">
                                                                                    by <?php echo $d->from; ?>
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                19 Days
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $d->getdocs->datetoday; ?>
                                                                            </td>
                                                                            <td>
                                                                                <span class="m-widget11__title">
                                                                                    <?php echo $d->actionneeded; ?>
                                                                                </span>
                                                                                <span class="m-widget11__sub">
                                                                                    4 days ago
                                                                                </span>
                                                                                <span class="m-widget11__sub">
                                                                                    by <?php echo $d->to; ?>
                                                                                </span>
                                                                            </td>
                                                                            <td class="m--align-right m--font-brand">
                                                                                <span class="m-badge m-badge--danger m-badge--wide">
                                                                                    <?php echo $d->getdocs->priority; ?>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
<?php 
    $count++;
    } 
?>