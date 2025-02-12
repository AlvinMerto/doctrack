<x-app-layout>
    <div class="m-content">
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <i class="la la-list-alt"></i>  Documents Lists
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active tab_link tab_link_big" data-accttype="1" data-toggle="tab" data-action="incomming" data-status="1">
                                        Incoming
                                    </a>
                                </li>
                                                        
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link tab_link tab_link_big" data-accttype="1" data-toggle="tab" data-action="needsaction" data-status="none">
                                        Unrouted
                                    </a>
                                </li>
                               
                                <li class="nav-item m-tabs__item">
                                    <a class=" nav-link m-tabs__link tab_link tab_link_big" data-accttype="1" data-toggle="tab" data-action="inprocess" data-status="1">
                                         On-Progress
                                    </a>
                                </li>
                                <li> &nbsp; </li>
                                <li>
                                    <div class="mr-auto">
                                        <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                                            <span class="m-subheader__daterange-label">
                                                <span class="m-subheader__daterange-title"></span>
                                                <span class="m-subheader__daterange-date m--font-brand">Nov 30 - Dec 6</span>
                                            </span>
                                            <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                <i class="la la-angle-down"></i>
                                            </a>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body" style="padding-top:0px;">
                        <table class='table'>
                            <thead>
                                <th> Tracking Number </th>
                                <!-- <th> Trail </th> -->
                                <th> Sender </th>
                                <th> Subject </th>
                                <!-- <th> Instructions from the Chairperson </th>
                                <th> Date & Time received by OED </th>
                                <th> Instructions from the Executive Director  </th>
                                <th> Forwarded to </th>
                                <th> Date/Time Released </th>
                                <th> Status/action taken </th> -->
                            </thead>
                            <tbody>
                                <?php if ($collection->count() > 0) { ?>
                                    <?php foreach($collection as $c) { ?>
                                        <tr> 
                                            <td> <?php echo $c->getdocs->briefernumber; ?> &nbsp; <i class='la la-arrow-circle-right'> </i> </td>
                                            <!-- <td>  &nbsp; </td> -->
                                            <td> <?php echo $c->sendersname; ?> </td>
                                            <td> <?php echo $c->subject; ?> </td>
                                            <!-- <td> &nbsp; </td>
                                            <td> &nbsp; </td>
                                            <td> &nbsp; </td>
                                            <td> &nbsp; </td>
                                            <td> &nbsp; </td>
                                            <td> &nbsp; </td> -->
                                        </tr>

                                        <?php foreach($c->get_footprint as $gf) { ?>
                                            <!-- <tr> 
                                                <td> <?php // echo $gf->fromuserid; ?> </td>
                                            </tr> -->
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>