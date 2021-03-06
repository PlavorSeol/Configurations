<?php
//< Initialize >

//<< Databases >>
$wgDBname="{$wmgWiki}wiki";

foreach ($wmgWikis as $wiki)
  {$wgLocalDatabases[]="{$wiki}wiki";}

unset($wiki);

//<< Others >>
//Should be defined before variables using $wgScriptPath
$wgScriptPath='/mediawiki';

if ($wmgGlobalAccountMode !== false)
  {$wgConf->settings=
  ['wgArticlePath' =>
    ['default' => '/page/$1'],
  'wgServer' =>
    ['default' => str_replace('%wiki%', '$lang', $wmgDefaultBaseURL)]
  ];
  $wgConf->suffixes=['wiki'];
  $wgConf->wikis=$wgLocalDatabases;
  $wgConf->extractAllGlobals($wgDBname);}

//< General >

//<< Accounts >>
$wgInvalidUsernameCharacters='`~!@$%^&*()=+\\;:,.?';
$wgMaxNameChars=30;
$wgReservedUsernames=array_merge($wgReservedUsernames,
['Example',
'Flow talk page manager',
'MediaWiki message delivery',
'New user message',
'User',
'Username',
'편집 필터']);

//<< Basic information >>
$wgSitename='Nameless';

//<< Blocking >>
$wgApplyIpBlocksToXff=true;
$wgAutoblockExpiry=60 * 60 * 24 * 365 * 10; //10 years
$wgBlockCIDRLimit=$wmgCIDRLimit;

//<< Copyright >>
$wgRightsIcon="{$wgScriptPath}/resources/assets/licenses/cc-by-sa.png";
$wgRightsText='Creative Commons Attribution-ShareAlike 4.0 International';
$wgRightsUrl='https://creativecommons.org/licenses/by-sa/4.0/';

//<< CSS and JavaScript >>
$wgAllowUserCss=true;
$wgAllowUserJs=true;

//<< Interwiki >>
$wgExternalInterwikiFragmentMode='html5';
$wgRedirectSources='/^https?:\\/\\//i';

//<< Namespaces >>
//Exclude File namespace
$wgNamespacesWithSubpages[NS_CATEGORY]=true;
$wgNamespacesWithSubpages[NS_MAIN]=true;

//<< Password policies >>
$wgPasswordPolicy['policies']=
['default' =>
  ['MaximalPasswordLength' =>
    ['forceChange' => true,
    'value' => 20],
  'MinimalPasswordLength' =>
    ['forceChange' => true,
    'value' => 6],
  'MinimumPasswordLengthToLogin' =>
    ['forceChange' => true,
    'value' => 1],
  'PasswordCannotBeSubstringInUsername' =>
    ['forceChange' => true,
    'value' => true],
  'PasswordCannotMatchDefaults' =>
    ['forceChange' => true,
    'value' => true],
  'PasswordCannotMatchUsername' =>
    ['forceChange' => true,
    'value' => true],
  'PasswordNotInCommonList' =>
    ['forceChange' => true,
    'value' => true]
  ],
'moderator' =>
  ['MinimumPasswordLengthToLogin' => 6],
'admin' =>
  ['MinimalPasswordLength' => 8,
  'MinimumPasswordLengthToLogin' => 6],
'bureaucrat' =>
  ['MinimalPasswordLength' => 10,
  'MinimumPasswordLengthToLogin' => 6],
'steward' =>
  ['MinimalPasswordLength' => 12,
  'MinimumPasswordLengthToLogin' => 6]
];

//<< Preferences >>
$wgDefaultUserOptions=array_merge($wgDefaultUserOptions,
['hidecategorization' => 0,
'rememberpassword' => 1,
'usenewrc' => 0,
'watchcreations' => 0,
'watchdefault' => 0,
'watchlisthidecategorization' => 0,
'watchuploads' => 0]);
$wgHiddenPrefs=['gender', 'realname'];

