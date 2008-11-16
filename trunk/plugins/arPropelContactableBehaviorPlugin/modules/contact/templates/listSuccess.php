<?php use_helper('Javascript', 'NumberExtended') ?>
<?php $title = (isset($tag)) ? __('List contacts tagged with "%1%"', array('%1%' => $tag)) : __('List contacts') ?>
<?php aranet_title($title) ?>
<h3><?php echo $title ?></h3>

<form action="<?php echo url_for('@contact_delete_all') ?>" method="post" name="chklist">
<div id="contactDisplay">
    <table class="dataTable" id="contactTable">
        <thead>
            <tr>
                <th class="checkbox"><input type="checkbox" name="select[]" value="0" onclick="checkAll(this)" /></th>
                <th class="actions"></th>
                <th><?php echo __('Name') ?></th>
                <th><?php echo __('Email') ?></th>
                <th><?php echo __('Phone/Fax') ?></th>
                <th><?php echo __('Mobile') ?></th>
                <th><?php echo __('Address') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($pager->getResults() as $contact): $odd = fmod(++$i, 2) ?>
                <tr id="contact_<?php echo $contact->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">
                <td class="checkbox"><input type="checkbox" name="select[]" value="<?php echo $contact->getId() ?>" /></td>
                <td class="actions" id="contactMenu_<?php echo $contact->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag(sfConfig::get("yui_icons_web_dir") . "/application_form.png", 'alt="View"'), '@contact_show_by_id?id='.$contact->getId()) ?></li>
                            <li><?php echo link_to(image_tag(sfConfig::get("yui_icons_web_dir") . "/application_form_edit.png", 'alt="Edit"'), '@contact_edit_by_id?id='.$contact->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag(sfConfig::get("yui_icons_web_dir") . "/application_form_delete.png", 'alt="Delete"'), array(
                                'update'   => 'contact_'.$contact->getId(),
                                'url'      => '@contact_delete_by_id?id='.$contact->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td class="text"><?php echo link_to($contact, '@contact_show_by_id?id='.$contact->getId()) ?></td>
                <td class="text"><?php echo mail_to($contact->getContactEmail(), $contact->getContactEmail(), 'encode=true') ?></td>
                <td class="phone"><?php echo ($contact->getContactPhone()) ? __('Tel: ') . smart_format_phone($contact->getContactPhone()) : '' 
?><br/>
                <?php echo ($contact->getContactFax()) ? __('Fax: ') .smart_format_phone($contact->getContactFax()) : '' ?></td>
                <td class="phone"><?php echo smart_format_phone($contact->getContactMobile()) ?></td>
                <td class="text"><?php echo ($addrs = $contact->getDefaultAddress()) ?  $addrs : '' ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
            <tfoot>
            <tr>
              <th colspan="7" class="tableFooter">
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

<div class="listActions">
<ul>
  <li><?php echo __('For selected elements') ?>:</li>
  <li><?php echo link_to_function(image_tag(sfConfig::get("yui_icons_web_dir") . "/delete.png", 'alt="Delete selected"'),"document.chklist.submit()", array('confirm' => __('Are you sure?'))) ?></li>
</ul>
</div>
</form>

<?php use_helper('YUIDataTable') ?>
<?php echo yui_table('contactTable', 'contactDisplay') ?>