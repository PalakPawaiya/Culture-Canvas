<?php
namespace App\Models;

use CodeIgniter\Model;

class VisitorModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
       
    }

    // Get current count
    public function getCount()
    {
        $builder = $this->db->table('visitor_counter');
        $builder->select('counts');
        $builder->where('id', 1);
        $query = $builder->get();
        return $query->getRowArray();  
    }

   
    public function increaseCount()
    {
        $builder = $this->db->table('visitor_counter');

       
        $builder->select('counts');
        $builder->where('id', 1);
        $query = $builder->get();
        $row   = $query->getRowArray();

        if ($row) {
            $newCount = (int) $row['counts'] + 1;

          
            $builder = $this->db->table('visitor_counter');
            $builder->where('id', 1);
            $builder->update(['counts' => $newCount]);

            return $newCount;
        }
        return 0;
    }
}