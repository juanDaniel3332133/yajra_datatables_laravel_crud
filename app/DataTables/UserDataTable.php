<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

use App\Models\User;

class UserDataTable extends DataTables
{
	private $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function build()
	{
		return self::of($this->makeQuery())
				->make(true);
	}

	public function makeQuery()
	{	
		$query = $this->user->newQuery();

		$request_data = collect($_GET);

		if ($request_data->has('status'))
			$this->filterPerStatus($query, $request_data->get('status'));

		return $query;
	}

	private function filterPerStatus($query, $value)
	{
		$query->where('status', $value);
	}
}
