/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbar = 'MyToolbar';
    config.forcePasteAsPlainText = true;
    config.toolbar_MyToolbar =
    [
        
        { name: 'document', items: [ 'Source'] },
        { name: 'basicstyles', items : [ 'Bold','Italic'] },
        { name: 'styles', items : ['FontSize' ] },
        { name: 'colors', items : [ 'TextColor','BGColor' ] },
        { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
    ];
};
