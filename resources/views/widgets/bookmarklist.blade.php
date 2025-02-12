<?php if ($collection->count() > 0) { ?>
    
    <div class="m-portlet__body" style="padding-top: 0px;padding-bottom: 0px;">
        <div class="m-widget11">
            <div class="table-responsive">
                <table class='table'>

<?php
    foreach($collection as $c) { ?>

                    <tbody>
                        <tr>
                            <td>
                                <i class="flaticon-clipboard" style="font-size: 21px;"></i>
                            </td>
                            <td class="item_row" data-did='<?php echo $c->getdetails->documentid; ?>'>
                                <span class="m-widget11__title"> <?php echo $c->getdetails->subject; ?> </span>
                                <span class="m-widget11__sub"> <?php // echo $c->getuser->name; ?> </span>
                            </td>
                            <td> 
                                <i class='la la-trash removebookmark' data-did='<?php echo $c->getdetails->documentid; ?>' style="float: right;"></i>
                            </td>
                        </tr> 
                        <tr>
                            <td> </td>
                            <td style="">
                                <div class="">
                                    <div class=""> 
                                        <p> <?php echo $c->getremarks->remarks; ?> </p>
                                        <small> <?php echo date("l F d, Y", strtotime($c->getremarks->created_at)); ?> · {{ \Carbon\Carbon::parse($c->getremarks->created_at)->diffForHumans() }} </small>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                
<?php } ?>
                </table>
            </div>
        </div>
    </div>

<?php } else { ?>
    <p style="padding: 10px;text-align: center;color: #918e8e;"> No bookmarks yet </p>
<?php } ?>