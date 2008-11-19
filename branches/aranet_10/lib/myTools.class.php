<?php

class myTools
{

  /**
   * checks if an array exists into another array
   *
   * @param array $needle
   * @param array $haystack
   * @return boolean
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function array_in_array($needle, $haystack) {
    //Make sure $needle is an array for foreach
    if(!is_array($needle)) $needle = array($needle);
    //For each value in $needle, return TRUE if in $haystack
    foreach($needle as $pin)
      if(in_array($pin, $haystack)) return true;
    //Return FALSE if none of the values from $needle are found in $haystack
    return false;
  }

  /**
   * returns given string with HTML tags
   *
   * @return void
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function transformToHtml($string)
  {
    sfLoader::loadHelpers('Text', 'Tag');
    $string = myTools::removeHTML($string, '<p><em><b>,<strong><i><u><cite><br>,<br/><ul><ol><li><h3><h4><h5>');
    $html = simple_format_text($string);
    $html = preg_replace('/<p><([ul|li|h3|h4|h5]+)>/', '<$1>', $html);
    $html = preg_replace('/<\/([ul|li|h3|h4|h5]+)><\/p>/', '</$1>', $html);
    $html = preg_replace('/<([\/]*)h4>/', '<$1h3>', $html);
    $html = preg_replace('/<([\/]*)h5>/', '<$1h4>', $html);
    $html = preg_replace('/<br[ ]*[\/]*>[ ]*<\/ul>/', '</ul>', $html);
    $html = preg_replace('/<([\/]*)b>/', '<$1strong>', $html);
    $html = preg_replace('/<br[\s]*\/><ul>/', "</p>\n<ul>", $html);
    $html = preg_replace('/<\/ul>[\n]*<br[\s]*\/>/', "</ul>\n<p>", $html);
    $html = preg_replace('/<br[\s]*[\/]*>[\s]*<li>/', '<li>', $html);
    $html = preg_replace('/<br[\s]*[\/]*>[\s]*<\/li>/', '</li>', $html);
    $html = preg_replace('/<\/li><br[\s]*[\/]*>[\s]*/', '</li>', $html);
    $html = preg_replace('/<p><li>/', '<li>', $html);
    $html = preg_replace('/<\/li><\/p>/', '</li>', $html);
    $html = auto_link_text($html, 'all', array('rel' => "nofollow"));
    $html = ($html == '<p></p>') ? '' : $html;   
    return $html;
  } //END transformToHtml

  /**
   * removes HTML tags except given
   *
   * @param string  $html
   * @param string  $strip_tags
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function removeHTML($html, $strip_tags = '<p><em><strong><b><i><u><cite><br>,<br/>')
  {
    // Web documents shouldn't contains \x00 symbol
    $html = str_replace("\x00", '', $html);
    // Remove white spaces inside tags
    $html = preg_replace('/\<\s*(\/{0,1})\s*([a-zA-Z]*)\s*\>/e', "'<\\1'.strtolower('\\2').'>'", $html);
    $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@',        // Strip multi-line comments including CDATA
    '@<p><ul>@si');
    $html = preg_replace($search, '', $html);
    $html = strip_tags($html, $strip_tags);
    // Replace self closed tags
    $html = preg_replace('/\<(br|hr)\>/', '<\\1/>', $html);
    $html = preg_replace('/<(.*?)>/ie', "'<'.myTools::removeEvilAttributes('\\1').'>'", $html);
    return $html;
  }

  /**
   * returns stripped title
   *
   * @param string $title
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function getStrippedTitle($title = '')
  {
    if (empty($title)) {
      return 'undefined';
    }
    $low=array("Ü" => "ü", "Á" => "á", "É" => "é", "Í" => "í", "Ó" => "ó", "Ú" => "ú", "Ñ" => "ñ");
    $result = trim(strtolower(strtr($title, $low)));

    // strip all non word chars
    $result = preg_replace('/[^a-záéíóúüñ0-9\W\-_,\.]/', '', $result);
    $result = str_replace(array('á','é','í','ó','ú','ñ'), array('a','e','i','o','u','ny'), $result);

    // strip all non word chars
    $result = preg_replace('/\W/', ' ', $result);

    // replace all white space sections
    $result = preg_replace('/\ /', '-', $result);

    // trim dashes
    $result = preg_replace('/\-+/', '-', $result);
    $result = preg_replace('/\-$/', '', $result);
    $result = preg_replace('/^\-/', '', $result);

    return $result;
  }

  /**
   * removes some HTML attributes in tags
   *
   * @param string $tagSource
   * @return string
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function removeEvilAttributes($tagSource)
  {
    $stripAttrib = "' (style|class)=\"(.*?)\"'i";
    $tagSource = stripslashes($tagSource);
    $tagSource = preg_replace($stripAttrib, '', $tagSource);
    return $tagSource;
  }

  /**
   * return number of elements in an array for given pattern
   *
   * @param string  $strPattern
   * @param array  $arrInput
   * @return integer
   * @author Pablo Sánchez <pablo.sanchez@aranova.es>
   **/
  public static function count_array($strPattern, $arrInput){
    $arrReturn = preg_grep($strPattern, $arrInput);
    return (count($arrReturn));
  }

} //Tools