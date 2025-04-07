<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{

    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Post $post): bool
    {
        // check if the user has a role of admin or editor
        if($user->hasAnyRole(['admin', 'editor'])) {
            return true;
        }
        return $user->can ('view any posts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {

        // Check if the user has a role of admin or super_admin
        // hasAnyRole checks if the user has any of the roles in the array
        // hasRole checks if the user has the specific role
        if ($user->hasAnyRole(['admin', 'super_admin'])) {
            return true;
        }

        if($user->hasRole('editor') && $user->can('view posts')) {
            return true;
        }

        if ($user->hasRole('author') && $user->id == $post->user_id) {
            return true;
        }

        //
        return $user->can('view posts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {

        //
        if ($user->hasRole ('admin') || $user->hasRole ('editor')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
         // Admin and editor can update all posts
         if ($user->hasRole('admin')) {
            return true;
        }

        if($user->hasRole('editor') && $user->can('update posts')) {
            return true;
        }

        if ($user ->hasRole('author') && $user->id == $post->user_id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if($user->hasRole('editor') && $user->can('delete posts')) {
            return true;
        }

        if ($user ->hasRole('author') && $user->id == $post->user_id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {

        if ($user->hasAnyRole(['admin', 'super_admin'])) {
            return true;
        }

        if($user->hasRole('editor') && $user->can('restore posts')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {

        if ($user->hasAnyRole(['admin', 'super_admin'])) {
            return true;
        }

        if($user->hasRole('editor') && $user->can('force delete posts')) {
            return true;
        }
        return false;
    }
}
