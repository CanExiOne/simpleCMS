<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function view($page)
	{
        $session = session();

        if(!is_file(APPPATH.'Views/pages/'.$page.'.php'))
        {
            //Can't find file
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $siteDesc = 'test';
        $data['year'] = date('Y');

        echo view('templates/header', $data);
		echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
	}
}
