<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\NewsModel;

use App\Controllers\BaseController;


class Blog extends BaseController
{
	public function index()
	{
		$news = new NewsModel;
		$users = new UsersModel;

		$data['settings'] = $this->cfg;

		$data['siteTitle'] = $data['settings']['siteName'] . ' - Blog';

		$data['newsList'] = $news->orderBy('created_at', 'desc')->findAll();
		$data['users'] = $users->findAll();
		echo view('templates/header', $data);
		echo view('pages/blog', $data);
        echo view('templates/footer', $data);
	}

	public function view($slug) {
		$newsList = new NewsModel;
		$users = new UsersModel;

		$users = $users->findAll();
		$news = $newsList->getNews($slug);

		if(empty($news)) {
			return redirect()->to('/blog');
		}

		$authorData = array_search($news['authorId'], array_column($users, 'id'));

		if($authorData !== FALSE)
		{
			$authorName = $users[$authorData]['firstName'] . ' ' . $users[$authorData]['lastName'];
		} else {
			$authorName = 'System';
		}

		$data['siteTitle'] = ucfirst($news['title']);

		$data['settings'] = $this->cfg;

		$data['author'] = $authorName;
		$data['news'] = $news;

		echo view('templates/header', $data);
		echo view('pages/blog-single', $data);
        echo view('templates/footer', $data);
	}
}
