<x-app-layout>
    <div id='dialog_window'>
        <span id="display_here"></span>
    </div>
    <input type='hidden' id='accttype' value='<?php echo $accttype; ?>'/>
    <input type="hidden" id="loa" value='<?php echo $levelofaccess; ?>'/>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div>
								<h3 class="m-subheader__title ">
									Dashboard  
								</h3>
							</div>
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
							<div>
								<a href="{{route('entrycontro.entry')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
									<span>
										<i class="la la-plus"></i>
                                        <span>
                                            Start Tracking
                                        </span>
									</span>
								</a>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
                            <div class="col-xl-3">
								<div class="row m-row--full-height">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="col-xl-12_">
                                            <div class="m-portlet m-portlet--full-height ">
                                                <div class="m-portlet__head">
                                                    <div class="m-portlet__head-caption">
                                                        <div class="m-portlet__head-title">
                                                            <h3 class="m-portlet__head-text">
                                                                <i class="la la-bookmark-o"></i> Bookmarks
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span id="bookmarkslist"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>

                            <div class="col-xl-9">
                                <div class="row m-row--full-height">
									<div class="col-sm-12 col-md-12 col-lg-12">
                                      <div class="col-xl-12_">
                                        <!--begin:: Widgets/Application Sales-->
                                        <div class="m-portlet m-portlet--full-height ">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <h3 class="m-portlet__head-text">
                                                            <i class='la la-list-alt'></i>  Documents Lists
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__head-tools">
                                                    <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                                        <li class="nav-item m-tabs__item">
                                                            <a class='nav-link m-tabs__link active tab_link tab_link_big' data-accttype='<?php echo $accttype; ?>' data-toggle="tab" data-action="incomming" data-status='1'>
                                                                Incoming
                                                            </a>
                                                        </li>
                                                        
                                                        <?php if ($accttype == 1) { ?>
                                                            <li class="nav-item m-tabs__item">
                                                                <a class='nav-link m-tabs__link tab_link tab_link_big' data-accttype='<?php echo $accttype; ?>' data-toggle="tab" data-action="needsaction" data-status='none'>
                                                                    Unrouted
                                                                </a>
                                                            </li>
                                                        <?php } ?>

                                                        <!-- <li class="nav-item m-tabs__item">
                                                            <a class=' nav-link m-tabs__link tab_link tab_link_big' data-accttype='<?php // echo $accttype; ?>' data-toggle="tab" data-action="overdue" data-status='1'>
                                                                Overdue
                                                            </a>
                                                        </li> -->

                                                        <li class="nav-item m-tabs__item">
                                                            <a class=' nav-link m-tabs__link tab_link tab_link_big' data-accttype='<?php echo $accttype; ?>' data-toggle="tab" data-action="inprocess" data-status='1'>
                                                                On-Progress
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="m_widget11_tab1_content">

                                                        <div class="m-portlet__head-tools">
                                                            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link active small_link_click" data-action="incomming" data-status='1' data-toggle="tab" href="#m_widget11_tab1_content" role="tab">
                                                                        Internal
                                                                    </a>
                                                                </li>

                                                                    <li class="nav-item m-tabs__item" id="theexternallink_needsaction">
                                                                        <a class="nav-link m-tabs__link small_link_click" data-action="external" data-status='2' data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
                                                                            External
                                                                        </a>
                                                                    </li>

                                                                <!-- <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
                                                                        Confidential
                                                                    </a>
                                                                </li> -->
                                                            </ul>
                                                        </div>

                                                        <!--begin::Widget 11-->
                                                        <div class="m-widget11">
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table class="table" id="documents_list_table">
                                                                    <!--begin::Thead-->
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="m-widget11__label">
                                                                                <i class='la la-bookmark-o'></i>
                                                                            </td>
                                                                            <td class="m-widget11__app">
                                                                                Document
                                                                            </td>
                                                                            <td class="m-widget11__sales">
                                                                                Maturity
                                                                            </td>
                                                                            <td class="m-widget11__change">
                                                                                Date Started
                                                                            </td>
                                                                            <td class="m-widget11__price">
                                                                                Latest Update
                                                                            </td>
                                                                            <td class="m-widget11__total m--align-right">
                                                                                Priority
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <!--end::Thead-->
                                    <!--begin::Tbody-->
                                                                    <tbody id='docslist'>
                                                                        
                                                                    </tbody>
                                                                    <!--end::Tbody-->
                                                                </table>
                                                                <!--end::Table-->
                                                            </div>
                                                            <div class="m-widget11__action m--align-right">
                                                                <!-- <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">
                                                                    Generate Report
                                                                </button> -->
                                                            </div>
                                                        </div>
                                                        <!--end::Widget 11-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end:: Widgets/Application Sales-->
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
							
</x-app-layout>
