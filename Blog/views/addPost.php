<form action="addPost" method="post">
    <label for="">Title</label>
    <br>
    <input type="text" required placeholder="title" id="title" value="caption">
    <div id="editor">
        <h1>Hello world!</h1>
        <p>I'm an instance of <a href="http://ckeditor.com">CKEditor</a>.</p>
    </div>
<!--    <textarea name="post" id="" cols="30" rows="10">    </textarea>-->
    <input type="submit" value="Запостить">
</form>



<button onclick="save();">as</button>

<script>
    initSample();

    function save() {
        var htmldata = CKEDITOR.instances.editor.document; //.document.getBody().getHtml();
//        console.log(htmldata.getBody().getHtml());

        var data = new FormData();
        data.append('title', document.getElementById('title').value);
        data.append('text', htmldata.getBody().getHtml() );

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/addPost', true);
        xhr.onload = function () {
            // do something to response
            console.log(this.responseText);
            window.location.href = "/";
        };
        xhr.send(data);

    }
</script>
