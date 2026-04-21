<?php

class CommentController
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new \CommentModel();
    }

    public function index()
    {
        $title = 'Quản lý bình luận';
        $view = 'comments/index';
        $data = $this->commentModel->getAll();

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function approve($id)
    {
        if (empty($id)) {
            header('Location: ' . BASE_URL_ADMIN . '/comments');
            exit;
        }

        $this->commentModel->setStatus((int) $id, 'visible');
        header('Location: ' . BASE_URL_ADMIN . '/comments');
        exit;
    }

    public function hide($id)
    {
        if (empty($id)) {
            header('Location: ' . BASE_URL_ADMIN . '/comments');
            exit;
        }

        $this->commentModel->setStatus((int) $id, 'hidden');
        header('Location: ' . BASE_URL_ADMIN . '/comments');
        exit;
    }

    public function delete($id)
    {
        if (empty($id)) {
            header('Location: ' . BASE_URL_ADMIN . '/comments');
            exit;
        }

        $this->commentModel->deleteById((int) $id);
        header('Location: ' . BASE_URL_ADMIN . '/comments');
        exit;
    }
}
