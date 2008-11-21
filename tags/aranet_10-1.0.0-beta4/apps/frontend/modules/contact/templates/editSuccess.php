<?php use_helper('Object', 'Javascript') ?>
<?php if ($contact->isNew()) {
    $title = __('Add new contact');
} else {
    $title = __('Edit contact %1%', array('%1%' => $contact->__toString()));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('contact/update') ?>
<?php include_partial('edit_contact_form', array('contact' => $contact)) ?>
</form>
