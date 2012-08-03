<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_modules
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * HTML View class for the Modules component
 *
 * @package     Joomla.Administrator
 * @subpackage  com_modules
 * @since       1.6
 */
class ModulesViewSelect extends JViewLegacy
{
	protected $state;
	protected $items;

	/**
	 * Display the view
	 */
	function display($tpl = null)
	{
		$state		= $this->get('State');
		$items		= $this->get('Items');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->state = &$state;
		$this->items = &$items;

		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		// Add page title
		JToolBarHelper::title(JText::_('COM_MODULES_MANAGER_MODULES'), 'module.png');

		// Get the toolbar object instance
		$bar = JToolBar::getInstance('toolbar');

		// Cancel
		$title = JText::_('JTOOLBAR_CANCEL');
		$dhtml = "<button onClick=\"location.href='index.php?option=com_modules'\" class=\"btn\">
					<i class=\"icon-remove\" title=\"$title\"></i>
					$title</button>";
		$bar->appendButton('Custom', $dhtml, 'new');
	}
}
