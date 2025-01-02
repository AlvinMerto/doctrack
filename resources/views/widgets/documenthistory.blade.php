<div>
    <div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text" style="font-size: 15px;margin-top: 12px;border-bottom: 1px solid #f1f1f1;padding-bottom: 12px;font-weight: bold;">
													Document Footprint
												</h3>
											</div>
										</div>
    <div class="timelinebox">

        <?php 
            $entered        = [];
            $count          = 0;
           
            // $historydetails = ksort($historydetails);
            $historydetails = $historydetails->sortBy("created_at")->reverse();
            $s_count        = 1;
              
            foreach($historydetails as $hd) {
                $count = 0;
                $count += 1;
                // echo $hd->thedate."<br/>";
                if (!in_array( date("Y-m-d", strtotime($hd->created_at)), $entered)) {
                    echo "<div class='the_item_box border-t-1 border-b-1 border-r-1 border-l-1 p-2 mt-2'>";

                        if ($count <= 1) {
                            echo "<p class='strong_this border-b pb-2'> ".date("l - F d, Y", strtotime($hd->created_at))."</p>";
                        }
                    
                        // start row
                        if ($s_count == 1) {
                            echo "<div style='background: #ccf9c7;border-radius: 10px;margin-top: 8px;box-shadow: 0px 2px 4px #e4e3e3;'> <p style='padding: 13px 0px 0px 13px; font-weight: bold;'> Latest Update: </p>";
                        }

                        echo "<div class='row py-3 pl-3'>
                                <div class='col-md-3'>
                                    <p class='strong_this'>". date("h:i A", strtotime($hd->created_at)) ."</p>
                                </div>";

                            // start col-md-9
                            echo "<div class='col-md-9'>";

                                if (strlen($hd->action)>0) {
                                    echo "<div class='mb-3'> 
                                            <p class='strong_this'> Action: </p>
                                            <p> {$hd->action} </p>
                                        </div>";
                                }

                                if (strlen($hd->actionneeded)>0) {
                                    echo "<div class='mb-3'>  
                                            <p class='strong_this'> Actions: </p>
                                            <div>"; 
                                            echo "<span>".$hd->actionneeded."</span>";
                                    echo "  </div>
                                        </div>";
                                }

                                if (strlen($hd->remarks)>0) {
                                    echo "<div> 
                                            <p class='strong_this'> Remarks: </p>
                                            <p> {$hd->remarks} </p>
                                        </div>";
                                }

                            echo "</div>"; // end col-md-9

                        echo "</div>"; // end of row
                        
                        if ($s_count == 1) {
                            echo "</div>";
                        }

                    echo "</div>";
                } else {
                    // start row
                        echo "<div class='row py-3 pl-3'>
                                <div class='col-md-3'>
                                    <p class='strong_this'> ". date("h:i A", strtotime($hd->created_at)) ."</p>
                                </div>";

                            // start col-md-9
                            echo "<div class='col-md-9'>";

                                if (strlen($hd->action)>0) {
                                    echo "<div class='mb-3'> 
                                            <p class='strong_this'> Action: </p>
                                            <p> {$hd->action} </p>
                                        </div>";
                                }

                                if (strlen($hd->actionneeded)>0) {
                                    echo "<div class='mb-3'>  
                                            <p class='strong_this'> Actions: </p>
                                            <div>"; 
                                            echo "<span>".$hd->actionneeded."</span>";
                                    echo "  </div>
                                        </div>";
                                }

                                if (strlen($hd->remarks)>0) {
                                    echo "<div> 
                                            <p class='strong_this'> Remarks: </p>
                                            <p> {$hd->remarks} </p>
                                        </div>";
                                }
                                      
                            echo "</div>"; // end col-md-9

                        echo "</div>"; // end of row
                }
                array_push($entered, date("Y-m-d", strtotime($hd->created_at)));
                //var_dump($entered);
                $s_count++;
            }
        ?>

    </div>
</div>