<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'display_name',
        'guard_name',
        'created_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Role::class;
    }
}
