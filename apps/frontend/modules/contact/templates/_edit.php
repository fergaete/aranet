<?php use_helper('Object', 'Javascript') ?>
  <td class="actionsCol">
    <ul>
        <li id="contactActionAdd"><?php echo link_to_remote(image_tag('/images/buttonAddRounded.gif', 'alt="'.__('Add new contact') .'"'), array(
            'url' => 'contact/minicreate?&class='.$class.'&oid='.$oid,
            'update' => 'newContact',
            'position' => 'before',
            'script' => 'true',
            'loading'  => "Element.show('indicator-contact')",
            'complete' => "Element.hide('indicator-contact')"
            )) ?></li>
         <li id="contactActionDel"><?php echo link_to_remote(image_tag('/images/buttonDelRounded.gif', 'alt="'.__('Delete this contact') .'"'), array(
            'url' => 'contact/deleteobject?id='.$contact->getId().'&class='.$class.'&oid='.$oid,
            'update' => 'contact_'.$index,
            'loading'  => "Element.show('indicator-contact')",
            'complete' => "Element.hide('indicator-contact')"
            )) ?></li>
    </ul>
  </td>
  <td class="leftColM"><label><?php echo ($index == 0) ? __('Contact person') : __('Aditional contact') ?></label></td>
  <td class="rightCol">
        <?php echo javascript_tag("function getContact".$index."(text, li){ $('contact[".$index."][id]').value = li.id; }") ?>
    <?php echo input_hidden_tag('contact['.$index.'][id]', $contact->getId()) ?>
    <?php echo input_auto_complete_tag('contact['.$index.'][name]', $contact,
        'contact/autocomplete',
        array('autocomplete' => 'off', 'class' => 'form-medium-text'),
        array('use_style'    => true,
        'after_update_element' => 'getContact' . $index
    )) ?>
    <label><?php echo __('Rol') ?></label>    
    <?php echo input_tag('contact['.$index.'][rol]', ($sf_params->get('contact['.$index.'][rol]') ? $sf_params->get('contact['.$index.'][rol]') : $contact->getContactRol()), 'class=form-small-text') ?>
  </td>
