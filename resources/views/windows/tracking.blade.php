<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background: #fcfff8;
        }

        .timelinebox {
            width: 60%;
            margin: auto;
        }

        #timelinebox_tbl {
            width:100%;
        }

        #timelinebox_tbl tr {
            
        }

        #timelinebox_tbl tr th{
            text-align:right;
        }

        #timelinebox_tbl tr td{
            text-align:left;
        }

        .div_logo {
            width:10%;
        }

        .div_logo img {
            width:auto;
        }
    </style>
    <div class="timelinebox">
        <div class="row">
            <div class='col-md-4' style='margin:20px 0px;'>
                <img src="{{asset('minda_logo_1.png')}}" style='width:inherit;'/>
            </div>
        </div>

        <h3> Document Details </h3>
        <div class="row">
            <div class="col-md-3"> 
                <strong> Subject </strong>
            </div> 
            <div class="col-md-9">
                <?php echo $docdetails[0]['subject']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"> 
               <strong> Date Routed  </strong>
            </div> 
            <div class="col-md-9">
               <?php echo date("l-M. d, Y @ h:i A", strtotime( $docdetails[0]['created_at'] )); ?> - <i> {{ \Carbon\Carbon::parse($docdetails[0]['created_at'])->diffForHumans() }} </i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"> 
                <strong> Document Category  </strong>
            </div> 
            <div class="col-md-9">
                <?php echo $docdetails[0]['documentcat']; ?>
            </div>
        </div>
        <hr/>
        <h3> Routing History </h3>
        <?php 
            $entered = [];
            $count   = 0;
            foreach($historydetails as $hd) {
                $count = 0;
                $count += 1;
                // echo $hd->thedate."<br/>";
                if (!in_array($hd->thedate, $entered)) {
                    echo "<div class='the_item_box border-t-1 border-b-1 border-r-1 border-l-1 p-2 mt-2'>";

                        if ($count <= 1) {
                            // echo "<p class='strong_this border-b pb-2'> ".date("l - F d, Y", strtotime($hd->thedate))."</p>";
                            echo "<p class='strong_this border-b pb-2'> ".date("l - F d, Y", strtotime($hd->created_at))."</p>";
                        }
                    
                        // start row
                        echo "<div class='row py-3'>
                                <div class='col-md-3'>
                                    <p class='strong_this'> ". date("h:i A", strtotime($hd->created_at)) ."</p>
                                </div>";

                            // start col-md-9
                            echo "<div class='col-md-9'>

                                    <div class='mb-3'> 
                                        <p class='strong_this'> Action: </p>
                                        <p> {$hd->action} </p>
                                    </div>";
                               echo "<div class='mb-3'>  
                                        <p class='strong_this'> Actions: </p>
                                        <div>"; 
                                           echo "<span>".$hd->actionneeded."</span>";
                                echo "  </div>
                                     </div>";

                                echo "<div> 
                                        <p class='strong_this'> Remarks: </p>
                                        <p> {$hd->remarks} </p>
                                      </div>";
                                      
                            echo "</div>"; // end col-md-9

                        echo "</div>"; // end of row


                    echo "</div>";
                    array_push($entered, $hd->thedate);
                } else {
                    // start row
                        echo "<div class='row py-3'>
                                <div class='col-md-3'>
                                    <p class='strong_this'> ". date("h:i A", strtotime($hd->thetime)) ."</p>
                                </div>";

                            // start col-md-9
                            echo "<div class='col-md-9'>

                                    <div class='mb-3'> 
                                        <p class='strong_this'> Action: </p>
                                        <p> {$hd->action} </p>
                                    </div>";
                               echo "<div class='mb-3'>  
                                        <p class='strong_this'> Actions: </p>
                                        <div>"; 
                                           echo "<span>".$hd->actionneeded."</span>";
                                echo "  </div>
                                     </div>";

                                echo "<div> 
                                        <p class='strong_this'> Remarks: </p>
                                        <p> {$hd->remarks} </p>
                                      </div>";
                                      
                            echo "</div>"; // end col-md-9

                        echo "</div>"; // end of row
                }
            }
        ?>

    </div>
</div>