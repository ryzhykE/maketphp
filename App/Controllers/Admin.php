<?php

namespace App\Controllers;

use App\AController;
use App\Model\Article;
use App\Model\Author;

class Admin
    extends AController
{
    protected $user = TRUE;

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
        $author = Author::findAll();
        $this->view->author = $author;
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
        $author = Author::findAll();
        $this->view->author = $author;
        $article = new Article();
        $this->view->title = 'Добавление новости';

        if(isset($_POST['submit'])) {
            $article->title = $_POST['title'];
            $article->article = $_POST['article'];
            $article->author_id = $_POST['idauthor'];
            if (!empty($article->title) && !empty($article->article) && false !== $article->save() ) {
                $article->save();
                header('Location: /admin');
            } else {
               $_SESSION['message'] = "Не все поля заполнены";
            }
            $this->view->mess = $_SESSION['message'];
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