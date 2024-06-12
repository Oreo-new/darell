<?
if (!function_exists('formatCategoryName')) {
    function formatCategoryName($category)
    {
        // Use a regular expression to separate the letters from the numbers
        $formatted = preg_replace('/([a-zA-Z]+)(\d+)/', '$1 $2', $category);
        // Capitalize the first letter
        return ucfirst($formatted);
    }
}