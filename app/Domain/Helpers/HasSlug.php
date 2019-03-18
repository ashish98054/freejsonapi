<?php

namespace App\Domain\Helpers;

trait HasSlug
{
    public function slug(): string
    {
        return $this->slug;
    }

    public function setSlugAttribute(string $slug)
    {
        $this->attributes['slug'] = $this->generateUniqueSlug($slug);
    }

    public function findBySlug(string $slug): self
    {
        return static::where('slug', $slug)->firstOrFail();
    }

    private function generateUniqueSlug(string $value): string
    {
        $counter = 0;
        $slug = $originalSlug = str_slug($value);
        $ignoreId = $this->exists ? $this->id() : null;

        while ($this->slugExists($slug, $ignoreId)) {
            $counter++;
            $slug = $originalSlug . '-' . $counter;
        }

        return $slug;
    }

    private function slugExists(string $slug, int $ignoreId = null): bool
    {
        $query = $this->where('slug', $slug);

        if ($ignoreId) {
            $query->where('id', "!=", $ignoreId);
        }

        return $query->count();
    }
}