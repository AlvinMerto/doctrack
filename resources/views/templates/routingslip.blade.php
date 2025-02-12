    <div id="the_document_details" style='width:100%;'>
        <div class='row'>
          <div class="col-md-9">
            <table class='table'>
              <tbody>
                <tr> 
                  <td> <h3> ROUTING SLIP </h3> </td>
                </tr>
                <tr> 
                  <th> Control Number: </th>
                  <td> <?php echo $document[0]->barcodenumber; ?> </td>
                </tr>
                <tr> 
                  <th> Date Received: </th>
                  <td> <?php echo date("F d, Y", strtotime($document[0]->created_at)); ?> @ <?php echo date("h:i A", strtotime($document[0]->created_at)); ?> <small> {{ \Carbon\Carbon::parse(date("F d, Y", strtotime($document[0]->created_at)))->diffForHumans() }} </small> </td>
                </tr>
                <tr> 
                  <th> Document Type: </th>
                  <td> <?php echo $document[0]->documentcat; ?> </td>
                </tr>
                <tr> 
                  <th> Subject: </th>
                  <td> <?php echo $document[0]->subject; ?> </td>
                </tr>
              </tbody>
            </table>
            <table class='table'>
              <thead>
                <tr> 
                  <th> DATE </th>
                  <th> FROM </th>
                  <th> TO </th>
                  <th> REMARKS </th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach($remarks as $r) { ?>
                    <tr>
                      <td> <?php echo date("F d, Y", strtotime($r->created_at)); ?> @ <?php echo date("h:i A", strtotime($r->created_at)); ?> </td>
                      <td> <?php echo $r->getRemarker->name; ?> </td>
                      <td> <?php echo $r->getTo->name; ?> </td>
                      <td> 
                        <?php 
                          if (strlen($r->actionneeded) > 0) {
                            echo $r->actionneeded; 
                          }

                          if (strlen($r->remarks) > 0) {
                            echo $r->remarks;
                          }
                          
                        ?> 
                      </td>
                    </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-3 pt-2">
            <input type="submit" value="Print" class="btn btn-primary" style="width:100%;"/>
          </div>
        </div>
      </div> 