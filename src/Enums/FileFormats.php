<?php

namespace Caneara\Spine\Enums;

use Caneara\Spine\Types\Enum;

enum FileFormats : int
{
    use Enum;

    /**
     * The available cases.
     *
     */
    case FILE_7Z   = 1;
    case FILE_AVI  = 2;
    case FILE_BMP  = 3;
    case FILE_CSV  = 4;
    case FILE_DOC  = 5;
    case FILE_DOCX = 6;
    case FILE_EML  = 7;
    case FILE_EMLX = 8;
    case FILE_GIF  = 9;
    case FILE_JPG  = 10;
    case FILE_JPEG = 11;
    case FILE_KEY  = 12;
    case FILE_M4A  = 13;
    case FILE_M4V  = 14;
    case FILE_MP3  = 15;
    case FILE_MP4  = 16;
    case FILE_MPG  = 17;
    case FILE_MPEG = 18;
    case FILE_MOV  = 19;
    case FILE_MSG  = 20;
    case FILE_ODP  = 21;
    case FILE_ODS  = 22;
    case FILE_ODT  = 23;
    case FILE_OGG  = 24;
    case FILE_PDF  = 25;
    case FILE_PNG  = 26;
    case FILE_PPS  = 27;
    case FILE_PPT  = 28;
    case FILE_PPTX = 29;
    case FILE_PSD  = 30;
    case FILE_RAR  = 31;
    case FILE_RTF  = 32;
    case FILE_SVG  = 33;
    case FILE_TIFF = 34;
    case FILE_TXT  = 35;
    case FILE_XLS  = 36;
    case FILE_XLSX = 37;
    case FILE_WAV  = 38;
    case FILE_WEBP = 39;
    case FILE_WMA  = 40;
    case FILE_WMV  = 41;
    case FILE_WPD  = 42;
    case FILE_ZIP  = 43;

