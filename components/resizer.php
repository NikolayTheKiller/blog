<?php
/*
 * масштабирует изображения
 * принимает ресурс
 * размер
 * адрес, куда поместить результат
 * 
 */
class resizer {
    public static function resize($dir,$size,$thumb){
        $resurce= imagecreatefromjpeg($dir);
        $scaled= imagescale($resurce, $size);
        imagejpeg($scaled,$thumb,70);//70-качество в %
        imagedestroy($scaled); 
        return TRUE;
    }
}
