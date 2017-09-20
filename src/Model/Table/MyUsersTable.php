<?php
namespace App\Model\Table;

use CakeDC\Users\Model\Table\UsersTable;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 */
class MyUsersTable extends UsersTable
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->hasMany('Visits', [
            'sort' => ['Visits.created' => 'ASC'],
            'dependent' => true,
            'foreignKey' => 'user_id'
        ]);

        $this->hasOne('Scores', [
            'dependent' => true,
            'foreignKey' => 'user_id'
        ]);

    }

}
