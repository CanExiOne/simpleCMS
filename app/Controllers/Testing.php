<?php namespace App\Controllers;

use App\Models\SettingsModel;
use App\Models\UsersModel;
use CodeIgniter\Controller;

class Testing extends BaseController
{
	public function index()
	{
        //Create User Management System
        //Create Content Management System
        //Create Configuration Management System
        $siteName = 'test';
        $siteDesc = 'test';
        $data['title'] = $siteName;
        $data['siteDesc'] = $siteDesc;
        $data['year'] = date('Y');

        echo view('admin/templates/header', $data);
		echo view('tests/home', $data);
        echo view('admin/templates/footer', $data);
	}

    public function testPost()
    {
        helper('filesystem');
        if($this->request->getMethod() === 'post')
        {
            $data = $this->request->getJSON();
            write_file(ROOTPATH . 'writable/uploads/file.json', json_encode(['status' => 'success', 'message' => 'Udało się byku', 'data' => $this->request->getJSON()]));
            return json_encode(['status' => 'success', 'message' => 'Udało się byku', 'data' => $data]);
        }
    }
}