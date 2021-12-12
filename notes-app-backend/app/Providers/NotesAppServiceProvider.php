<?php

namespace App\Providers;

use App\NotesApp\Domain\Repositories\NoteRepositoryInterface;
use App\NotesApp\Domain\Repositories\TagRepositoryInterface;
use App\NotesApp\Domain\Services\NotesService;
use App\NotesApp\Domain\Services\TagsService;
use App\NotesApp\Infrastructure\Persistence\Eloquent\Repositories\NotesRepository;
use App\NotesApp\Infrastructure\Persistence\Eloquent\Repositories\TagsRepository;
use Illuminate\Support\ServiceProvider;

class NotesAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // register repositories
        $this->app->singleton(NoteRepositoryInterface::class, function () {
            return new NotesRepository();
        });

        $this->app->singleton(TagRepositoryInterface::class, function () {
            return new TagsRepository();
        });

        //register services

        $this->app->singleton(NotesService::class, function (){
            return new NotesService(resolve(NoteRepositoryInterface::class));
        });

        $this->app->singleton(TagsService::class, function (){
            return new TagsService(resolve(TagRepositoryInterface::class));
        });

    }
}
