<?php
##Prevent web access

if (!defined("MEDIAWIKI"))
{exit("This is not a valid entry point.");}

##General

/*Basic information*/
$wgSitename="오사위키덤프";

##Permissions

/*Group permissions*/
$wgGroupPermissions["user"]["edit"]=false;

##Extensions

/*Extensions usage*/
$wmgExtensionCite=true;
$wmgExtensionReplaceText=true;
$wmgExtensionSimpleMathJax=true;

##Skins

/*Others*/
$wgDefaultSkin="PlavorBuma";
?>