<?php

namespace App\Config;

class Routes
{

    public function take_routes()
    {
        return array(

            'logout' => 'user@logout',
            'save_post' => 'news@save_post',
            'login' => 'user@login',
            'edit/([0-9])' => 'news@edit_news@$Id',
            'change/([0-9])' => 'news@change_post@$Id',
            'save_changes/([0-9])' => 'news@save_changes@$Id',
            'delete/([0-9])' => 'news@delete_news@$Id',
            'create' => 'news@create_post',
            'autorize' => 'user@autorize',
            'show/([0-9])' => 'news@show_post@$Id',
            'page/([0-9])' => 'news@show_news@$Id',
            '' => 'news@show_news@1'
        );
    }
}
