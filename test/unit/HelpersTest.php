<?php

include(dirname(__FILE__).'/../bootstrap/unit.php');
require_once(dirname(__FILE__).'/../../apps/frontend/lib/helper/ExtendedTextHelper.php');

$t = new lime_test(8, new lime_output_color());

// fo_encode()
$t->diag('fo_encode()');
$t->isa_ok(fo_encode('Foo'), 'string',
    'fo_encode() returns a string');
$t->is(fo_encode('<html><head><style>.css{background:#ffffff;}</style><body><h1>Titulo</h1><br/><p>Parrafo</p></body></head></html>'), 'Titulo<fo:block></fo:block>Parrafo',
    'fo_encode() clean html tags');
$t->is(fo_encode('<etiqueta>sin cerrar'), 'sin cerrar',
    'fo_encode() ignores unclosed tags');
$t->is(fo_encode('<etiqueta sin cerrar'), '',
    'fo_encode() ignores unclosed tags');
$t->is(fo_encode('etiqueta sin cerrar>'), 'etiqueta sin cerrar>',
    'fo_encode() ignores unclosed tags');
$t->is(fo_encode('>etiqueta sin cerrar<'), '>etiqueta sin cerrar',
    'fo_encode() ignores unclosed tags');
$t->is(fo_encode('<etiqueta sin cerrar>foo'), 'foo',
    'fo_encode() ignores unclosed tags');
$t->is(fo_encode('<strong>FOO</strong>'), '<fo:inline font-family="DejaVuSans-Bold">FOO</fo:inline>',
    'fo_encode() encode strong tags');
$t->is(fo_encode('<em>FOO</em>'), '<fo:inline font-family="DejaVuSans-Oblique">FOO</fo:inline>',
    'fo_encode() encode em tags');
$t->is(fo_encode('FOO<br>'), 'FOO<fo:block></fo:block>',
    'fo_encode() encode <br> tags');
$t->is(fo_encode('FOO<br/>BAR<br/>'), 'FOO<fo:block></fo:block>BAR<fo:block></fo:block>',
    'fo_encode() encode <br/> tags');
$t->is(fo_encode('<ul><li>FOO</li><li>BAR</li></ul>'),
    '<fo:list-block provisional-label-separation="3pt" provisional-distance-between-starts="14pt"><fo:list-item><fo:list-item-label><fo:block>-</fo:block></fo:list-item-label><fo:list-item-body start-indent="body-start()"><fo:block>FOO</fo:block></fo:list-item-body></fo:list-item><fo:list-item><fo:list-item-label><fo:block>-</fo:block></fo:list-item-label><fo:list-item-body start-indent="body-start()"><fo:block>BAR</fo:block></fo:list-item-body></fo:list-item></fo:list-block>',
    'fo_encode() encode ul - li tags');
$t->is(fo_encode('<ul><li><strong>FOO:</strong> FOO</li><li>BAR</li></ul>'),
    '<fo:list-block provisional-label-separation="3pt" provisional-distance-between-starts="14pt"><fo:list-item><fo:list-item-label><fo:block>-</fo:block></fo:list-item-label><fo:list-item-body start-indent="body-start()"><fo:block><fo:inline font-family="DejaVuSans-Bold">FOO:</fo:inline> FOO</fo:block></fo:list-item-body></fo:list-item><fo:list-item><fo:list-item-label><fo:block>-</fo:block></fo:list-item-label><fo:list-item-body start-indent="body-start()"><fo:block>BAR</fo:block></fo:list-item-body></fo:list-item></fo:list-block>',
    'fo_encode() encode complex ul - li tags');
$t->is(fo_encode('<ul><li>FOO<ul><li>BAR</li></ul></li><li>BAR</li></ul>'),
    '<fo:list-block provisional-label-separation="3pt" provisional-distance-between-starts="14pt"><fo:list-item><fo:list-item-label><fo:block>-</fo:block></fo:list-item-label><fo:list-item-body start-indent="body-start()"><fo:block>FOO<fo:list-block provisional-label-separation="3pt" provisional-distance-between-starts="14pt"><fo:list-item><fo:list-item-label><fo:block>-</fo:block></fo:list-item-label><fo:list-item-body start-indent="body-start()"><fo:block>BAR</fo:block></fo:list-item-body></fo:list-item></fo:list-block></fo:block></fo:list-item-body></fo:list-item><fo:list-item><fo:list-item-label><fo:block>-</fo:block></fo:list-item-label><fo:list-item-body start-indent="body-start()"><fo:block>BAR</fo:block></fo:list-item-body></fo:list-item></fo:list-block>',
    'fo_encode() encode looped ul - li tags');
$t->is(fo_encode('FOO<br/><strong>BAR</strong>BAR<br/>'), 'FOO<fo:block></fo:block><fo:inline font-family="DejaVuSans-Bold">BAR</fo:inline>BAR<fo:block></fo:block>',
    'fo_encode() encode mixed tags');
