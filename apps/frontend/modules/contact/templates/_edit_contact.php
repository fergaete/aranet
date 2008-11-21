<?php use_helper('Object', 'Javascript') ?>
    <table cellpadding="0" cellspacing="0" style="width: 100%; border: none; margin-left: -3px;">
         <tr>
           <td style="width: 33%; border: none; text-align: left;">
               <label><?php echo __('Name') ?></label>
               <?php echo input_auto_complete_tag('contact[0][name]', ($contact) ? $contact : $sf_params->get('contact_name'),
                    'contact/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-full-text'),
                    array('use_style'    => true)
                ) ?>
           </td>
           <td style="width: 33%; border: none; text-align: left;">
             <label><?php echo __('Email') ?></label>
             <?php echo input_tag('contact[0][email]', ($contact) ? $contact->getContactEmail() : $sf_params->get('contact_email'), 'size="20" class="form-full-text"') ?></td>
           <td style="width: 33%; border: none; text-align: left;">
             <label><?php echo __('Address') ?>
             <?php echo input_auto_complete_tag('contact[0][line1]', ($contact && $contact->getAddress()) ? $contact->getAddress()->getAddressLine1() : '',
                    'address/autocomplete',
                    array('autocomplete' => 'off', 'class' => 'form-full-text'),
                    array('use_style'    => true)
                    ) ?>
             </td>
         </tr>
         <tr>
           <td style="width: 33%; border: none; text-align: left;">
             <label><?php echo __('Phone') ?></label>
             <?php echo input_tag('contact[0][phone]', ($contact) ? $contact->getContactPhone() : $sf_params->get('contact_phone'), 'size="20" class="form-number-text"') ?>
           </td>
           <td style="width: 33%; border: none; text-align: left;">
             <label><?php echo __('Fax') ?></label>
             <?php echo input_tag('contact[0][fax]', ($contact) ? $contact->getContactFax() : $sf_params->get('contact_fax'), 'size="20" class="form-number-text"') ?>
           </td>
           <td style="width: 33%; border: none; text-align: left;">
             <label><?php echo __('Mobile') ?></label>
             <?php echo input_tag('contact[0][mobile]', ($contact) ? $contact->getContactMobile() : $sf_params->get('contact_mobile'), 'size="20" class="form-number-text"') ?>
           </td>
         </tr>
     </table>
