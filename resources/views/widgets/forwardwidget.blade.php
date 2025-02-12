<div class=''>
    <div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text" style="font-size: 15px;margin-top: 12px;border-bottom: 1px solid #f1f1f1;padding-bottom: 12px;font-weight: bold;">
													Forward this document
												</h3>
											</div>
										</div>
    <div class="m-portlet m-portlet--full-height ">
									<!-- <div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Forward to
												</h3>
											</div>
										</div>
									</div> -->
									<div class="m-portlet__body">
										<div class="m-widget12">
											<div class="m-widget12__item mb-4">
												<span class="m-widget12__text1">
													Office / Division
													<br>
													<span>
														<select id="offices" name="offices" autocomplete="offices-name" class="font-13-it block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                                                <optgroup label = "Offices">
                                                                    <?php 
                                                                        foreach($office as $off) {
                                                                            echo "<option value='{$off->officeid}_{$off->offtype}'>{$off->officename}</option>";
                                                                        }
                                                                    ?>
                                                                </optgroup>
                                                                <?php if ($acct_type == "4") { ?>
                                                                    <optgroup label = "Divisions">
                                                                        <?php
                                                                            foreach($thedivision as $div) {
                                                                                echo "<option value='{$div->divisionid}_{$div->divtype}'>{$div->divisionname}</option>";
                                                                            }
                                                                        ?>
                                                                    </optgroup>
                                                                <?php } ?>

                                                                <!-- <optgroup label="All Employees">
                                                                    <option value=''> </option>
                                                                </optgroup> -->
                                                        </select>
													</span>
												</span>
                                            </div>
                                            <div class="m-widget12__item mb-4">
												<span class="m-widget12__text2">
													Name of Personnel
													<br>
													<span>
														<select id="personnel" name="personnel" autocomplete="personnel-name" 
                                                                style="min-width: 300px;"
                                                                class="font-13-it block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">

                                                        </select>
                                                        </span>
                                                    <span>
                                                        <button class="btn btn-accent m-btn m-btn--air m-btn--custom" id='addemployee'> Add </button>
                                                        <!-- <input type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom" value="Add"/> -->
                                                    </span>
												</span>
											</div>
											<div class="m-widget12__item mb-4">
												<span class="m-widget12__text1">
													Actions
													<br>
														<fieldset>
                                                            <div class="mt-6 space-y-6">
                                                                <div class="flex gap-3 mt-0">
                                                                <div class="flex h-6 shrink-0 items-center">
                                                                    <div class="group grid size-4 grid-cols-1">
                                                                        <input type='checkbox' name="f_appro_act" id='f_appro_act' value="For Appropriate Action"/>
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm/6 ml-1">
                                                                    <label for="f_appro_act" class="font-13-it text-gray-900">For Appropriate Action</label>
                                                                </div>
                                                            </div>

                                                            <div class="flex gap-3 mt-0">
                                                                <div class="flex h-6 shrink-0 items-center">
                                                                    <div class="group grid size-4 grid-cols-1">
                                                                        <input type='checkbox' name="f_info" id='f_info' value="For Information"/>
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm/6 ml-1">
                                                                    <label for="f_info" class="font-13-it text-gray-900">For Information</label>
                                                                </div>
                                                            </div>

                                                            <div class="flex gap-3 mt-0">
                                                                <div class="flex h-6 shrink-0 items-center">
                                                                    <div class="group grid size-4 grid-cols-1">
                                                                        <input type='checkbox' name="f_ref"  id='f_ref' value="For Reference"/>
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm/6 ml-1">
                                                                    <label for="f_ref" class="font-13-it text-gray-900">For Reference</label>
                                                                </div>
                                                            </div>

                                                            <div class="flex gap-3 mt-0">
                                                                <div class="flex h-6 shrink-0 items-center">
                                                                    <div class="group grid size-4 grid-cols-1">
                                                                        <input type='checkbox' name="f_gd" id='f_gd' value="For Guidance"/>
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm/6 ml-1">
                                                                    <label for="f_gd" class="font-13-it text-gray-900">For Guidance</label>
                                                                </div>
                                                            </div>

                                                            <div class="flex gap-3 mt-0">
                                                                <div class="flex h-6 shrink-0 items-center">
                                                                    <div class="group grid size-4 grid-cols-1">
                                                                        <input type='checkbox' name="f_rev_eval" id='f_rev_eval' value="For Review and Evaluation"/>
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm/6 ml-1">
                                                                    <label for="f_rev_eval" class="font-13-it text-gray-900">For Review and Evaluation</label>
                                                                </div>
                                                            </div>

                                                            <div class="flex gap-3 mt-0">
                                                                <div class="flex h-6 shrink-0 items-center">
                                                                    <div class="group grid size-4 grid-cols-1">
                                                                        <input type='checkbox' name="f_app_sig" id='f_app_sig' value="For Approval / Signature"/>
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm/6 ml-1">
                                                                    <label for="f_app_sig" class="font-13-it text-gray-900">For Approval / Signature</label>
                                                                </div>
                                                            </div>

                                                            <div class="flex gap-3 mt-0">
                                                                <div class="flex h-6 shrink-0 items-center">
                                                                    <div class="group grid size-4 grid-cols-1">
                                                                        <input type='checkbox' name="f_inst" id='f_inst' value="For Instruction"/>
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm/6 ml-1">
                                                                    <label for="f_inst" class="font-13-it text-gray-900">For Instruction</label>
                                                                </div>
                                                            </div>

                                                            <div class="flex gap-3 mt-0">
                                                                <div class="flex h-6 shrink-0 items-center">
                                                                    <div class="group grid size-4 grid-cols-1">
                                                                        <input type='checkbox' name="f_rev" id='f_rev' value="For Revision"/>
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm/6 ml-1">
                                                                    <label for="f_rev" class="font-13-it text-gray-900">For Revision</label>
                                                                </div>
                                                            </div>

                                                            <div class="flex gap-3 mt-0">
                                                                <div class="flex h-6 shrink-0 items-center">
                                                                    <div class="group grid size-4 grid-cols-1">
                                                                        <input type='checkbox' name="f_approved" id='f_approved' value="APPROVED"/>
                                                                    </div>
                                                                </div>
                                                                <div class="text-sm/6 ml-1">
                                                                    <label for="f_approved" class="font-13-it text-gray-900">APPROVED</label>
                                                                </div>
                                                            </div>

                                                            </div>
                                                        </fieldset>

												</span>
												<span class="m-widget12__text2">
													Recipients
													<br> <br>
														<ul id='recipients'> </ul>
												</span>
											</div>
											<div class="m-widget12__item">
												<div class="m-widget12__text2">
													<div class="m-widget12__desc">
														<span class="m-widget12__text1">
                                                            Additional Remarks
                                                            <br>
                                                        </span>
                                                        <textarea name="about" id="about" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
													</div>
													<br>
													<div class="m-widget12__progress">
														<input type="submit" id='senddocument' class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" value="Send Document"/>
                                                        <span class="loading_"> Please wait while the document is being forwarded. </span>
                                                    </div>
												</div>
											</div>
										</div>
									</div>
								</div>

</div>