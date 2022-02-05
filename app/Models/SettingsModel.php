<?php namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table = 'settings';

    protected $allowedFields = ['field', 'value'];

    protected $useTimestamps = false;

    public function updateSettings($data)
    {
        foreach($data as $key => $value)
        {
            $this->where('field', $key)->set(['value' => $value])->update();
        }

        return true;
    }

    public function getSettings($restricted = false)
    {
        $data = $this->where('restricted', $restricted)->findAll();

        foreach($data as $data_item)
        {
            $settings[$data_item['field']] = $data_item['value'];
        }

        return $settings;
    }
}
