<?php
class sfFopView extends sfPHPView
{

  public function getEngine()
  {
    return 'sfFop';
  }

  public function configure()
  {
    parent::configure();
  }

  public function render($templateVars = null)
  {
    $template = $this->getDirectory().'/'.$this->getTemplate();
    $context = $this->getContext();
    $response = $context->getResponse();

    if (sfConfig::get('sf_logging_enabled'))
    {
      $context->getLogger()->info('{sfFopView} render "'.$template.'"');
    }

    //backup render mode
    $renderMode = $context->getController()->getRenderMode();
    // override render mode : We dont want sfPHPView to render directly to the client
    $context->getController()->setRenderMode(sfView::RENDER_VAR);
    //let sfPHPView render our template to $retval
    $retval = parent::render($templateVars);
    //saved render mode
    $context->getController()->setRenderMode($renderMode);

    $fop = new sfFop();
    $input_path = sfConfig::get('sf_app_module_dir') . DIRECTORY_SEPARATOR . $this->moduleName . DIRECTORY_SEPARATOR. sfConfig::get('sf_app_module_template_dir_name') . DIRECTORY_SEPARATOR;
    $input_file = $response->getTitle();
    $input_path = TEMP_PATH  . DIRECTORY_SEPARATOR;
    file_put_contents($input_path . $input_file . '.fo', $retval);

    $fop->addCommand (new sfFopCommand ($input_path . $input_file . '.fo', TEMP_PATH  . DIRECTORY_SEPARATOR . $input_file . '.pdf'));
    $fop->execute();

    $queue = $fop->getQueue ();
    foreach ($queue as $cmd) {
       if ($cmd->hasSucceeded ()) {
           /// Success
           $pdfcontent = file_get_contents(TEMP_PATH  . DIRECTORY_SEPARATOR . $input_file . '.pdf');
       } else {
           /// Failure! Get status and return text
           echo '<html><head><title>Error</title></head><body><h1>Error</h1><p>Return status: ' . $cmd->getStatus () . ' returned: ' . $cmd->getReturn ().'<p></body></html>';
           return self::NONE;
       }
    } // end foreach

    $response->setContentType('application/pdf');
    $response->setTitle($input_file.'.pdf');
    // render to client
    if ($renderMode == sfView::RENDER_CLIENT)
    {
        $response->setContent($pdfcontent);
    }
    return $pdfcontent;
  }
}
