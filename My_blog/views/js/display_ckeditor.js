
        alert('Xin chào !');
        var config = {};
        config.entities_latin = false;
        config.language = 'vi';
        config.extraPlugins = 'autogrow';
        config.autoGrow_minHeight = 200;
        config.autoGrow_maxHeight = 500;
        CKEDITOR.replace('content_posts', config);