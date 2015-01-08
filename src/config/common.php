<?php

// Initially set it here. Application::init() will check devMode and override appropriately.
error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('log_errors', 1);
ini_set('error_log', CRAFT_STORAGE_PATH.'runtime/logs/phperrors.log');

$configArray = [

	// autoloading model and component classes
	'import' => [
		'application.framework.cli.commands.*',
		'application.framework.console.*',
		'application.framework.logging.CLogger',
	],

	'componentAliases' => [
/* COMPONENT ALIASES */
	],

	'components' => [

		'db' => [
			'class'         => 'Craft\DbConnection',
		],

		'config' => [
			'class'         => '\craft\app\services\Config',
		],

		'i18n' => [
			'class' => '\craft\app\services\Localization',
		],

		'formatter' => [
			'class' => 'CFormatter'
		],
	],

	'params' => [
		'adminEmail'=> 'admin@website.com',
	]
];

// CP routes
// ----------------------------------------------------------------------------

$cpRoutes['categories']                                                           = ['action' => 'categories/categoryIndex'];
$cpRoutes['categories/(?P<groupHandle>{handle})']                                 = ['action' => 'categories/categoryIndex'];
$cpRoutes['categories/(?P<groupHandle>{handle})/new']                             = ['action' => 'categories/editCategory'];
$cpRoutes['categories/(?P<groupHandle>{handle})/(?P<categoryId>\d+)(?:-{slug})?'] = ['action' => 'categories/editCategory'];

$cpRoutes['dashboard/settings/new']                                               = 'dashboard/settings/_widgetsettings';
$cpRoutes['dashboard/settings/(?P<widgetId>\d+)']                                 = 'dashboard/settings/_widgetsettings';

$cpRoutes['entries/(?P<sectionHandle>{handle})']                                  = 'entries';
$cpRoutes['entries/(?P<sectionHandle>{handle})/new']                              = ['action' => 'entries/editEntry'];
$cpRoutes['entries/(?P<sectionHandle>{handle})/(?P<entryId>\d+)(?:-{slug})?']     = ['action' => 'entries/editEntry'];

$cpRoutes['globals/(?P<globalSetHandle>{handle})']                                = ['action' => 'globals/editContent'];

$cpRoutes['updates/go/(?P<handle>[^/]*)'] = 'updates/_go';

$cpRoutes['settings']                                                             = ['action' => 'systemSettings/settingsIndex'];
$cpRoutes['settings/assets']                                                      = ['action' => 'assetSources/sourceIndex'];
$cpRoutes['settings/assets/sources/new']                                          = ['action' => 'assetSources/editSource'];
$cpRoutes['settings/assets/sources/(?P<sourceId>\d+)']                            = ['action' => 'assetSources/editSource'];
$cpRoutes['settings/assets/transforms']                                           = ['action' => 'assetTransforms/transformIndex'];
$cpRoutes['settings/assets/transforms/new']                                       = ['action' => 'assetTransforms/editTransform'];
$cpRoutes['settings/assets/transforms/(?P<handle>{handle})']                      = ['action' => 'assetTransforms/editTransform'];
$cpRoutes['settings/categories']                                                  = ['action' => 'categories/groupIndex'];
$cpRoutes['settings/categories/new']                                              = ['action' => 'categories/editCategoryGroup'];
$cpRoutes['settings/categories/(?P<groupId>\d+)']                                 = ['action' => 'categories/editCategoryGroup'];
$cpRoutes['settings/fields/(?P<groupId>\d+)']                                     = 'settings/fields';
$cpRoutes['settings/fields/new']                                                  = 'settings/fields/_edit';
$cpRoutes['settings/fields/edit/(?P<fieldId>\d+)']                                = 'settings/fields/_edit';
$cpRoutes['settings/general']                                                     = ['action' => 'systemSettings/generalSettings'];
$cpRoutes['settings/globals/new']                                                 = ['action' => 'systemSettings/editGlobalSet'];
$cpRoutes['settings/globals/(?P<globalSetId>\d+)']                                = ['action' => 'systemSettings/editGlobalSet'];
$cpRoutes['settings/plugins/(?P<pluginClass>{handle})']                           = 'settings/plugins/_settings';
$cpRoutes['settings/sections']                                                    = ['action' => 'sections/index'];
$cpRoutes['settings/sections/new']                                                = ['action' => 'sections/editSection'];
$cpRoutes['settings/sections/(?P<sectionId>\d+)']                                 = ['action' => 'sections/editSection'];
$cpRoutes['settings/sections/(?P<sectionId>\d+)/entrytypes']                      = ['action' => 'sections/entryTypesIndex'];
$cpRoutes['settings/sections/(?P<sectionId>\d+)/entrytypes/new']                  = ['action' => 'sections/editEntryType'];
$cpRoutes['settings/sections/(?P<sectionId>\d+)/entrytypes/(?P<entryTypeId>\d+)'] = ['action' => 'sections/editEntryType'];
$cpRoutes['settings/tags']                                                        = ['action' => 'tags/index'];
$cpRoutes['settings/tags/new']                                                    = ['action' => 'tags/editTagGroup'];
$cpRoutes['settings/tags/(?P<tagGroupId>\d+)']                                    = ['action' => 'tags/editTagGroup'];

