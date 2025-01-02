<div>
<?php 
  // var_dump($document); 
  // details
?>
  <div class="mt-0 border-gray-100">
                    <div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text" style="font-size: 15px;margin-top: 12px;border-bottom: 1px solid #f1f1f1;padding-bottom: 12px;font-weight: bold;">
													Document Details
												</h3>
											</div>
										</div>
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900 font-13-it_">Document Owner</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0 font-13-it"><?php echo $owner; ?></dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900 font-13-it_">Subject / Description</dt>
        <dd class="mt-1 text-sm/9 text-gray-900 sm:col-span-2 sm:mt-0 font-18-it"><?php echo $document[0]->subject; ?></dd>
      </div>

      <?php if ($remarks = false) { ?>
        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm/6 font-medium text-gray-900 font-13-it_">Status</dt>
          <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
              <span> <?php echo $remarks->action; ?> </span>
              <?php if(strlen($remarks->getUser->name)>0) { ?>
                <br/><br/>
                <span class="m-badge m-badge--danger m-badge--wide"> Note from <?php echo $remarks->getUser->name; ?>: <?php echo $remarks->remarks; ?> </span>
              <?php } ?>
          </dd>
        </div>
        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm/6 font-medium text-gray-900">Date and Time forwarded</dt>
          <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
              <span> <?php echo date("F d, Y", strtotime($remarks->created_at)); ?> @ <?php echo date("h:i A", strtotime($remarks->created_at)); ?> </span>
              <br/>
          </dd>
        </div>
      <?php } ?>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900 font-13-it_">From Office and Division</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0 font-13-it"><?php echo $office." - ".$division; ?></dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900 font-13-it_">Briefer Number</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0 font-13-it"><?php echo $document[0]->briefernumber; ?></dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900 font-13-it_">Barcode Number</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0 font-13-it"> <?php echo $document[0]->barcodenumber; ?>  </dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900 font-13-it_">Document category or type</dt>
        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0 font-13-it"><?php echo $document[0]->documentcat; ?></dd>
      </div>
      <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-900 font-13-it_">Attachments</dt>
        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
          <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
            <?php if (count($files) > 0) { ?>
              <?Php foreach($files as $f) {?>
                <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm/6">
                  <div class="flex w-0 flex-1 items-center">
                    <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                      <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z" clip-rule="evenodd" />
                    </svg>
                    <div class="ml-4 flex min-w-0 flex-1 gap-2">
                      <span class="truncate font-medium"><?php echo $f->thefile; ?></span>
                      <span class="shrink-0 text-gray-400">2.4mb</span>
                    </div>
                  </div>
                  <div class="ml-4 shrink-0">
                    <a href="<?php echo asset("storage/public/attachments/".$f->thefile); ?>" class="font-medium text-indigo-600 hover:text-indigo-500" target="_blank"> View </a> 
                  </div>
                </li>
              <?php } ?>
            <?php } else { ?>
              <li> <i> no attached file </i> </li>
            <?php } ?>
          </ul>
        </dd>
      </div>

    </dl>
  </div>
</div>
