<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'albumid';

    protected $allowedFields = ['category', 'title', 'client', 'date', 'description', 'pictures', 'show', 'author'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function removePicture($file, $id)
    {
        $pictures = $this->where('albumid', $id)->findColumn('pictures');

        $pictures = unserialize($pictures[0]);

        $key = array_search($file, $pictures);

        unset($pictures[$key]);

        $pictures = array_values($pictures);

        $this->where('albumid', $id)->set(['pictures' => serialize($pictures)])->update();
    }

    public function updatePictures($images, $id)
    {
        $srcPictures = $this->where('albumid', $id)->findColumn('pictures');

        $pictures = array_merge(unserialize($srcPictures[0]), $images);

        if($this->where('albumid', $id)->set(['pictures' => serialize($pictures)])->update())
        {
            return true;
        }
    }

    public function deleteAlbum($id)
    {
        $pictures = $this->where('albumid', $id)->findColumn('pictures');

        $pictures = unserialize($pictures[0]);

        if($pictures != null)
        {
            foreach($pictures as $picture)
            {
                if(!unlink(ROOTPATH.'/public/uploads/'.$picture))
                {
                    return 'Wystąpił błąd podczas usuwania pliku - '.$picture;
                }
            }
        }

        $this->delete($id, true);

        return true;
    }
}
