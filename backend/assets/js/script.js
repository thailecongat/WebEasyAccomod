$(document).ready(function() {
    //tích hợp ckeditor vào trường Chi tiết sản phẩm
    // CKEDITOR.replace('textarea[name=content]');
    //bắt buộc phải truyền vào id của phần tử HTML muốn tích hợp
    CKEDITOR.replace('ckeditor-content', {
            filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
            filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        }
    );
});