<?php 

// safety, jquery cdn and setup
require_once 'functions/setup.php';

// meta box class
require_once 'functions/meta-box/meta-box.class.php';

// register custom post types and taxonomies
require_once('functions/post-type-faq.php');
require_once('functions/post-type-vaccination.php');
require_once('functions/post-type-country.php');
require_once('functions/post-type-clinic.php');
require_once('functions/post-type-region.php');

// menus
require_once 'functions/menu-general.php';
require_once 'functions/DynamicMenus.php';

// url rewrites
require_once 'functions/rewrite.php';

// relationships
require_once 'functions/relationships.php';

// relationships
require_once 'functions/utilities.php';

// theme options in admin (unused?)
require_once( get_template_directory() . '/lib/admin/theme-options.php' );
