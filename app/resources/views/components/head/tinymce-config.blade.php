<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#q_text', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    external_plugins: { tiny_mce_wiris: 'https://www.wiris.net/demo/plugins/tiny_mce/plugin.js' },
    toolbar: 'undo redo | bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
    menubar: false,
    resize: false
  });
</script>
