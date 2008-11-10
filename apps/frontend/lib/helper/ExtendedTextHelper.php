<?php

function removeHTML($html)
{
   // Web documents shouldn't contains \x00 symbol
        $html = str_replace("\x00", '', $html);
        // Remove white spaces inside tags
        $html = preg_replace('/\<\s*(\/{0,1})\s*([a-zA-Z]*)\s*\>/e', "'<\\1'.strtolower('\\2').'>'", $html);
        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
                  '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
                  '@<![\s\S]*?--[ \t\n\r]*>@'        // Strip multi-line comments including CDATA
                  );
        $html = preg_replace($search, '', $html);
        $html = strip_tags($html, '<p><em><strong><b><i><u><cite><br>,<br/>');
        // Replace self closed tags
        $html = preg_replace('/\<(br|hr)\>/', '<\\1/>', $html);

        $html = preg_replace('/<(.*?)>/ie', "'<'.myTools::removeEvilAttributes('\\1').'>'", $html);
        return $html;
}

function truncate_text_with_html($text, $long, $truncate_string ='...')
{
  $small_text = removeHTML($text);
  $small_text = truncate_text($small_text, $long);
  $small_text = substr($small_text, 0, strripos($small_text, ' ')). $truncate_string;
  $tags = array ('<em>', '<strong>', '<b>', '<i>', '<u>');
  $opened_tags = '';
  foreach ($tags as $tag) {
    $open_tag = strripos($small_text, $tag);
    $closed_tag = strripos($small_text, '</' . substr($tag, 1));
    if ($open_tag > $closed_tag || ($open_tag == 0 && $open_tag!==false && $closed_tag === false))
      $opened_tags[count($small_text) - $open_tag] = substr($tag, 1, -1); 
  }
  if ($opened_tags) {
      ksort($opened_tags);
      foreach ($opened_tags as $tag)
          $small_text .= '</' . $tag . '>';
  }

  return $small_text;
}

function fo_encode($text, $font = 'DejaVuSans') {
   $text = strip_tags($text, '<strong><em><ul><li><br>,<br/>');
   $search = array(
                    '@<br\/>@i',
                    '@\s+@i',
                    '@<strong>([a-záéíóúüñA-ZÁÉÍÓÚÜÑ0-9\(\)\s\t\.,\+\-_:;\*<>\/]*)</strong>@',
                    '@<em>([a-záéíóúüñA-ZÁÉÍÓÚÜÑ0-9\(\)\s\t\.,\+\-_:;\*<>\/]*)</em>@',
                    '@<ul>([a-záéíóúüñA-ZÁÉÍÓÚÜÑ0-9\(\)\s\t\.,\+\-_:;\*<>\/]*)<\/ul>@',
                    '@<li>([a-záéíóúüñA-ZÁÉÍÓÚÜÑ0-9\(\)\s\t\.,\+\-_:;\*]*)<\/li>@',
                  );
   $replace = array('<fo:block></fo:block>', ' ', '<fo:inline font-family="'.$font.'-Bold">$1</fo:inline>',
                    '<fo:inline padding-bottom="0cm" font-family="'.$font.'-Oblique">$1</fo:inline>',
                    '<fo:list-block provisional-label-separation="3pt" provisional-distance-between-starts="14pt">$1</fo:list-block>',
                    '<fo:list-item><fo:list-item-label><fo:block>-</fo:block></fo:list-item-label>
<fo:list-item-body start-indent="body-start()"><fo:block>$1</fo:block></fo:list-item-body></fo:list-item>',
                    );
   $fo = preg_replace($search, $replace, $text);
   return $fo;

}

    /*
    $keywords = Keywords to highlight
    $message  = String to highlight the keywords in 
    $stag     = Starting HTML tag for the highlighted string
    $etag     = Ending HTML tag for the highlighted string 
    */
    function do_highlight($keywords, $message, $stag = "<b>", $etag = "</b>"){
        preg_match_all("/\"(.*?)\"/", $keywords, $quotes); 
        foreach($quotes[1] as $quot){
            $terms[] = $quot;
        }         
        $keywords = preg_replace("/\".*?\"/", "", $keywords); 
        $keywords = preg_replace("/\"/", "", $keywords); 
        $keywords = preg_replace("/  /", " ", $keywords); 
        $terms = array_merge($terms, explode(" ", $keywords));
        foreach($terms as $term){
            if(trim($term)){
                $message = preg_replace('#(?<=[^\w=])('.$term.')(?=[^\w=])#siU', $stag.'\\1'.$etag, $message);
            }
        }
        return $message;
    }
?>
