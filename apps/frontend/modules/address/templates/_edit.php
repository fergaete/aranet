<?php use_helper('Object', 'Javascript') ?>
<?php if (!isset($more) || $more) : ?>
  <td class="actionsCol">
    <ul>
        <li id="addressActionAdd"><?php echo link_to_remote(image_tag('/images/buttonAddRounded.gif', 'alt="'.__('Add new address') .'"'), array(
            'url' => 'address/create?index='.$index.'&class='.$class.'&oid='.$oid,
            'update' => 'newAddress',
            'position' => 'before',
            'script' => 'true',
            'loading'  => "Element.show('indicator-address')",
            'complete' => "Element.hide('indicator-address')"
            )) ?></li>
         <li id="addressActionDel"><?php echo link_to_remote(image_tag('/images/buttonDelRounded.gif', 'alt="'.__('Delete this address') .'"'), array(
            'url' => 'address/delete?id='.$address->getId().'&class='.$class.'&oid='.$oid,
            'update' => 'address_'.$index,
            'loading'  => "Element.show('indicator-address')",
            'complete' => "Element.hide('indicator-address')"
            )) ?></li>
    </ul>
  </td>
<?php endif ?>
  <td class="leftColM"><label><?php echo __('Address') ?></label>
        <?php echo select_tag('address['.$index.'][type]', options_for_select(array(
            'work' => __('Work'),
            'home' => __('Home')), ($sf_params->get('address['.$index.'][type]') ? $sf_params->get('address['.$index.'][type]') : $address->getAddressType()), 'include_blank=true'),
  array ('class' => 'form-tiny_combobox')) ?><br/><br/>
  <label><?php echo __('Default?') ?></label>
    <?php echo checkbox_tag('address['.$index.'][is_default]', 1, ($sf_params->get('address['.$index.'][is_default]') ? $sf_params->get('address['.$index.'][is_default]') : $address->getAddressIsDefault())) ?>
  </td>
  <td class="rightCol">
    <table>
        <tr>
            <td colspan="3">
                <?php //echo input_hidden_tag('address['.$index.'][id]', $address->getId()) ?>
                <label><?php echo __('Name') ?></label><br/>
                <?php echo input_tag('address['.$index.'][name]', $address->getAddressName(),
                    array('class' => 'form-text')) ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left">
                <label><?php echo __('Street') ?></label><br/>
                <?php echo input_auto_complete_tag('address['.$index.'][line1]', $address->getAddressLine1(),
                    'address/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-medium-text'),
                    array('use_style'    => true)
                ) ?>
                <?php echo object_input_tag($address, 'getAddressLine2', array(
                   'name' => 'address['.$index.'][line2]', 'class' => 'form-medium-text'
                       )) ?>
            </td>
        </tr>
        <tr>
           <td>
               <label><?php echo __('Code') ?></label><br/>
               <?php echo object_input_tag($address, 'getAddressPostalCode', array(
                   'name' => 'address['.$index.'][postal_code]', 'class' => 'form-tiny-text'
                       )) ?>
           </td>
           <td>
               <label><?php echo __('City') ?></label><br/>
               <?php echo object_input_tag($address, 'getAddressLocation', array(
                   'name' => 'address['.$index.'][location]', 'class' => 'form-medium-text'
                       )) ?>
           </td>
           <td>
               <label><?php echo __('State') ?></label><br/>
               <?php echo object_input_tag($address, 'getAddressState', array(
                   'name' => 'address['.$index.'][state]', 'class' => 'form-small-text'
                       )) ?>
           </td>
       </tr>
        <tr>
            <td colspan="3" style="text-align:left">
                <label><?php echo __('Country') ?></label>
                <?php echo select_country_tag('address['.$index.'][country]', $address->getAddressCountry(), array('include_blank' => true, 'class' => 'form-medium-text')) ?>
            </td>
        </tr>
    </table>
  </td>
