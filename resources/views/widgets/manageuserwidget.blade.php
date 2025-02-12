
<div id="division_select" class='mb-3'>
    <p> Division </p>
    <select name="divisionselect" class=" block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
        <option value='0'> -- Select </option>
        <?php foreach($divs as $d) { ?>
            <?Php if ($d->divisionid == $collection[0]->divisionid) { ?>
                <option selected="selected" value="<?php echo $collection[0]->divisionid; ?>"> <?php echo $d->divisionname; ?> </option>
            <?php } else { ?>
                <option value="<?php echo $d->divisionid; ?>"> <?php echo $d->divisionname; ?> </option>
            <?php } ?>
        <?php } ?>
    </select>
</div>

<div id="office_select" class='mb-3'>
    <p> Office </p>
    <select name="officeselect" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
        <option value='0'> -- Select </option>
        <?php foreach($offs as $o) { ?>
            <?php if ($o->officeid == $collection[0]->officeid) { ?>
                <option  selected="selected" value="<?php echo $collection[0]->officeid."_".$o->offtype; ?>" > <?php echo $o->officename; ?> </option>
            <?php } else {?>
                <option value="<?php echo $o->officeid."_".$o->offtype; ?>" > <?php echo $o->officename; ?> </option>
            <?php } ?>
        <?php } ?>
    </select>
</div>

<div id="role_select" class='mb-3'>
    <p> Assigned Role </p>
    <select name="assignedrole" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
        <?php if ($collection[0]->levelofaccess == 1) { ?>
            <option selected ="selected" value="1"> Focal </option>
            <option value="0"> Not Focal </option>
        <?php } else { ?>
            <option value="1"> Focal </option>
            <option selected = "selected" value="0"> Not Focal </option>
        <?php } ?>
    </select>
</div>