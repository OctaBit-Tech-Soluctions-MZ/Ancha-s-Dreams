<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasRoles;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($users) {
            $users->slug = static::generateUniqueSlug($users->name);
        });

        static::updating(function ($users) {
            if ($users->isDirty('name')) {
                $users->slug = static::generateUniqueSlug($users->name, $users->id);
            }
        });
    }

    protected static function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)
            ->when($excludeId, fn($query) => $query->where('id', '!=', $excludeId))
            ->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'created_by');
    }

    public function instructors(){
        return $this->hasOne(Instructor::class) ;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function blocked()
    {
        return $this->hasMany(Blocked_user::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function replies(){
        return $this->hasMany(Reply::class, 'user_id');
    }

    public function myCourses()
    {
        return $this->hasMany(MyCourse::class);
    }
    public static function getPermissions($role) {
       return Role::with('permissions')->where('name',$role)->first()->permissions;
    }

    public function isOnline()
    {
        return cache()->has('user-is-online-' . $this->id);
    }

    public function contentView()
    {
        return $this->belongsToMany(Content::class)->wherePivot('watched');
    }

    public function attempts()
    {
        return $this->hasMany(ExamAttempt::class, 'user_id');
    }

    public function syncRolePermissions()
    {
        foreach ($this->roles as $role) {
            foreach (User::getPermissions($role->name) as $permission) {
                $this->givePermissionTo($permission->name);
            }
        }
    }
}
