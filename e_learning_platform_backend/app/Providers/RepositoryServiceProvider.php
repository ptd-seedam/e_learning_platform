<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Đăng ký các repository tại đây
        $this->app->bind(
            \App\Repositories\Contracts\UserRepositoryInterface::class,
            \App\Repositories\Eloquent\UserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\UserAnswerRepositoryInterface::class,
            \App\Repositories\Eloquent\UserAnswerRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\CourseRepositoryInterface::class,
            \App\Repositories\Eloquent\CourseRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\LessonRepositoryInterface::class,
            \App\Repositories\Eloquent\LessonRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\QuizRepositoryInterface::class,
            \App\Repositories\Eloquent\QuizRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\QuestionRepositoryInterface::class,
            \App\Repositories\Eloquent\QuestionRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\AnswerOptionRepositoryInterface::class,
            \App\Repositories\Eloquent\AnswerOptionRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\LessonMaterialRepositoryInterface::class,
            \App\Repositories\Eloquent\LessonMaterialRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\EnrollmentRepositoryInterface::class,
            \App\Repositories\Eloquent\EnrollmentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\PaymentRepositoryInterface::class,
            \App\Repositories\Eloquent\PaymentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\ReviewRepositoryInterface::class,
            \App\Repositories\Eloquent\ReviewRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\TestAttemptRepositoryInterface::class,
            \App\Repositories\Eloquent\TestAttemptRepository::class
        );
        $this->app->bind(
            \App\Repositories\Contracts\LiveClassRepositoryInterface::class,
            \App\Repositories\Eloquent\LiveClassRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
