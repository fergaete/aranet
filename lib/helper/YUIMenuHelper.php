<?php

/**
 *
 * Copyright (c) 2008 Yahoo! Inc.  All rights reserved.
 * The copyrights embodied in the content in this file are licensed
 * under the MIT open source license.
 *
 * For the full copyright and license information, please view the LICENSE.yahoo
 * file that was distributed with this source code.
 *
 */

/**
 * YUI Menu Helper.
 *
 * @package    ARANet
 * @subpackage helpers
 * @author     Pablo Sánchez <pablo.sanchez@aranova.es>
 * @version    SVN: $Id$
 *
 */

sfContext::getInstance()->getConfiguration()->loadHelpersarray('Tag', 'Javascript'));

  function yui_menu($name, $option_tags = null, $options = array())
  {

    $html_options = _parse_attributes($options);
    $html_options['id'] = isset($html_options['id']) ? $html_options['id'] : $name;

    $js = 'YAHOO.util.Event.onContentReady("'.$html_options['id'].'", function () {'."\n";
    $js .= '   var ua = YAHOO.env.ua,
                    oAnim;  // Animation instance
        function onSubmenuBeforeShow(p_sType, p_sArgs) {
          var oBody,
              oElement,
              oShadow,
              oUL;
                
          if (this.parent) {
            oElement = this.element;
            oShadow = oElement.lastChild;
            oShadow.style.height = "0px";
          if (oAnim && oAnim.isAnimated()) {
            oAnim.stop();
            oAnim = null;
          }
          oBody = this.body;
          if (this.parent && !(this.parent instanceof YAHOO.widget.MenuBarItem)) {
            if (ua.gecko || ua.opera) {
              oBody.style.width = oBody.clientWidth + "px";
            }
            if (ua.ie == 7) {
              oElement.style.width = oElement.clientWidth + "px";
            }
          }
          oBody.style.overflow = "hidden";
          oUL = oBody.getElementsByTagName("ul")[0];
          oUL.style.marginTop = ("-" + oUL.offsetHeight + "px");
        }
      }';
      $js .= '
      function onTween(p_sType, p_aArgs, p_oShadow) {
        if (this.cfg.getProperty("iframe")) {
          this.syncIframe();
        }
        if (p_oShadow) {
          p_oShadow.style.height = this.element.offsetHeight + "px";
        }
      }';
      
      $js .= '
      function onAnimationComplete(p_sType, p_aArgs, p_oShadow) {
        var oBody = this.body,
            oUL = oBody.getElementsByTagName("ul")[0];
        if (p_oShadow) {
          p_oShadow.style.height = this.element.offsetHeight + "px";
        }
        oUL.style.marginTop = "";
        oBody.style.overflow = "";
        if (this.parent && !(this.parent instanceof YAHOO.widget.MenuBarItem)) {
          if (ua.gecko || ua.opera) {
            oBody.style.width = "";
          }
          if (ua.ie == 7) {
            this.element.style.width = "";
          }
        }
      }';

      $js .= '
      function onSubmenuShow(p_sType, p_sArgs) {
        var oElement,
            oShadow,
            oUL;
        if (this.parent) {
          oElement = this.element;
          oShadow = oElement.lastChild;
          oUL = this.body.getElementsByTagName("ul")[0];
          oAnim = new YAHOO.util.Anim(oUL, 
                    { marginTop: { to: 0 } },
                    .5, YAHOO.util.Easing.easeOut);
          oAnim.onStart.subscribe(function () {
            oShadow.style.height = "100%";
          });
          oAnim.animate();
          if (YAHOO.env.ua.ie) {
            oShadow.style.height = oElement.offsetHeight + "px";
            oAnim.onTween.subscribe(onTween, oShadow, this);
          }
          oAnim.onComplete.subscribe(onAnimationComplete, oShadow, this);
        }
      }';


      $js .= "\n".'var oMenuBar = new YAHOO.widget.MenuBar("'.$html_options['id'].'", { 
                                                            autosubmenudisplay: true, 
                                                            hidedelay: 750, 
                                                            lazyload: true });

      oMenuBar.subscribe("beforeShow", onSubmenuBeforeShow);
      oMenuBar.subscribe("show", onSubmenuShow);
      oMenuBar.render();});';
    
    return javascript_tag($js);
    
  }