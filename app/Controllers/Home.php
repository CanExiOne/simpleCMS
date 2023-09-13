<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index(): string
	{
		$data['settings'] = $this->cfg;
		$data['siteTitle'] = $this->cfg['siteName'];

		echo view('templates/header', $data);
		echo view('home', $data);
        echo view('templates/footer', $data);
	}
}
