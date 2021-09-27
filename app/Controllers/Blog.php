<?php

namespace App\Controllers;

use App\Models\SettingsModel;
use App\Models\UsersModel;
use App\Models\NewsModel;

use App\Controllers\BaseController;


class Blog extends BaseController
{
	public function index()
	{
		$news = new NewsModel;
		$users = new UsersModel;

		$data['newsList'] = $news->findAll();
		$data['users'] = $users->findAll();
		echo view('templates/header', $data);
		echo view('pages/blog', $data);
        echo view('templates/footer', $data);
	}

	public function view($slug) {
		$newsList = new NewsModel;
		$users = new UsersModel;

		if(!$slug) {
			redirect('/blog', 'refresh');
		}

		$users = $users->findAll();
		$news = $newsList->getNews($slug);

		$authorData = array_search($news['authorID'], array_column($users, 'id'));

		if($authorData !== FALSE)
		{
			$authorName = $users[$authorData]['firstName'] . ' ' . $users[$authorData]['lastName'];
		} else {
			$authorName = 'System';
		}

		$data['author'] = $authorName;
		$data['news'] = $news;

		echo view('templates/header', $data);
		echo view('pages/blog-single', $data);
        echo view('templates/footer', $data);
	}
}
