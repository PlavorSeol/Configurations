<?php
//< General >

//<< Basic information >>
$wgLogos=
['1x' => "/resources/per-wiki/{$wmgWiki}/logos/logo-1x.png",
'1.5x' => "/resources/per-wiki/{$wmgWiki}/logos/logo-1.5x.png",
'2x' => "/resources/per-wiki/{$wmgWiki}/logos/logo-2x.png",
'icon' => "/resources/per-wiki/{$wmgWiki}/logos/logo-2x.png"];
$wgSitename='PlavorMindCentral';

//<< Copyright >>
$wgMaxCredits=10;

//<< CSS and JavaScript >>
$wgAllowSiteCSSOnRestrictedPages=true;

//<< Namespaces >>
$wgMetaNamespace='PlavorMind';

//<< Parser >>
$wgAllowDisplayTitle=false;
$wgAllowSlowParserFunctions=true; //Experimental
$wgCleanSignatures=false;
$wgUseNewMediaStructure=true; //Experimental

//<< Preferences >>
$wgAllowUserCssPrefs=false; //Experimental

//<< Recent changes and watchlist >>
$wgWatchlistExpiry=true;

//<< User interface >>
$wgForceUIMsgAsContentMsg=
['excontent',
'excontentauthor',
'modifiedarticleprotection-comment',
'protect-expiry-indefinite',
'protect-fallback',
'protect-level-editprotected',
'protect-level-editprotected-admin',
'protect-level-editprotected-autoconfirmed',
'protect-level-editprotected-bureaucrat',
'protect-level-editprotected-moderator',
'protect-level-editprotected-steward',
'protect-level-editprotected-user',
'protect-level-editsemiprotected',
'protect-summary-cascade',
'protect-summary-desc',
'protectedarticle-comment',
'restriction-delete',
'restriction-edit',
'restriction-move',
'restriction-protect',
'restriction-upload',
'revertpage',
'undo-summary',
'unprotectedarticle-comment'];
$wgMaxTocLevel=5;
$wgShowRollbackEditCount=30;
$wgSiteNotice='Current [[MediaWiki]] version: [[Special:Version|{{CURRENTVERSION}}]]';

//<< Others >>
//Remove default value ('obsolete-tag')
$wgSignatureAllowedLintErrors=[];
$wgSignatureValidation='disallow';

//< Permissions >

//<< Protection >>
$wgNamespaceProtection=
[NS_CATEGORY_TALK =>
  ['editprotected-steward'],
NS_FILE_TALK =>
  ['editprotected-steward'],
NS_HELP_TALK =>
  ['editprotected-steward'],
NS_MEDIAWIKI_TALK =>
  ['editprotected-steward'],
NS_PROJECT =>
  ['editprotected-bureaucrat'],
NS_TEMPLATE =>
  ['editprotected-admin'],
NS_TEMPLATE_TALK =>
  ['editprotected-steward'],
];

//<< User group permissions >>
$wmgGroupPermissions['bureaucrat']['editinterface']=false;
$wmgGroupPermissions['bureaucrat']['editsitecss']=false;
$wmgGroupPermissions['bureaucrat']['editsitejson']=false;

if ($wmgGrantStewardsGlobalPermissions)
  {$wmgGroupPermissions['steward']['editinterface']=true;
  $wmgGroupPermissions['steward']['editsitecss']=true;
  $wmgGroupPermissions['steward']['editsitejson']=true;}

//< Extensions >

//<< Extension usage >>
$wmgExtensions=array_merge($wmgExtensions,
['Babel' => true,
'Cite' => true,
'CodeEditor' => true,
'CodeMirror' => true,
'CommonsMetadata' => true,
'Highlightjs_Integration' => true,
'MassEditRegex' => true,
'MultimediaViewer' => true,
'Nuke' => true,
'PageImages' => true,
'Poem' => true,
'Popups' => true,
'ReplaceText' => true,
'RevisionSlider' => true,
'SyntaxHighlight_GeSHi' => true,
'TemplateData' => true,
'TemplateSandbox' => true,
'TemplateStyles' => true,
'TemplateWizard' => true,
'TextExtracts' => true,
'TwoColConflict' => true,
'UniversalLanguageSelector' => true,
'UploadsLink' => true,
'WikiEditor' => true]);

//< Skins >

//<< Skin usage >>
$wmgSkins['Citizen'] = true;
$wmgSkins['MinervaNeue'] = true;
$wmgSkins['Timeless'] = true;
