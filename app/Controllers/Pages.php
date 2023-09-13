<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function view($page)
	{
        if(!is_file(APPPATH.'Views/pages/'.$page.'.php'))
        {
            //Can't find file
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['settings'] = $this->cfg;

        $data['siteTitle'] = $this->cfg['siteName']. ' - ' . ucfirst($page);
        $data['siteDesc'] = 'test';
        $data['year'] = date('Y');

        echo view('templates/header', $data);
		echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
	}
}
