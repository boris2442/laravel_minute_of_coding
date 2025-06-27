<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool //peut voir la liste de tous les articles
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Article $article): bool //peut voir un article en particulier
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool //peut creer un article
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article): bool
    {
        return $user->role==='admin'; //peut modifier un article
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article): bool
    {
        return true;//peut supprimer un article
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article): bool //peut restaurer un article
    {
        return $user->role==='admin' ; //seul l'admin ou l'auteur de l'article peut le restaurer
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article): bool
    {
        return $user->role==='admin'; //seul l'admin peut supprimer un article de facon permanente
    }
}
