<?php

namespace App\Models;

use App\Enums\PurchaseOrdersEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseOrder extends Model
{
    
    public function submit():void
    {
       self::update(['status'=>PurchaseOrdersEnum::SUBMITTED->value]);
    }

    public function approve():void
    {
       self::update(['status'=>PurchaseOrdersEnum::APPROVED->value]);
    }

    public function supplier():BelongsTo
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

      
    public function branch():BelongsTo
    {
        return $this->belongsTo(Branches::class,'branch_id');
    }

}
