$('.file-input').change(function() {
//get the input and UL list
    var input = document.getElementById('filesToUpload');
    var list = $('.data-js-label-label');

//for every file...
    list.text('');
    for (var x = 0; x < input.files.length; x++) {
        //add to list
        coma = (x > 0) ? ', ' : '';
        text = coma + input.files[x].name;

        list.append(text);
    }
});