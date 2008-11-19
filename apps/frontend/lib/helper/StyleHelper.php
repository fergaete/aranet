<?php
/**
 * Automatically adds a class name to the link if the link route matches
 * the current module or route.
 *
 * <b>Style Options:</b>
 * - 'class' - the class name to append to the link, defaults to 'current'
 * - 'module_only' - append class name if the current module and link module match
 * - 'tag' - an html to encapsulate the link, which will receive the class name rather than the <a> tag
 *
 * <b>Examples:</b>
 * <code>
 *   echo link_to_styled('Events', 'event/list', 'class=active', 'id=event_link', );
 *   if the current route is 'event/list', then:
 *     => <a href="path/to/event/list/action" id="event_link" class="active">Events</a>
 * 
 *   echo link_to_styled('Events', 'event/list', 'class=active module_only=true tag=li', 'id=event_link');
 *   if the current module matches the module present in the route, then:
 *     => <li class="active"><a href="path/to/event/list/action" id="event_link">Events</a></li>
 * </code>
 *
 * @param  string name of the link, i.e. string to appear between the <a> tags
 * @param  string 'module/action' or '@rule' of the action
 * @param  array additional style options
 * @param  array additional HTML compliant <a> tag parameters
 * @return string XHTML compliant <a href> tag
 * @see    link_to
 */
function link_to_styled($text, $route = '', $style_options = '', $options = '') {
 
    static $context, $current_module_name;
 
    $options = _parse_attributes($options);
    $style_options = _parse_attributes($style_options);
 
    if (!isset($style_options['class']))
    {
        $style_options['class'] = 'current';
    }
 
    if (isset($style_options['module_only']))
  {
        if (!isset($context))
        {
            $context = sfContext::getInstance();
        }
 
        if (!isset($current_module_name))
      {
        $current_module_name = $context->getModuleName();
      }
 
    list($current_route_name, $params) = $context->getController()->convertUrlStringToParameters($route);
        $is_current = $params['module'] == $current_module_name;
  } 
    else 
    {
        $current_route = sfRouting::getInstance()->getCurrentInternalUri();
        $is_current = $current_route == $route;
    }
 
    if (isset($style_options['tag']))
    {
        $tag_options = (true === $is_current) ? array('class'=>$style_options['class']) : array();
        $return_string = content_tag($style_options['tag'], link_to($text, $route, $options), $tag_options);
    }
    else
    {   
        if (true === $is_current)
        {
            $options['class'] = isset($options['class']) ? $options['class'] . ' ' . $style_options['class'] : $style_options['class'];
        }
        $return_string = link_to($text, $route, $options);
    }
 
    return $return_string;
}

/**
 * This helper function does exactly the same code output than
 * ---------
 *           <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/news/sort') == 'is_published'): ?>
 *     <?php echo link_to(__('Is published'), 'news/list?sort=is_published&type='.($sf_user->getAttribute('type',   'asc', 'sf_admin/news/sort') == 'asc' ? 'desc' : 'asc')) ?>
 *     (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/news/sort')) ?>)
 *     <?php else: ?>
 *     <?php echo link_to(__('Is published'), 'news/list?sort=is_published&type=asc') ?>
 *     <?php endif; ?>
 * ---------
  * 
 * @author Frank Stelzer
 * 
 * @param string $name
 * @param string $base_internal_uri
 * @param string $sort_name
 * @param string $ns the name space
 * @return string html code
 */
function sortable_link_to($name, $base_internal_uri = '', $sort_name = '', $ns = ''){
    $retval = '';
 
    $sort_name = $sort_name=='' ? $name : $sort_name;
 
    $user = sfContext::getInstance()->getUser();
    /*@var $user sfBasicSecurityUser */
 
    if ($user->getAttribute('sort', null, $ns) == $sort_name){
        $retval .= link_to($name, $base_internal_uri.(strpos($base_internal_uri,'?')? '&' : '?'). 'sort='.$sort_name.'&type='.($user->getAttribute('type', 'asc', $ns) == 'asc' ? 'desc' : 'asc'));
        $retval .=show_sort_type($user->getAttribute('type', 'asc', $ns));
    }else {
        $retval = link_to($name, $base_internal_uri.(strpos($base_internal_uri,'?')? '&' : '?'). 'sort='.$sort_name.'&type=asc');
    }
 
    return $retval;
}
 
 
/**
 * helper function which is used in the sortable_link_to function
 *
 * @author Frank Stelzer
 *
 * @param string $type
 * @return string html code
 */
function show_sort_type($type){
    $t=$type=='asc'? '&darr;' : '&uarr;';
    // return " ($t) ";
    return " $t ";
}

/**
 * return a link to remote for gtip dialog
 *
 * @param  string $title the title of the link
 * @param  string $options aditional options for the link
 * @return string
 * @author Pablo Sánchez <pablo.sanchez@aranova.es>
 **/
function remote_icon_gtip($title, $options = '') {
  $object = icon_gtip($title, $options);
  $options = _parse_attributes($options);
  return link_to_remote($object, $options);
}

/**
 * return a link for gtip dialog
 *
 * @param  string $title the title of the link
 * @param  string $options aditional options for the link
 * @return string
 * @author Pablo Sánchez <pablo.sanchez@aranova.es>
 **/
function icon_gtip($title, $options = '') {
  $options = _parse_attributes($options);
  $return_string = $title;
  if (isset($options['image']))
  {
    $extension = substr($options['image'], -4);
    $image = basename($options['image'], $extension);
    if (file_exists(sfConfig::get('sf_web_dir') . '/images/'.$image.'-'.$options['status'].$extension)) {
      $return_string = "<div id='".$options['id']."' style='display:none'>".$options['content'] . "</div>\n";
      $return_string .= image_tag($image.'-'.$options['status'].$extension, array('class' => 'gtip',
                 'gtip'         => '#'.$options['id'],
                 'title'        => isset($options['gtip_title']) ? $options['gtip_title'] : '',
                 'query_string' => '?eventOff=click'
                 ));
    }
  }
  return $return_string;
}