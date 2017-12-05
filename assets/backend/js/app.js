var editor = function () {
    var CKTextEditor = function() {
        CKEDITOR.replace( 'content' );
    }
    return {
        init: function () {
            CKTextEditor();
        }
    }
}

$(document).ready(function () {
    editor().init();
});
$('.toggle').toggles({ checkbox: $('.checkme') });