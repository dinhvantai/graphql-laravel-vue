<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\User;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'users'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('User'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'email' => ['name' => 'email', 'type' => Type::string()],
            'first' => ['name' => 'first', 'type' => Type::int()],
        ];
    }

    public function resolve($root, $args)
    {
        $users = new User();

        if (isset($args['first'])) {
            $users = $users->take($args['first'])->orderBy('id', 'desc');
        }

        if (isset($args['id'])) {
            $users = $users->where('id', $args['id']);
        }

        if (isset($args['email'])) {
            $users = $users->where('email', 'like', "%{$args['email']}%");
        }

        return $users->get();
    }
}
