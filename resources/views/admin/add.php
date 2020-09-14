<div class="main">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4 well well-sm">
            <legend> Добавление новостей</legend>
            <form enctype="multipart/form-data" action="/save_post/" method="post">
                <input class="form-control" name="headline" placeholder="Заголовок" type="text" required/>
                <textarea type="text" name="preview" class="form-control" rows="5" cols="25" required="required" placeholder="Анонс"></textarea>
                <textarea type="text" name="text" class="form-control" rows="9" cols="45" required="required" placeholder="Текст"></textarea>
                <div class="form-group">
                    <label>Изображение</label>
                    <input type="file" class="form-control" name="img">
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
            </form>
        </div>
    </div>