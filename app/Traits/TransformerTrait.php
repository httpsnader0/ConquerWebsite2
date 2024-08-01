<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait TransformerTrait
{
    public function caseSelectBoxTransformer(array $cases, string $locale)
    {
        return array_map(
            fn($case) => [
                'value' => $case->value,
                'name' => __("$locale.{$case->value}"),
            ],
            $cases,
        );
    }

    public function parentWithChildrensTransformer(Builder $queryBuilder, string $childrens_relation_name = 'childrens')
    {
        return $queryBuilder->onlyParents()->with($childrens_relation_name)->get()->map(fn($parent) => [
            'id' => $parent->id,
            'name' => $parent->name,
            'childrens' => $parent->{$childrens_relation_name}->map(fn($child) => [
                'id' => $child->id,
                'name' => $child->name,
            ]),
        ]);
    }

    public function tableSelectAttributesTransformer(Builder $queryBuilder, array $attributes = [])
    {
        $items = [];
        $counter = 0;

        foreach ($queryBuilder->select($attributes)->get() as $item) {
            foreach ($attributes as $attribute) {
                $items[$counter][$attribute] = $item->{$attribute};
            }
            $counter++;
        }

        return $items;
    }

    public function tableSelectBoxTransformer(Builder $queryBuilder, string $nameKey = 'name', string $valueKey = 'id')
    {
        return $queryBuilder->select($valueKey, $nameKey)
            ->get()
            ->map(fn($item) => [
                'value' => $item->{$valueKey},
                'name' => $item->{$nameKey},
            ]);
    }

    public function tableSelectBoxTransformerWithIcon(Builder $queryBuilder, string $iconKey = 'icon', string $nameKey = 'name', string $valueKey = 'id')
    {
        return $queryBuilder->select($valueKey, $nameKey)
            ->get()
            ->map(fn($item) => [
                'value' => $item->{$valueKey},
                'name' => $item->{$nameKey},
                'icon' => $item->{$iconKey},
            ]);
    }
}
