<?php

if (!function_exists('getRandom')) {
    /**
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Model $model
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    function getRandom($model, $count = 1)
    {
        $users = null;
        if ($model instanceof \Illuminate\Database\Eloquent\Builder)
            $users = $model::get()->random(1);
        else
            $users = $model::all()->random(1);

        if ($count == 1)
            if (count($users) > 0)
                return $users[0];


        return $users;
    }
}

if (!function_exists('getRandomOrCreate')) {
    /**
     * @param $model
     * @param int $count
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    function getRandomOrCreate($model, $count = 1, $attributes = [])
    {
        $users = getRandom($model, $count);

        if ($count == 1)
            return ($users) ? $users : factory($model, $count)->create($attributes)[0];
        else {
            if (count($users) == $count) {
                return $users;
            } else {
                $createCount = $count - count($users);
                $createdUsers = factory($model, $createCount)->create($attributes);
                return $users->merge($createdUsers);
            }
        }
    }
}

