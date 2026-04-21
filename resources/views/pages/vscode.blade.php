<!DOCTYPE html>
<html>
<head>
    <title>Vim + Monaco Final Fix</title>
</head>
<body>
    <div id="editor" style="height: 400px; width: 800px; border: 1px solid #ccc;"></div>
    <div id="status" style="background: #007acc; color: white; padding: 5px; font-family: monospace;"></div>

    <script src="https://unpkg.com/monaco-editor/min/vs/loader.js"></script>
    <script src="https://unpkg.com/monaco-vim/dist/monaco-vim.js"></script>

    <script>
        // *** 重要：必須告訴 require 去哪裡找 monaco-editor 的主程式 ***
        require.config({ 
            paths: { vs: 'https://unpkg.com/monaco-editor/min/vs' } 
        });

        require(['vs/editor/editor.main'], function () {
            
            // 使用反引號確保換行與註解不會弄斷 JavaScript
            const phpCode = `<?php

echo 'Vim is working!';
// 這裡的註解現在安全了`;

            const editorConfig = {
                value: phpCode,
                language: 'php',
                theme: 'vs-dark',
                automaticLayout: true
            };

            const editor = monaco.editor.create(document.getElementById('editor'), editorConfig);

            // 啟動 Vim 模式
            const statusNode = document.getElementById('status');
            if (window.MonacoVim) {
                window.MonacoVim.initVimMode(editor, statusNode);
            }
        });
    </script>
</body>
</html>