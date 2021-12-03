<?php

namespace App\Models;

use CodeIgniter\Model;

class TranslationModel extends Model
{
    protected $table              = 'translation';
    protected $primaryKey         = 'id';

    protected $useAutoIncrement   = true;

    // protected $returnType         = 'array';
    // protected $useSoftDeletes     = true;

    protected $allowedFields      = ['value'];

    // protected $useTimestamps      = false;
    // protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    // protected $deletedField       = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    function getLanguageTranslation($lg){
        $defultLanguage = 'en';
        $sql = "SELECT lang.*, deflang.value AS defLangValue FROM translation AS lang, translation AS deflang WHERE lang.fieldNameId = deflang.fieldNameId AND lang.languageId = '{$lg}' and deflang.languageId = '{$defultLanguage}'";
        $query = $this->db->query($sql);
        $result = $query->getResult('array');
        return $result;
    }
}