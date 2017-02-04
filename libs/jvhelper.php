<?php
// no direct access

class JVPreportHelper
{   
        public static $extension = 'COM_JVPROCEDURE';

	/**
	 * Configure the Linkbar.
	 *
	 * @param   string	$vName	The name of the active view.
	 *
	 * @return  void
	 * @since   1.6
	 */
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('JGLOBAL_ARTICLES'),
			'index.php?option=COM_JVPROCEDURE&view=articles',
			$vName == 'articles'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_JVPROCEDURE_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=COM_JVPROCEDURE',
			$vName == 'categories');
		JHtmlSidebar::addEntry(
			JText::_('COM_JVPROCEDURE_SUBMENU_FEATURED'),
			'index.php?option=COM_JVPROCEDURE&view=featured',
			$vName == 'featured'
		);
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param   integer  The category ID.
	 * @param   integer  The article ID.
	 *
	 * @return  JObject
	 * @since   1.6
	 */
	public static function getActions($categoryId = 0, $articleId = 0)
	{
		// Reverted a change for version 2.5.6
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($articleId) && empty($categoryId))
		{
			$assetName = 'COM_JVPROCEDURE';
		}
		elseif (empty($articleId))
		{
			$assetName = 'COM_JVPROCEDURE.category.'.(int) $categoryId;
		}
		else
		{
			$assetName = 'COM_JVPROCEDURE.article.'.(int) $articleId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}

	
}
?>