/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.uiColor = '#AADC6E';
	config.language                  = 'vi';
	config.filebrowserBrowseUrl      = 'http://localhost/qhlar/public/mt95_admin/templates/js/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'http://localhost/qhlar/public/mt95_admin/templates/js/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'http://localhost/qhlar/public/mt95_admin/templates/js/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl      = 'http://localhost/qhlar/public/mt95_admin/templates/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'http://localhost/qhlar/public/mt95_admin/templates/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://localhost/qhlar/public/mt95_admin/templates/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
