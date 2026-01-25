<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'm_user'; // Updated table name
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'username',
        'nim_user',
        'nm_user', // Updated column name
        'email', // Keeping email for auth/notifications for now unless explicitly asked to remove logic
        'password',
        'role',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        ];
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'user_id', 'username');
    }

    public function completedLessons()
    {
        return $this->hasMany(LessonCompletion::class, 'user_id', 'username');
    }

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class, 'user_id', 'username');
    }

}
