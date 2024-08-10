<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invoice_prefix',
        'invoice_number',
        'paid_total',
        'serial_series',
        'serial_number',
        'serial'
    ];

    protected static function booted(): void
    {
        parent::booted();
    
        self::creating(static function (Invoice $invoice) {
            $invoice->serial_number = (Invoice::where('serial_series', $invoice->serial_series)->max('serial_number') ?? 0) + 1;
            $invoice->serial = $invoice->serial_series . '-' . $invoice->serial_number;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
 
    protected function invoiceNumber(): Attribute
    {
        return Attribute::make(
            get: function(int $value, array $attributes) { 
                return $attributes['invoice_prefix'] . '-' . str_pad($value, 5, '0', STR_PAD_LEFT);
            },
            set: fn (mixed $value, array $attributes) => Invoice::where('user_id', $attributes['user_id'])->max('invoice_number') + 1, 
        );
    }

    //if user has any prefix series then use that otherwise create new prefix based on current month and year
    public function createInvoicePrefixBasedOnCurrentMonthAndYear()
    {
        $this->invoice_prefix = now()->format('Ym');
    }
}
