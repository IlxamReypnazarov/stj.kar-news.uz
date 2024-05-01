<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailedApplications extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "status",
        "lastname",
        "firstname",
        "jshshir",
        "gender",
        "phone",
        "region_id",
        "district_id",
        "quarter_id",
        "street",
        "faculty_id",
        "profession_id",
        "group_id",
        "privelege_name",
        "privelege_file"
        ];
}
