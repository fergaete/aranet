<?php
class sfPropelFileStorageRouting
{
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   */
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();

    $r->prependRoute('download_by_file_name', new sfRoute('/download/:name', array('module' => 'sfPropelFileStorage', 'action' => 'download')));
    $r->prependRoute('download_image_by_file_name', new sfRoute('/images/:name', array('module' => 'sfPropelFileStorage', 'action' => 'download')));
  }

}
