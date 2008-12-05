<tr>
  <td class='actionsCol'>
    <ul>
      <li id="addressActionAdd"><?php echo yui_link_to_remote(image_tag('icons/add.png', 'alt="'.__('Add new address') .'"'), array(
            'url' => url_for('@address_create'),
            'update' => 'newAddress',
            'position' => 'before',
            'script' => 'true',
            'loading'  => "Element.show('indicator-address')",
            'complete' => "Element.hide('indicator-address')"
            )) ?></li>
    </ul>
  </td>
  <td class='leftCol'><?php echo $form['address[1]']->renderLabel() ?></td>
  <td class='rightCol'><?php echo $form['address[1]'] ?></td>
</tr>