<?php use_helper('Javascript', 'NumberExtended') ?>
<?php aranet_title(__('List contacts')) ?>
<h3>
<?php if (isset($tag)) : 
 echo __('View all contacts tagged with "%1%"', array('%1%' => $tag));
else :
 echo __('View all contacts');
endif ?>
</h3>
<?php echo form_tag('contact/delete', 'name="chklist"') ?>
<div id="contactDisplay" class="windowFrame">
    <table class="dataTable">
        <thead>
            <tr>
                <th class="checkbox"><?php echo checkbox_tag('select[]', 0, false, array('onclick' => "checkAll(this)")); ?></th>
                <th class="actions"></th>
                <th style="width:25%"><?php echo __('Name') ?></th>
                <th style="width:22%"><?php echo __('Email') ?></th>
                <th style="width:14%"><?php echo __('Phone/Fax') ?></th>
                <th style="width:12%"><?php echo __('Mobile') ?></th>
<!--                <th style="text-align:center;"><?php echo __('Birthday') ?></th> -->
                <th style="width:22%"><?php echo __('Address') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($pager->getResults() as $contact): $odd = fmod(++$i, 2) ?>
            <tr id="contact_<?php echo $contact->getId() ?>" style="background:<?php echo ($odd) ? '#eef' : '#fff' ?>" onmouseover="this.style.background = '#ededed!important';" onmouseout="this.style.background='#<?php echo $odd ? 'eef' : 'fff' ?>!important';">

                <td class="checkbox"><?php echo checkbox_tag('select[]', $contact->getId(), false) ?></td>
                <td class="actions" id="contactMenu_<?php echo $contact->getId() ?>">
                    <div class="objectActions">
                        <ul>
                            <li><?php echo link_to(image_tag("/images/button_view.gif", 'alt="View"'), 'contact/show?id='.$contact->getId()) ?></li>
                            <li><?php echo link_to(image_tag("/images/button_edit.gif", 'alt="Edit"'), 'contact/edit?id='.$contact->getId()) ?></li>
                            <li><?php echo link_to_remote(image_tag("/images/button_delete.gif", 'alt="Delete"'), array(
                                'update'   => 'contact_'.$contact->getId(),
                                'url'      => 'contact/delete?id='.$contact->getId(),
                                'confirm'  => __('Are you sure?'),
                                )) ?></li>
                        </ul>
                    </div>
                </td>
                <td><?php echo link_to($contact, 'contact/show?id='.$contact->getId()) ?></td>
                <td><?php echo mail_to($contact->getContactEmail(), $contact->getContactEmail(), 'encode=true') ?></td>
                <td><?php echo ($contact->getContactPhone()) ? __('Tel: ') . smart_format_phone($contact->getContactPhone()) : '' 
?><br/>
                <?php echo ($contact->getContactFax()) ? __('Fax: ') .smart_format_phone($contact->getContactFax()) : '' ?></td>
                <td><?php echo smart_format_phone($contact->getContactMobile()) ?></td>
<!--                <td><?php echo $contact->getContactBirthday() ?></td> -->
                <td><?php echo ($addrs = $contact->getDefaultAddress()) ?  $addrs : '' ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
            <tfoot>
            <tr><th colspan="9">
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
  <li><?php echo __('For selected elements') ?> :</li>
  <li><?php echo link_to_function(image_tag("button_delete.gif", 'alt="Delete selected"'),"document.chklist.submit()") ?></li>
</ul>
</div>

</form>
