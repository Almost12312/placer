<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .imgs {
            display: flex;
        }
        .imgs img {
            max-width: 500px;
            max-height: 500px;
        }
    </style>
    <title>Document</title>
</head>
<body>


<div>

    <div id="imgs" class="imgs"></div>

    <label for="upload_file_input">Выбрать картинки</label>
    <input id="upload_file_input" type="file" multiple hidden>

    <button id="clear">Отчистить все</button>

</div>

<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

<script>

    let imgs = document.querySelector('#imgs');
    let upload_file_input = document.querySelector('#upload_file_input');

    let imageIds = [];

    /*let imageIds = [
        {
            id: 1,
            url : ''
        },
        {
            id: 2,
            url : ''
        }
    ];*/

    function rmImage(id) {

        let image = document.querySelector(`#imgs img[data-id="${id}"]`);

        if (image) {

            image.remove();

            let index = imageIds.findIndex(item => item.id === id);

            if (index !== -1) {
                imageIds.splice(index, 1);
            }

        }
    }

    upload_file_input.addEventListener('change', event => {

        const files = event.target.files;

        if (files.length === 0) {
            return;
        }

        for (let i = 0; i < files.length; ++i) {

            let fd = new FormData;
            fd.append('file', files[i]);

            axios.post('/file/upload', fd)
                .then((response) => {

                    imageIds.push(response.data);

                    let newImg = document.createElement('img');

                    newImg.src = response.data.url;
                    newImg.dataset.id = response.data.id;

                    imgs.appendChild(newImg);
                });
        }
    });

    document.querySelector('#clear').addEventListener('click', () => {
        imageIds = [];
        imgs.innerHTML = '';
        upload_file_input.value = '';
    });

    rmImage(id);

</script>

</body>
</html>
