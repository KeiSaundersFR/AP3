<?php

namespace App\Models;

use CodeIgniter\Model;

class Mission extends Model
{
    protected $table            = 'mission';
    protected $primaryKey       = 'ID_MISSION';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_CLIENT',
        'INTITULE_MISSION',
        'DESCRIPTION',
        'DATE_DEBUT',
        'DATE_FIN'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function findJoinAll()
    {
        return $this
            ->select('mission.ID_MISSION,
        mission.INTITULE_MISSION,
        mission.DESCRIPTION,
        mission.DATE_DEBUT,
        mission.DATE_FIN,
        client.RAISON_SOCIAL as RAISON_SOCIAL,
        client.ID_CLIENT')
            ->join('client', 'client.ID_CLIENT = mission.ID_CLIENT')
            ->findAll();
    }

    public function addProfil($idMission, $idProfil, $nbr)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil_mission');
        $builder->insert([
            'ID_MISSION' => $idMission,
            'ID_PROFIL' => $idProfil,
            'NOMBRE_SALARIE' => $nbr
        ]);
    }
    public function updateProfil($idMission, $idProfil, $nbr)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil_mission');
        $builder->Where('ID_MISSION', $idMission);
        $builder->Where('ID_PROFIL', $idProfil);
        $builder->update([
            'NOMBRE_SALARIE' => $nbr
        ]);
    }

    public function getProfil($idMission)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('profil_mission'); 
        $builder->join('profil', 'profil.ID_PROFIL = profil_mission.ID_PROFIL');
        $query = $builder->getWhere(['ID_MISSION' => $idMission]);
        return $query->getResultArray();
    }
}
