<div class='inside_window p-25 m-portlet m-portlet--full-height m-portlet--fit '>
    
    <div class="m-portlet--full-height m-portlet--fit font-13-it">
									<div class="m-portlet__head pr-0 pl-0">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													<!-- Document Details -->
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active getwindow font-13-it" data-toggle="tab" data-displayto='details_div' data-getwhat="docdetails" href="#m_widget4_tab1_content" role="tab" aria-expanded="true">
														Details
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link getwindow font-13-it" data-getwhat="dochistory" data-displayto='history_div' data-toggle="tab" href="#m_widget4_tab2_content" role="tab" aria-expanded="false">
														Updates
													</a>
												</li>
												
												<?php if ($acct_type == "1") { ?>
													<li class="nav-item m-tabs__item">
														<a class="nav-link m-tabs__link getwindow font-13-it" data-toggle="tab" data-getwhat="docforward" data-displayto='forward_div' href="#m_widget4_tab3_content" role="tab" aria-expanded="false">
															<i class="la la-mail-forward"> </i> Forward
														</a>
													</li>
												<?php } ?>

                                                <li class="nav-item m-tabs__item">
													<i class="nav-link m-tabs__link close_window la la-remove font-13-it"></i>
                                                </li>
											</ul>
										</div>
									</div>
									<div class="m-portlet__body_">
										<div class="tab-content">
											<div style="border-bottom: 1px solid #efefef;padding: 0px 0px; background: #fff;">
												<ul class="mini-navigation">
													<?php if ($acct_type == "1") { ?>
														<li>
															<i class="la la-edit"> </i> Edit
														</li>
													<?php } ?>
													<li>
														<i class="la la-paperclip"> </i> 
														<label for="thefile" style="margin:0px;"> Attach a file 
															<form enctype="multipart/form-data" id="autoupload">
																<input type="file" style="display:none;" id='thefile' name="thefile"/> 
															</form>
															<span id='uploadingtext'> uploading... </span>
														</label>
													</li>
													<!-- <li class="nav-item m-tabs__item">
														<a class="m-tabs__link getwindow font-13-it" data-toggle="tab" data-getwhat="docforward" data-displayto='forward_div' href="#m_widget4_tab3_content" role="tab" aria-expanded="false">
														  	<i class="la la-mail-forward"> </i> Forward 
														</a>
													</li>  -->
													<li style="position:relative;">
														<i class="la la-plus"> </i> <span id="provideupdate"> Provide Update </span>
														<div class="m-widget12__item updatediv" id="updatediv">
															<div class="m-widget12__text2">
																<div class="m-widget12__desc">
																	<span class="m-widget12__text1">
																		Please provide an update to the document
																		<br>
																	</span>
																	<textarea name="updatebox" id="updatebox" style="margin-top: 11px; border: 1px solid #eaeaea;" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
																	<label  style="margin-top: 10px;"> <input type='checkbox' id='completedcheck'/> check to mark your part as completed  </label>
																</div>
																<div class="m-widget12__progress">
																	<br/>
																	<input type="submit" id="provideupdate_btn" class="btn btn-accent m-btn m-btn--custom m-btn--icon" value="Provide Update">
																	<a class="close_this_window" data-window="updatediv" style="background: none !important; font-size: 13px !important; margin-left: 20px;" > Exit </a>
																</div>
															</div>
														</div>
													</li>
													<!-- <li id="signthis_document">
														<i class="la la-pencil"> </i> Sign this Document
													</li> -->
												</ul>
											</div>
											<div class="tab-pane active" id="m_widget4_tab1_content">
												<!-- <div class="m-widget12 m-widget12--chart-bottom m--margin-top-10"> -->
                                                    <span id="details_div"> <span> Loading window...</span> </span>
												<!-- </div> -->
											</div>
											<div class="tab-pane" id="m_widget4_tab2_content">
                                                <span id="history_div"> <span> Loading window...</span> </span>
                                            </div>
                                            <div class="tab-pane" id="m_widget4_tab3_content">
                                                <span id="forward_div"> <span> Loading window...</span> </span>
                                            </div>
										</div>
									</div>
									<!-- <div class="m-portlet__footer">
										<div class="range_inputs" style="text-align: right;">
											<a href="#"> Edit </a>
											<button class="applyBtn btn btn-sm btn-success" id="completebtn" style="border-radius: 99px;font-size: 13px;" type="button">Complete the Route</button> 
										</div>
									</div> -->
								</div>

</div>
