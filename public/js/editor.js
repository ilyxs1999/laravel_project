

const editor = new EditorJS({
    holder : 'editorjs',
    autofocus: true,
     tools: {
        header: Header,
        image: {
            class: ImageTool,
            config: {
                endpoints: {
                    byFile: 'http://blog/public/storage', // Your backend file uploader endpoint
                    byUrl: 'http://blog/public/storage', // Your endpoint that provides uploading by Url
                }
            }
        },
         list: {
             class: List,
             inlineToolbar: true,
         },
         linkTool: {
             class: LinkTool,
             config: {
                 endpoint: 'http://localhost:8008/fetchUrl', // Your backend endpoint for url data fetching
             }
         },
         checklist: {
             class: Checklist,
             inlineToolbar: true,
         },
         Marker: {
             class: Marker,
             shortcut: 'CMD+SHIFT+M',
         },
         embed: {
             class: Embed,
             config: {
                 services: {
                     youtube: true,
                     instagram: true
                 }
             },
         },
         delimiter: Delimiter,
         table: {
             class: Table,
             inlineToolbar: true,
             config: {
                 rows: 2,
                 cols: 3,
             },
         },
         raw: RawTool,
     }
});
console.log(editor);

$('#save_article').click(function (){
    alert('hello');
    editor.save().then((outputData) => {
        console.log('Article data: ', outputData)
    }).catch((error) => {
        console.log('Saving failed: ', error)
    });
})


