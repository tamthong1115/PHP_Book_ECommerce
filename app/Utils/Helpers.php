<?php

namespace Utils;

class Helpers
{
    public function deleteDirectory($dir)
    {
        if (!is_dir($dir)) {
            return;
        }
        $items = array_diff(scandir($dir), ['.', '..']);
        foreach ($items as $item) {
            $path = $dir . DIRECTORY_SEPARATOR . $item;
            if (is_dir($path)) {
                $this->deleteDirectory($path);
            } else {
                unlink($path);
            }
        }
        rmdir($dir);
    }


    public function getPathImg($bookId, $imageUrl)
    {
        return base_url('/uploads/' . $bookId . '/' . $imageUrl);
    }
}
