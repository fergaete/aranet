<?php
 
function pager_navigation($pager, $uri)
{
  $navigation = '';
  if ($pager->haveToPaginate())
  {  
    $uri = (preg_replace('/[?|&]*page=[0-9]*/i', '', $uri));
    $uri .= (preg_match('/\?/', $uri) ? '&' : '?').'page=';

    // First and previous page
    if ($pager->getPage() != 1)
    {
      $navigation .= ' <a href="/'.$uri.'1">'.image_tag('first.png', 'align=absmiddle').'</a>';
      $navigation .= ' <a href="/'.$uri.$pager->getPreviousPage() . '">'.image_tag('previous.png', 'align=absmiddle').'</a>';
    }
 
    // Pages one by one
    $links = array();
    foreach ($pager->getLinks() as $page)
    {
      if ($page != $pager->getPage()) {
          $links[] = '<a href="/'.$uri.$page.'">'.$page.'</a>';
      } else {
          $links[] = $page;
      }
    }
    $navigation .= join('  ', $links);
 
    // Next and last page
    if ($pager->getPage() != $pager->getLastPage())
    {
      $navigation .= ' <a href="/'.$uri.$pager->getNextPage() . '">'.image_tag('next.png', 'align=absmiddle').'</a>';
      $navigation .= '<a href="/'.$uri.$pager->getLastPage() . '">'.image_tag('last.png', 'align=absmiddle').'</a>';
    }
 
  }
 
  return $navigation;
}


function repagination_links($pager, $uri) {
  $links = '<span class="repagination">' . __('Pagination') . ': ' . "\n";
  $links .= "<ul>\n";
  $uri = (preg_replace('/[?|&]*page=[0-9]*/i', '', $uri));
  $uri = (preg_replace('/[?|&]*n=[0-9]*/i', '', $uri));
  $uri .= strstr($uri, '?') ? '&n=' : '?n=';
  for ($i = 20; $i <= 100; $i += 20) {
    if ($pager->getMaxPerPage() == $i) {
      $links .=  '  <li class="current">'.$i.'</li>' . "\n";
    } else {
      $links .=  '  <li><a href="/'.$uri . $i . '">'.$i.'</a>'."</li>\n";
    }
  }
  if ($pager->getMaxPerPage() != 10000) {
    $links .=  '  <li><a href="/'.$uri . '-1">'. __('All') . '</a></li>'."\n";
  } else {
    $links .=  '  <li class="current"><a href="/'.$uri . '-1">'. __('All') . '</a></li>'."\n";
  }
  $links .=  "</ul>\n";
  return $links;
}

function pager_results($pager) {
 $text =  format_number_choice('[0] '.__('no result').'|[1] 1 '.__('Result').'|(1,+Inf] %1% '.__('Results'), array('%1%' => $pager->getNbResults()), $pager->getNbResults());
 if ($pager->getnbResults() > $pager->getMaxPerPage() ) {
    $from = ($pager->getPage()-1) * $pager->getMaxPerPage();
    $to = ($from + $pager->getMaxPerPage() < $pager->getnbResults()) ? $from + $pager->getMaxPerPage() : $pager->getNbResults();
    $text .=". ". __('Showing from %1% to %2%.', array('%1%' => $from+1, '%2%' => $to)) . "\n";
  }
  return $text;
}
