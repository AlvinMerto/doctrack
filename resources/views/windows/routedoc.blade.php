<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MinDA') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!--begin::Web font -->
		<script src="https://cdn.bootcss.com/webfont/1.6.16/webfontloader.js"></script>
		<script>
            WebFont.load({
                google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="{{asset('vendors')}}/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="{{asset('vendors')}}/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('demo')}}/demo3/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('app')}}/style/doctrack_style.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{asset('demo')}}/demo3/media/img/logo/favicon.ico" />
        <link rel="icon" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"/>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

<body class="font-sans antialiased">
    @if(Session::has('message'))
        <?php echo Session::get('message') ?>
    @endif
    <div class="m-grid__item m-grid__item--fluid m-wrapper " style="margin: 0px 65px;">
        <div class="m-subheader pl-0">
		    <div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title ">
			    		Data Entry
					</h3>
				</div>
			</div>
		</div>
        <div class="m-content">
            <form method = "post" action = "{{route('postentry')}}" accept-charset="utf-8" enctype="multipart/form-data">
			    @csrf
			<div class="row">
                <div class="col-xl-6 bg-white__ pt-3 pb-3">
                    
                        <div class="space-y-12">
                            <div class="pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="sm:col-span-4">
                                                <label for="datetoday" class="block text-sm/6 font-medium text-gray-900">Date Today</label>
                                                    <div class="mt-2">
                                                        <input type="date" name="datetoday" id="datetoday" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" style="padding: 15px 8px;">
                                                    </div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="sm:col-span-4">
                                                <label for="typeofdoc" class="block text-sm/6 font-medium text-gray-900">Type of Document</label>
                                                    <div class="mt-2">
                                                        <select name="typeofdoc" id="typeofdoc" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                                            <option value="internal"> External </option>
                                                        </select>
                                                    </div>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                    </div>

                                    <div class="sm:col-span-3 mt-3">
                                        <label for="briefer-number" class="block text-sm/6 font-medium text-gray-900">Briefer Number</label>
                                        <div class="mt-2">
                                            <input type="text" value="<?php echo $brnum; ?>" name="briefer-number" id="briefer-number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" disabled='disabled'>
                                    
                                    </div>

                                    <div class="sm:col-span-3 mt-3">
                                        <label for="barcode-number" class="block text-sm/6 font-medium text-gray-900">Barcode Number</label>
                                        <div class="mt-2">
                                            <input type="text" value="<?php echo $bcnum; ?>" name="barcode-number" id="barcode-number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" disabled='disabled'>
                                
                                    </div>

                                    <div class="col-span-full mt-3">
                                        <label for="about" class="block text-sm/6 font-medium text-gray-900">Subject / Description </label>
                                            <div class="mt-2">
                                                <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                                            </div>
                                        <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the document.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="pb-12 mt-3">
                            <!-- <h2 class="text-base/7 font-semibold text-gray-900">Office Information</h2> -->
                            <!-- <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p> -->

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- <div class="sm:col-span-3 mt-3">
                                    <label for="officeid" class="block text-sm/6 font-medium text-gray-900">Office</label>
                                    <select name="officeid" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        <option value='1'> PPPDO </option>
                                    </select>
                                </div> -->
                                <?php if ($isrecords) {?>
                                    <div id="office_division">
                                        <div class="sm:col-span-3 mt-3">
                                            <label for="offices" class="block text-sm/6 font-medium text-gray-900">From Office / Division</label>
                                            <select name='offices' id='offices' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                                <!-- <option value="1"> PRD </option> -->
                                                <optgroup label = "Offices"> 
                                                    <?php 
                                                        foreach($offices as $of) {
                                                            echo "<option value='{$of->officeid}'> {$of->officename} </option>";
                                                        }
                                                    ?>
                                                </optgroup>
                                                <optgroup label = "Divisions"> 
                                                    <?php 
                                                        foreach($division as $d) {
                                                            echo "<option value='{$d->divisionid}'>{$d->divisionname}</option>";
                                                        }
                                                    ?>
                                                </optgroup>
                                            </select>
                                    </div>

                                        <div class="sm:col-span-4 mt-3">
                                            <label for="personnel" class="block text-sm/6 font-medium text-gray-900">Document Owner</label>
                                            <div class="mt-2">
                                                <!-- <input id="documentowner" name="documentowner" type="text" autocomplete="documentowner" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"> -->
                                                <select name='personnel' id='personnel' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                
                                
                                <div id="external_entry">
                                <!-- external entry -->
                                    <div class="sm:col-span-4 mt-3">
                                        <label for="agencyfrom" class="block text-sm/6 font-medium text-gray-900">Agency From</label>
                                        <div class="mt-2">
                                            <input id="agencyfrom" name="agencyfrom" type="text" autocomplete="agencyfrom" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4 mt-3">
                                        <label for="sendersname" class="block text-sm/6 font-medium text-gray-900">Senders Name</label>
                                        <div class="mt-2">
                                            <input id="sendersname" name="sendersname" type="text" autocomplete="sendersname" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4 mt-3">
                                        <label for="sendersemail" class="block text-sm/6 font-medium text-gray-900"> Senders Email </label>
                                        <div class="mt-2">
                                            <input id="sendersemail" name="sendersemail" type="text" autocomplete="sendersemail" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4 mt-3">
                                        <label for="numberofcopy" class="block text-sm/6 font-medium text-gray-900"> Number of Copy </label>
                                        <div class="mt-2">
                                            <input id="numberofcopy" name="numberofcopy" type="text" autocomplete="numberofcopy" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4 mt-3">
                                        <label for="numberofpages" class="block text-sm/6 font-medium text-gray-900"> Number of Pages </label>
                                        <div class="mt-2">
                                            <input id="numberofpages" name="numberofpages" type="text" autocomplete="numberofpages" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                        </div>
                                    </div>
                                </div>

                                <div id="outgoing_div">
                                    <div class="sm:col-span-4 mt-3">
                                        <label for="toaddress" class="block text-sm/6 font-medium text-gray-900">To Address</label>
                                        <div class="mt-2">
                                            <input id="toaddress" name="toaddress" type="text" autocomplete="toaddress" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4 mt-3">
                                        <label for="towhom" class="block text-sm/6 font-medium text-gray-900">To Whom</label>
                                        <div class="mt-2">
                                            <input id="towhom" name="towhom" type="text" autocomplete="towhom" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4 mt-3">
                                        <label for="toemailaddr" class="block text-sm/6 font-medium text-gray-900">To Email Address</label>
                                        <div class="mt-2">
                                            <input id="toemailaddr" name="toemailaddr" type="text" autocomplete="toemailaddr" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4 mt-3">
                                        <label for="modeofrelease" class="block text-sm/6 font-medium text-gray-900"> Mode of Release </label>
                                        <div class="mt-2">
                                            <input id="modeofrelease" name="modeofrelease" type="text" autocomplete="modeofrelease" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                        </div>
                                    </div>
                                </div>

                                <!-- end of external entry -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 bg-white pt-3 pb-3" style="border-radius: 10px;">
                    <div class="sm:col-span-4 mt-3">
                        <label for="doccattype" class="block text-sm/6 font-medium text-gray-900">Document Category</label>
                            <div class="mt-2">
                                <input id="doccattype" name="doccattype" type="text" autocomplete="doccattype" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" style="padding:15px 8px;">
                            </div>
                    </div>

                    <div class="sm:col-span-3 mt-3">
                        <label for="priority_lvl" class="block text-sm/6 font-medium text-gray-900">Priority Level</label>
                            <select name='priority_lvl' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                <option value="high"> High Priority </option>
                                <option value="high"> Medium Priority </option>
                                <option value="high"> Low Priority </option>
                                <optgroup>
                                    <option value="confi"> Confidential </option>
                                </optgroup>
                            </select>
                    </div>

                    <div class="col-span-full mt-3">
                        <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Document File</label>
                        <input id="thefile" name="thefile" type="file">
                            <!-- <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm/6 text-gray-600">
                                        <label for="thefile" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file click here</span>
                                                
                                            <input id="thefile" name="thefile" type="file" class="sr-only">
                                        </label>
                                            
                                    </div>
                                        <p class="text-xs/5 text-gray-600">PDF</p>
                                </div>
                            </div> -->
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <input type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom" value="Save Document"/>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>