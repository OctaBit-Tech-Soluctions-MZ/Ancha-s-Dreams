document.addEventListener('DOMContentLoaded', function() {
    const editor = new Jodit('#editor', {
        height: 400,
        language: 'pt_br',
        uploader: {
            insertImageAsBase64URI: true
        }
    });
});
