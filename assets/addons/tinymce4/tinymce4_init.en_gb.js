function redaxo5FileBrowser (field_name, url, type, win) {
     // console.log("Field_Name: " + field_name + "nURL: " + url + "nType: " + type + "nWin: " + win); // debug/testing

    /* If you work with sessions in PHP and your client doesn't accept cookies you might need to carry
       the session name and session ID in the request string (can look like this: "?PHPSESSID=88p0n70s9dsknra96qhuk6etm5").
       These lines of code extract the necessary parameters and add them back to the filebrowser URL again. */

    var cmsURL = 'index.php?mce_profile='+ tinymce.activeEditor.profile +'&tinymce4_call=';    // script URL - use an absolute path!
    if ('image' == type) {
        cmsURL+= '/image/index';
        var browser_name = 'Bild auswählen';
    } else if ('file' == type) {
        var browser_name = 'Link auswählen';
        cmsURL+= '/file/index';
    } else if ('media' == type) {
        var browser_name = 'Medium auswählen';
        cmsURL+= '/media/index';
    }
    var m = location.href.match(/clang=[0-9]+/);
    if (null != m) {
        cmsURL+= '&' + m[0].replace('clang', 'clang_id');
    }

    tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
                    language:'en_gb',
                title : browser_name,
        width : 420,  // Your dimensions may differ - toy around with them!
        height : 400,
        resizable : true,
        inline : true,  // This parameter only has an effect if you use the inlinepopups plugin!
        close_previous : true
    }, {
        window : win,
        input : field_name
    });
    return false;
}

function tinymce4_remove() {
    $('.mce-initialized').removeClass('mce-initialized');
    tinymce.remove();
}

function tinymce4_init(){
            var profile = {
selector: 'textarea.tinyMCEEditor',
file_browser_callback: redaxo5FileBrowser,
plugins: 'autoresize lists autolink link visualblocks fullscreen paste code hr tabfocus visualchars',
toolbar: 'insertfile undo redo | styleselect | bold italic underline superscript subscript | bullist numlist | link unlink | pastetext removeformat | fullscreen visualblocks code',
style_formats: [
{title: 'Headers', items: [
{title: 'Header 2', format: 'h2'},
{title: 'Header 3', format: 'h3'},
{title: 'Header 4', format: 'h4'},
{title: 'Header 5', format: 'h5'},
{title: 'Header 6', format: 'h6'}
]},
],
menu: {},
formats : {underline : {inline : 'u', exact : true}},
convert_urls: false,
branding: false,
statusbar: false,
autoresize_bottom_margin: 0,
autoresize_max_height: 500,
autoresize_min_height: 120,
autoresize_overflow_padding: 15,
valid_elements : 'a[href|target=_blank|title],strong/b,em/i,u,h2,h3,h4,h5,h6,br,p,ul,ol,li,sup,sub',
content_css: '../assets/addons/tinymce4/bootstrap/css/bootstrap.min.css'
};
        profile.selector += ':not(.mce-initialized)';

        profile.setup = function(editor) {
            editor.profile = '1525512416';
        };
        tinymce.init(profile).then(function(editors) {
            for(var i in editors) {
                $(editors[i].targetElm).addClass('mce-initialized');
            }
        });
        return false;
}

$(document).on('ready pjax:success',function() {
    // Erst instanzen zerstören, erforderlich für "Block übernehmen"
    window.setTimeout(function() {
        tinymce4_remove();
        tinymce4_init();
    }, 100);

    if (typeof mblock_module === 'object' && !document.tinymce_mblock_initialized) {
        document.tinymce_mblock_initialized = true;

        mblock_module.registerCallback('reindex_end', function() {
            if (mblock_module.lastAction == 'add_item' || mblock_module.lastAction == 'sort') {
                mblock_module.affectedItem.find('.mce-initialized').removeClass('mce-initialized').show();
                mblock_module.affectedItem.find('.mce-tinymce.mce-container').remove();
                tinymce4_init();
            }
        });
    }
});

$(document).on('be_table:row-added',function() {
    tinymce4_init();
});