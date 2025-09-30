<?php

namespace App\Models;
use CodeIgniter\Model;

class RatingModel extends Model 
{


     public function __construct()
    {
       
        $this->db = \Config\Database::connect();
    }
 public function addRating($userId, $rating, $videoId)
    {
        $builder = $this->db->table('ratings');
        return $builder->insert([
            'user_id'      => $userId,
            'video_id'      => $videoId,
            'rating' => $rating,
           
        ]);
    }

    // Check if already liked
   
     public function countRatingsById()
    {
        $builder = $this->db->table('ratings');
        $builder->select('video_id, COUNT(id) as no_of_ratings');
       $builder->groupBy('video_id');
        return $builder->get()->getResultArray();
       //return $row['total'] ?? 0;
    }
    public function countRatings()
    {
        $builder = $this->db->table('ratings');
        $builder->selectCount('id', 'total');
       
        $row = $builder->get()->getRowArray();
        return $row['total'] ?? 0;
    }
   
    // public function getAverageRating($videoId) {
    //     return $this->selectAvg('rating')
    //                 ->where('video_id', $videoId)
    //                 ->get()
    //                 ->getRow()
    //                 ->rating;
    // }

    // // Total ratings count of a video
    // public function getTotalRatings($videoId) {
    //     return $this->where('video_id', $videoId)->countAllResults();
    // }
}