//<< Rate limits >>
//Any attempt to create an account, whether succeed or not, is subject to this setting.
$wgAccountCreationThrottle=
[//Per minute
  ['count' => 1,
  'seconds' => 60],
//Per day
  ['count' => 5,
  'seconds' => 60 * 60 * 24]
];
$wgPasswordAttemptThrottle=
[//Per minute
  ['count' => 5,
  'seconds' => 60],
//Per day
  ['count' => 30,
  'seconds' => 60 * 60 * 24]
];
$wgRateLimits=
//"anon" aggregates all non-logged in users (not per-IP basis)
['edit' =>
  ['ip' =>
    [5, 60], //5/min
  'newbie' =>
    [5, 60], //5/min
  'user' =>
    [10, 60] //10/min
  ],
'move' =>
  ['ip' =>
    [2, 60], //2/min
  'newbie' =>
    [2, 60], //2/min
  'user' =>
    [5, 60] //5/min
  ],
'upload' =>
  ['ip' =>
    [1, 60], //1/min
  'newbie' =>
    [1, 60], //1/min
  'user' =>
    [3, 60] //3/min
  ],
'rollback' =>
  ['ip' =>
    [5, 60], //5/min
  'newbie' =>
    [5, 60], //5/min
  'user' =>
    [10, 60] //10/min
  ],
'mailpassword' =>
  ['ip' =>
    [5, 60 * 60 * 24] //5/day
  ],
'emailuser' =>
  ['&can-bypass' => false,
  'ip' =>
    [3, 60 * 60], //3/h
  'newbie' =>
    [3, 60 * 60], //3/h
  'user' =>
    [10, 60 * 60] //10/h
  ],
'changeemail' =>
  ['&can-bypass' => false,
  'ip' =>
    [3, 60 * 60 * 24], //3/day
  'newbie' =>
    [3, 60 * 60 * 24], //3/day
  'user' =>
    [6, 60 * 60 * 24] //6/day
  ],
'confirmemail' =>
  ['&can-bypass' => false,
  'ip' =>
    [3, 60 * 60 * 24], //3/day
  'newbie' =>
    [3, 60 * 60 * 24], //3/day
  'user' =>
    [6, 60 * 60 * 24] //6/day
  ],
'purge' =>
  ['&can-bypass' => false,
  'anon' =>
    [2, 1], //2/s
  'ip' =>
    [6, 60], //6/min
  'newbie' =>
    [3, 60], //3/min
  'user' =>
    [10, 60] //10/min
  ],
'linkpurge' =>
  ['&can-bypass' => false,
  'anon' =>
    [2, 1], //2/s
  'ip' =>
    [6, 60], //6/min
  'newbie' =>
    [3, 60], //3/min
  'user' =>
    [10, 60] //10/min
  ],
'renderfile' =>
  ['&can-bypass' => false,
  'anon' =>
    [30, 1], //30/s
  'ip' =>
    [60, 60], //60/min
  'newbie' =>
    [30, 60], //30/min
  'user' =>
    [60, 60] //60/min
  ],
'renderfile-nonstandard' =>
  ['&can-bypass' => false,
  'anon' =>
    [10, 1], //10/s
  'ip' =>
    [30, 60], //30/min
  'newbie' =>
    [15, 60], //15/min
  'user' =>
    [40, 60] //40/min
  ],
'stashedit' =>
  ['&can-bypass' => false,
  'ip' =>
    [15, 60], //15/min
  'newbie' =>
    [15, 60], //15/min
  'user' =>
    [30, 60] //30/min
  ],
'changetag' =>
  ['ip' =>
    [5, 60], //5/min
  'newbie' =>
    [5, 60], //5/min
  'user' =>
    [10, 60] //10/min
  ],
'editcontentmodel' =>
  ['ip' =>
    [1, 60], //1/min
  'newbie' =>
    [1, 60], //1/min
  'user' =>
    [3, 60] //3/min
  ]
];

//<< Recent changes and watchlist >>
$wgLearnerEdits=15;
$wgLearnerMemberSince=7; //1 week
$wgRCShowWatchingUsers=true;
$wgRCWatchCategoryMembership=true;
//Disable hiding (active) page watchers to users without unwatchedpages permission
$wgUnwatchedPageSecret=-1;
$wgUnwatchedPageThreshold=0;
$wgWatchersMaxAge=60 * 60 * 24 * 7; //1 week

