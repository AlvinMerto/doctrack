<x-app-layout>
    <div id='dialog_window'>
        <span id="display_here"></span>
    </div>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									Dashboard
								</h3>
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
						<!--Begin::Main Portlet-->
						<div class="row">
							<div class="col-xl-4">
								<!--begin:: Widgets/Quick Stats-->
								<div class="row m-row--full-height">
									<div class="col-sm-4 col-md-4 col-lg-4">
										<div class="m-portlet m-portlet--border-bottom-brand m-portlet--border-bottom-success">
											<div class="m-portlet__body">
												<div class="m-widget26">
													<div class="m-widget26__number">
														570
														<small>
															Needs Action
														</small>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
										<div class="m-portlet m-portlet--border-bottom-brand m-portlet--border-bottom-danger">
											<div class="m-portlet__body">
												<div class="m-widget26">
													<div class="m-widget26__number">
														570
														<small>
															Overdue
														</small>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
										<div class="m-portlet">
											<div class="m-portlet__body">
												<div class="m-widget26">
													<div class="m-widget26__number">
														570
														<small>
															Confidential
														</small>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    <!-- <div class="col-sm-4 col-md-4 col-lg-4">
										<div class="m-portlet m-portlet--border-bottom-brand">
											<div class="m-portlet__body">
												<div class="m-widget26">
													<div class="m-widget26__number">
														570
														<small>
															Needs Action
														</small>
													</div>
												</div>
											</div>
										</div>
									</div> -->
                            	</div>
								<!--end:: Widgets/Quick Stats-->
							</div>
                            <div class="col-xl-8">
                                <div class="row m-row--full-height">
									<div class="col-sm-12 col-md-12 col-lg-12">
                                      <div class="col-xl-12">
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
                                                            <!-- <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab"> -->
                                                            <a class='nav-link m-tabs__link active tab_link tab_link_big' data-action="needsaction">
                                                                Incoming
                                                            </a>
                                                        </li>
                                                        <li class="nav-item m-tabs__item">
                                                            <!-- <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab"> -->
                                                            <a class='nav-link m-tabs__link tab_link tab_link_big' data-action="needsaction">
                                                                Needs Action
                                                            </a>
                                                        </li>
                                                        <li class="nav-item m-tabs__item">
                                                            <!-- <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab"> -->
                                                            <a class=' nav-link m-tabs__link tab_link tab_link_big' data-action="overdue">
                                                                Overdue
                                                            </a>
                                                        </li>
                                                        <li class="nav-item m-tabs__item">
                                                            <!-- <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab"> -->
                                                            <a class='nav-link m-tabs__link tab_link tab_link_big' data-action="confi">
                                                                Confidential
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
                                                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab">
                                                                        Internal
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
                                                                        External
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
                                                                        Confidential
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <!--begin::Widget 11-->
                                                        <div class="m-widget11">
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table class="table">
                                                                    <!--begin::Thead-->
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="m-widget11__label">
                                                                                #
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
                                                                                Last Status
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
                                                                <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">
                                                                    Generate Report
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!--end::Widget 11-->
                                                    </div>
                                                    <div class="tab-pane" id="m_widget11_tab2_content">
                                                        <!--begin::Widget 11-->
                                                        <div class="m-widget11">
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table class="table">
                                                                    <!--begin::Thead-->
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="m-widget11__label">
                                                                                #
                                                                            </td>
                                                                            <td class="m-widget11__app">
                                                                                Application
                                                                            </td>
                                                                            <td class="m-widget11__sales">
                                                                                Sales
                                                                            </td>
                                                                            <td class="m-widget11__change">
                                                                                Change
                                                                            </td>
                                                                            <td class="m-widget11__price">
                                                                                Avg Price
                                                                            </td>
                                                                            <td class="m-widget11__total m--align-right">
                                                                                Total
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <!--end::Thead-->
                                    <!--begin::Tbody-->
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                                                    <input type="checkbox">
                                                                                    <span></span>
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <span class="m-widget11__title">
                                                                                    Loop
                                                                                </span>
                                                                                <span class="m-widget11__sub">
                                                                                    CRM System
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                19,200
                                                                            </td>
                                                                            <td>
                                                                                <div class="m-widget11__chart" style="height:50px; width: 100px">
                                                                                    <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                                                                    <canvas id="m_chart_sales_by_apps_2_1" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                $63
                                                                            </td>
                                                                            <td class="m--align-right m--font-brand">
                                                                                $34,740
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                                                    <input type="checkbox">
                                                                                    <span></span>
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <span class="m-widget11__title">
                                                                                    Selto
                                                                                </span>
                                                                                <span class="m-widget11__sub">
                                                                                    Powerful Website Builder
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                24,310
                                                                            </td>
                                                                            <td>
                                                                                <div class="m-widget11__chart" style="height:50px; width: 100px">
                                                                                    <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                                                                    <canvas id="m_chart_sales_by_apps_2_2" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                $39
                                                                            </td>
                                                                            <td class="m--align-right m--font-brand">
                                                                                $46,010
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                                                    <input type="checkbox">
                                                                                    <span></span>
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <span class="m-widget11__title">
                                                                                    Jippo
                                                                                </span>
                                                                                <span class="m-widget11__sub">
                                                                                    The Best Selling App
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                9,076
                                                                            </td>
                                                                            <td>
                                                                                <div class="m-widget11__chart" style="height:50px; width: 100px">
                                                                                    <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                                                                    <canvas id="m_chart_sales_by_apps_2_3" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                $105
                                                                            </td>
                                                                            <td class="m--align-right m--font-brand">
                                                                                $67,800
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                                                    <input type="checkbox">
                                                                                    <span></span>
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <span class="m-widget11__title">
                                                                                    Verto
                                                                                </span>
                                                                                <span class="m-widget11__sub">
                                                                                    Web Development Tool
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                11,094
                                                                            </td>
                                                                            <td>
                                                                                <div class="m-widget11__chart" style="height:50px; width: 100px">
                                                                                    <iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                                                                    <canvas id="m_chart_sales_by_apps_2_4" style="display: block; width: 0px; height: 0px;" height="0" width="0"></canvas>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                $16
                                                                            </td>
                                                                            <td class="m--align-right m--font-brand">
                                                                                $18,520
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <!--end::Tbody-->
                                                                </table>
                                                                <!--end::Table-->
                                                            </div>
                                                            <div class="m-widget11__action m--align-right">
                                                                <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--hover-brand">
                                                                    Generate Report
                                                                </button>
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
