<?php
namespace App\Filters;
use App\User;

class ThreadFilters extends Filter
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['by-user', 'sort-by-popularity'];
    /**
     * Filter the query by a given username.
     *
     * @param  string $username
     * @return Builder
     */
    protected function byUser($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }

	protected function sortByPopularity()
	{
		//$this->builder->getQuery()->orders = [];
		return $this->builder->orderBy('replies_count', 'desc');
    }
}
?>