$cpRoutes['utils/serverinfo']                                                     = ['action' => 'utils/serverInfo'];
$cpRoutes['utils/phpinfo']                                                        = ['action' => 'utils/phpInfo'];
$cpRoutes['utils/logs(/(?P<currentLogFileName>[A-Za-z0-9\.]+))?']                 = ['action' => 'utils/logs'];
$cpRoutes['utils/deprecationerrors']                                              = ['action' => 'utils/deprecationErrors'];

$cpRoutes['settings/routes'] = [
	'params' => [
		'variables' => [
			'tokens' => [
				'year'   => '\d{4}',
				'month'  => '(?:0?[1-9]|1[012])',
				'day'    => '(?:0?[1-9]|[12][0-9]|3[01])',
				'number' => '\d+',
				'page'   => '\d+',
				'slug'   => '[^\/]+',
				'tag'    => '[^\/]+',
				'*'      => '[^\/]+',
			]
		]
	]
];

$cpRoutes['myaccount'] = ['action' => 'users/editUser', 'params' => ['account' => 'current']];

// Client routes
$cpRoutes['editionRoutes'][1]['clientaccount']                                                                                = ['action' => 'users/editUser', 'params' => ['account' => 'client']];
$cpRoutes['editionRoutes'][1]['entries/(?P<sectionHandle>{handle})/(?P<entryId>\d+)(?:-{slug}?)?/drafts/(?P<draftId>\d+)']    = ['action' => 'entries/editEntry'];
$cpRoutes['editionRoutes'][1]['entries/(?P<sectionHandle>{handle})/(?P<entryId>\d+)(?:-{slug})?/versions/(?P<versionId>\d+)'] = ['action' => 'entries/editEntry'];

// Pro routes
$cpRoutes['editionRoutes'][2]['clientaccount']                                                                                = false;
$cpRoutes['editionRoutes'][2]['categories/(?P<groupHandle>{handle})/(?P<categoryId>\d+)(?:-{slug})?/(?P<localeId>\w+)']       = ['action' => 'categories/editCategory'];
$cpRoutes['editionRoutes'][2]['categories/(?P<groupHandle>{handle})/new/(?P<localeId>\w+)']                                   = ['action' => 'categories/editCategory'];
$cpRoutes['editionRoutes'][2]['entries/(?P<sectionHandle>{handle})/(?P<entryId>\d+)(?:-{slug})?/(?P<localeId>\w+)']           = ['action' => 'entries/editEntry'];
$cpRoutes['editionRoutes'][2]['entries/(?P<sectionHandle>{handle})/new/(?P<localeId>\w+)']                                    = ['action' => 'entries/editEntry'];
$cpRoutes['editionRoutes'][2]['globals/(?P<localeId>\w+)/(?P<globalSetHandle>{handle})']                                      = ['action' => 'globals/editContent'];
$cpRoutes['editionRoutes'][2]['users/new']                                                                                    = ['action' => 'users/editUser'];
$cpRoutes['editionRoutes'][2]['users/(?P<userId>\d+)']                                                                        = ['action' => 'users/editUser'];
$cpRoutes['editionRoutes'][2]['settings/users']                                                                               = 'settings/users/groups/_index';
$cpRoutes['editionRoutes'][2]['settings/users/groups/new']                                                                    = 'settings/users/groups/_edit';
$cpRoutes['editionRoutes'][2]['settings/users/groups/(?P<groupId>\d+)']                                                       = 'settings/users/groups/_edit';

//  Component config
// ----------------------------------------------------------------------------

