<?php
define('JVPROCEDURE_PATH_ROOT',JPATH_SITE);
define('JVPROCEDURE_PATH_SOURCE',JPATH_SITE.'/components/com_jvprocedure');
define('JVPROCEDURE_URI_ROOT',JURI::root());
define('JVPROCEDURE_URI_SOURCE',JVPROCEDURE_URI_ROOT.'components/com_jvprocedure/');
define('JVPROCEDURE_URI_ASSETS',JVPROCEDURE_URI_SOURCE.'assets/');
define('JVPROCEDURE_PATH_IMAGES',JPATH_SITE.'/images/JVPreport');
define('JVPROCEDURE_URI_IMAGES',JVPROCEDURE_URI_ROOT.'images/JVPreport/');
/* define admin */
define('JVPROCEDURE_PATH_ADMIN_ROOT',JPATH_ADMINISTRATOR . '/components/com_jvprocedure' );
define('JVPROCEDURE_URI_ADMIN_ROOT',JVPROCEDURE_URI_ROOT . '/administrator/');
define('JVPROCEDURE_URI_ADMIN_SOURCE',JVPROCEDURE_URI_ADMIN_ROOT . 'components/com_jvprocedure/');
define('JVPROCEDURE_URI_ADMIN_ASSETS',JVPROCEDURE_URI_ADMIN_SOURCE.'assets/');

define('SITENAME',  JFactory::getApplication()->getCfg('sitename'));
/* load core */
require_once(JVPROCEDURE_PATH_SOURCE.'/libs/core.php');
?>
