<?php
// Assuming include_path := /usr/local/lib/php/symfony or similar
require_once 'plugins/sfPropelPlugin/lib/builder/SfPeerBuilder.php';

class SfPeerAdvBuilder extends SfPeerBuilder
{
    // Must override because we are adding our own functions
    protected function addClassBody(&$script)
    {
        parent::addClassBody($script);
        
        $this->doGetBy($script);
        $this->doGetOneBy($script);
        $this->doGetPager($script);
    }


    protected function doGetPager(&$script)
    {

        $temp = '
        public static function getPager($startIndex, $peer_method = "doSelect", $max_items_per_page = null, $criteria = null)
        {

       if($criteria == null)
        $criteria = new Criteria();

            // Max items per page
            if($max_items_per_page === null)
            {
                if(sfConfig::get(\'app_pager_default_max\'))
                    $max_items_per_page =  sfConfig::get(\'app_pager_default_max\');
                else
                    $max_items_per_page = 10;
            }

            // Pager
            $page = $startIndex + $max_items_per_page / $max_items_per_page;
            $pager = new sfPropelPager(\''.$this->getObjectClassname().'\', $max_items_per_page);
            $pager->setCriteria($criteria);
            $pager->setPage($page);
            $pager->setPeerMethod($peer_method);
            $pager->init();

            return $pager;
         }
        ';

         $script .= $temp;
    }

    protected function doGetBy(&$script)
    {

        $temp = '
        /**
        * return any number of objects referenced by $searchFeild == $value
        */
        public static function getBy($searchField, $value)
        {
            $searchField = strtolower($searchField);
            $basefieldNames = self::getFieldNames(BasePeer::TYPE_PHPNAME);
            $baseColumnNames = self::getFieldNames(BasePeer::TYPE_COLNAME);

            foreach($baseColumnNames as $key => $baseField)
            {
                if($searchField == strtolower($baseField))
                {
                    $c = new Criteria();
                    $test = $baseColumnNames[$key];
                    $c->add($baseColumnNames[$key], $value);
                    return self::doSelect($c);
                }
            }

            throw new sfException("Field name does not exist.");
        }
        ';

        $script .= $temp;
    }

     protected function doGetOneBy(&$script)
    {

        $temp = '
        /**
        * return one object referenced by $searchFeild == $value
        */
        public static function getOneBy($searchField, $value)
        {
            $searchField = strtolower($searchField);
            $basefieldNames = self::getFieldNames(BasePeer::TYPE_PHPNAME);
            $baseColumnNames = self::getFieldNames(BasePeer::TYPE_COLNAME);

            foreach($baseColumnNames as $key => $baseField)
            {
                if($searchField == strtolower($baseField))
                {
                    $c = new Criteria();
                    $c->add($baseColumnNames[$key], $value);
                    return self::doSelectOne($c);
                }
            }

            throw new sfException("Field name does not exist.");
        }
        ';

        $script .= $temp;
    }
}
?>
