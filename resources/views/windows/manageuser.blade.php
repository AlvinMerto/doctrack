<x-app-layout>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Update Information </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="showwidgethere"> </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="savechanges">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="m-portlet m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        <i class="la la-user"></i> Unmanaged Accounts
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body pt-0">
                            <table class='table'>
                                <thead>
                                    <th> Name </th>
                                    <th> Email Address </th>
                                    <th> <i class="la la-edit"> </i> </th>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $u) { ?>
                                        <?php if(!isset($u->getprofile->personnelid)) { ?>
                                            <tr> 
                                                <td> <?php echo $u->name; ?> </td>
                                                <td> <?php echo $u->email; ?> </td>
                                                <td> 
                                                    <a href='' class='edit' data-uid = '<?php echo $u->id; ?>' data-toggle="modal" data-target="#exampleModal"><small> edit </small> </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="m-portlet m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        <i class="la la-user"></i> Manage User
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body pt-0">
                            <table class='table'>
                                <thead>
                                    <th> Name </th>
                                    <th> Email Address </th>
                                    <th> Division </th>
                                    <th> Office </th>
                                    <th> Focal Person? </th>
                                    <th> <i class="la la-edit"> </i> </th>
                                </thead>
                                <tbody>
                                    <?php foreach($collection as $c) { ?>
                                        <tr> 
                                            <td> <?php echo $c->getUsers->name; ?> </td>
                                            <td> <?php echo $c->getUsers->email; ?> </td>
                                            <td> 
                                                <?php 
                                                    if (isset($c->getdivs->divisionname)) {
                                                        echo $c->getdivs->divisionname; 
                                                    }
                                                ?>
                                            </td>
                                            <td> 
                                                <?php echo $c->offtype->officename; ?> 
                                            </td>
                                            <td> 
                                                <?php 
                                                    if ($c->levelofaccess == 1) {
                                                        echo "Focal";
                                                    } else {
                                                        echo "Not Focal";
                                                    }
                                                ?> 
                                            </td>
                                            <td> 
                                                <a href='' class='edit' data-uid = '<?php echo $c->getUsers->id; ?>' data-toggle="modal" data-target="#exampleModal"><small> edit </small> </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            
        </script>
</x-app-layout>