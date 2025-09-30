<?php 
namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    // Add Like
    public function addLike( $type, $typeId)
    {
        $builder = $this->db->table('likes');
        return $builder->insert([
            
            'type' => $type,
            'type_id'   => $typeId
        ]);
    }

    // Check if already liked
    public function checkLike( $type, $typeId)
    {
        $builder = $this->db->table('likes');
        return $builder->where([
           
            'type' => $type,
            'type_id'   => $typeId
        ])->get()->getRowArray();
    }

     public function countLikesById()
    {
        $builder = $this->db->table('likes');
        $builder->select('type_id, COUNT(id) as no_of_likes');
       $builder->groupBy('type_id');

       
        return $builder->get()->getResultArray();
       
    }
    public function countLikes()
    {
        $builder = $this->db->table('likes');
        $builder->selectCount('id', 'total');
       
        $row = $builder->get()->getRowArray();
        return $row['total'] ?? 0;
    }
}
