<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'message'
    ];

    public function formatDate(): string
    {
        return Carbon::parse($this->created_at)->format('H:i d/m/y');
    }

    public function limitMessage(int $limit): string
    {
        if ($this->message) {
            return substr($this->message, 0, $limit) . (strlen($this->message) <= $limit ? '' : '...');
        }
        return '';
    }
}
