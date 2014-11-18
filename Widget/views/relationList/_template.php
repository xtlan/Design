<span class="itemRelationList" data-id="<?=$item->id?>" >
    <form class="relationList" action="<?=$this->urlSave?>" method="POST">
        <?php $this->render($this->templateForm, array_merge($this->templateParams, array('item' => $item))); ?>
        <button class="removeRelationList deleteFilterKey" href="<?=$this->urlDelete?>"></button>
    </form>
</span>