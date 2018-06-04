<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class ProfileType extends  GraphQLType
{
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'first_name' => [
                'type' => Type::string(),
            ],
            'last_name' => [
                'type' => Type::string(),
            ],
            'address' => [
                'type' => Type::string(),
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'Creation datetime'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'Updating datetime'
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

}
