<x-app-layout>
    <div id='dialog_window'>
        <span id="display_here"></span>
    </div>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div>
								<h3 class="m-subheader__title ">
									{{ $websitename }}  
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
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
                            <div class="col-xl-12">
                                <div class="row m-row--full-height">
									<div class="col-sm-12 col-md-12 col-lg-12">
                                      <div class="col-xl-12_">
                                        <!--begin:: Widgets/Application Sales-->
                                        <div class="m-portlet m-portlet--full-height ">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <h3 class="m-portlet__head-text">
                                                            Documents Lists
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__head-tools">
                                                    <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                                        <li class="nav-item m-tabs__item">
                                                            <a class='nav-link m-tabs__link active tab_link tab_link_big'  data-toggle="tab" data-action="incomming" data-status='1'>
                                                                Documents
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
                                                                    <a class="nav-link m-tabs__link active all_docs" data-action="internal" data-status='1' data-toggle="tab" href="#m_widget11_tab1_content" role="tab">
                                                                        Internal
                                                                    </a>
                                                                </li>

                                                                <li class="nav-item m-tabs__item" id="theexternallink_needsaction">
                                                                    <a class="nav-link m-tabs__link all_docs" data-action="external" data-status='2' data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
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
