document.addEventListener('DOMContentLoaded', function() {
    const editor = new Jodit('#editor', {
        toolbar: true,
        buttons: [
            'bold',
            'underline',
            '|',
            'ul',
            'ol',
            '|',
            'paragraph',
            'h1', 'h2', 'h3',
            '|',
            'file',
            '|',
            'undo', 'redo'
        ],
        uploader: {
            insertImageAsBase64URI: true,
            url: '/upload', // <-- muda isto conforme teu endpoint
        },
        height: 300
    });
    });
