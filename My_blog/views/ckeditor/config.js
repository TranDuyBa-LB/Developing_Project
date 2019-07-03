/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

var host = "localhost:8080/My_Project/Project_Private/My_blog/views";
config.filebrowserBrowseUrl = "http://"+host+"/ckfinder/ckfinder.html";
 
config.filebrowserImageBrowseUrl = "http://"+host+"/ckfinder/ckfinder.html?type=Images";
 
config.filebrowserFlashBrowseUrl = "http://"+host+"/ckfinder/ckfinder.html?type=Flash";
 
config.filebrowserUploadUrl = "http://"+host+"/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
 
config.filebrowserImageUploadUrl = "http://"+host+"/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
 
config.filebrowserFlashUploadUrl = "http://"+host+"/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";

};
