<?php use_helper('Object', 'Javascript') ?>
<?php if ($sf_guard_user_profile->isNew()) {
    $title = __('Add new member');
} else {
    $title = __('Edit member %1%', array('%1%' => $sf_guard_user_profile));
} ?>
<?php aranet_title($title) ?>
<div class="windowHead"><span class="windowHeadTitle"><?php echo $title ?></span>
<div class="windowControls"></div>
</div>

<?php echo form_tag('user/update') ?>

<?php echo object_input_hidden_tag($sf_guard_user_profile, 'getId') ?>

<table class="gridTable">
<tbody>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Username') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('username') ?>
      <?php echo input_tag('username', ($sf_guard_user_profile->getUserId()) ? $sf_guard_user_profile->getsfGuardUserRelatedByUserId()->getUsername() : $sf_params->get('username'), array("size" => "128", "class" => "form-text")) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Password') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('passwd') ?>
      <?php echo input_password_tag('passwd', "", array("size" => "30", "class" => "form-text")) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Repeat password') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('passwd2') ?>
      <?php echo input_password_tag('passwd2', "", array("size" => "30", "class" => "form-text")) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label class="required"><?php echo __('Email') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('email') ?>
    <?php echo object_input_tag($sf_guard_user_profile, 'getEmail', array (
  'size' => 80, 'class' => 'form-text'
)) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Company') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('company') ?>
    <?php echo object_input_tag($sf_guard_user_profile, 'getCompany', array ('size' => 80, 'class' => 'form-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Full name') ?></label></td>
  <td class="rightCol">
      <?php echo form_error('title') ?>
      <?php echo form_error('first_name') ?>
      <?php echo form_error('last_name') ?>
      <table>
         <tr>
           <td>
                <label><?php echo __('Salutation') ?></label><br/>
                <?php echo object_input_tag($sf_guard_user_profile, 'getTitle', array ('size' => 4, 'class' => 'form-tiny-text')) ?>
           </td>
           <td>
                <label><?php echo __('First name') ?></label><br/>
                <?php echo object_input_tag($sf_guard_user_profile, 'getFirstName', array ('size' => 50, 'class' => 'form-medium-text')) ?>
           </td>
           <td>
                <label><?php echo __('Last name') ?></label><br/>
                <?php echo object_input_tag($sf_guard_user_profile, 'getLastName', array ('size' => 100, 'class' => 'form-medium-text')) ?>
           </td>
         </tr>
       </table>
   </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Birthday') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('birthday') ?>
    <?php echo object_input_date_tag($sf_guard_user_profile, 'getBirthday', array ('rich' => true, 'class' => 'form-date')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Url') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('url') ?>  
    <?php echo object_input_tag($sf_guard_user_profile, 'getUrl', array ('size' => 80, 'class' => 'form-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Street') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('street') ?>
    <?php echo object_input_tag($sf_guard_user_profile, 'getStreet', array ('size' => 80, 'class' => 'form-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('City') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('city') ?>
    <?php echo object_input_tag($sf_guard_user_profile, 'getCity', array ('size' => 50, 'class' => 'form-text'
)) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('State') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('state') ?>
    <?php echo form_error('code') ?>
    <?php echo object_input_tag($sf_guard_user_profile, 'getState', array ('size' => 50, 'class' => 'form-medium-text')) ?>
    <label><?php echo __('Code') ?></label>
    <?php echo object_input_tag($sf_guard_user_profile, 'getCode', array ('size' => 7, 'class' => 'form-tiny-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Country') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('country') ?>
    <?php echo select_country_tag('country', $sf_guard_user_profile->getCountry(), array('class' => 'form-text')) ?>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Contact data') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('phone1') ?>
    <?php echo form_error('fax') ?>
    <?php echo form_error('mobile') ?>
    <table>
        <tr>
           <td>
             <label><?php echo __('Phone') ?></label>
             <?php echo object_input_tag($sf_guard_user_profile, 'getPhone1', array ('size' => 20, 'class' => 'form-number-text')) ?>
           </td>
           <td>
             <label><?php echo __('Fax') ?></label>
             <?php echo object_input_tag($sf_guard_user_profile, 'getFax', array ('size' => 20, 'class' => 'form-number-text')) ?>
           </td>
           <td>
             <label><?php echo __('Mobile') ?></label>
             <?php echo object_input_tag($sf_guard_user_profile, 'getPhone2', array ('size' => 20, 'class' => 'form-number-text')) ?>
           </td>
         </tr>
     </table>
  </td>
</tr>
<tr>
  <td class="actionsCol"></td>
  <td class="leftCol"><label><?php echo __('Preferred language') ?></label></td>
  <td class="rightCol">
    <?php echo form_error('preferred_language') ?>
    <?php echo select_language_tag('preferred_language', $sf_guard_user_profile->getLanguage(), array('class' => 'form-medium-combobox')) ?>
  </td>
</tr>
</tbody>
</table>
<table class="formActions">
    <tr>
        <td style="width: 40%;"></td>
        <td style="padding-top:5px;">
            <?php echo submit_tag(__('Save member'), 'id="submit_btn" class="btn big green"') ?>
            <?php echo link_to_function(__('Cancel'), 'window.history.go(-1)', 'id="reset_btn" class="btn big gray"') ?>
        </td>
    </tr>
</table>
</form>
