<div region="north" style="font-size: large;padding:5px;height: 40px;">
    Unit / Dashboard
</div>
<div region="west" split="true" title="Navigasi" collapsed="false" style="width:200px;">
    <ul id="pohon" class="easyui-tree" url="<?= base_url('res/json/tree.php') ?>" method="get" animate="true" lines="true"></ul>
</div>
<script>
    $('#pohon').tree({
        onClick: function (node) {
            var t = $('#tt');
            if (t.tabs('exists', node.text)) {
                t.tabs('select', node.text);
            } else {
                t.tabs('add', {
                    title: node.text,
                    href: '<?= base_url() ?>' + node.tautan,
                    closable: true
                });
            }
        }
    });
</script>
<div region="center" id="tt" class="easyui-tabs" border="false"></div>