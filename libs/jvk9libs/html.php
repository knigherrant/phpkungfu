<?php
// no direct access

class JVk9Html extends JVk9Buffer
{   
    public static function jvPublish($default = null){
        $options = array();
        $options[] = JHTML::_('select.option','', JText::_('JOPTION_SELECT_PUBLISHED'));
        $options[] = JHTML::_('select.option', '1', JText::_('Published'));
        $options[] = JHTML::_('select.option', '0', JText::_('Unpublished'));
        return JHTML::_('select.genericlist', $options, 'filter_published', 'class="inputbox" onchange="this.form.submit()"', 'value', 'text', $default,'selectState');
    }

	
}
?>