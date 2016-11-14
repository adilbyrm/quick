<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    const CREATED_AT = 'RowAddDateTime';

    const UPDATED_AT = 'RowEditDateTime';

    protected $table = 'Identities';

    protected $primaryKey = 'RowID';

    protected $guarded = [
        'RowID'
    ];

    public function getIdentity($ID)
    {
    	return self::where('ID', $ID)->first();
    }
}
