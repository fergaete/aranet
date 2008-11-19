<?php

/**
 * get_search_terms function: returns a string with words separated by ',' or by '+' depends the $all_worrds
 *
 * @return string
 * @param  string $words words searched separated by spaces
 * @param  boolean $all_words true if must search all words
 * @author Pablo Sánchez
 **/
function get_search_terms($words, $all_words)
{
  $content = "";
  foreach (split(' ', $words) as $word) {
    $content .= ($all_words) ? '+"' : ', "';
    $content .= htmlspecialchars($word) . '"';
  }
  return trim(substr($content,1));
}

/**
 * returns a link with rel=tag attribute
 *
 * @param  string $tag_name the name of the tag (text link)
 * @param  string $uri      the uri for link
 * @return string
 * @author Pablo Sánchez <pablo.sanchez@aranova.es>
 **/
function link_to_tag($tag_name, $uri)
{
  return link_to($tag_name, $uri, "rel=tag");
}

/**
 * generates a personalized tag cloud
 *
 * @param  array  $tags  array of Tags objects
 * @return void
 * @author Pablo Sánchez <pablo.sanchez@aranova.es>
 **/
function generate_tag_cloud($tags)
{
  if ($tags) {
    $min_font = sfConfig::get("app_tags_min_font");
    $max_font = sfConfig::get("app_tags_max_font");
    $tags_name = array();
    $tags_frecuency = array();
    foreach ($tags as $tag) {
      if (!in_array($tag->getTag()->getTagName(), $tags_name)) {
        array_push($tags_name, $tag->getTag()->getTagName());
        array_push($tags_frecuency, $tag->getTag()->getTagFrecuency());
      }
    }
    $cloud = '<ol id="cloud">';
    $max = max($tags_frecuency);
    $min = min($tags_frecuency);
    $prop = 255 / $max;
    if($max!=$min) {
      $step = round(($max_font - $min_font)/($max - $min),4);
    } else {
      $step = 1;
    }
    /*  color tags */
    $color[0]['r'] = 0.1;
    $color[0]['g'] = 2;
    $color[0]['b'] = 4;

    $color[1]['r'] = 8;
    $color[1]['g'] = 2;
    $color[1]['b'] = 0.8;

    $color[2]['r'] = 5;
    $color[2]['g'] = 1.6;
    $color[2]['b'] = 5;

    $color[3]['r'] = 1;
    $color[3]['g'] = 5.5;
    $color[3]['b'] = 5.5;

    $color[4]['r'] = 1.5;
    $color[4]['g'] = 1.5;
    $color[4]['b'] = 1.5;

    for ($i = 0; $i < count($tags_name); $i++) {
      $color[5]['r'] = (rand(5,40)) / 10;
      $color[5]['g'] = (rand(5,40)) / 10;
      $color[5]['b'] = (rand(5,40)) / 10;
      $selectedColor = sfConfig::get("app_tags_color");
      $font_color = round(255 - ($prop * $tags_frecuency[$i]),0);
      $r = round(($font_color/$color[$selectedColor]['r']),0);
      $g = round(($font_color/$color[$selectedColor]['g']),0);
      $b = round(($font_color/$color[$selectedColor]['b']),0);
      $r = ($r>215)? 215 : $r;
      $g = ($g>215)? 215 : $g;
      $b = ($b>215)? 215 : $b;
      /* color tags */
      $size = (($tags_frecuency[$i] - $min)*$step) + $min_font;
      $cloud .= "        <li>" . link_to($tags_name[$i], "@cms_section_tag?section=" . $section . "&tag=".$tags_name[$i], "rel=tag style=font-size:".$size."px; color:rgb(".$r.",".$g.",".$b.") !important;")."</li>\n";
    }
    //$cloud .= link_to_tag($tags_name[$i] . "(" . $tags_frecuency[$i].")", "@cms_section_tag?section=" . $section . "&tag=".$tags_name[$i]) . "&nbsp;";
    $cloud .= "</ol>";

    return $cloud;
  }
  else
  {
    return '';
  }
}