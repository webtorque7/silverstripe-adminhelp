<?php

/**
 * Created by PhpStorm.
 * User: Conrad
 * Date: 13/08/2015
 * Time: 10:06 AM
 */
class AdminHelpModelAdmin extends ModelAdmin implements PermissionProvider
{
	private static $url_segment = 'admin-help/edit';

	private static $menu_title = 'Setup Admin Help';

	private static $menu_priority = -101;

	public static $managed_models = array('AdminHelp');

	public function getEditForm($id = null, $fields = null) {
		$form = parent::getEditForm($id, $fields);

		if ($grid = $form->Fields()->fieldByName('AdminHelp')) {
			$grid->getConfig()->addComponent(GridFieldOrderableRows::create('Sort'));
		}

		return $form;
	}

	public function providePermissions() {
		return array(
			"ADMINHELP_ACCESS_EDIT" => array(
				'name' => _t('AdminHelp.EDITACCESS', "Create/Edit Admin Help articles"),
				'category' => _t('Permission.ADMINHELP_ACCESS_CATEGORY', 'Admin Help Access')
			)
		);
	}
}