$components['users']['class']                = '\craft\app\services\Users';
$components['assets']['class']               = '\craft\app\services\Assets';
$components['assetTransforms']['class']      = '\craft\app\services\AssetTransforms';
$components['assetIndexing']['class']        = '\craft\app\services\AssetIndexing';
$components['assetSources']['class']         = '\craft\app\services\AssetSources';
$components['cache']['class']                = '\craft\app\services\Cache';
$components['categories']['class']           = '\craft\app\services\Categories';
$components['content']['class']              = '\craft\app\services\Content';
$components['dashboard']['class']            = '\craft\app\services\Dashboard';
$components['deprecator']['class']           = '\craft\app\services\Deprecator';
$components['email']['class']                = '\craft\app\services\Email';
$components['elements']['class']             = '\craft\app\services\Elements';
$components['entries']['class']              = '\craft\app\services\Entries';
$components['et']['class']                   = '\craft\app\services\Et';
$components['feeds']['class']                = '\craft\app\services\Feeds';
$components['fields']['class']               = '\craft\app\services\Fields';
$components['globals']['class']              = '\craft\app\services\Globals';
$components['install']['class']              = '\craft\app\services\Install';
$components['images']['class']               = '\craft\app\services\Images';
$components['matrix']['class']               = '\craft\app\services\Matrix';
$components['migrations']['class']           = '\craft\app\services\Migrations';
$components['path']['class']                 = '\craft\app\services\Path';
$components['relations']['class']            = '\craft\app\services\Relations';
$components['resources'] = [
	'class'     => '\craft\app\services\Resources',
	'dateParam' => 'd',
];
$components['routes']['class']               = '\craft\app\services\Routes';
$components['search']['class']               = '\craft\app\services\Search';
$components['sections'] = [
	'class' => '\craft\app\services\Sections',
	'typeLimits' => [
		'single'    => 5,
		'channel'   => 1,
		'structure' => 0
	]
];
$components['security']['class']             = '\craft\app\services\Security';
$components['structures']['class']           = '\craft\app\services\Structures';
$components['systemSettings'] = [
	'class' => '\craft\app\services\SystemSettings',
	'defaults' => [
		'users' => [
			'requireEmailVerification' => true,
			'allowPublicRegistration' => false,
			'defaultGroup' => null,
		],
		'email' => [
			'emailAddress' => null,
			'senderName' => null,
			'template' => null,
			'protocol' => null,
			'username' => null,
			'password' => null,
			'port' => 25,
			'host' => null,
			'timeout' => 30,
			'smtpKeepAlive' => false,
			'smtpAuth' => false,
			'smtpSecureTransportType' => 'none',
		]
	]
];
$components['tags']['class']                 = '\craft\app\services\Tags';
$components['tasks']['class']                = '\craft\app\services\Tasks';
$components['templateCache']['class']        = '\craft\app\services\TemplateCache';
$components['templates']['class']            = '\craft\app\services\Templates';
$components['tokens']['class']               = '\craft\app\services\Tokens';
$components['updates']['class']              = '\craft\app\services\Updates';
$components['components'] = [
	'class' => '\craft\app\services\Components',
	'types' => [
		'assetSource'   => ['subfolder' => 'assetsourcetypes', 'suffix' => 'AssetSourceType', 'instanceof' => 'BaseAssetSourceType',    'enableForPlugins' => false],
		'element'       => ['subfolder' => 'elementtypes',     'suffix' => 'ElementType',     'instanceof' => 'ElementTypeInterface',   'enableForPlugins' => true],
		'elementAction' => ['subfolder' => 'elementactions',   'suffix' => 'ElementAction',   'instanceof' => 'ElementActionInterface', 'enableForPlugins' => true],
		'field'         => ['subfolder' => 'fieldtypes',       'suffix' => 'FieldType',       'instanceof' => 'FieldTypeInterface',     'enableForPlugins' => true],
		'tool'          => ['subfolder' => 'tools',            'suffix' => 'Tool',            'instanceof' => 'ToolInterface',          'enableForPlugins' => false],
		'task'          => ['subfolder' => 'tasks',            'suffix' => 'Task',            'instanceof' => 'TaskInterface',          'enableForPlugins' => true],
		'widget'        => ['subfolder' => 'widgets',          'suffix' => 'Widget',          'instanceof' => 'WidgetInterface',        'enableForPlugins' => true],
	]
];
$components['plugins'] = [
	'class' => '\craft\app\services\Plugins',
	'autoloadClasses' => ['Controller','Enum','Helper','Model','Record','Service','Variable','Validator'],
];

// Craft Client components
$components['editionComponents'][1]['emailMessages']['class']   = '\craft\app\services\EmailMessages';
$components['editionComponents'][1]['entryRevisions']['class']  = '\craft\app\services\EntryRevisions';

// Craft Pro components
$components['editionComponents'][2]['userGroups']['class']      = '\craft\app\services\UserGroups';
$components['editionComponents'][2]['userPermissions']['class'] = '\craft\app\services\UserPermissions';

$components['messages']['class'] = 'Craft\PhpMessageSource';
$components['coreMessages']['class'] = 'Craft\PhpMessageSource';
$components['request']['class'] = 'Craft\HttpRequestService';
$components['request']['enableCookieValidation'] = true;
$components['statePersister']['class'] = 'Craft\StatePersister';

$components['urlManager']['class'] = 'Craft\UrlManager';
$components['urlManager']['cpRoutes'] = $cpRoutes;
$components['urlManager']['pathParam'] = 'p';

$components['errorHandler'] = [
	'class' => 'Craft\ErrorHandler',
	'errorAction' => 'templates/renderError'
];

$components['fileCache']['class'] = 'Craft\FileCache';

$components['log']['class'] = 'Craft\LogRouter';
$components['log']['routes'] = [
	[
		'class'  => 'Craft\FileLogRoute',
	],
	[
		'class'         => 'Craft\WebLogRoute',
		'filter'        => 'CLogFilter',
		'showInFireBug' => true,
	],
	[
		'class'         => 'Craft\ProfileLogRoute',
		'showInFireBug' => true,
	],
];

$components['session']['class'] = '\craft\app\services\Session';

$components['user'] = [
	'class'                    => '\craft\app\web\User',
	'identityClass'            => '\craft\app\models\User',
	'enableAutoLogin'          => true,
	'autoRenewCookie'          => true,
];

$configArray['components'] = array_merge($configArray['components'], $components);

return $configArray;
