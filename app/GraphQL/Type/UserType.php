<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class UserType extends  GraphQLType
{
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'Creation datetime'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'Updating datetime'
            ],
            'profile' => [
                'type' => GraphQL::type('Profile'),
            ],
        ];
    }

    protected function resolveCreatedAtField($root, $args)
    {
        return $root->created_at->format('Y-m-d H:i:s');
    }

    protected function resolveUpdatedAtField($root, $args)
    {
        return $root->created_at->format('Y-m-d H:i:s');
    }

    protected function resolveProfileField($root, $args)
    {
        return $root->profile;
    }
}
