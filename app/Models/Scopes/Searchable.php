<?php

namespace App\Models\Scopes;

trait Searchable
{
    public function scopeSearchLatestPaginated(
        $query,
        string $search,
        $paginationQuantity = 10
    ): mixed {
        return $query
            ->search($search)
            ->orderBy('updated_at', 'desc')
            ->paginate($paginationQuantity);
    }

    public function scopeSearch($query, $search): mixed
    {
        $query->where(function ($query) use ($search) {
            foreach ($this->getSearchableFields() as $field) {
                $query->orWhere($field, 'like', "%{$search}%");
            }
        });

        return $query;
    }

    protected function getSearchableFields(): array
    {
        if (isset($this->searchableFields) && count($this->searchableFields)) {
            return $this->searchableFields[0] === '*'
                ? $this->getAllModelTableFields()
                : $this->searchableFields;
        }

        return $this->getAllModelTableFields();
    }

    protected function getAllModelTableFields(): array
    {
        $tableName = $this->getTable();

        return $this->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($tableName);
    }
}
