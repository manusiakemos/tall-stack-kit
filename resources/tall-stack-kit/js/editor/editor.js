import Alpine from "alpinejs";

import { Editor } from '@tiptap/core';

import StarterKit from '@tiptap/starter-kit';
import LinkExtension from "@tiptap/extension-link";
import Highlight from "@tiptap/extension-highlight";
import Underline from "@tiptap/extension-underline";
import Image from "@tiptap/extension-image";
import Table from '@tiptap/extension-table';
import TableRow from '@tiptap/extension-table-row';
import TableCell from '@tiptap/extension-table-cell';
import TableHeader from '@tiptap/extension-table-header';
import BubbleMenu from '@tiptap/extension-bubble-menu';
import TextAlign from "@tiptap/extension-text-align";
import Iframe from "./iframe";
import EmbedFile from "./embed-file";

window.setupEditor = function() {
    return {
        editor: null,
        active: {
            undo: false,
            redo: false,
            heading1: false,
            heading2: false,
            heading3: false,
            heading4: false,
            bold: true,
            italic: false,
            underline: false,
            highlight: false,
            paragraph: false,
            orderedList: false,
            bulletList: false,
            image: false,
            link: false,
            strike: false,
            blockquote: false,
            table: false,
            alignLeft: false,
            alignRight: false,
            alignCenter: false,
            alignJustify: false,
            iframe: false,
            embedFile: false,
            code: false,
        },
        init(element) {
            //content from blade
            this.editor = new Editor({
                element: element,
                extensions: [
                    LinkExtension,
                    StarterKit.configure({
                        history: true,
                        dropcursor: true,
                    }),
                    Image.configure({
                        HTMLAttributes: {
                            class: 'img-responsive'
                        }
                    }),
                    Underline,
                    Highlight,
                    Table.configure({
                        resizable: true,
                        HTMLAttributes: {
                            class: 'table table-bordered table-sm',
                        },
                    }),
                    TableRow,
                    TableHeader,
                    TableCell,
                    BubbleMenu.configure({
                        element: document.querySelector('.menu'),
                    }),
                    TextAlign.configure({
                        types: ['heading', 'paragraph'],
                    }),
                    Iframe,
                    EmbedFile
                ],
                content: this.content,
                onTransaction: ({ editor }) => {
                    this.content = editor.getHTML();
                    this.active.bold = editor.isActive("bold");
                    this.active.italic = editor.isActive("italic");
                    this.active.underline = editor.isActive("underline");
                    this.active.highlight = editor.isActive("highlight");
                    this.active.marker = editor.isActive("marker");
                    this.active.orderedList = editor.isActive("orderedList");
                    this.active.bulletList = editor.isActive("bulletList");
                    this.active.image = editor.isActive("image");
                    this.active.link = editor.isActive("link");
                    this.active.strike = editor.isActive("strike");
                    this.active.blockquote = editor.isActive("blockquote");
                    this.active.table = editor.isActive("table");
                    this.active.heading1 = editor.isActive('heading', { level: 1 });
                    this.active.heading2 = editor.isActive('heading', { level: 2 });
                    this.active.heading3 = editor.isActive('heading', { level: 3 });
                    this.active.heading4 = editor.isActive('heading', { level: 4 });
                    this.active.alignLeft = editor.isActive({ textAlign: 'left' });
                    this.active.alignCenter = editor.isActive({ textAlign: 'center' });
                    this.active.alignRight = editor.isActive({ textAlign: 'right' });
                    this.active.alignJustify = editor.isActive({ textAlign: 'justify' });
                    this.active.iframe = editor.isActive('iframe');
                    this.active.code = editor.isActive('code');
                },
                onUpdate: ({ editor }) => {
                    this.content = editor.getHTML();
                }
            });
            this.$watch('content', (content) => {
                // If the new content matches TipTap's then we just skip.
                if (content === this.editor.getHTML()) {
                    return;
                }

                /*
                  Otherwise, it means that a force external to TipTap
                  is modifying the data on this Alpine component,
                  which could be Livewire itself.
                  In this case, we just need to update TipTap's
                  content and we're good to do.
                  For more information on the `setContent()` method, see:
                    https://www.tiptap.dev/api/commands/set-content
                */
                Alpine.raw(this.editor).commands.setContent(content, false);
            });
        },
        toggleClass(type) {
            if (this.activeMenu.includes(type)) {
                this.activeMenu = this.activeMenu.filter(item => item !== type);
            } else {
                this.activeMenu.push(type);
            }
        },
        toggleHeading(level) {
            Alpine.raw(this.editor).chain().toggleHeading({ level }).focus().run();
        },
        toggleBold() {
            // this.toggleClass('bold');
            Alpine.raw(this.editor).chain().toggleBold().focus().run();
        },
        toggleItalic() {
            Alpine.raw(this.editor).chain().toggleItalic().focus().run();
        },
        toggleUnderline() {
            Alpine.raw(this.editor).chain().toggleUnderline().focus().run();
        },
        toggleParagraph() {
            Alpine.raw(this.editor).chain().setParagraph().focus().run();
        },
        toggleList(type) {
            if (type === "bullet") {
                Alpine.raw(this.editor).chain().toggleBulletList().focus().run();
            } else {
                Alpine.raw(this.editor).chain().toggleOrderedList().focus().run();
            }
        },
        addTable(rows, cols) {
            Alpine.raw(this.editor).chain().focus().insertTable({
                rows: rows,
                cols: cols,
                withHeaderRow: true
            }).run();
        },
        addColumnBefore() {
            Alpine.raw(this.editor).chain().addColumnBefore().focus().run();
        },
        addColumnAfter() {
            Alpine.raw(this.editor).chain().addColumnAfter().focus().run();
        },
        deleteColumn() {
            Alpine.raw(this.editor).chain().deleteColumn().focus().run();
        },
        addRowBefore() {
            Alpine.raw(this.editor).chain().addRowBefore().focus().run();
        },
        addRowAfter() {
            Alpine.raw(this.editor).chain().addRowAfter().focus().run();
        },
        deleteRow() {
            Alpine.raw(this.editor).chain().deleteRow().focus().run();
        },
        deleteTable() {
            Alpine.raw(this.editor).chain().deleteTable().focus().run();
        },
        mergeCells() {
            Alpine.raw(this.editor).chain().mergeCells().focus().run();
        },
        splitCells() {
            Alpine.raw(this.editor).chain().splitCell().focus().run();
        },
        toggleHeaderColumn() {
            Alpine.raw(this.editor).chain().toggleHeaderColumn().focus().run();
        },
        toggleHeaderRow() {
            Alpine.raw(this.editor).chain().toggleHeaderRow().focus().run();
        },
        toggleHeaderCell() {
            Alpine.raw(this.editor).chain().toggleHeaderCell().focus().run();
        },
        mergeOrSplit() {
            Alpine.raw(this.editor).chain().mergeOrSplit().focus().run();
        },
        fixTable() {
            Alpine.raw(this.editor).chain().fixTables().focus().run();
        },
        goToNextCell() {
            Alpine.raw(this.editor).chain().goToNextCell().focus().run();
        },
        goToPreviousCell() {
            Alpine.raw(this.editor).chain().goToPreviousCell().focus().run();
        },
        addLink() {
            Alpine.raw(this.editor).chain().setLink().focus().run();
        },
        toggleStrikeThrough() {
            Alpine.raw(this.editor).chain().toggleStrike().focus().run();
        },
        toggleHighlight(color) {
            Alpine.raw(this.editor).chain().toggleHighlight().focus().run();
        },
        toggleBlockquote() {
            Alpine.raw(this.editor).chain().toggleBlockquote().focus().run();
        },
        undo() {
            Alpine.raw(this.editor).chain().undo().focus().run();
        },
        redo() {
            Alpine.raw(this.editor).chain().redo().focus().run();
        },
        toggleTextAlign(type) {
            Alpine.raw(this.editor).chain().focus().setTextAlign(type).run();
        },
        toggleCode() {
            Alpine.raw(this.editor).chain().toggleCode().focus().run();
        },
        setIframe() {
            let url = window.prompt('URL');
            let width = window.prompt('width');
            let height = window.prompt('height');

            Alpine.raw(this.editor).chain().focus().setIframe({ src: url, width: width, height: height }).run();
        },
        uploadImage(route_prefix) {
            this.lfm('lfm', 'image', { prefix: route_prefix });
        },
        uploadFile(route_prefix) {
            this.lfm('lfm', 'file', { prefix: route_prefix });
        },
        setImage(url) {
            if (url) {
                Alpine.raw(this.editor).chain().focus().setImage({ src: url }).run();
            } else {
                console.error('image url not found');
            }
        },
        setEmbedFileUpload(url, width, height) {
            if (url) {
                Alpine.raw(this.editor).chain().focus().setEmbedFile({ src: url, width: width, height: height }).run();
            } else {
                console.error('image url not found');
            }
        },
        lfm(id, type, options) {
            const _this = this;

            if (type === 'file') {
                var width = window.prompt("width:", "100%");
                var height = window.prompt("height:", "1000");
            }
            let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + type || 'file', 'FileManager', 'width=700,height=600');

            window.SetUrl = function (items) {
                let file_path = items.map(function (item) {
                    return item.url;
                }).join(',');
                if (type === 'image') {
                    _this.setImage(file_path);
                } else {
                    _this.setEmbedFileUpload(file_path, width, height);
                }
            };
        },
    };
};
