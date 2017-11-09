<form action="addPost" method="post">
    <label for="">Title</label>
    <br>
    <input type="text" required placeholder="title" id="title" value="caption">
    <div id="editor">
        <h1>Hello world!</h1>
        <p>I'm an instance of <a href="http://ckeditor.com">CKEditor</a>.</p>
    </div>
    <select name="category" id="cat">
        <option value="0">General</option>
        <option value="1">Tech</option>
        <option value="2">Work</option>
    </select>
    <input name="image" type="file" id="image" />
<!--    <textarea name="post" id="" cols="30" rows="10">    </textarea>-->
<!--    <input type="submit" value="Запостить">-->

</form>
<button onclick="save();">POst it</button>





<script>
    initSample();

    function save() {
        var htmldata = CKEDITOR.instances.editor.document; //.document.getBody().getHtml();
//        console.log(htmldata.getBody().getHtml());

        var data = new FormData();
        data.append('title', document.getElementById('title').value);
        data.append('image', document.getElementById('image').files[0]);
        data.append('cat', document.getElementById('cat').value);
        data.append('text', htmldata.getBody().getHtml() );

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/addPost', true);
        xhr.onload = function () {
            // do something to response
//            console.log(document.getElementById('image').files[0]);
            console.log(this.responseText);
//            window.location.href = "/";
        };
        xhr.send(data);

    }
</script>
