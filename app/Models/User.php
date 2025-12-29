<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Member\InfoPersonal;
use App\Models\Member\InfoChildDetails;
use App\Models\Member\InfoAcademic;
use App\Models\Member\InfoCompany;
use App\Models\Member\InfoStudent;
use App\Models\Member\InfoOther;
use App\Models\Member\InfoDocument;
use App\Models\Master\MemberType;
use App\Models\Master\CommitteeType;
use App\Models\Payment\PaymentDetails;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'member_code',
        'password',
        'profile_photo_path',
        'member_type_id',
        'committee_type_id',
        'committee_designation',
        'email_verified_at',
        'status',
        'is_admin',
        'approve_by',
        'index',
    ];

    public function memberType()
    {
        return $this->belongsTo(MemberType::class, 'member_type_id');
    }
    public function committeeType()
    {
        return $this->belongsTo(CommitteeType::class, 'committee_type_id');
    }
    public function parentUser()
    {
        return $this->belongsTo(User::class, 'approve_by');
    }
    public function infoPersonal()
    {
        return $this->hasOne(InfoPersonal::class, 'member_id');
    }
    public function infoChildDetails()
    {
        return $this->hasOne(InfoChildDetails::class, 'member_id');
    }
    public function infoAcademic()
    {
        return $this->hasOne(InfoAcademic::class, 'member_id');
    }
    public function infoCompany()
    {
        return $this->hasOne(InfoCompany::class, 'member_id');
    }
    public function infoStudent()
    {
        return $this->hasOne(InfoStudent::class, 'member_id');
    }
    public function infoDocument()
    {
        return $this->hasOne(InfoDocument::class, 'member_id');
    }
    public function infoOther()
    {
        return $this->hasOne(InfoOther::class, 'member_id');
    }
    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetails::class, 'member_id');
    }
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}


?>