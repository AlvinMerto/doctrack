<x-app-layout>
    <div class="m-grid__item m-grid__item--fluid m-wrapper ">
        <div class="m-subheader ">
		    <div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title ">
			    		Data Entry
					</h3>
				</div>
				<!-- <div>
					<a href="{{route('entrycontro.entry')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
						<span>
							<i class="la la-plus"></i>
                            <span>
                                Start Tracking
                            </span>
		    			</span>
					</a>
				</div> -->
			</div>
		</div>
        <div class="m-content">
			<div class="row_">
                <div class="col-xl-6 bg-white pt-3 pb-3">
                    <form method = "post" action = "{{route('postentry')}}" accept-charset="utf-8" enctype="multipart/form-data">
						@csrf
                        <div class="space-y-12">
                            <div class="pb-12">

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="sm:col-span-4">
                                            <label for="datetoday" class="block text-sm/6 font-medium text-gray-900">Date Today</label>
                                                <div class="mt-2">
                                                    <input type="date" name="datetoday" id="datetoday" class="block flex-1 border-1 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm/6" placeholder="janesmith">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="sm:col-span-4">
                                            <label for="typeofdoc" class="block text-sm/6 font-medium text-gray-900">Type of Document</label>
                                                <div class="mt-2">
                                                    <select name="typeofdoc" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                                        <option value="internal"> Internal </option>
                                                        <option value="external"> External </option>
                                                        <option value="outgoing"> Outgoing </option>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-3 mt-3">
                                    <label for="briefer-number" class="block text-sm/6 font-medium text-gray-900">Briefer Number</label>
                                    <div class="mt-2">
                                        <input type="text" name="briefer-number" id="briefer-number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3 mt-3">
                                    <label for="barcode-number" class="block text-sm/6 font-medium text-gray-900">Barcode Number</label>
                                    <div class="mt-2">
                                        <input type="text" name="barcode-number" id="barcode-number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                    </div>
                                </div>

                                <div class="col-span-full mt-3">
                                    <label for="about" class="block text-sm/6 font-medium text-gray-900">Subject / Description </label>
                                        <div class="mt-2">
                                            <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                                        </div>
                                    <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the document.</p>
                                </div>

                                <div class="col-span-full mt-3">
                                    <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Document</label>
                                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                        <div class="text-center">
                                        <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm/6 text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file click here</span>
                                            
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                            </label>
                                            
                                        </div>
                                        <p class="text-xs/5 text-gray-600">PNG, JPG, PDF</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="pb-12 mt-3">
                            <!-- <h2 class="text-base/7 font-semibold text-gray-900">Office Information</h2> -->
                            <!-- <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p> -->

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3 mt-3">
                                    <label for="officeid" class="block text-sm/6 font-medium text-gray-900">Office</label>
                                    <select name="officeid" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value='1'> PPPDO </option>
                                    </select>
                                </div>

                                <div class="sm:col-span-3 mt-3">
                                    <label for="divisionid" class="block text-sm/6 font-medium text-gray-900">Division</label>
                                    <select name='divisionid' class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value="1"> PRD </option>
                                    </select>
                                </div>

                                <div class="sm:col-span-4 mt-3">
                                    <label for="documentowner" class="block text-sm/6 font-medium text-gray-900">Document Owner</label>
                                    <div class="mt-2">
                                        <input id="documentowner" name="documentowner" type="text" autocomplete="documentowner" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                    </div>
                                </div>

                                <div class="sm:col-span-4 mt-3">
                                    <label for="doccattype" class="block text-sm/6 font-medium text-gray-900">Document Category</label>
                                    <div class="mt-2">
                                        <input id="doccattype" name="doccattype" type="text" autocomplete="doccattype" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                    </div>
                                </div>

                                 <div class="sm:col-span-3 mt-3">
                                    <label for="priority_lvl" class="block text-sm/6 font-medium text-gray-900">Priority Level</label>
                                    <select name='priority_lvl' class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value="high"> High Priority </option>
                                    </select>
                                </div>

                            </div>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <input type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom" value="Save Document"/>
                            </div>
                            
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>