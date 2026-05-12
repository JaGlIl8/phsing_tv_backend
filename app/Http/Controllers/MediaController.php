<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function getIcons()
    {
        $icons = [
            'video' => 'video_library',
            'image' => 'photo_library',
            'audio' => 'audio_file',
            'upload' => 'upload_file',
            'download' => 'download',
            'delete' => 'delete',
            'edit' => 'edit',
            'share' => 'share',
            'favorite' => 'favorite',
            'folder' => 'folder'
        ];

        return response()->json([
            'success' => true,
            'data' => $icons
        ]);
    }

    /**
     * 獲取單個 icon
     */
    public function getIcon($type)
    {
        $icons = [
            'video' => 'video_library',
            'image' => 'photo_library',
            'audio' => 'audio_file',
            'upload' => 'upload_file',
            'download' => 'download',
            'delete' => 'delete',
            'edit' => 'edit',
            'share' => 'share',
            'favorite' => 'favorite',
            'folder' => 'folder'
        ];

        if (!isset($icons[$type])) {
            return response()->json([
                'success' => false,
                'message' => 'Icon 不存在'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $icons[$type]
        ]);
    }
}