//<< Robot policies >>
$wgDefaultRobotPolicy='noindex,nofollow';
//All namespaces
$wgExemptFromUserRobotsControl=[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
$wgNoFollowDomainExceptions=[parse_url(str_replace('%wiki%.', '', $wmgDefaultBaseURL), PHP_URL_HOST)];

//<< User interface >>
$wgAmericanDates=true;
$wgDisableAnonTalk=true;
$wgEdititis=true;
$wgSpecialVersionShowHooks=true;

//<< Wikitext >>
$wgEnableScaryTranscluding=true;
$wgMaxTemplateDepth=10;
$wgNonincludableNamespaces=
[NS_CATEGORY_TALK,
NS_FILE_TALK,
NS_HELP_TALK,
NS_MEDIAWIKI_TALK,
NS_PROJECT_TALK,
NS_TALK,
NS_TEMPLATE_TALK,
NS_USER_TALK];
//Only allow HTTP and HTTPS protocols in links
$wgUrlProtocols=['//', 'http://', 'https://'];

//<< Others >>
$wgActiveUserDays=7; //1 week
$wgBreakFrames=true;
$wgCapitalLinks=false;
$wgExternalLinkTarget='_blank';
$wgFragmentMode=['html5'];
unset($wgFooterIcons['poweredby']);
$wgHideUserContribLimit=500;
$wgMaxSigChars=200;
$wgRangeContributionsCIDRLimit=$wmgCIDRLimit;
$wgUniversalEditButton=false;

//< Permissions >

//<< Adding and removing users from user groups >>
$wgAddGroups['bureaucrat']=['moderator', 'admin'];
$wgRemoveGroups['bureaucrat']=['moderator', 'admin'];

//<< Auto-promoting >>
$wgAutoConfirmAge=60 * 60 * 24 * $wgLearnerMemberSince;
$wgAutoConfirmCount=$wgLearnerEdits;

//<< Protection >>
$wgCascadingRestrictionLevels=
['editprotected-moderator',
'editprotected-admin',
'editprotected-bureaucrat',
'editprotected-steward'];
$wgRestrictionLevels=
['',
'editprotected-user',
'editprotected-autoconfirmed',
'editprotected-moderator',
'editprotected-admin',
'editprotected-bureaucrat',
'editprotected-steward'];
$wgRestrictionTypes=
['create',
'edit',
'move',
'upload',
'delete',
'protect'];
$wgSemiprotectedRestrictionLevels=
['editprotected-user',
'editprotected-autoconfirmed'];

//<< User group permissions >>
$wgAvailableRights=
['editprotected-user',
'editprotected-autoconfirmed',
'editprotected-moderator',
'editprotected-admin',
'editprotected-bureaucrat',
'editprotected-steward'];
$wmgGroupPermissions=
['*' =>
  ['autocreateaccount' => true,
  'browsearchive' => true,
  'createaccount' => true,
  'deletedhistory' => true,
  'patrolmarks' => true,
  'read' => true,
  'unwatchedpages' => true,
  'writeapi' => true],
'user' =>
  ['applychangetags' => true,
  'createpage' => true,
  'createtalk' => true,
  'edit' => true,
  'editmyoptions' => true,
  'editmyprivateinfo' => true,
  'editmyusercss' => true,
  'editmyuserjs' => true,
  'editmyuserjson' => true,
  'editmyuserjsredirect' => true,
  'editmywatchlist' => true,
  'editprotected-user' => true,
  'minoredit' => true,
  'sendemail' => true,
  'viewmyprivateinfo' => true,
  'viewmywatchlist' => true],
'autoconfirmed' =>
  ['autoconfirmed' => true,
  'editprotected-autoconfirmed' => true,
  'move' => true,
  'move-rootuserpages' => true,
  'movefile' => true,
  'purge' => true,
  'reupload' => true,
  'upload' => true],
'moderator' =>
  ['autopatrol' => true,
  'block' => true,
  'delete' => true,
  'deletedtext' => true,
  'deleterevision' => true,
  'editprotected-moderator' => true,
  'move-categorypages' => true,
  'protect' => true,
  'rollback' => true,
  'suppressredirect' => true,
  'undelete' => true,
  'upload_by_url' => true],
'admin' =>
  ['blockemail' => true,
  'changetags' => true,
  'deletelogentry' => true,
  'editprotected-admin' => true,
  'import' => true,
  'ipblock-exempt' => true,
  'markbotedits' => true,
  'move-subpages' => true,
  'pagelang' => true,
  'patrol' => true,
  'reupload-shared' => true,
  'unblockself' => true],
'bureaucrat' =>
  ['editcontentmodel' => true,
  'editinterface' => true,
  'editprotected-bureaucrat' => true,
  'editsitecss' => true,
  'editsitejson' => true,
  'editusercss' => true,
  'edituserjson' => true,
  'importupload' => true,
  'managechangetags' => true,
  'mergehistory' => true],
'steward' =>
  ['apihighlimits' => true,
  'bigdelete' => true,
  'deletechangetags' => true,
  'editprotected-steward' => true,
  'editsitejs' => true,
  'edituserjs' => true,
  'hideuser' => true,
  'nominornewtalk' => true,
  'noratelimit' => true,
  'override-export-depth' => true,
  'suppressionlog' => true,
  'suppressrevision' => true]
];
//Permission inheritances
$wmgPermissionInheritances=
['moderator' =>
  ['autoconfirmed'],
'admin' =>
  ['moderator'],
'bureaucrat' =>
  ['admin']
];

if ($wmgGrantStewardsGlobalPermissions)
  {$wmgPermissionInheritances['steward']=['bureaucrat'];}
else
  {$wmgGroupPermissions['steward']=[];}

if ($wmgWiki === $wmgCentralWiki)
  {$wmgGroupPermissions['steward']=array_merge($wmgGroupPermissions['steward'],
  ['siteadmin' => true,
  'userrights' => true,
  'userrights-interwiki' => true]);}

//<< Others >>
$wgDeleteRevisionsLimit=250;

//< Images and uploads >

//<< Directories >>
$wgDeletedDirectory="{$wmgDataDirectory}/private/per-wiki/{$wmgWiki}/deleted-files";
$wgUploadDirectory="{$wmgDataDirectory}/private/per-wiki/{$wmgWiki}/files";
$wgUploadPath="{$wgScriptPath}/img_auth.php";

//<< ImageMagick >>
if ($wmgPlatform === "Windows")
  {$wgImageMagickConvertCommand='C:/Program Files/ImageMagick-7.0.9-Q16-HDRI/convert.exe';}

if (file_exists($wgImageMagickConvertCommand))
  {$wgUseImageMagick=true;}

//<< SVG >>
switch ($wmgPlatform)
  {case 'Windows':
  $wgSVGConverter='inkscape';
  $wgSVGConverters=
  //"!" should not be escaped on Windows
  //$path and $wgSVGConverterPath should not be used because double quotes automatically surrounds $path.
  ['ImageMagick' => '"' . $wgImageMagickConvertCommand . '" -background none -thumbnail $widthx$height! $input $output',
  'inkscape' => '"C:/Program Files/Inkscape/bin/inkscape.com" $input --batch-process --export-filename=$output --export-height=$height --export-width=$width'];
  break;
  default:
  $wgSVGConverter=false;}

//<< Thumbnails >>
$wgGenerateThumbnailOnParse=false;
$wgThumbnailScriptPath="{$wgScriptPath}/thumb.php";

//<< Uploading from URL >>
$wgAllowCopyUploads=true;
$wgCopyUploadsDomains=['openclipart.org'];
$wgCopyUploadsFromSpecialUpload=true;

//<< Others >>
$wgEnableUploads=true;
$wgFileExtensions=['gif', 'jpg', 'png', 'webp'];

if ($wgSVGConverter)
  {$wgFileExtensions[]='svg';}

$wgHashedUploadDirectory=false;
$wgMaxUploadSize=
['*' => 1024 * 1024 * 5, //5 MB
'url' => 1024 * 1024 * 2]; //2 MB
$wgUpdateCompatibleMetadata=true;
$wgUploadSizeWarning=1024 * 1024 * 4; //4 MB
$wgUploadStashMaxAge=60 * 60; //1 hour
$wgUseCopyrightUpload=true;
$wgUseInstantCommons=true;
$wgUseTinyRGBForJPGThumbnails=true;

//< Email >

//Server does not support e-mail services
$wgEnableEmail=false;

//< System >

//<< API >>
$wgAPIRequestLog="{$wmgDataDirectory}/private/per-wiki/{$wmgWiki}/api.log";

//<< Authentication and sessions >>
$wgAllowSecuritySensitiveOperationIfCannotReauthenticate=
['default' => false,
'LinkAccounts' => true,
'UnlinkAccount' => true];
$wgAuthenticationTokenVersion='1';
$wgExtendedLoginCookieExpiration=60 * 60 * 24 * 90; //3 months
$wgPasswordResetRoutes['username']=false;
$wgReauthenticateTime=
['default' => 60 * 10, //10 minutes
'ChangeCredentials' => 60, //1 minute
'RemoveCredentials' => 60]; //1 minute

//<< Databases >>
//SQLite-only
$wgSQLiteDataDir="{$wmgDataDirectory}/private/databases";

if ($wmgGlobalAccountMode === 'shared-database')
  {$wgSharedDB="{$wmgCentralWiki}wiki";
  $wgSharedTables=['actor', 'user'];}

//<< Debugging >>
if ($wgCommandLineMode || $wmgDebugMode)
  {error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  $wgDebugDumpSql=true;
  $wgDevelopmentWarnings=true;
  $wgShowExceptionDetails=true;}

//<< URL >>
$actions=
['delete',
'edit',
'history',
'info',
'markpatrolled',
'protect',
'purge',
'raw',
'render',
'revert',
'rollback',
'submit',
'unprotect',
'unwatch',
'watch'];

foreach ($actions as $action)
  {$wgActionPaths[$action]="/{$action}/$1";}

unset($action, $actions);
$wgArticlePath='/page/$1';
$wgServer=str_replace('%wiki%', $wmgWiki, $wmgDefaultBaseURL);
$wgUsePathInfo=true;

//<< Others >>
$wgAsyncHTTPTimeout=30;
$wgDeleteRevisionsBatchSize=500;
//Ignored on Windows
$wgDirectoryMode=0755;
$wgEnableDnsBlacklist=true;
$wgFeed=false;
$wgGitBin=false;
$wgHTTPTimeout=30;
$wgJpegTran=false;
$wgMemoryLimit='256M';
$wgReadOnlyFile="{$wmgDataDirectory}/readonly.txt";

switch ($wmgPlatform)
  {case 'Windows':
  $wgPhpCli='C:/plavormind/php/php.exe';
  break;}

//< Caching >

$wgCacheDirectory="{$wmgDataDirectory}/private/per-wiki/{$wmgWiki}/cache";
//Disable client side caching
$wgCachePages=false;
$wgMainCacheType=CACHE_ACCEL;

//<< File cache >>
$wgFileCacheDepth=0;
$wgFileCacheDirectory=$wgCacheDirectory;
//Disabled due to several issues, including breaking global user pages and taking too long time to automatically purging cache
//$wgUseFileCache=true;

//<< Message cache >>
$wgMessageCacheType=$wgMainCacheType;
$wgUseLocalMessageCache=true;

//<< Sidebar cache >>
$wgEnableSidebarCache=true;
$wgSidebarCacheExpiry=$wmgCacheExpiry;
$wgTranscludeCacheExpiry=$wmgCacheExpiry;

//<< Others >>
$wgAPICacheHelpTimeout=$wmgCacheExpiry;
$wgInterwikiExpiry=$wmgCacheExpiry;
$wgLanguageConverterCacheType=$wgMainCacheType;
$wgObjectCacheSessionExpiry=$wmgCacheExpiry;
$wgParserCacheExpireTime=$wmgCacheExpiry;
$wgParserCacheType=$wgMainCacheType;
$wgRevisionCacheExpiry=$wmgCacheExpiry;
$wgSearchSuggestCacheExpiry=$wmgCacheExpiry;
//This one should always use cache
$wgSessionCacheType=CACHE_ACCEL;

//< Extensions >

//<< Extension usage >>
$wmgExtensions=
['Babel' => true,
'Cite' => false,
'CodeEditor' => false,
'CodeMirror' => false,
'CommonsMetadata' => false,
'GlobalCssJs' => true,
'GlobalUserPage' => true,
'Highlightjs_Integration' => false,
'InputBox' => false,
'Josa' => false,
'MassEditRegex' => false,
'Math' => false,
'MultimediaViewer' => false,
'Nuke' => false,
'PageImages' => false,
'ParserFunctions' => false,
'Poem' => false,
'Popups' => false,
'ReplaceText' => false,
'RevisionSlider' => false,
'Scribunto' => false,
'SyntaxHighlight_GeSHi' => false,
'TemplateData' => false,
'TemplateSandbox' => false,
'TemplateStyles' => false,
'TemplateWizard' => false,
'TextExtracts' => false,
'TwoColConflict' => false,
'UniversalLanguageSelector' => false,
'UploadsLink' => false,
'WikiEditor' => false];

//< Skins >

//<< Skin usage >>
$wmgSkins=
['Citizen' => false,
'Medik' => false,
'Metrolook' => false,
'MinervaNeue' => false,
'Timeless' => false];
