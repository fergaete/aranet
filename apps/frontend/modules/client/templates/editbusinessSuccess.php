<div class="popUpWindow" onClick="this.hide()">
<?php echo form_tag('client/updatebusiness', 'name=updatebusiness') ?>
<?php echo input_tag('kind_of_business_title', __('Add business type...'), 'class=form-small-text') ?>
<?php echo link_to(image_tag("buttonAdd.gif", array('alt' => "Add business type", 'align' => 'top')), 'javascript:document.updatebusiness.submit()', array('style' => "padding:2px;")) ?>
<div id="businessList">
<ul>
<li>
<?php foreach ($business as $busi) : ?>
<li><?php echo link_to(image_tag("button_editSmall.gif", 'alt="Edit business"'), 'hfh') ?>
    <?php echo link_to(image_tag("button_deleteSmall.gif", 'alt="Delete business"'), 'hfh') ?>
    <?php echo $busi->getKindOfCompanyTitle() ?>
</li>
<?php endforeach ?>
</ul>
</div>
</form>
</div>