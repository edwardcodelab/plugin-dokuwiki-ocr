<?php
/**
 * DokuWiki Plugin ocr (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  dodotori <dodotori@localhost>
 */
class action_plugin_ocr extends \dokuwiki\Extension\ActionPlugin
{

    /** @inheritDoc */
    public function register(Doku_Event_Handler $controller)
    {
        $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'handle_toolbar_define',array());
        $controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this,'_hookjs');

    
    }

   
    
    /**
     * FIXME Event handler for
     *
     * @param Doku_Event $event  event object by reference
     * @param mixed      $param  optional parameter passed when event was registered
     * @return void
     */
    public function handle_toolbar_define(Doku_Event $event, $param)
    {
         $event->data[] = array (
            'type' => 'ocr',
            'title' => $this->getLang('qb_abutton'),
            'icon' => '../../plugins/ocr/ocr.png',
          );    
    }


    public function _hookjs(Doku_Event $event, $param) {
        $event->data['script'][] = array(
                            'type'    => 'text/javascript',
                            'charset' => 'utf-8',
                            '_data'   => '',
                            'src'     => 'https://unpkg.com/tesseract.js@2.1.5/dist/tesseract.min.js');
    }
    
 


}