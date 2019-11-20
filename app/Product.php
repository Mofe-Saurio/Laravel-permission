<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use OwenIt\Auditing\Contracts\Auditable;
class Product extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name', 'description',
    ];

    public function generateTags(): array
    {
        return [
            'products_audit'

        ];
    }
}
