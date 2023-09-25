<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id';

    protected $allowedFields = ['category', 'title', 'client', 'date', 'description', 'pictures', 'show', 'author'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function removePicture($file, $id)
    {
        $pictures = $this->where('id', $id)->findColumn('pictures');

        $pictures = unserialize($pictures[0]);

        $key = array_search($file, $pictures);

        unset($pictures[$key]);

        $pictures = array_values($pictures);

        $this->where('id', $id)->set(['pictures' => serialize($pictures)])->update();
    }

    public function updatePictures($images, $id)
    {
        $srcPictures = $this->where('id', $id)->findColumn('pictures');

        $pictures = array_merge(unserialize($srcPictures[0]), $images);

        if($this->where('id', $id)->set(['pictures' => serialize($pictures)])->update())
        {
            return true;
        }
    }

    public function deleteAlbum($id)
    {
        $pictures = $this->where('id', $id)->findColumn('pictures');

        $pictures = unserialize($pictures[0]);

        if($pictures != null)
        {
            foreach($pictures as $picture)
            {
                if(file_exists(ROOTPATH.'/public/uploads/'.$picture))
                {
                    if(!unlink(ROOTPATH.'/public/uploads/'.$picture))
                    {
                        return 'Wystąpił błąd podczas usuwania pliku - '.$picture;
                    }
                } 
            }
        }

        $this->delete($id, true);

        return true;
    }

    public function countPictures()
    {
        $pictures = $this->findColumn('pictures');

        if($pictures)
        {
            foreach($pictures as $pictures_item)
        {
            $pictures_item = unserialize($pictures_item);

            $numOfPictures =+ count($pictures_item);
        }
        return $numOfPictures;
        } else {
            return 0;
        }
    }
}
