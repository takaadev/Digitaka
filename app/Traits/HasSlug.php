<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(function ($model) {
            if (blank($model->slug)) {
                $model->slug = static::generateUniqueSlug(
                    $model,
                    $model->slugSource()
                );
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty($model->slugSource())) {
                $model->slug = static::generateUniqueSlug(
                    $model,
                    $model->slugSource()
                );
            }
        });
    }

    protected function slugSource(): string
    {
        return 'name';
    }

    protected static function generateUniqueSlug($model, string $source): string {
        $value = $model->{$source} ?: 'item';
        $slug = Str::slug($value);
        $original = $slug;
        $counter = 2;

        $query = $model->newQuery();

        if ($model->exists) {
            $query->where(
                $model->getKeyName(),
                '!=',
                $model->getKey()
            );
        }

        while (
            (clone $query)->where('slug', $slug)->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }
}
