<div class="main">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4 well well-sm">
            <legend> Добавление новостей</legend>

            <form enctype="multipart/form-data" action="/save_changes/<? echo $data['id'];?>/" method="post" class="form" role="form">
                <input class="form-control" name="headline" placeholder="Заголовок" type="text" value="<? echo $data['headline'];?>" />
                <textarea type="text" name="preview" class="form-control" rows="5" cols="25" required="required" placeholder="Анонс"><? echo $data['preview'];?></textarea>
                <textarea type="text" name="text" class="form-control" rows="9" cols="45" required="required" placeholder="Текст"><? echo $data['text'];?></textarea>
                <div class="form-group">
                    <label>Изображение</label>
                    <input type="file" class="form-control" name="img">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
            </form>
        </div>
    </div>