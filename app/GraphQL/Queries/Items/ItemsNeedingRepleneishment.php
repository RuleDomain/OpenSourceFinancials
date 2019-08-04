<?php

namespace App\GraphQL\Queries\Items;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ItemsNeedingRepleneishment
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // TODO My test data isn't set up yet so deferring the completin of this until I
        // TODO have something that produces reasonable results.
        // TODO Also need to figure out how to check that quantity on hand is below
        // TODO the reorder_level
        return App\Models\Items\Item::where('supplier_id', '=', $args['supplier_id'])
            ->where('reorder_level', '>', 0)
            ->get();
    }
}
