public function scopeSearch($query, $q)
{
    if ($q == null) return $query;
    return $query
            ->where('name', 'LIKE', "%{$q}%")
            ->orWhere('email', 'LIKE', "%{$q}%")
            ->orWhere('website', 'LIKE', "%{$q}%")
            ->orWhere('twitter', 'LIKE', "%{$q}%")
            ->orWhere('notes', 'LIKE', "%{$q}%");
}