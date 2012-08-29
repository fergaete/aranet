<?php use_helper('Object', 'DateForm', 'Javascript', 'NumberExtended') ?>

<h3><?php echo __('View members') ?></h3>

<div id="userDisplay" class="windowFrame">

<table class="dataTable">
<thead>
<tr>
    <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
    <th class="actions"></th>
    <th><?php echo __('User') ?></th>
    <th><?php echo __('Name') ?></th>
    <th><?php echo __('Email') ?></th>
    <th><?php echo __('Company') ?></th>
    <th><?php echo __('Phone') ?></th>
    <th><?php echo __('Mobile') ?></th>
    <th><?php echo __('Language') ?></th>
    <th><?php echo __('Created at') ?></th>
</tr>
</thead>
<tbody>
<?php $i = 0; foreach ($pager->getResults() as $sf_guard_user_profile): $odd = fmod(++$i, 2); ?>
        <tr id="user_<?php echo $sf_guard_user_profile->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><?php echo checkbox_tag('select[]', $sf_guard_user_profile->getId(), false) ?></td>
                <td class="actions" id="userMenu_<?php echo $sf_guard_user_profile->getId() ?>">
       <div class="objectActions">
          <ul>
            <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="'.__('View').'"'), 'user/show?id='.$sf_guard_user_profile->getId()) ?></li>
            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="'.__('Edit').'"'), 'user/edit?id='.$sf_guard_user_profile->getId()) ?></li>
            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="'.__('Delete').'"'), array(
                    'update'   => 'user_'.$sf_guard_user_profile->getId(),
                    'url'      => 'user/delete?id='.$sf_guard_user_profile->getId(),
                    'confirm'  => __('Are you sure?'),
                    )) ?></li>
          </ul>
        </div>
    </td>
    <td><?php echo link_to($sf_guard_user_profile->getsfGuardUserRelatedByUserId()->getUsername(), 'user/show?id='.$sf_guard_user_profile->getId()) ?></td>
      <td><?php echo $sf_guard_user_profile->getFullName(false) ?></td>
      <td><?php echo mail_to($sf_guard_user_profile->getEmail(false), $sf_guard_user_profile->getEmail(false), 'encode=true') ?></td>
      <td><?php echo $sf_guard_user_profile->getCompany(false) ?></td>
      <td class="phone"><?php echo smart_format_phone($sf_guard_user_profile->getPhone1(false)) ?></td>
      <td class="phone"><?php echo smart_format_phone($sf_guard_user_profile->getPhone2(false)) ?></td>
      <td class="lang"><?php echo format_language($sf_guard_user_profile->getLanguage()) ?></td>
      <td class="date"><?php echo format_date($sf_guard_user_profile->getCreatedAt()) ?></td>
  </tr>
<?php endforeach; ?>
</tbody>
        <tfoot>
            <tr><th colspan="10">
                <div class="pagination">
<?php use_helper('Pagination'); $uri = substr($sf_request->getUri(), strlen($sf_request->getUriPrefix())+1) ?>
<?php echo pager_navigation($pager, $uri) ?>
                </div>
<?php echo pager_results($pager) ?>
<?php echo repagination_links($pager, $uri) ?>
            </th></tr>
        </tfoot>
</table>
</div>

<?php
use_helper('Tags');
// gets the popular tags
$tags = TagPeer::getPopulars(null, array('model' => 'sfGuardUserProfile'));
// display the tags cloud. The tags will use the route name "@tag" which tags 
// the request parameter "tags"
echo tag_cloud($tags, 'user/showTags?tag='); ?>