    /**
     * Retrieve the available cases as an array.
     *
     */
    public static function toArray() : array
    {
        return [[
            'id'        => static::FILE_7Z,
            'extension' => '7z',
            'icon'      => 'fa-file-archive',
            'label'     => '7z compressed archive',
        ], [
            'id'        => static::FILE_AVI,
            'extension' => 'avi',
            'icon'      => 'fa-file-video',
            'label'     => 'Audiovisual file',
        ], [
            'id'        => static::FILE_BMP,
            'extension' => 'bmp',
            'icon'      => 'fa-file-image',
            'label'     => 'Bitmap image',
        ], [
            'id'        => static::FILE_CSV,
            'extension' => 'csv',
            'icon'      => 'fa-file-csv',
            'label'     => 'Comma-separated-value file',
        ], [
            'id'        => static::FILE_DOC,
            'extension' => 'doc',
            'icon'      => 'fa-file-word',
            'label'     => 'Word document',
        ], [
            'id'        => static::FILE_DOCX,
            'extension' => 'docx',
            'icon'      => 'fa-file-word',
            'label'     => 'Word document',
        ], [
            'id'        => static::FILE_EML,
            'extension' => 'eml',
            'icon'      => 'fa-file-download',
            'label'     => 'Exported email',
        ], [
            'id'        => static::FILE_EMLX,
            'extension' => 'emlx',
            'icon'      => 'fa-file-download',
            'label'     => 'Exported email',
        ], [
            'id'        => static::FILE_GIF,
            'extension' => 'gif',
            'icon'      => 'fa-file-image',
            'label'     => 'GIF image',
        ], [
            'id'        => static::FILE_JPG,
            'extension' => 'jpg',
            'icon'      => 'fa-file-image',
            'label'     => 'JPEG image',
        ], [
            'id'        => static::FILE_JPEG,
            'extension' => 'jpeg',
            'icon'      => 'fa-file-image',
            'label'     => 'JPEG image',
        ], [
            'id'        => static::FILE_KEY,
            'extension' => 'key',
            'icon'      => 'fa-file-chart-pie',
            'label'     => 'Keynote presentation',
        ], [
            'id'        => static::FILE_M4A,
            'extension' => 'm4a',
            'icon'      => 'fa-file-audio',
            'label'     => 'MPEG4 audio',
        ], [
            'id'        => static::FILE_M4V,
            'extension' => 'm4v',
            'icon'      => 'fa-file-video',
            'label'     => 'MPEG4 video',
        ], [
            'id'        => static::FILE_MP3,
            'extension' => 'mp3',
            'icon'      => 'fa-file-audio',
            'label'     => 'MPEG3 audio',
        ], [
            'id'        => static::FILE_MP4,
            'extension' => 'mp4',
            'icon'      => 'fa-file-video',
            'label'     => 'MPEG4 video',
        ], [
            'id'        => static::FILE_MPG,
            'extension' => 'mpg',
            'icon'      => 'fa-file-video',
            'label'     => 'MPEG video',
        ], [
            'id'        => static::FILE_MPEG,
            'extension' => 'mpeg',
            'icon'      => 'fa-file-video',
            'label'     => 'MPEG video',
        ], [
            'id'        => static::FILE_MOV,
            'extension' => 'mov',
            'icon'      => 'fa-file-video',
            'label'     => 'QuickTime video',
        ], [
            'id'        => static::FILE_MSG,
            'extension' => 'msg',
            'icon'      => 'fa-file-download',
            'label'     => 'Exported email',
        ], [
            'id'        => static::FILE_ODP,
            'extension' => 'odp',
            'icon'      => 'fa-file-chart-pie',
            'label'     => 'OpenOffice presentation',
        ], [
            'id'        => static::FILE_ODS,
            'extension' => 'ods',
            'icon'      => 'fa-file-spreadsheet',
            'label'     => 'OpenOffice spreadsheet',
        ], [
            'id'        => static::FILE_ODT,
            'extension' => 'odt',
            'icon'      => 'fa-file-edit',
            'label'     => 'OpenOffice document',
        ], [
            'id'        => static::FILE_OGG,
            'extension' => 'ogg',
            'icon'      => 'fa-file-audio',
            'label'     => 'Ogg vorbis audio',
        ], [
            'id'        => static::FILE_PDF,
            'extension' => 'pdf',
            'icon'      => 'fa-file-pdf',
            'label'     => 'Portable document',
        ], [
            'id'        => static::FILE_PNG,
            'extension' => 'png',
            'icon'      => 'fa-file-image',
            'label'     => 'PNG image',
        ], [
            'id'        => static::FILE_PPS,
            'extension' => 'pps',
            'icon'      => 'fa-file-powerpoint',
            'label'     => 'PowerPoint slideshow',
        ], [
            'id'        => static::FILE_PPT,
            'extension' => 'ppt',
            'icon'      => 'fa-file-powerpoint',
            'label'     => 'PowerPoint presentation',
        ], [
            'id'        => static::FILE_PPTX,
            'extension' => 'pptx',
            'icon'      => 'fa-file-powerpoint',
            'label'     => 'PowerPoint presentation',
        ], [
            'id'        => static::FILE_PSD,
            'extension' => 'psd',
            'icon'      => 'fa-file-image',
            'label'     => 'PhotoShop image',
        ], [
            'id'        => static::FILE_RAR,
            'extension' => 'rar',
            'icon'      => 'fa-file-archive',
            'label'     => 'RAR compressed archive',
        ], [
            'id'        => static::FILE_RTF,
            'extension' => 'rtf',
            'icon'      => 'fa-file-edit',
            'label'     => 'Document',
        ], [
            'id'        => static::FILE_SVG,
            'extension' => 'svg',
            'icon'      => 'fa-file-image',
            'label'     => 'SVG image',
        ], [
            'id'        => static::FILE_TIFF,
            'extension' => 'tiff',
            'icon'      => 'fa-file-image',
            'label'     => 'TIFF image',
        ], [
            'id'        => static::FILE_TXT,
            'extension' => 'txt',
            'icon'      => 'fa-file-alt',
            'label'     => 'Text document',
        ], [
            'id'        => static::FILE_XLS,
            'extension' => 'xls',
            'icon'      => 'fa-file-excel',
            'label'     => 'Excel spreadsheet',
        ], [
            'id'        => static::FILE_XLSX,
            'extension' => 'xlsx',
            'icon'      => 'fa-file-excel',
            'label'     => 'Excel spreadsheet',
        ], [
            'id'        => static::FILE_WAV,
            'extension' => 'wav',
            'icon'      => 'fa-file-audio',
            'label'     => 'Wave audio',
        ], [
            'id'        => static::FILE_WEBP,
            'extension' => 'webp',
            'icon'      => 'fa-file-image',
            'label'     => 'WEBP image',
        ], [
            'id'        => static::FILE_WMA,
            'extension' => 'wma',
            'icon'      => 'fa-file-audio',
            'label'     => 'WMA audio',
        ], [
            'id'        => static::FILE_WMV,
            'extension' => 'wmv',
            'icon'      => 'fa-file-video',
            'label'     => 'WMV video',
        ], [
            'id'        => static::FILE_WPD,
            'extension' => 'wpd',
            'icon'      => 'fa-file-edit',
            'label'     => 'WordPerfect document',
        ], [
            'id'        => static::FILE_ZIP,
            'extension' => 'zip',
            'icon'      => 'fa-file-archive',
            'label'     => 'ZIP compressed archive',
        ]];
    }
}
