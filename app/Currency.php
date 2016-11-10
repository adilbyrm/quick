<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Currency extends Model
{
    protected $connection = 'DBProjectDesignerUser';

    protected $table = 'Currencies';

    protected $primaryKey = 'RowID';

    protected $guarded = [
        'RowID'
    ];

    const CREATED_AT = 'RowAddDateTime';

    const UPDATED_AT = 'RowEditDateTime';

}
