<?php

namespace App\Controllers;


use App\AController;
use App\Model\Article;

class Admin
    extends AController
{
    public function actionDefault($page)
    {
		/**
        if (isset($page)) {
            $news = Article::findBySort($page);
        } else {
            $news = Article::findAll();
        }
		*/
		$news = Article::findAll();
        $this->view->title = 'Админка';
        $this->view->news = $news;
        $this->view->display(__DIR__. '/../view/admin/index.php');
    }

    public function actionUpdate (int $id)
    {
        $article = new Article();
        $article->id = $id;
        if (isset($_POST['submit'])) {
            $article->title = $_POST['title'];
            $article->article = $_POST['article'];
            $article->author_id = $_POST['idauthor'];

            if (false !== $article->save()) {
                header('Location: /admin');
            }
        }
        $article = Article::findByid($id);
        $this->view->title = 'Обновить новости';
        $this->view->article = $article;
        $this->view->display(__DIR__. '/../view/admin/upd_form.php');
    }

    public function actionAdd()
    {
        $article = new Article();
        $this->view->title = 'Добавление новости';

        if(isset($_POST['submit'])) {
            $article->title = $_POST['title'];
            $article->article = $_POST['article'];
            $article->author_id = $_POST['idauthor'];

            if(false !== $article->save()){
                header('Location: /admin');
            }
        }
        $this->view->display(__DIR__. '/../view/admin/add_form.php');
    }

    public function actionDelete(int $id)
    {
        $article= new Article();
        $article->id = $id;
        if (isset($id)) {
            $article->delete();
            header('Location: /admin');
        }
    }
}